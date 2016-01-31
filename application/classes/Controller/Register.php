<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Register extends Controller 
{

	public function action_index()
	{
	    $post = $this->request->post();
	    $ret = '';
	    if(isset($post['submit']))
        {
            $firstname = $post['firstname'];
            $lastname = $post['lastname'];
            $comDetails = $post['companyDetails'];
            $comImg = $post['companyImg'];
            $email = $post['email'];
            $username = $post['username'];
            $password = $post['password'];
            $radioCheck = $post['logtype'];

            
            if($radioCheck == "student")
            {
                $ret = User::register($username,$password,$firstname, $lastname, $email);
            }
            elseif ($radioCheck == "company") 
            {
                $ret = Company::register($username,$password,$comDetails,$email,$comImg);
            } 
        }
        $this->response->body(View::factory('header').View::factory('register')->set('ret', $ret));

	}
}