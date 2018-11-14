<?php
include_once __DIR__ . '/../util/PDOHelper.php';
header('Content-Type: application/json');
$pdoHelper = new PDOHelper();
$question_id = isset($_POST['question_id']) ? $_POST['question_id'] : 0;
$question = $pdoHelper->get_Question($question_id);
$data = $pdoHelper ->get_Users_Final_Answers($question);

echo json_encode($data, JSON_UNESCAPED_UNICODE);
?>