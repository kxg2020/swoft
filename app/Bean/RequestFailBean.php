<?php
namespace App\Bean;

use App\Constant\Enum;

/**
 * Class RequestFailBean
 * @package App\Bean
 * @\Swoft\Bean\Annotation\Bean("RequestFail")
 */
class RequestFailBean{
    public function permissionAuthFail():array {
        return Enum::PERMISSION_AUTH_FAIL;
    }

    public function innerError():array {
        return Enum::THROW_EXCEPTION;
    }

    public function routeNotFound(){
        return Enum::ROUTE_NOT_FOUND;
    }

    public function ssoError()
    {
        return Enum::SSO_ERROR;
    }
}
