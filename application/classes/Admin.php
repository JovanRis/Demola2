<?php defined('SYSPATH') OR die('No direct script access.');

class Admin
{
    public static function login($user,$pass)
    {
        $ret = MyDB::loginAdmin($user);
        if($ret['Password'] == $pass)
        {
            return true;
        }
        return false;
    }
    
    public static function approveCompany($companyID){
        return MyDB::approveCompany($companyID);
    }
    
    public static function approveProject($projectID){
        return MyDB::approveProject($projectID);
    }
    
    public static function finishProject($projectID,$sourceLink){
        return MyDB::finishProject($projectID,$sourceLink);
    }
    
}

?>