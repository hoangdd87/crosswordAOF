<?php
include_once __DIR__.'/../model/User_Message.php';
include_once __DIR__.'/../model/User_Message_Factory.php';
include_once __DIR__.'/../util/PDOHelper.php';
include_once __DIR__.'/../util/Timer.php';
include_once __DIR__.'/../resource/HTTP_RESPONSE_CODE.php';

$user_name = isset($_POST['user_name']) ? $_POST['user_name'] : 'user_test';
$pdoHelper=new PDOHelper();
$success = $pdoHelper->update_user_message($user_name,1);
if($success){
    http_response_code(HTTP_RESPONSE_CODE::$CREATED);
}
echo $success;
?>