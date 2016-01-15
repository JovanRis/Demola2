<?php defined('SYSPATH') OR die('No direct script access.');

class User
{
    public static function register($user,$pass,$firstname, $lastname, $email)
    {
        $pwHash = Auth::register_hash($user,$pass);
        
        $res = MyDB::registerStudent($user,$pwHash,$firstname, $lastname, $email);
        
        return $res;
        
        
        
        /*$ret = $this->db->registerStudent($user,$pwHash,$firstname, $lastname, $email);
        
        if($ret == true)
        {
            return true;
        }
        else
        {
            return false;
        }*/
        
    }
    
    public static function getActiveProjects($userID){
        $currentProjectIDs = MyDB::getStudentProjects($userID);
        //print_r($currentProjectIDs);
        if(is_array($currentProjectIDs))
        {
            $currentProjects = array();
            for($i=0;$i<count($currentProjectIDs);$i++){
                array_push($currentProjects,MyDB::getprojectByID($currentProjectIDs[$i]));
            }
            return $currentProjects;
        }
        return -1;
    }
}

?>