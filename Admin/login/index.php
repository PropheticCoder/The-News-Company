<?php
$errMsg = "";
$email = "";
?>
<?php include('../../inc/requests/twoSpace.requestRequirements.php') ?>
<?php include('../../inc/requests/adminLoginRequest.php') ?>
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
            style="margin: auto;width: 320px;text-align: center;padding: 2%;border-radius: 12px;background: #d0d0d0;height: 520px;">
            <img id="login-logo" src="../../assets/img/nobg-noshadow-logo.png" style="width: 200px;">
            <h1 style="font-size: 20px;"><strong>Login</strong></h1>
            <h6 style="font-size: 11px;"><strong>Admin portal</strong></h6>
            <div id="formResponse" style="background: #ff0000;border-radius: 7px;font-size: 13px;">
                <p style="color: rgb(255,255,255);"><?= $errMsg ?></p>
            </div>
            <form style="text-align: left;" method="post" action="">
                <label class="form-label" style="font-size: 13px;">
                    <strong>Email</strong><br></label>
                <input class=" form-control" type="email" name="email" value="<?= $email ?>" required>
                <label class="form-label" style="font-size: 13px;">
                    <strong>Password</strong><br></label>
                <input class="form-control" type="password" name="password" required>
                <div style="width: 100%;text-align: center;">
                    <a class="d-inline-block" id="forgot-passwordlink" href="#" style="font-size: 13px;">Forgot
                        password?<br><br>
                    </a>

                    <a class="d-inline-block" id="forgot-passwordlink" href="../../Posts/login/"
                        style="font-size: 13px;">Posts portal<br><br>
                    </a>

                    <a class="d-inline-block" id="forgot-passwordlink" href="../../" style="font-size: 13px;">Browse
                        news<br><br>
                    </a>
                </div>

                <button class="btn btn-primary" type="submit" name="login"
                    style="margin-top: 10px;background: rgb(107,167,255);">Login</button>
            </form>
        </div>
    </div>
    <script src="../../assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>