<?php
include_once __DIR__ . '/resource/SESSTION.php';
$session = new SESSTION();
$session->unset_User_logon();
header("location: login.php");
exit;
?>



