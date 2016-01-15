<?php defined('SYSPATH') OR die('No direct script access.');

class Auth_MyAuth extends Auth
{
    protected function _login($username, $password, $remember)
    {

        $pwHash = "";
        do
        {
                $res = MyDB::loginStudent($username);
                $pwHash = $res['pwHash'];
                $type = 'student';
                if($pwHash != "")
                {
                   break; 
                }
                

                $res = MyDB::loginCompany($username);
                $pwHash = $res['CompanyPass'];
                $type = 'company';
                if($pwHash != "")
                {
                   break; 
                }

                $res = MyDB::loginAdmin($username);
                $pwHash = $res['Password'];
                $type = 'admin';
                if($pwHash != "")
                {
                   break; 
                }
            
        } while($pwHash == -1);
        //echo $pwHash." ".$this->hash($password.$username);
        if($pwHash == $this->hash($password.$username))
        {
           $session = Session::instance();
           $session->set('userType', $type);
           $session->set('userId', $res['id_pk']);
           return $this->complete_login($username);
        }
        return false;
        
    }
    
    public function password($username)
    {
        echo 'password called';
        // Return the password for the username
        $res = MyDB::loginStudent($username);
        return $res['pwHash'];
    }
 
    public function check_password($password)
    {
        echo "cleck pass called";
        // Check to see if the logged in user has the given password
        return true;
    }
}

?>