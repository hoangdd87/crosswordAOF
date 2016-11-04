<!DOCTYPE html>
<html lang="en">
<head>
    <script src="jquery-3.1.1.min.js"></script>
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
<audio id="batdautongketcongtraloi" src="sounds/batdautongketcongtraloi.wav" autoplay></audio>
<audio id="traloidung" src="sounds/traloidung.wav"></audio>
<audio id="traloisai" src="sounds/traloisai.mp3"></audio>
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
        <a href="question_list.php" class="question_id">
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
        <button class="buttonYes" onclick="buttonYesClick()">
            Đ
        </button>
        <button class="buttonNo" onclick="buttonNoClick()">
            S
        </button>
    </div>

</div>
<script>
    var _question_id=<?=$question_id?>;
    var _status_opened=<?=Question::$OPENEDANSWER?>;
    var _status_disable=<?=Question::$DISABLEANSWER?>;
</script>

</body>
<script>

    function buttonYesClick() {
        var soundYes = document.getElementById("traloidung");
        soundYes.play();
        post(_status_opened);
        /*Update status to the question*/

    }
    function buttonNoClick() {
        var soundNo = document.getElementById("traloisai");
        soundNo.play();
        post(_status_disable);
    }

    function post(q_status) {
        $.post("http://localhost/crosswordaof/apis/update_question_status.php",
            {
                question_id: _question_id,
                status: q_status
            },
            function (data, status) {
                if(q_status==_status_opened){

                }

            });
    }

</script>
</html>

