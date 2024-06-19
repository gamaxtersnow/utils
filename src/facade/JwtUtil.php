<?php

namespace Utils\facade;


use think\Facade;

/**
 * @see JwtUtil
 * @package app\facade
 * @mixin JwtUtil
 * @method static getJwtConfig():array
 * @method static encodeJwt(array $payload):string
 * @method static decodeJwt(string $jwt):array
 */
class JwtUtil extends Facade {
    protected static function getFacadeClass(): string
    {
        return \Meishiedu\Utils\JwtUtil::class;
    }
}

