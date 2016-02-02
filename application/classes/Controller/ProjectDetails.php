<?php defined('SYSPATH') or die('No direct script access.');

class Controller_ProjectDetails extends Controller {

	public function action_index()
	{
	    $studentsPerProject = 5;
	    $post = $this->request->post();
	    $session = Session::instance();
	    //$this->request->query('p')
	    //print_r($session);
	    
	    if(isset($post['submit']))
	    {
            if(Project::addComment($post['projectID'],$post['comment'],$post['clientTime'])){
                echo "<div id = 'alertDiv' class='alert alert-success'>Comment was added </div>";
                header("Refresh:2; url=projectDetails?pid=".$_POST['projectID']);
            }
            else{
                echo "<div id = 'alertDiv' class='alert alert-success'>Comment wasn't added </div>";
                header("Refresh:2; url=projectDetails?pid=".$_POST['projectID']);
            }
        }
        elseif (isset($_GET['signup'])) 
        {   //if signing up for project execute this
            if(isset($_SESSION['userId'])){
                $r = Project::signUpForProject($this->request->query('signup'),$_SESSION['userId']);
                $res = '';
                if($r){
                    $res = "<div id = 'alertDiv' class='alert alert-success'>Signed up successfully!";
                   
                }
                else {
                    $res = "<div id = 'alertDiv' class='alert alert-success'>Signed up failed!";
                }
            }
            else{
                $res = "<div id = 'alertDiv' class='alert alert-success'>Please sign In</div>";             //ova ne se gleda bez margini
            }
            $this->response->body(View::factory('header').$res);
                            header("Refresh:2; url=welcome");
        }
        else
        {
            $projectID =  $this->request->query('pid');
            $currentProject = Project::getProjectByID($projectID);
            //print_r($currentProject);
            $companyDetails = Company::getCompanyInfo($currentProject['fk_CompanyID']);
            
            $this->response->body(View::factory('header').View::factory('projectDetails')
            ->set('currentProject',$currentProject)
            ->set('companyDetails',$companyDetails)
            ->set('projectID', $projectID)
            ->set('studentsPerProject', $studentsPerProject)
            ->set('userType',$session->get('userType'))
            ->set('userId', $session->get('userId')));
        }
	}

} // End Welcome

?>
