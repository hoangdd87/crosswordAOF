<?php
include_once __DIR__.'/../model/User_Message.php';
include_once __DIR__.'/../model/User_Message_Factory.php';
include_once __DIR__.'/../util/PDOHelper.php';
include_once __DIR__.'/../util/Timer.php';
include_once __DIR__.'/../resource/HTTP_RESPONSE_CODE.php';

$user_name = isset($_POST['user_name']) ? $_POST['user_name'] : 'user_test';
$message=isset($_POST['message']) ? $_POST['message'] : 'PING';
$time = Timer::getStringCurrentTimeWithMilisecond();
$user_message= User_Message_Factory::create($user_name,$message,$time,0);

$pdoHelper=new PDOHelper();
$success = $pdoHelper->insert_User_Message($user_message);
if($success){
    http_response_code(HTTP_RESPONSE_CODE::$CREATED);
}
echo $success;
?>