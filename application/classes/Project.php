<?php defined('SYSPATH') OR die('No direct script access.');
class Project
{
    public static function getProjects($Category)
    {
        if($Category == 'all'){
            return MyDB::getAllProjects();
        }
        else {
            return MyDB::getProjectByCategory($Category);
        }
    }
    
    public static function signUpForProject($project_id,$student_id)
    {
        MyDB::deleteStudentFromSignups($student_id);
        return MyDB::signUpForProject($project_id,$student_id);

    }
    
    public static function createProject($projectName,$category,$discription,$companyID)
    {
        $ret = MyDB::createProject($projectName,$category,$discription,$companyID);
        
        if($ret == true)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    
    public static function getProjectByID($projectID)
    {
        $ret = MyDB::getProjectByID($projectID);
        return $ret;
    }
    
    public static function getInactiveProjects()
    {
        $ret = MyDB::getInactiveProjects();
        return $ret;
    }
    /*
    public static function getCompletedProjects()
    {
        $ret = MyDB::getCompletedProjects();
        return $ret;
    }
    */
    public static function addComment($projectID,$comment,$clientTime)
    {
        $ret = MyDB::addProjectComment($projectID,$comment,$clientTime);
        return $ret;
    }
    
}