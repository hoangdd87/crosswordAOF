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

print_r($pdohelper->reset_Question_Status());

//print_r($time1->getTimestamp()+$time1->format('.u'));

?>