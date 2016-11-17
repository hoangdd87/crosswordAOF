<?php
include_once __DIR__ . '/../util/PDOHelper.php';
$pdoHelper = new PDOHelper();
$result=$pdoHelper->clear_user_answer();
http_response_code(200);
?>