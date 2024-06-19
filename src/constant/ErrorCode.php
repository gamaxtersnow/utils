<?php

namespace Utils\constant;

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
