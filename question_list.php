<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="mycss.css">
    <title>Question list</title>

</head>


<?php

//Prepare to show all quuestions
include_once __DIR__ . '/util/PDOHelper.php';
include_once __DIR__ . '/resource/Colors.php';

$pdoHelper = new PDOHelper();
$questions_list = $pdoHelper->get_All_Questions();
?>


<body>
<div class="container">
    <?php foreach ($questions_list as $question):
        $answerlettercolor = Colors::getTextAnswerColor($question->status);
        $backgroundanswercolor = Colors::getBackgroundTextAnswerColor($question->status);
        $answer_array = $question->getEveryLetterAnswer();
        ?>
        <div class="row_correct_answer">
            <div class="correct_answer">
                <? foreach ($answer_array as $character): ?>

                    <span class="lettercell" style="background-color: <? echo $backgroundanswercolor ?>;
                        color: <?= $answerlettercolor ?>"><?= $character ?></span>
                <? endforeach; ?>
            </div>
            <a class="button buttonNext" href="question.php?question_id=<?=$question->question_id?>">
                <?= $question->question_id ?>
            </a>
        </div>
    <?php endforeach; ?>

    <audio id="audio" src="sounds/nguoichoiluachoncauhoi.wav"></audio>

    <div class="divPlayButton">
        <button class="play-button" onclick="PlaySound()">
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