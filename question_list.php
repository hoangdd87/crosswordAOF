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
<div class="container" id="container">
    <a href="hinhanh.php" class="hinhanh_link">
        A
    </a>
    <?php foreach ($questions_list as $question):
        $answerlettercolor = Colors::getTextAnswerColor($question->status);
        $backgroundanswercolor = Colors::getBackgroundTextAnswerColor($question->status);
        $answer_array = $question->getEveryLetterAnswer();
        ?>
        <div class="row_correct_answer">
            <div class="correct_answer">
                <?php foreach ($answer_array as $character): ?>

                    <span class="lettercell" style="background-color: <?php echo $backgroundanswercolor ?>;
                        color: <?= $answerlettercolor ?>"><?= $character ?></span>
                <?php endforeach; ?>
            </div>
            <a class="question_id" href="question.php?question_id=<?= $question->question_id ?>">
                <?= $question->question_id ?>
            </a>
        </div>
    <?php endforeach; ?>

    <audio id="audio" src="sounds/nguoichoiluachoncauhoi.wav"></audio>
    <audio id="bell" src="sounds/bell.mp3"></audio>


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

<script src="getbellmessage.js"></script>

</html>