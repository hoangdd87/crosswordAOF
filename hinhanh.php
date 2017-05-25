<?php
//Prepare to show all quuestions
include_once __DIR__ . '/util/PDOHelper.php';
include_once __DIR__ . '/resource/Colors.php';

$pdoHelper = new PDOHelper();
$questions_list = $pdoHelper->get_All_Questions();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="hinhanh.css">
    <title>Hinh anh</title>
</head>


<body>
<audio id="audio1" src="sounds/hinhanh.wav" autoplay></audio>
<a href="question_list.php" class="homebuttoncontainer">
    <img alt="Home" src="images/Home-icon.png" class="image">
</a>
<div class="container">
    <img src="images/hinhanh.jpg" alt="">
    <div class="div_chehinh">
        <?php foreach ($questions_list as $question):
            $answerlettercolor = Colors::getTextAnswerColor($question->status);
            $backgroundanswercolor = Colors::getBackgroundTextAnswerColor($question->status);
            $answer_array = $question->getEveryLetterAnswer();
            $div_chebe_background=($question->isAnswerClosed()?"closed":($question->isAnswerDisabled()?"disabled":"opened"));

            ?>

            <div class="div_chebe <?=$div_chebe_background?>">
                <?=$question->question_id?>
            </div>

        <?php endforeach; ?>


    </div>
</div>
<button class="viewQuestionContainer" id="viewQuestion" onclick="viewQuestion()">
    <img alt="view" src="images/view.png" class="ImageView">
</button>

</body>
</html>
<script>
    function viewQuestion() {
        x=document.querySelectorAll(".div_chebe");
        for(i=0;i<x.length;i++)x[i].classList.add("opened")

    }
</script>