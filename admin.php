<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <script src="jquery-3.1.1.min.js"></script>
</head>

<body>
<p id="status">

</p>
<button onclick="resetAllQuestions()">
    reset question status
</button>

<button onclick="clear_User_Answer()" style="background-color: red">
    clear user answer
</button>

<a href="question_list.php">Start Game</a>
</body>
</html>
<script>
    function post_link() {
        $.post("http://localhost/crosswordaof/apis/api_reset_question_status.php",
            {},
            function (data, status) {
                document.getElementById("status").innerHTML = "Reset question Successful";
            });
    }
    function send_delete_request() {
        $.post("http://localhost/crosswordaof/apis/api_clear_user_answer.php",
            {},
            function (data, status) {
                document.getElementById("status").innerHTML = "delete users answer Successful";
            });
    }

    function resetAllQuestions() {
        post_link();
    }

    function clear_User_Answer() {
        if (confirm("Are you sure you want to delete all users answers")) {
            send_delete_request()
        } else {
            // Do nothing!
        }
    }
</script>