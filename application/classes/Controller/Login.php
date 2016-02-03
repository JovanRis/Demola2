<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Login extends Controller {

	public function action_index()
	{
	    $post = $this->request->post();
    	if(isset($post['submit']))
        {
            $user = $post['username'];
            $pass = $post['password'];
            
            $loginSuccess = Auth::instance()->login($user,$pass, false);
            if($loginSuccess == true)
            {
                $this->response->body(View::factory('header')."<div id = 'alertDiv' class='alert alert-success'> Loggin successfull, Logged in as: <strong>".$_SESSION['userType']);
                
                header("Refresh:4; url=Welcome");
            }
            else {
                $this->response->body(View::factory('header')."<div id = 'alertDiv' class='alert alert-success'> <strong> Wrong Username or Password, </strong> please try again. </div>");
               header("Refresh:4; url=login");
            }
            
        }
        else
        {
            $this->response->body(View::factory('header').View::factory('login'));
        }
	    
	}

} // End Welcome
