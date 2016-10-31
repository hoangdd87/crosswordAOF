<?php
include_once __DIR__ . '/../util/PDOHelper.php';
$pdoHelper = new PDOHelper();
$result=$pdoHelper->reset_Question_Status();
http_response_code(200);
?>