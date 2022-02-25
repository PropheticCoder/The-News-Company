<?php
namespace libraries\Auth\Models;

/**
 * Users gets users table
 * @author PropheticCoder https://github.com/PropheticCoder
 * @copyright PropheticCoder https://github.com/PropheticCoder
 * @version 1.0
 */

use Exception;
use \libraries\BasicSQL\QUERY;
class User extends QUERY{
    protected static $fillable=[
        'id',
        'name',
        'lastName',
        'email',
        'password',
    ];

    /**
     * Checks if this Model is fully field
     */
    private static function stopIfNotFullyFilled(array $data){
        foreach(self::$fillable as $Fillable){
            if($Fillable !="id"){
                if(!isset($data[$Fillable])) throw new Exception('Missing values for User Model');
            }
        }
    }

    /**
     * Gets A User By Specified Data
     * @param int $userID
     * @param string $email
     * @param string $token
     */
    public static function get(int $userID=null,string $email=null)
    {
        $User=[];
        $User=($userID) ? QUERY::SELECT('users', ['id' => $userID]) : [];
        $User = ($email) ? QUERY::SELECT('users', ['email' => $email]) :  $User;
        return $User;
    }

    public static function id(int $userID=null,string $email=null){
        $User = ($userID) ? QUERY::SELECT('users', ['id' => $userID,'role'=>'USER']) : [];
        $User = ($email) ? QUERY::SELECT('users', ['email' => $email, 'role' => 'USER']) : [];
        return $User[0]['id'];
    }
    
    /**
     * Creates a new user
     * @param int $userID
     * @param string $email
     * @param string $token
     */
    public static function create(array $data)
    {
        self::stopIfNotFullyFilled($data);
        QUERY::UPSERT('users',$data,['email'=>$data['email']]);
        return User::id(null, $data['email'],null);
    }

    /**
     * Creates a new user
     * @param int $userID
     * @param string $email
     * @param string $token
     */
    public static function tokenize(string $email)
    {
        $token = md5(time()); //create token from mdg hash of time
        $token_expiry = date('Y-m-d H:i:s', time() + 1000);//set token expiry
        $id=self::id(null,$email,null);
        QUERY::INSERT('tokens',['userID'=>$id,'token'=>$token,'expiry'=>$token_expiry]);
        return $token;
    }

    /**
     * Creates a new user
     * @param int $userID
     * @param string $email
     * @param string $token
     */
    public static function verifyPassword(string $email,string $password)
    {
        $passwordFound=QUERY::SELECT('users',['email'=>$email,'password'=>$password]);
        if(count($passwordFound)>0) return true;
        return false;
    }

    /**
     * This is an interna function
     */
    public static function getUserByID(int $userID){
        return $User=QUERY::SELECT('users',['id'=>$userID]);
    }
}
?>