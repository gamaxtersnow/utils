<?php

namespace Utils\facade;


use think\Facade;

/**
 * @see FileUtil
 * @package app\facade
 * @mixin FileUtil
 * @method static getFileExt(string $filename): array|string
 * @method static getQwMediaIdsByJson(string $json): array
 */
class FileUtil extends Facade {
    protected static function getFacadeClass(): string
    {
        return \Utils\FileUtil::class;
    }
}


