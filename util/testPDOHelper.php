<?php
/**
 * Created by PhpStorm.
 * User: HoangDD
 * Date: 10/15/16
 * Time: 10:23 PM
 */
include_once __DIR__ . '/PDOHelper.php';
include_once __DIR__.'/Timer.php';
$pdohelper = new PDOHelper();

$questions=$pdohelper->get_Question(2);
print_r($questions);

print_r($pdohelper->update_Question_timebegin_end('1111-11-11 00:00:00.000000','2016-11-11 11:00:00.000000',2));



//print_r($time1->getTimestamp()+$time1->format('.u'));

?>