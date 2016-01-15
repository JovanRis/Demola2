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
            $this->response->body(View::factory('header')."<br> Only companies can create projects.");
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
                    $this->response->body(View::factory('header')."<br> Project added successfuly.");
                    header("Refresh:2; url=project");
                }
                else
                {
                    $this->response->body(View::factory('header')."<br> Project adding error.");
                    header("Refresh:2; url=project");
                }
            }
            else 
            {
                $this->response->body(View::factory('header')."<br> Company is not approved by administrator.");
            }
        }
        else
        {
            $this->response->body(View::factory('header').View::factory('newProject'));
        }
        
        

        
            
    }
}