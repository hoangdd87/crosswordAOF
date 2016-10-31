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
</body>
</html>
<script>
    function post() {
        $.post("http://localhost/crosswordaof/apis/api_reset_question_status.php",
            {},
            function (data, status) {
                document.getElementById("status").innerHTML = "Reset question Successful";
            });
    }
    function resetAllQuestions() {
        post();
    }
</script>