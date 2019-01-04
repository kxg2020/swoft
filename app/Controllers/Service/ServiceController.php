<?php
namespace App\Controllers\Service;
use App\Constant\Enum;
use Swoft\App;
use Swoft\Core\RequestContext;
use Swoft\Http\Server\Bean\Annotation\Controller;
use Swoft\Http\Server\Bean\Annotation\RequestMapping;
use Swoft\Http\Message\Server\Request;
use Swoft\Http\Server\Bean\Annotation\RequestMethod;

/**
 * Class ServiceController
 * @package App\Controllers\Service
 * @Controller("/service")
 */
class ServiceController extends BaseController {
    private $code;
    private $params;
    private $token;

    /**
     * 节点转发
     * @param Request $request
     * @RequestMapping("dispatch",method={RequestMethod::POST})
     * @return string json
     */
    public function dispatch(Request $request){
        if($this->initialize($request)){
            if (empty($request->serviceApi) || empty($request->serviceApiMethod)) {
                 return response()->json($this->printFail("4001"));
            }
            $result = json_decode($this->request($request), true);
            if (empty($result) || !is_array($result)) {
                return response()->json($this->printFail("4500"));
            }
            return response()->json($result);
        }
        return response()->json($this->printFail("4000"));
    }

    /**
     * @param Request $request
     * @return bool
     */
    public function initialize(Request $request):bool {
        $this->code   = $request->query("node","");
        $this->params = $request->json() ?: $request->post();
        App::pushlog('params', $this->params);
        $this->params = !is_array($this->params) ? [] : $this->params;
        $this->params = $this->filter($this->params);
        App::pushlog('filtered_params', $this->params);
        if($this->code && is_numeric($this->code) && strlen($this->code) == Enum::CODE_LENGTH){
            $this->token = $request->getHeaderLine('token');
            return true;
        }
        return false;
    }

    /**
     * @param Request $request
     * @return string
     */
    private function request(Request $request){
        $option = [
            "timeout" => 120,
            "headers" => [
                "token" => $this->token,
                "Access-Log-Id" => RequestContext::getLogid()
            ]
        ];
        $uri = $request->serviceApi;
        if ($request->serviceApiMethod == 'GET') {
            $option['base_uri'] = $request->domain;
            $uri .= '?' . http_build_query($this->params);
        } else {
            $option['base_uri'] = $request->domain;
            $option['json']     = $this->params;
        }
        App::profileStart('client_request_time');
        $result = (new \Swoft\HttpClient\Client())
            ->request($request->serviceApiMethod, $uri, $option)
            ->getResult();
        App::profileEnd('client_request_time');
        App::info($result);
        return $result;
    }

}
