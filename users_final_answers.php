<!DOCTYPE html>
<html lang="en">
<head>
    <script src="jquery-3.1.1.min.js"></script>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="mycss.css">
    <title>Question & Answer</title>
</head>


<?php
error_reporting( E_ALL ^ E_NOTICE );

//Prepare to show all quuestions
include_once __DIR__ . '/util/PDOHelper.php';
include_once __DIR__ . '/resource/Colors.php';
include_once __DIR__ . '/model/User_Final_Answer.php';
$pdoHelper = new PDOHelper();


function getBackgroundTextAnswerColor( $code ) {
	if ( $code == Question::$CLOSEANSWER ) {
		return Colors::$AVAILABLEBACKGROUND;
	} else if ( $code == Question::$DISABLEANSWER ) {
		return Colors::$DISABLEBACKGROUND;
	} else if ( $code == Question::$OPENEDANSWER ) {
		return Colors::$OPENEDBACKGROUND;
	}
}

function getTextAnswerColor( $code ) {
	if ( $code == Question::$CLOSEANSWER ) {
		return Colors::$TRANSPARENTCOLOR;
	} else if ( $code == Question::$DISABLEANSWER ) {
		return Colors::$TRANSPARENTCOLOR;
	} else if ( $code == Question::$OPENEDANSWER ) {
		return Colors::$TEXTANSWERCOLOR;
	}
}

$question_id = isset( $_GET['question_id'] ) ? $_GET['question_id'] : 1;
$pdoHelper   = new PDOHelper();
$question    = $pdoHelper->get_Question( $question_id );
//Get every letter of correct answer
$answer_array    = $question->getEveryLetterAnswer();
$backGroundColor = Colors::getBackgroundTextAnswerColor( $question->status );

$textColor = Colors::getTextAnswerColor( $question->status );



$users_final_answers = $pdoHelper->get_Users_Final_Answers( $question );

?>


<body>
<audio id="batdautongketcongtraloi" src="sounds/batdautongketcongtraloi.wav" autoplay></audio>
<audio id="traloidung" src="sounds/traloidung.wav"></audio>
<audio id="traloisai" src="sounds/traloisai.mp3"></audio>
<div class="container">

    <div class="row_top">

        <a href="question_list.php" class="homebuttoncontainer">
            <img alt="Home" src="images/Home-icon.png" class="image">
        </a>
        <a href="question.php?question_id=<?php echo $question->question_id + 1 ?>" class="question_id">
			<?= $question->question_id ?>
        </a>
    </div>


	<?php foreach ( $users_final_answers as $user_final_answer ): ?>
        <div class="row_user_answer">
            <div class="user_name">
				<?= $user_final_answer->teamname ?>
            </div>
            <div class="user_answer_time">
				<?= $user_final_answer->get_User_Final_Time_Diff( $question ) ?>
            </div>
            <div class="user_answer">
				<?= $user_final_answer->last_answer ?>
            </div>
        </div>
	<?php endforeach; ?>
    <span class="lettercell" onclick="buttonYesClick()">
            A
    </span>
</div>
<audio id="bell" src="sounds/bell.mp3"></audio>
<script>
    var _question_id =<?=$question_id?>;
    var _status_opened =<?=Question::$OPENEDANSWER?>;
    var _status_disable =<?=Question::$DISABLEANSWER?>;
    var _backgroundcoloropened = "<?=Colors::$OPENEDBACKGROUND?>";
    var _backgroundcolordisabled = "<?=Colors::$DISABLEBACKGROUND?>";
    var _textcolorOpened = "<?=Colors::$TEXTANSWERCOLOR?>";
    var _textcolorTransparent = "<?=Colors::$TRANSPARENTCOLOR?>";
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
                if (q_status == _status_opened) {
                    changeColor(_backgroundcoloropened, _textcolorOpened);

                }
                else if (q_status == _status_disable) {
                    changeColor(_backgroundcolordisabled, _textcolorTransparent);
                }

            });
    }

    function changeColor(backgroundtextcolor, textcolor) {
        var x = document.getElementsByClassName("lettercell");
        for (i = 0; i < x.length; i++) {
            x[i].style.backgroundColor = backgroundtextcolor;
            x[i].style.color = textcolor;
        }
    }

</script>
<script src="getbellmessage.js"></script>
</html>

