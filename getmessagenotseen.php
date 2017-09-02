<?php
header("Content-Type: text/event-stream\n\n");
include_once __DIR__ . '/util/PDOHelper.php';

$pdoHelper = new PDOHelper();


while (1) {
    $user_messages = $pdoHelper->get_User_Message_Not_Seen();
    if (!empty($user_messages)) {


// 1 is always true, so repeat the while loop forever
        echo "event: ping\n";

        $curDate = date(DATE_ISO8601);
        echo "data: " . json_encode($user_messages, JSON_UNESCAPED_UNICODE);;
        echo "\n\n";
        // Send a simple message at random intervals.
        ob_end_flush();
        flush();

        /*foreach ($user_messages as $user_message) {
            $pdoHelper->update_user_message($user_message['user_name']);
        }*/
    }
    // sleep for 1 second before running the loop again
    sleep(1);
}
?>