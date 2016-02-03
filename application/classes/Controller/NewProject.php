<?php

class Controller_NewProject extends Controller
{
    //static $studentsPerProject = 5;
    public function action_index()
    {
        $session = Session::instance();
        $post = $this->request->post();
        
        if($session->get('userType') != 'company')
        {
            $this->response->body(View::factory('header')."<div id = 'alertDiv' class='alert alert-success'>  Only companies can create projects. </div>");
            header("Refresh:2; url=project");
        }
        
        if(isset($_POST['submit']))
        {
            if(Company::checkIfApproved($session->get('userId')))
            {
                $category = $post['projecttype'];
                $projectname = $post['projectname'];
                $discription = $post['projectdescription'];
                 
                if(Project::createProject($projectname,$category,$discription,$session->get('userId')))
                {
                    $this->response->body(View::factory('header')."<div id = 'alertDiv' class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> Project added successfuly. </div>");
                    header("Refresh:2; url=project");
                }
                else
                {
                    $this->response->body(View::factory('header')."<div id = 'alertDiv' class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> Project adding error. </div>");
                    header("Refresh:2; url=project");
                }
            }
            else 
            {
                $this->response->body(View::factory('header')."<div id = 'alertDiv' class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> Company is not aproved by: <strong> Administrator  </strong></div> ");
            }
        }
        else
        {
            $this->response->body(View::factory('header').View::factory('newProject'));
        }
        
        

        
            
    }
}