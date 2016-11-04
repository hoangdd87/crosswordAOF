<?php
include_once __DIR__.'/../model/Question.php';
include_once __DIR__.'/../util/PDOHelper.php';

$question_id = isset($_POST['question_id']) ? $_POST['question_id'] : 0;
$status=isset($_POST['status']) ? $_POST['status'] : Question::$CLOSEANSWER;


$pdoHelper=new PDOHelper();
echo $pdoHelper->update_Question_Status($question_id,$status);
?>