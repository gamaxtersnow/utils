<?php

namespace Utils\facade;


use think\Facade;

/**
 * @see TimeUtil
 * @package app\facade
 * @mixin TimeUtil
 * @method static dateToTimestamp(string $date):int
 * @method static timeStampToDate(int $timestamp):string
 * @method static currentDate(): string
 * @method static getCurrentTimeYear(): string
 * @method static getCurrentTimeMonth(): string
 * @method static getCurrentTimeDay(): string
 * @method static getCurrentTimeHour(): string
 * @method static getCurrentTimeMinute(): string
 * @method static getCurrentTimeSecond(): string
 * @method static getCurrentDate(): string
 * @method static getCurrentTime():string
 * @method static getCurrentTimestamp():int
 * @method static formatDate(string $format, string|int|null $time = null): string
 * @method static addDays(int|string $date, int $days, string $format = 'Y-m-d'): ?string
 * @method static getCurrentDay(): int
 * @method static getYear(int $timestamp):string
 * @method static getMonth(int $timestamp):string
 * @method static getDay(int $timestamp):string
 * @method static getHour(int $timestamp):string
 * @method static getMinute(int $timestamp):string
 * @method static getSecond(int $timestamp):string
 * @method static getDate(int $timestamp):string
 * @method static getTime(int $timestamp):string
 * @method static getTimestamp(string $date):int
 * @method static compareTimestampWithCurrent($timestamp): int
 */
class TimeUtil extends Facade {
    protected static function getFacadeClass(): string
    {
        return \Utils\TimeUtil::class;
    }
}

