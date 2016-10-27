<?php

/**
 * Created by PhpStorm.
 * User: HoangDD
 * Date: 10/26/16
 * Time: 10:57 AM
 */
class Timer
{
    /**
     * @return string
     */
    public static function getStringCurrentTimeWithMilisecond()
    {
        $timezone=new DateTimeZone('Asia/Bangkok');
        $now = DateTime::createFromFormat('U.u', microtime(true), $timezone);
        $now->setTimezone($timezone);
        return $now->format("Y-m-d H:i:s.u");

    }
    /**
     * @return string
     */
    public static function convertMilionSecondaToString($floatTime){
        $timezone=new DateTimeZone('Asia/Bangkok');
        $now = DateTime::createFromFormat('U.u', $floatTime, $timezone);
        $now->setTimezone($timezone);
        return $now->format("Y-m-d H:i:s.u");
    }





    /**
     * @return float
     */

    public static function convertStringToMilisecondTime($stringTime){
        $timezone=new DateTimeZone('Asia/Bangkok');
        $datetime = DateTime::createFromFormat('Y-m-d H:i:s.u', $stringTime, $timezone);
        $datetime->setTimezone($timezone);
        $result=(float)($datetime->getTimestamp()+$datetime->format('.u'));
        return $result;
    }

    /**
     * @return float
     */

    public static function getDiff($stringsmallertime, $stringbiggertime){
        $time1=self::convertStringToMilisecondTime($stringsmallertime);
        $time2=self::convertStringToMilisecondTime($stringbiggertime);
        return round($time2-$time1,2);
    }
}