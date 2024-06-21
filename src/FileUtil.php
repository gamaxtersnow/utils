<?php
namespace Utils;
class FileUtil{
    public function getFileExt(string $filename): array|string
    {
        return pathinfo($filename, PATHINFO_EXTENSION);
    }
}