<?php
namespace App\Middlewares\Service;
use App\Constant\Enum;
use App\Tools\ServiceTableBean;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Swoft\App;
use Swoft\Bean\BeanFactory;
use Swoft\Core\RequestContext;
use Swoft\Http\Message\Middleware\MiddlewareInterface;
use Swoft\Bean\Annotation\Bean;
use Swoft\Bean\Annotation\Inject;

/**
 * Class RouteMiddleware
 * @package App\Middlewares\Api
 * @Bean()
 */

class RouteMiddleware implements MiddlewareInterface{
    /**
     * @Inject()
     * @var \Swoft\Redis\Redis
     */
    private $redis;
    private $token;
    private $auth;
    private $origin = "*";
    private $header = "";
    private $target = "";
    private $authError;

    /**
     * 中间件process
     * @param ServerRequestInterface $request
     * @param RequestHandlerInterface $handler
     * @return ResponseInterface
     */
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface{
        $this->header = $request->getHeaderLine("Access-Control-Request-Headers");
        $this->target = $request->getRequestTarget() == "/service/upload" ? true : false;
        $this->auth   = $this->userRequestNodeApi($request);
        if($request->getMethod() == "OPTIONS"){
            return $this->configResponse(response());
        }
        if($this->whetherNodeIsNoValidate($request)){
            $request->nodeIsNoValidate = true;
            if($this->signatureValidate($request)){
                return $this->configResponse($handler->handle($request));
            }
            return response()->json(BeanFactory::getBean("RequestFail")->signError());
        }
        if($request->hasHeader("token")){
            $this->token = $request->getHeaderLine("token");
            if($this->token){
                if($this->permissionValidate()){
                    return $this->configResponse($handler->handle($request));
                }
                if ($this->authError == Enum::SSO_ERROR_CODE) {
                    return response()->json(BeanFactory::getBean("RequestFail")->ssoError());
                }
                if($this->authError  == Enum::INVALID_TOKEN_CODE){
                    return response()->json(BeanFactory::getBean("RequestFail")->invalidToken());
                }
                return response()->json(BeanFactory::getBean("RequestFail")->permissionAuthFail());
            }
        }
        return response()->json(BeanFactory::getBean("RequestFail")->tokenNotExist());
    }

    /**
     * 是否验证
     * @param ServerRequestInterface $request
     * @return bool
     */
    private function whetherNodeIsNoValidate(ServerRequestInterface $request):bool {
        $noValidationList = \Swoft::getBean("config")->get("noValidation") ?? [];
        $node = $request->getQueryParams()["node"] ?? "";
        if(in_array($node,$noValidationList) && $request->hasHeader("token") == false){
            return true;
        }
        return false;
    }

    /**
     * 验证签名
     * @param ServerRequestInterface $request
     * @return bool
     *
     */
    private function signatureValidate(ServerRequestInterface $request){
        $timestamp = $request->getQueryParams()["timestamp"] ?? "";
        $node      = $request->getQueryParams()["node"] ?? "";
        $signature = $request->getQueryParams()["sign"] ?? "";
        $encrypt   = md5($timestamp.'^_^'.$node);
        return $encrypt == $signature;
    }

    /**
     * 请求权限系统，获取权限数据
     * @return bool
     */
    private function permissionValidate(){
        $productKey = \Swoft::getBean("config")->get("user.permission.productKey");
        $requestUrl = \Swoft::getBean("config")->get("user.permission.url");
        $requestUrl.= "?productKey=".$productKey;
        App::profileStart('auth_request_time');
        $response   = (new \Swoft\HttpClient\Client())->get($requestUrl, [
            'headers' => [
                "Content-type"  => "application/json",
                "Accept"        => "application/json",
                "Cache-Control" => "no-cache",
                "Authorization" => 'Bearer '.$this->token
            ],
            "timeout" => 30
        ])->getResult();
        App::profileEnd('auth_request_time');
        $response = json_decode($response,true);
        return $this->userAuthorizationCode($response);
    }

    /**
     * 接口权限
     * @param $response
     * @return bool
     */
    private function userAuthorizationCode($response):bool {
        $userAuthCode = [];
        if($response["status"]){
            if ($response["code"] == "044") {
                $this->authError = Enum::SSO_ERROR_CODE;
                return false;
            }elseif($response["code"] == "036"){
                $this->authError = Enum::INVALID_TOKEN_CODE;
                return false;
            }elseif ($response["code"] != "000") {
                App::pushlog($response['code'] ?? 'auth', $response['msg'] ?? 'auth failed');
                return false;
            }
            if($this->target) return true;
            if(isset($response["data"]["permission"]) && !empty($response["data"]["permission"])){
                foreach ($response["data"]["permission"] as $item){
                    if(isset($item["child"]) && !empty($item["child"])){
                        array_walk($item["child"],function ($value) use (&$userAuthCode){
                            $userAuthCode[] = $value["key"];
                        });
                    }
                }

                return (in_array($this->auth,$userAuthCode) || (empty($this->auth) && $this->auth !== null)) ? true : false;
            }
        }
        App::pushlog($response['code'] ?? 'auth', $response['msg'] ?? 'auth failed');
        return false;
    }

    /**
     * 获取api地址及请求方式
     * @param ServerRequestInterface $request
     * @return null
     */
    private function userRequestNodeApi(ServerRequestInterface $request) {
        $this->splitNodeAndApi($domain,$node,$api,function () use($request) {
            return $request->getQueryParams()["node"] ??  "";
        });
        if($api){
            list($method,$auth) = explode("#",$api);
            list($request->domain,$request->serviceApiMethod,$request->serviceApi) = [$domain,$method,$node];
            return $auth;
        }
        return null;
    }

    /**
     * 获取node和api
     * @param $domain
     * @param $node
     * @param $api
     * @param callable $call
     */
    private function splitNodeAndApi(&$domain,&$node,&$api,callable $call){
        if(env("SERVICE_STORAGE_LOCATION") == "R"){
            list($node,$api) = explode("@",$this->redis->get($call()));
        }else{
            list($node,$api) = explode("@",ServiceTableBean::getInstance()->get($call(),"api"));
        }
        list($domain,$node) = explode("#",$node);
    }

    /**
     * @param ResponseInterface $response
     * @return ResponseInterface
     */
    private function configResponse(ResponseInterface $response){
        return $response
            ->withHeader('Access-Control-Allow-Origin', $this->origin)
            ->withHeader('Access-Control-Allow-Headers', $this->header)
            ->withHeader("Access-Control-Max-Age",600)
            ->withHeader("Access-Control-Allow-Credentials",true)
            ->withHeader("Cache-Control","no-store")
            ->withHeader('Access-Log-Id', RequestContext::getLogid())
            ->withHeader('Access-Control-Allow-Methods', 'GET,POST,OPTIONS');
    }
}
