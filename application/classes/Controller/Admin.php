<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin extends Controller {

	public function action_index()
	{
	    $session = Session::instance();
	    $post = $this->request->post();
	    $showLogin = true;
	    
	    $view = View::factory('admin')->bind('showLogin', $showLogin);
	    if($session->get('isAdminLoggedIn') == false)
        {
            if(isset($post['submit']))
            {
                $user = $post['username'];
                $pass = $post['password'];


                $session->set('isAdminLoggedIn', false);
                $loginSuccess = false;
                
                if(Admin::login($user,$pass) == true)
                {
                    $loginSuccess = true;
                    $session->set('userType', 'admin');
                    $session->set('username', $user);
                    $session->set('isAdminLoggedIn', true);
                    $_SESSION['auth_user'] = $user;
                }
                
                if($loginSuccess == true)
                {
                    echo '<script language="javascript">';
                    echo 'alert("Loggin successfully  as Admin ")';
                    echo '</script>';
                    header("Refresh:2; url=admin?p=null");
                }
                else {
                   echo '<script language="javascript">';
                    echo 'alert("Wrong  Username or Password , please try again.")';
                    echo '</script>';
                }
	        }

        }
        else
        {
            $showLogin = false;
            if(HTTP_Request::POST == $this->request->method())
            {
                if(isset($post['submit-approvecompany']))
                {
                    if(isset($post['iCom']))
                    {
                        foreach($post['iCom'] as $idCom)
                        {
                            Admin::approveCompany($idCom);
                        }
                        
                         echo '<script language="javascript">';
                         echo 'alert("Companies approved")';
                         echo '</script>';
                    }
                    else
                    {
                    echo '<script language="javascript">';
                    echo 'alert("Must select companies for approval ")';
                    echo '</script>';
                    }

                    header("Refresh:2; url=admin?p=null");
                }
                elseif(isset($post['submit-approveproject']))
                {
                    if(isset($post['iPro']))
                    {
                        foreach($post['iPro'] as $idPro)
                        {
                            Admin::approveProject($idPro);
                        }
                       
                         echo '<script language="javascript">';
                         echo 'alert("Projects approved")';
                         echo '</script>';
                    }
                    else {
                    echo '<script language="javascript">';
                    echo 'alert("Must select project for approval ")';
                    echo '</script>';
                    }
                    header("Refresh:2; url=admin?p=null");
                }
                elseif(isset($post['submit-finishproject']))
                {
                    if(isset($post['iPro']))
                    {
                        foreach($post['iPro'] as $idPro)
                        {
                            Admin::finishProject($idPro,$post['linkPro'.$idPro]);
                        }
                       
                        echo '<script language="javascript">';
                        echo 'alert("Projects finished ")';
                        echo '</script>';
                    }
                    else {
                    echo '<script language="javascript">';
                    echo 'alert("Must select project to be finished. ")';
                    echo '</script>';
                    }
                    header("Refresh:2; url=admin?p=null");
                }
            }
            $p = $this->request->query('p');
            if($p == 'approvecompany')
            {
                $inactiveCompanies = Company::getInactiveCompanies();
                $view->inactiveCompanies = $inactiveCompanies;
            }
            if($p == 'approveproject')
            {
                $inactiveProjects = Project::getInactiveProjects();
                $view->inactiveProjects = $inactiveProjects;
            }
            if($p == 'finishproject')
            {
                $projects = MyDB::getAllProjects();
                $view->projects = $projects;
            }
            $view->p = $p;
        }
        

        
        $this->response->body(View::factory('header').$view);
    }
}// End Welcome

