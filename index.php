<?php
/**
 * Created by PhpStorm.
 * User: HoangDD
 * Date: 10/16/16
 * Time: 12:21 PM
 */

//Check if the user logon already
include_once __DIR__ . '/resource/SESSTION.php';
$mysession = new SESSTION();
if ($mysession->is_User_logon_empty()) {
    header('location: login.php');
    exit;
}

$user=$mysession->get_User_Logon();
if($user->role=="admin"){
    header('location: admin.php');
    exit;
}
else{
    header('location: user.php');
    exit;
}
?>





