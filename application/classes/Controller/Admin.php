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
                    echo "login successfull <br> logged in as: ".$session->get('userType');
                    header("Refresh:2; url=admin?p=null");
                }
                else {
                    echo "wrong username or password";
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
                    foreach($post['iCom'] as $idCom)
                    {
                        Admin::approveCompany($idCom);
                    }
                    echo "Companies approved";
                    header("Refresh:2; url=admin?p=null");
                }
                elseif(isset($post['submit-approveproject']))
                {
                    foreach($post['iPro'] as $idPro)
                    {
                        Admin::approveProject($idPro);
                    }
                    echo "Projects approved";
                    header("Refresh:2; url=admin?p=null");
                }
                elseif(isset($post['submit-finishproject']))
                {
                    foreach($post['iPro'] as $idPro)
                    {
                        Admin::finishProject($idPro,$post['linkPro'.$idPro]);
                    }
                    echo "Projects finished";
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

