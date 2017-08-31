<?php
header("Content-Type: text/event-stream\n\n");
include_once __DIR__.'/util/PDOHelper.php';

$pdoHelper=new PDOHelper();
$user_messages=$pdoHelper->get_User_Message_Not_Seen();

while (1) {
// 1 is always true, so repeat the while loop forever
    echo "event: ping\n";

    $curDate = date(DATE_ISO8601);
    echo "data: ".json_encode($user_messages,JSON_UNESCAPED_UNICODE );;
    echo "\n\n";
    // Send a simple message at random intervals.
    ob_end_flush();
    flush();
    // sleep for 1 second before running the loop again
    sleep(1);
}
?>