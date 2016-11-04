<?php
/**
 * Created by PhpStorm.
 * User: HoangDD
 * Date: 10/15/16
 * Time: 10:23 PM
 */
include_once __DIR__ . '/PDOHelper.php';
include_once __DIR__.'/Timer.php';
include_once __DIR__.'/../model/User.php';
include_once __DIR__.'/../model/User_Answer.php';
include_once __DIR__.'/../model/Question.php';


$pdohelper = new PDOHelper();
print_r($pdohelper->update_Question_Status(3,0));

//print_r($time1->getTimestamp()+$time1->format('.u'));

?>