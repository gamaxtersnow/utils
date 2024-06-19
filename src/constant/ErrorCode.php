<?php

namespace Utils\constant;

/**
 * 系统相关的 自定义错误码常量:
 * 大部分第三方软件异常返回的错误码在3-4位数,为了与此区分,设置项目自定义错误码常量为6位数
 */
class ErrorCode
{
    const int JWT_DECODE_SUCCESS = 500100;
    const int JWT_EXPIRED = 500101;
    const  int JWT_DECODE_EXCEPTION = 500102;

    public static array $message = [

        self::JWT_DECODE_SUCCESS => '签名解析成功',
        self::JWT_EXPIRED => '签名已过期',
        self::JWT_DECODE_EXCEPTION => '签名解析异常',
    ];

    public static function getCodeMessage(int $code):string  {
        return self::$message[$code];
    }
}