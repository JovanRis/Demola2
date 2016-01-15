<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Register extends Controller 
{

	public function action_index()
	{
	    $post = $this->request->post();
	    
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
                 
                 if(User::register($username,$password,$firstname, $lastname, $email))
                 {
                      echo "User register successful";
                 }
                 else
                 {
                      echo "User register error";
                 }
                 
            }
            elseif ($radioCheck == "company") 
            {
               
                
                if(Company::register($username,$password,$comDetails,$email,$comImg))
                {
                      echo "Company register successful";
                 }
                 else
                 {
                      echo "Company register error";
                 }
            } 
        }
        else
        {
            $this->response->body(View::factory('header').View::factory('register'));
        }
	}
}