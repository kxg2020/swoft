<?php
namespace App\Controllers\Service;

use App\Lib\UserInterface;
use Swoft\Http\Message\Server\Request;
use Swoft\Http\Server\Bean\Annotation\Controller;
use Swoft\Http\Server\Bean\Annotation\RequestMapping;
use Swoft\Rpc\Client\Bean\Annotation\Reference;
use Swoft\Http\Server\Bean\Annotation\RequestMethod;
/**
 * Class ServiceController
 * @package App\Controllers\Service
 * @Controller("")
 */
class UserController extends BaseController{
    /**
     * @Reference(name="user", version="1.0", fallback="UserFallback")
     * @var UserInterface
     */
    private $userService;


    /**
     * 节点转发
     * @param Request $request
     * @RequestMapping("test",method={RequestMethod::GET})
     * @return array
     */
    public function test(){
        return $this->userService->getUser(888);
    }

}