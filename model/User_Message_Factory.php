<?php

/**
 * Created by PhpStorm.
 * User: HoangDD
 * Date: 10/18/16
 * Time: 9:41 PM
 */
class User_Message_Factory
{
    /**
     * @return User_Message
     */
    public static function create($user_name, $message, $time, $isdelivery){
        include_once __DIR__.'/User_Message.php';
        $user_message=new User_Message();
        $user_message->user_name = $user_name;
        $user_message->message   = $message;
        $user_message->time      = $time;
        $user_message->isdelivery=$isdelivery;
        return $user_message;
    }

}