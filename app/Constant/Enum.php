<?php
namespace App\Constant;

/**
 * 说明：成功码000，操作验证相关4000-4999，路由相关6000-6999，异常相关7000-7999，权限相关8000-8999
 * Class Enum
 * @package App\Constant
 */
class Enum{
    /***************************配置常量*****************************/
    # api接口代码长度
    const CODE_LENGTH = 7;
    # swoole_table size
    const SWOOLE_TABLE_SIZE = 1024;
    /***************************配置常量*****************************/


    /***************************权限错误码*****************************/
    # 单点登录异常
    const SSO_ERROR_CODE = 8000;
    const INVALID_TOKEN_CODE = 8001;
    /***************************权限错误码*****************************/


    /***************************异常错误码*****************************/
    # 异常抛出
    const THROW_EXCEPTION_CODE = 7000;
    /***************************异常错误码*****************************/


    /***************************路由错误码*****************************/
    # 路由不存在
    const ROUTE_NOT_FOUND_CODE = 6000;
    /***************************路由错误码*****************************/

    #参数过滤项
    const FILTER = ['\'', '"', '|', '$', '#'];

    # 请求成功状态码及信息
    const REQUEST_SUCCESS = [
        "000" => "请求成功",
    ];


    /***************************错误码对应msg*****************************/
    # 请求失败状态码及信息
    const REQUEST_FAIL = [
        "4000" => "node参数错误",
        "4001" => "无效节点",
        "4003" => "上传文件失败",
        "4500" => "数据为空"
    ];
    /***************************错误码对应msg*****************************/


    /***************************常用错误返回*****************************/
    # 权限验证失败
    const PERMISSION_AUTH_FAIL = [
        "code"   => "8002",
        "msg"    => "permission denied",
        "data"   => [],
        "status" => false
    ];
    # 单点登录
    const SSO_ERROR = [
        "code"   => "8000",
        "msg"    => "账号已在别处登录",
        "data"   => [],
        "status" => false
    ];
    # 异常抛出
    const THROW_EXCEPTION = [
        "code"   => "7000",
        "msg"    => "inner error",
        "data"   => [],
        "status" => false
    ];
    # 路由不存在
    const ROUTE_NOT_FOUND = [
        "code"   => "6000",
        "msg"    => "route not found",
        "data"   => [],
        "status" => false
    ];
    #签名错误
    const SIGN_ERROR = [
        "code"   => "7002",
        "msg"    => "invalid signature",
        "data"   => [],
        "status" => false
    ];
    #请求头部
    const TOKEN_NOT_EXIST = [
        "code"   => "7004",
        "msg"    => "token not exist",
        "data"   => [],
        "status" => false
    ];
    # Token错误
    const INVALID_TOKEN  = [
        "code"   => "8001",
        "msg"    => "invalid token",
        "data"   => [],
        "status" => false
    ];
    /***************************常用错误返回*****************************/
}
