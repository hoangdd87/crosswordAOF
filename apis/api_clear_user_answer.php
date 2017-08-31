
<?php
include_once __DIR__ . '/../util/PDOHelper.php';
$pdoHelper = new PDOHelper();
$result1=$pdoHelper->clear_user_answer();
$result2=$pdoHelper->clear_user_message();
if($result1 && $result2) http_response_code(200);
?>