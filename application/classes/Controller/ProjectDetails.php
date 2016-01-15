<?php defined('SYSPATH') or die('No direct script access.');

class Controller_ProjectDetails extends Controller {

	public function action_index()
	{
	    $studentsPerProject = 5;
	    $post = $this->request->post();
	    $session = Session::instance();
	    //$this->request->query('p')
	    print_r($session);
	    
	    if(isset($post['submit']))
	    {
            if(Project::addComment($post['projectID'],$post['comment'],$post['clientTime'])){
                echo "Коментарот е додаден";
                header("Refresh:2; url=projectDetails?pid=".$_POST['projectID']);
            }
            else{
                echo "Коментарот не е додаден";
                header("Refresh:2; url=projectDetails?pid=".$_POST['projectID']);
            }
        }
        elseif (isset($_GET['signup'])) 
        {   //if signing up for project execute this
            if(isset($_SESSION['userId'])){
                $r = Project::signUpForProject($this->request->query('signup'),$_SESSION['userId']);
                if($r){
                    echo "<div style ='margin:50px;'>Signed up successfully!</div>";
                }
                else {
                    echo "<div style ='margin:50px;'>Signup failed!</div>";
                }
            }
            else{
                echo "<div style ='margin:50px;'>Please sign In</div>";             //ova ne se gleda bez margini
            }
        }
        else
        {
            $projectID =  $this->request->query('pid');
            $currentProject = Project::getProjectByID($projectID);
            print_r($currentProject);
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
