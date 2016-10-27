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


$question_id = isset($_GET['question_id']) ? $_GET['question_id'] : 3;
$pdoHelper = new PDOHelper();
$question = $pdoHelper->get_Question($question_id);
$answer_array = $question->getEveryLetterAnswer();
$backGroundColor = Colors::getBackgroundTextAnswerColor($question->status);
$textColor = Colors::getTextAnswerColor($question->status);
?>


<body>
<div class="container">
    <div class="row_correct_answer">
        <div class="correct_answer">
            <? foreach ($answer_array as $letter): ?>
                <span class="lettercell"
                      style="background-color: <?= $backGroundColor ?>;color: <?= $textColor ?>;"></span>
            <? endforeach; ?>
        </div>
        <span class="buttonShowQuestion">
             <?= $question_id ?>
        </span>
    </div>

    <div class="question_area">
        <div id="question_text_area_id" class="question_text_area" style="color: transparent">
            <?=$question->question?>
        </div>
        <div id='question_countdown_clock_area' class="question_countdown_clock_area">
            <?php echo $question->answer_time?>
        </div>

    </div>


    <audio  id="audio" src="sounds/30s.mp4"></audio>

    <div class="divPlayButton">
        <button id="button30s" class="play-button" onclick="Play30sButton()">
        </button>
    </div>


</div>

<script>
    var t=<?php echo $question->answer_time?>;//Time for this question
    var sound = document.getElementById("audio");
</script>

</body>
<script>

    var _question_Text_Color='white'

    function Play30sButton() {
        //Change color of text area
        document.getElementById("question_text_area_id").style.color = _question_Text_Color;

        //hide button 30s
        document.getElementById("button30s").style.display = 'none';
        //Play music sound
        sound.play();

        function updateClock() {
            t=t-1;

            if(sound.currentTime>=30){
                sound.pause()
                sound.currentTime = 0
                sound.play()
            }

            document.getElementById("question_countdown_clock_area").innerHTML = t;


            if (t<=0) {
                clearInterval(timeinterval);
            }
        }

        var timeinterval = setInterval(updateClock, 1000);
    }

</script>
</html>