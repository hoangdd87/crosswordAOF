<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="mycss.css">
    <title>Question & Answer</title>
</head>


<?php

//Prepare to show all quuestions
include_once __DIR__ . '/util/PDOHelper.php';
include_once __DIR__ . '/resource/Colors.php';
include_once __DIR__ . '/model/User_Final_Answer.php';
$pdoHelper = new PDOHelper();


function getBackgroundTextAnswerColor($code)
{
    if ($code == Question::$CLOSEANSWER) return Colors::$AVAILABLEBACKGROUND;
    else if ($code == Question::$DISABLEANSWER) return Colors::$DISABLEBACKGROUND;
    else if ($code == Question::$OPENEDANSWER) return Colors::$OPENEDBACKGROUND;
}

function getTextAnswerColor($code)
{
    if ($code == Question::$CLOSEANSWER) return Colors::$TRANSPARENTCOLOR;
    else if ($code == Question::$DISABLEANSWER) return Colors::$TRANSPARENTCOLOR;
    else if ($code == Question::$OPENEDANSWER) return Colors::$TEXTANSWERCOLOR;
}

$question_id = isset($_GET['question_id']) ? $_GET['question_id'] : 1;
$pdoHelper = new PDOHelper();
$question = $pdoHelper->get_Question($question_id);
//Get every letter of correct answer
$answer_array = $question->getEveryLetterAnswer();
$backGroundColor = Colors::getBackgroundTextAnswerColor($question->status);
$textColor = Colors::getTextAnswerColor($question->status);

$users_final_answers = $pdoHelper->get_Users_Final_Answers($question);

?>


<body>
<audio id="audio1" src="sounds/batdautongketcongtraloi.wav" autoplay></audio>
<div class="container">
    <div class="row_correct_answer">

        <a href="question_list.php" class="homebuttoncontainer">
            <img alt="Home" src="images/Home-icon.png" class="image">
        </a>
        <div class="correct_answer">

            <? foreach ($answer_array as $letter): ?>
                <span class="lettercell"
                      style="background-color: <?= $backGroundColor ?>;color: <?= $textColor ?>;"></span>
            <? endforeach; ?>
        </div>
        <a  href="question_list.php" class="question_id">
             <?= $question_id ?>
        </a>

    </div>

    <? foreach ($users_final_answers as $user_final_answer): ?>
        <div class="row_user_answer">
            <div class="user_name">
                <?= $user_final_answer->user_name ?>
            </div>
            <div class="user_answer_time">
                <?= $user_final_answer->get_User_Final_Time_Diff($question) ?>
            </div>
            <div class="user_answer">
                <?= $user_final_answer->last_answer ?>
            </div>
        </div>
    <? endforeach; ?>


    <div class="row_user_answer" style="vertical-align: middle">
        <button class="buttonYes">
            Đ
        </button>
        <button class="buttonNo">
            S
        </button>
    </div>

</div>
</body>
<script>
    function PlaySound() {
        var sound = document.getElementById("audio");
        sound.play();
    }
</script>
</html>

