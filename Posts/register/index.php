<?php
require_once('variables.php');
require_once('../../inc/requests/createAccountRequest.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>News Company</title>
    <link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="../../assets/css/Footer-Dark.css">
    <link rel="stylesheet" href="../../assets/css/Navigation-Clean-1.css">
    <link rel="stylesheet" href="../../assets/css/Navigation-Clean.css">
    <link rel="stylesheet" href="../../assets/css/styles.css">
</head>

<body>
    <div id="main" style="width: 100%;">
        <div id="loginFormMain"
            style="margin: auto;width: 310px;text-align: center;padding: 2%;border-radius: 12px;background: #d0d0d0;height: 636px;">
            <img id="login-logo" src="../../assets/img/nobg-noshadow-logo.png" style="width: 200px;">
            <h1 style="font-size: 20px;"><strong>Create Account</strong></h1>
            <div id="formResponse" style="background: #ff0000;border-radius: 7px;font-size: 13px;">
                <p style="color: rgb(255,255,255);"><?=$errMsg?></p>
            </div>
            <form style="text-align: left;padding: 1%;" action="" method="post">
                <label class="form-label" style="font-size: 13px;">
                    <strong>Name</strong>
                </label>
                <input class="form-control" type="text" name="name" required value="<?= $name ?>">
                <label class="form-label" style="font-size: 13px;">
                    <strong>Surname</strong><br>
                </label>
                <input class="form-control" type="text" name="lname" required value="<?= $lname ?>">
                <label class="form-label" style="font-size: 13px;">
                    <strong>Email</strong><br>
                </label>
                <input class="form-control" type="email" name="email" required value="<?= $email ?>">
                <label class="form-label" style="font-size: 13px;">
                    <strong>Create password</strong><br>
                </label>
                <input class="form-control" type="password" name="new_password" required value="<?= $newPassword ?>">
                <label class="form-label" style="font-size: 13px;">
                    <strong>Confirm password</strong><br>
                </label>
                <input class="form-control" type="password" name="confirm_password" required
                    style="margin-bottom: 10px;" value="<?= $confirmPassword ?>">
                <a href="../login/" style="font-size: 13px;">Login?<br><br></a>
                <button class="btn btn-primary" type="submit" name="register"
                    style="margin-top: 10px;background: rgb(107,167,255);font-size: 15px;">Create account</button>
            </form>
        </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>