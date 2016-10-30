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
$answer_array = $question->getEveryLetterAnswer();
$backGroundColor = Colors::getBackgroundTextAnswerColor($question->status);
$textColor = Colors::getTextAnswerColor($question->status);
?>


<body>
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
        <span class="question_id">
             <?= $question_id ?>
        </span>

    </div>

    <div class="row_user_answer">
        <div class="user_name">
            Apple
        </div>
        <div class="user_answer_time">
            20.05
        </div>
        <div class="user_answer">
            Lê Quý Đôn
        </div>
    </div>

    <div class="row_user_answer">
        <div class="user_name">
            Google
        </div>
        <div class="user_answer_time">
            20.05
        </div>
        <div class="user_answer">
            Lê Quý Đôn
        </div>
    </div>

    <div class="row_user_answer">
        <div class="user_name">
            Microsoft
        </div>
        <div class="user_answer_time">
            20.05
        </div>
        <div class="user_answer">
            Lê Quý Đôn
        </div>
    </div>

    <div class="row_user_answer">
        <div class="user_name">
            Facebook
        </div>
        <div class="user_answer_time">
            20.05
        </div>
        <div class="user_answer">
            Lê Quý Đôn
        </div>
    </div>


    <audio id="audio" src="sounds/nguoichoiluachoncauhoi.wav"></audio>

    <button class="play-music-button" onclick="PlaySound()">
    </button>


</div>
</body>
<script>
    function PlaySound() {
        var sound = document.getElementById("audio");
        sound.play();
    }
</script>
</html>