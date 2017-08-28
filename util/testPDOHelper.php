<?php
/**
 * Created by PhpStorm.
 * User: HoangDD
 * Date: 10/15/16
 * Time: 10:23 PM
 */
include_once __DIR__ . '/PDOHelper.php';
include_once __DIR__.'/Timer.php';
include_once __DIR__.'/../model/User.php';
include_once __DIR__.'/../model/User_Answer.php';
include_once __DIR__.'/../model/Question.php';
include_once __DIR__.'/../model/User_Message.php';
include_once __DIR__.'/../util/Timer.php';


$time_begin_str = Timer::getStringCurrentTimeWithMilisecond();

$pdohelper = new PDOHelper();
$user_message=new User_Message();
$user_message->user_name='hoang';
$user_message->time=$time_begin_str;
$user_message->message="PING";
print_r($pdohelper->insert_User_Message($user_message));

//print_r($time1->getTimestamp()+$time1->format('.u'));

?>