<?php

class Controller_Project extends Controller
{
    //static $studentsPerProject = 5;
    public function action_index()
    {
        $studentsPerProject = 5;
        $showCreateProject = false;
        //$args = array();
        $session = Session::instance();
        if ($session->get('userType') == 'company') {
            
            $showCreateProject = true;
        }
        
        if ($this->request->query('p'))
        {
            $projects = Project::getProjects($this->request->query('p'));
        }
        else
        {
            $projects = Project::getProjects('all');
        }
        
        //array_push($args,$projects);
        //print_r($args);
        $this->response->body(View::factory('header').View::factory('project')->set('showCreateProject',$showCreateProject)->set('projects',$projects)->bind('studentsPerProject',$studentsPerProject));
            
    }
}