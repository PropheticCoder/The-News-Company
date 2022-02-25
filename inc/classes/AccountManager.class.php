<?php

use libraries\Auth\Auth;

/**
 * Account rules
 * @author PropheticCoder https://github.com/PropheticCoder
 * @copyright PropheticCoder https://github.com/PropheticCoder
 * @version 1.0
 */
class AccountManager extends Auth{
    public function registerUser(array $regData){
        return Auth::register($regData);
    }

    public function createToken(string $email=null){
        return Auth::tokenize($email);
    }


    public function validateToken(string $token = null)
    {
        return Auth::validate($token);
    }

    public function loginUser(array $loginData){
        return Auth::login($loginData);
    }

    public function loginAdmin(array $loginData)
    {
        return Auth::adminLogin($loginData);
    }

    public function getLoggedInClientNames(string $token){
        return Auth::getClientNames($token);
    }
}
?>