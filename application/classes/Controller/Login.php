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
                $this->response->body(View::factory('header')."<br>login successfull <br> logged in as: ".$_SESSION['userType']);
                
                header("Refresh:2; url=welcome");
            }
            else {
                $this->response->body(View::factory('header')."<br>wrong username or password");
                header("Refresh:2; url=login");
            }
            
        }
        else
        {
            $this->response->body(View::factory('header').View::factory('login'));
        }
	    
	}

} // End Welcome
