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


$pdohelper = new PDOHelper();
$user_messages= $pdohelper->get_User_Message_Not_Seen();
echo "data: ".json_encode($user_messages,JSON_UNESCAPED_UNICODE );

//print_r($time1->getTimestamp()+$time1->format('.u'));

?>