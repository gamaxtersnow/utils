<?php
namespace Utils;
class TimeUtil {
    public function dateToTimestamp(string $date):int {
        return strtotime($date);
    }

    public function timeStampToDate(int $timestamp):string {
        return date('Y-m-d H:i:s', $timestamp);
    }

    public function currentDate(): string
    {
        return date('Y-m-d H:i:s', time());
    }

    public function getCurrentTimeYear(): string
    {
        return date('Y', time());
    }

    public function getCurrentTimeMonth(): string{
        return date('m', time());
    }

    public function getCurrentTimeDay(): string{
        return date('d', time());
    }

    public function getCurrentTimeHour(): string{
        return date('H', time());
    }

    public function getCurrentTimeMinute(): string{
        return date('i', time());
    }

    public function getCurrentTimeSecond(): string{
        return date('s', time());
    }

    public function getCurrentDate(): string{
        return date('Y-m-d', time());
    }

    public function getCurrentTime():string {
        return date('H:i:s', time());
    }

    public function getCurrentTimestamp():int {
        return time();
    }

    public function formatDate(string $format, string|int|null $time = null): string
    {
        if ($time === null) {
            $time = time();
        } elseif (is_string($time)) {
            $time = strtotime($time);
        }

        return date($format, $time);
    }

    /**
     * 在指定日期上增加或减少天数
     *
     * @param int|string $date 时间字符串或时间戳
     * @param int $days 要增加或减少的天数，正数为增加，负数为减少
     * @param string $format 返回的日期格式，默认为 'Y-m-d'
     * @return string|null 增加或减少天数后的日期字符串，如果输入不合法则返回 null
     */
    public function addDays(int|string $date, int $days, string $format = 'Y-m-d'): ?string
    {
        if (is_numeric($date)) {
            $timestamp = $date;
        } else {
            $timestamp = strtotime($date);
            if ($timestamp === false) {
                return null;
            }
        }

        $newTimestamp = strtotime("+$days days", $timestamp);
        if ($newTimestamp === false) {
            return null;
        }

        return date($format, $newTimestamp);
    }

    /**
     * 获取当前日期
     *
     * @return int 当前日期
     */
    public static function getCurrentDay(): int
    {
        return date('j');
    }
    public function getYear(int $timestamp): string
    {
        return date('Y',$timestamp);
    }

    public function getMonth(int $timestamp): string{
        return date('m',$timestamp);
    }

    public function getDay(int $timestamp): string{
        return date('d',$timestamp);
    }

    public function getHour(int $timestamp): string{
        return date('H',$timestamp);
    }

    public function getMinute(int $timestamp): string{
        return date('i',$timestamp);
    }

    public function getSecond(int $timestamp): string{
        return date('s',$timestamp);
    }

    public function getDate(int $timestamp): string{
        return date('Y-m-d',$timestamp);
    }

    public function getTime(int $timestamp):string {
        return date('H:i:s',$timestamp);
    }

    public function getTimestamp(string $date):int {
        return strtotime($date);
    }
}