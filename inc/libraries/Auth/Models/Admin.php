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
class Admin extends QUERY{
    protected static $fillable=[
        'id',
        'name',
        'lastName',
        'email',
        'cellphone',
        'password',
        'role',
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
    public static function get(int $userID=null,string $email=null,string $token=null)
    {
        $User=($userID) ? QUERY::SELECT('users', ['id' => $userID,'role'=>'ADMIN']) : [];
        $User = ($email) ? QUERY::SELECT('users', ['email' => $email, 'role' => 'ADMIN']) : [];
        return $User;
    }

    public static function id(int $userID=null,string $email=null,string $token=null){
        $User = ($userID) ? QUERY::SELECT('users', ['id' => $userID, 'role' => 'ADMIN']) : [];
        $User = ($email) ? QUERY::SELECT('users', ['email' => $email, 'role' => 'ADMIN']) : [];
        if(isset($User[0]['id'])) return $User[0]['id'];
        return false;
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
        QUERY::UPSERT('users', $data, ['email' => $data['email'], 'role' => 'ADMIN']);
        return self::id(null, $data['email'], null);
    }

    
    /**
     * Creates a new user
     * @param int $userID
     * @param string $email
     * @param string $token
     */
    public static function tokenize(int $userID)
    {
        $token = md5(time()); //create token from mdg hash of time
        $token_expiry = date('Y-m-d H:i:s', time() + 1000); //set token expiry
        $id = User::id($userID, null, null);
        QUERY::INSERT('tokens', ['userID' => $id, 'token' => $token, 'expiry' => $token_expiry]);
        return $token;
    }
}
?>