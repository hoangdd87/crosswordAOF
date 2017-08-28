<?php
include_once __DIR__.'/../model/User_Message.php';
include_once __DIR__.'/../util/PDOHelper.php';
include_once __DIR__.'/../util/Timer.php';

$user_name = isset($_POST['user_name']) ? $_POST['user_name'] : 'user_test';
$message=isset($_POST['message']) ? $_POST['message'] : 'PING';
$time = Timer::getStringCurrentTimeWithMilisecond();
$user_message=new User_Message($user_name,$message,$time);

$pdoHelper=new PDOHelper();
echo $pdoHelper->insert_User_Message($user_message);
?>