<?php

namespace Utils;

use Utils\constant\ErrorCode;
use Exception;
use Firebase\JWT\ExpiredException;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JwtUtil
{
    public function getJwtConfig():array{
        $appName = app('http')->getName();
        $agents = config('jwt.agents');
        $key = $agents[$appName]['key']??'';
        $expire = $agents[$appName]['expire_time']??0;
        return ['key'=>$key,'expire_time'=>$expire];
    }

    public function encodeJwt(array $payload):string {
        $jwtConfig = $this->getJwtConfig();;
        $now = time();
        return JWT::encode($payload + ['iat'=>$now,'exp'=>$now+$jwtConfig['expire_time']],$jwtConfig['key'],'HS256');
    }

    public function decodeJwt(string $jwt):array {
        $jwtConfig = $this->getJwtConfig();
        try {
            $payload = JWT::decode($jwt, new Key($jwtConfig['key'], 'HS256'));
            return ['code'=>ErrorCode::JWT_DECODE_SUCCESS, 'message'=>ErrorCode::getCodeMessage(ErrorCode::JWT_DECODE_SUCCESS),'payload'=>$payload];
        }catch (ExpiredException $e) {
            return ['code'=>ErrorCode::JWT_EXPIRED,'message'=>ErrorCode::getCodeMessage(ErrorCode::JWT_EXPIRED),'payload'=>null];
        }catch (Exception $e){
            return ['code'=>ErrorCode::JWT_DECODE_EXCEPTION,'message'=>ErrorCode::getCodeMessage(ErrorCode::JWT_DECODE_EXCEPTION),'payload'=>null];
        }
    }
}