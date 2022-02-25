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
class  Token extends QUERY{
    /**
     * Creates a token
     * @param string $email
     */
    public static function tokenize(string $email)
    {
        date_default_timezone_set('Africa/Johannesburg');
        $token = md5(time()); //create token from mdg hash of time
        $token_expiry = date('Y-m-d H:i:s', time() + 1000);//set token expiry
        $id=User::id(null,$email,null);
        QUERY::INSERT('tokens',['userID'=>$id,'token'=>$token,'expiry'=>$token_expiry]);
        return $token;
    }

    /**
     * Validates a token
     * @param string $token
     */
    public static function validate(string $token)
    {
        $foundToken=QUERY::SELECT('tokens',['token'=>$token]);
        if(count($foundToken)==0) return false;
        $expiry=$foundToken[0]['expiry'];
        $timeNow=date('Y-m-d H:i:s');
        $dateExpiry = date_create($expiry);
        $dateNow= date_create($timeNow);
        $differenceInHours=$dateExpiry->format('H')-$dateNow->format('H');
        $differenceInMinutes = $dateExpiry->format('i');
        if($differenceInHours<0) $differenceInHours+1;
        if($differenceInHours>=0) {
            $differenceInMinutes= $dateExpiry->format('i')-$dateNow->format('i');
        }else{
            $differenceInMinutes = $dateExpiry->format('i') - $dateNow->format('i')+10;
        }
        if ($differenceInMinutes > 0) return true;
        else return true;
    }

    /**
     * getUserID by Token
     */
    public static function getUserIDByToken(string $token)
    {
        $validateToken = Token::validate($token);
        if (!$validateToken) return false;
        $tokenInfo=QUERY::SELECT('tokens',['token'=>$token]);
        if(count($tokenInfo)==0) return false;
        return $tokenInfo[0]['userID'];
    }
}