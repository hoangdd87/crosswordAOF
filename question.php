<?php

//Prepare to show all quuestions
include_once __DIR__ . '/util/PDOHelper.php';
include_once __DIR__ . '/resource/Colors.php';


$question_id = isset($_GET['question_id']) ? $_GET['question_id'] : 3;
$pdoHelper = new PDOHelper();
$question = $pdoHelper->get_Question($question_id);
$answer_array = $question->getEveryLetterAnswer();
$backGroundColor = Colors::getBackgroundTextAnswerColor($question->status);
$textColor = Colors::getTextAnswerColor($question->status);
?>
<!DOCTYPE html>


<html lang="en">
<head>
    <script src="jquery-3.1.1.min.js"></script>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="mycss.css">
    <title>Question <?= $question_id ?></title>
</head>

<body>

<div class="container">
    <audio id="audio1" src="sounds/batdauhienthicauhoi.mp4" autoplay></audio>


    <div class="row_correct_answer">
        <a href="question_list.php" class="homebuttoncontainer">
            <img alt="Home" src="images/Home-icon.png" class="image">
        </a>

        <div class="correct_answer">
            <? foreach ($answer_array as $letter): ?>
                <span class="lettercell"
                      style="background-color: <?= $backGroundColor ?>;color: <?= $textColor ?>;"><?= $letter ?></span>
            <? endforeach; ?>
        </div>
        <a class="question_id" href="users_final_answers.php?question_id=<?= $question_id ?>">
            <?= $question_id ?>
        </a>
    </div>
    <div class="question_area">
        <div id="question_text_area_id" class="question_text_area" style="color: transparent">
            <?= $question->question ?>
        </div>
        <div id='question_countdown_clock_area' class="question_countdown_clock_area">
            <?php echo $question->answer_time ?>
        </div>

    </div>
    <button id="button30s" class="play-music-button" onclick="Play30sButton()">
    </button>

    <audio id="audio" src="sounds/30s.mp4"></audio>
</div>

<script>
    var t =<?php echo $question->answer_time?>;//Time for this question
    var sound = document.getElementById("audio");
</script>

</body>
<script>

    var _question_Text_Color = 'white';
    var _question_id =<?php echo $question_id?>;
    var _answer_time =<?php echo $question->answer_time?>;

    function post() {
        $.post("http://localhost/crosswordaof/apis/update_question_time.php",
            {
                question_id: _question_id,
                answer_time: _answer_time
            },
            function (data, status) {
                //Change color of text area
                document.getElementById("question_text_area_id").style.color = _question_Text_Color;

                //hide button 30s
                document.getElementById("button30s").style.display = 'none';
                //Play music sound
                sound.play();

                function updateClock() {
                    t = t - 1;


                    if (sound.currentTime >= 31) {
                        sound.pause()
                        sound.currentTime = 0
                        sound.play()
                    }

                    document.getElementById("question_countdown_clock_area").innerHTML = t;


                    if (t <= 0) {
                        clearInterval(timeinterval);
                    }
                }

                var timeinterval = setInterval(updateClock, 1000);

            });
    }

    function Play30sButton() {
        //post start time to server
        post();


    }



</script>
</html>