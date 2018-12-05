<?php
namespace App\Controllers\Service;

use App\Constant\Enum;

class BaseController{
    protected $success = Enum::REQUEST_SUCCESS;
    protected $fail    = Enum::REQUEST_FAIL;
    protected $response= [];

    protected function printSuccess($code = "000",$data = [],$msg = ""){
        $this->response = [
            "code"   => (string)$code,
            "msg"    => $msg ? $msg : ($this->success[$code] ?? ""),
            "status" => true,
            "data"   => $data
        ];
        return $this->response;
    }

    protected function printFail($code,$data = [],$msg = ""){
        $this->response = [
            "code"   => (string)$code,
            "msg"    => $msg ? $msg : ($this->fail[$code] ?? ""),
            "status" => false,
            "data"   => $data
        ];
        return $this->response;
    }
}
