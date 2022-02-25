<?php
date_default_timezone_set('Africa/Johannesburg');
$loggedInName="";
if (!isset($_GET['portal'])) header('location: /News-Company/');
if(!isset($_GET['token'])) header('location: /News-Company/');
$tokenValidationProcess=new AccountManager();
$isTokenValid= $tokenValidationProcess->validateToken($_GET['token']);
$names = $tokenValidationProcess->getLoggedInClientNames($_GET['token']);
$loggedInName=$names[0]['name'];
if(!$isTokenValid) {
    if($_GET['portal']=="posts") header('location: /News-Company/Posts/login/');
    else if ($_GET['portal'] == "admin") header('location: /News-Company/Admin/login/');
    else header('location: /News-Company/');
}
?>