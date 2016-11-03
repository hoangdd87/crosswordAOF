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
$question=$pdohelper->get_Question(2);
$final_user_answer=$pdohelper->get_Users_Final_Answers($question);

print_r($final_user_answer);
//print_r($time1->getTimestamp()+$time1->format('.u'));

?>