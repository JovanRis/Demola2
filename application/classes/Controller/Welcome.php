<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Welcome extends Controller {

	public function action_index()
	{
	    $session = Session::instance();
	    
	    print_r(Company::checkIfApproved($session->get('userId')));
	    //print_r($session);
	    $projects = array();
	    $projects = MyDB::getCompletedProjects();
        if($session->get('userType') == 'student')
        {
            $projects = User::getActiveProjects($session->get('userId'));
        }
        
        if($session->get('userType') == 'company')
        {
            $projects = Company::getActiveProjects($session->get('userId'));
        }
	    
	    
		$this->response->body(View::factory('header').View::factory('welcome')->set('projects',$projects)->set('userType',$session->get('userType')));
	}

} // End Welcome

?>
