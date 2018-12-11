<?php
namespace App\Controllers\Service;
use App\Constant\Enum;
use Swoft\App;
use Swoft\Db\Query;
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
            if (isset($result['status']) && $result['status'] == false) {
                App::info(json_encode($result) ?? null);
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
        if($this->code && is_numeric($this->code) && strlen($this->code) == Enum::CODE_LENGTH){
            $this->params['token'] = $request->getHeaderLine('token');
            return true;
        }
        return false;
    }

    /**
     * @param Request $request
     * @return string
     */
    private function request(Request $request){
        $option = ["timeout"=>120];
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
        return $result;
    }
}
