<?php
date_default_timezone_set('Africa/Johannesburg');
include('twoSpace.requestRequirements.php');
//Waits for post request to forward silently to back end
//This script should be included in API folder
if(isset($_POST['register'])){
    $name=$_POST['name'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password_1=$_POST['new_password'];
    $password_2 = $_POST['confirm_password'];
    if($password_1 !=$password_2) $errMsg="Passwords do not match";
    else {
        $requestArray=['name'=>$name,'lastName'=>$lname,'email'=>$email,'password'=>md5($password_1),'role'=>'USER'];
        $processRequest=new AccountManager();
        $userID=$processRequest->registerUser($requestArray);
        $token= $processRequest->createToken($email);
        header('location: ../?token=' . $token . "&portal=posts&articleFilter=all");
}
}

?>