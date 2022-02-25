<?php
date_default_timezone_set('Africa/Johannesburg');
if(isset($_POST['login'])){
    $password=md5($_POST['password']);
    $loginData=['email'=>$_POST['email'],'password'=>$password];
    $processLoginRequest=new AccountManager();
    $loginRequest= $processLoginRequest->loginAdmin($loginData);
    if(isset($loginRequest['errorMsg'])) $errMsg= $loginRequest['errorMsg'];
    else{
        $token=$loginRequest;
        header('location: ../?token=' . $token."&portal=admin&articleFilter=all");
    }
}
?>