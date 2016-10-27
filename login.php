<?php
include_once __DIR__ . '/util/PDOHelper.php';
include_once __DIR__ . '/resource/SESSTION.php';

$pdoHelper = new PDOHelper();
$session = new SESSTION();

if (isset($_POST['btnLogin'])) {

    // get username and password
    $username = $_POST['username'];
    $password = $_POST['password'];
    $user = $pdoHelper->get_User_by_username_and_pass($username, $password);

    if (!empty($user)) {
        $session->set_User_Logon($user);
        header("location: index.php");
        exit;
    } else {
        print_r("Login failed");
    }
}
?>
<div id="login_content" class="col-md-11 login">
    <div class="col-md-4 col-md-offset-4">
        <h2>
            Login Adminstrator
        </h2>
        <p class="alert"><?php echo isset($error['failed']) ? $error['failed'] : ''; ?></p>

        <form method="post">
            <label>Username :</label>
            <input type="text" name="username" class="form-control" required>

            <br>
            <label>Password :</label>
            <input type="password" class="form-control" name="password" required>

            <br>
            <button type="submit" name="btnLogin" class="btn btn-primary pull-right">Login</button>

        </form>
    </div>

</div>


