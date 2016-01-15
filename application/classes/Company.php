<?php defined('SYSPATH') OR die('No direct script access.');

class Company
{
    public static function register($user,$pass,$details,$email,$imgUrl)
    {
        
        $pwHash = Auth::register_hash($user,$pass);
        
        $res = MyDB::registerCompany($user,$pwHash,$details, $email, $imgUrl);
        
        return $res;
        
    }
    
    public static function getInactiveCompanies(){
        $ret = MyDB::getInactiveCompanies();
        return $ret;
    }
    
    public static function checkIfApproved($companyID)
    {
        $ret = MyDB::checkIfApproved($companyID);
        return $ret['active'];
    }
    
    public static function getCompanyInfo($companyID){
        $ret = MyDB::getCompanyInfo($companyID);
        return $ret;
    }
    
    public static function getActiveProjects($companyID)    //returns active project for companyid
    {
        $currentProjectIDs = MyDB::getCompanyProjects($companyID);
        $currentProjects = array();
        for($i=0;$i<count($currentProjectIDs);$i++){
            array_push($currentProjects, MyDB::getprojectByID($currentProjectIDs[$i]));
        }
        return $currentProjects;
    }
}