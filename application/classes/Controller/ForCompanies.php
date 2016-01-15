<?php defined('SYSPATH') or die('No direct script access.');

class Controller_ForCompanies extends Controller {

	public function action_index()
	{
	    $session = Session::instance();
	    
		$this->response->body(View::factory('header').View::factory('forCompanies'));
	}

} // End Welcome

?>
