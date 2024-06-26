<?php
namespace Utils;
class FileUtil{
    public function getFileExt(string $filename): array|string
    {
        return pathinfo($filename, PATHINFO_EXTENSION);
    }
    public function getQwMediaIdsByJson(string $json): array {
        $arr = json_decode($json,true);
        if(json_last_error() != JSON_ERROR_NONE){
            return [];
        }
        if(empty($arr)) {
            return [];
        }
        return $this->_getQwMediaIds($arr);
    }
    private function _getQwMediaIds(array $arr): array {
        $res = [];
        foreach ($arr as $value) {
            if (is_array($value)) {
                $res += $this->_getQwMediaIds($value);
            }
            if (str_starts_with($value, 'WWME_')) {
                $res[] = $value;
            }
        }
        return $res;
    }
}