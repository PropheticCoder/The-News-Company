<?php
namespace libraries\Auth;
use \Exception;
use libraries\Auth\Models\Admin;
use libraries\Auth\Models\Token;
use \libraries\Auth\Models\User;
/**
 * Auth Rules
 * Whatever extends this can only use models via this.
 * @author PropheticCoder https://github.com/PropheticCoder
 * @copyright PropheticCoder https://github.com/PropheticCoder
 * @version 2.0
 */
class Auth{
    protected static $Role;
    protected static $KnownRoles=[
        'USER',
        'ADMIN'
    ];

    private static function Admin()
    {
        return Admin::class;
    }

    
    private static function User(){
        return User::class;
    }

    private static function Token()
    {
        return Token::class;
    }

    
    private static function stopIfRoleIsUnknown(){
        if(!in_array(self::$Role,self::$KnownRoles)) throw new Exception('Unknown role');
    }
    
    private static function stopIfRegistrationHasNoRole(array $data){
        if(!isset($data['role'])) throw new \Exception('Registration data has no role');
    }
    

    protected static function register(array $data){
        self::stopIfRegistrationHasNoRole($data);
        self::$Role=$data['role'];
        self::stopIfRoleIsUnknown();
        if(self::$Role=='USER') return self::User()::create($data);
    }

    protected static function tokenize(string $email=null)
    {
        return self::Token()::tokenize($email);
    }

    protected static function validate(string $email = null)
    {
        return self::Token()::validate($email);
    }

    protected static function login(array $loginData){
        $email=$loginData['email'];
        $password = $loginData['password'];
        $userFound=self::User()::get(null,$email);
        if(count($userFound)==0) return ['errorMsg'=>'Account does not exist!'];
        $passwordFound=self::User()::verifyPassword($email,$password);
        if(!$passwordFound) return ['errorMsg' => 'Incorrect password!'];
        return self::tokenize($email);
    }

    protected static function adminLogin(array $loginData)
    {
        $email = $loginData['email'];
        $password = $loginData['password'];
        $userFound = self::Admin()::id(null,$email);
        if(!$userFound)  return ['errorMsg' => 'Account does not exist!'];
        $passwordFound = self::User()::verifyPassword($email, $password);
        if (!$passwordFound) return ['errorMsg' => 'Incorrect password!'];
        return self::tokenize($email);
    }
    
    /**
     * Get the names of the currently logged in person
     */
    protected static function getClientNames(string $token){
        $userID=intval(self::Token()::getUserIDByToken($token));
        return self::User()::get(intval($userID),null);
    }
}
?>