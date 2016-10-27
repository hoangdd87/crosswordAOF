<?php
include_once __DIR__.'/../util/Timer.php';
$question_id = isset($_POST['question_id']) ? $_POST['question_id'] : 0;
$answer_time=isset($_POST['answer_time']) ? $_POST['answer_time'] : 30;

$time_begin_str = Timer::getStringCurrentTimeWithMilisecond();
$time_begin_float=Timer::convertStringToMilisecondTime($time_begin_str);

$time_end_float=$time_begin_float+$answer_time;
$time_end_str=Timer::convertMilionSecondaToString($time_end_float);
include_once __DIR__.'/../util/PDOHelper.php';
$pdoHelper=new PDOHelper();
echo $pdoHelper->update_Question_timebegin_end($time_begin_str, $time_end_str, $question_id);
?>