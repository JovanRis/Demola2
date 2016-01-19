<?php defined('SYSPATH') OR die('No direct script access.');

class MyDB extends Model
{
    ///////////////////////////////////////////////////////////////////////////
    //////////////////////////////Student Part/////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////
    
    public static function loginStudent($user)
    {
        $result = DB::select()->from('Student')->where('Username', '=', $user)->execute();
        $res = array();
        foreach($result as $row)
        {
            return $row;
        }
        return -1;
        
        /*$user = $this->conn->real_escape_string($user);
        $pwhash = $this->conn->real_escape_string($pwhash);
        
        $sql = "SELECT *
                FROM `Student`
                WHERE `Username` LIKE '".$user."'";
                
        $result = $this->conn->query($sql);
        $r = $result->fetch_assoc();

        //mysql_free_result($result);

        if($user == $r['Username'] && $pwhash == $r['pwHash'])
        {
            return $r['id_pk'];
        }
        else {
            return -1;
        }*/
    }
    
    public static function registerStudent($user,$pwhash,$firstname, $lastname, $email)
    {
        $result = DB::insert('Student', array('Username', 'pwHash', 'firstname', 'lastname', 'email'))->values(array($user, $pwhash, $firstname, $lastname, $email))->execute();
        
        if($result[1] == 1){
            return true;
        }
        return false;
        
        
        /*$user = $this->conn->real_escape_string($user);
        $pwhash = $this->conn->real_escape_string($pwhash);
        $firstname = $this->conn->real_escape_string($firstname);
        $lastname = $this->conn->real_escape_string($lastname);
        $email = $this->conn->real_escape_string($email);
        
        $sql = "INSERT INTO `Student`(`Username`, `pwHash`, `firstname`, `lastname`, `email`) VALUES ('".$user."','".$pwhash."','".$firstname."','".$lastname."','".$email."')";
        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            echo "Error: " . $sql . "<br>" . $this->conn->error;
            return false;
        }
        */
    }
    
    public static function getStudentProjects($studentID)
    {
        $result = DB::select('Project.id_pk')->from('Project')->join('SignUps' , 'LEFT')->on('Project.id_pk','=','SignUps.fk_projectId')->where('SignUps.fk_studentId' , '=', $studentID)->execute();
        if(count($result)>0)
        {
            $res = array();
            foreach($result as $row)
            {
                array_push($res,$row['id_pk']);
            }
            return $res;
        }
        return -1;
    }
    
    
    
    
    
    ///////////////////////////////////////////////////////////////////////////
    //////////////////////////////Company Part/////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////
    
    
    
    public static function loginCompany($user)
    {
        $result = DB::select()->from('Company')->where('CompanyName', '=', $user)->execute();
        $res = array();
        foreach($result as $row)
        {
            return $row;
        }
        return -1;
        
        /*$user = $this->conn->real_escape_string($user);
        $pwhash = $this->conn->real_escape_string($pwhash);
        
        $sql = "SELECT *
                FROM `Company`
                WHERE `CompanyName` = '".$user."'";

                
        $result = $this->conn->query($sql);
        $r = $result->fetch_assoc();

        //mysql_free_result($result);
        if($user == $r['CompanyName'] && $pwhash == $r['CompanyPass'])
        {
            return $r['id_pk'];
            
        }
        else {
            return -1;
        }*/
    }
    
    
    public static function registerCompany($user,$pwhash,$details,$email,$imgUrl)
    {
        $result = DB::insert('Company', array('CompanyName', 'CompanyPass', 'CompanyDetails', 'email', 'imgUrl'))->values(array($user, $pwhash, $details, $email, $imgUrl))->execute();
        
        if($result[1] == 1){
            return true;
        }
        return false;
        
        /*$user = $this->conn->real_escape_string($user);
        $pwhash = $this->conn->real_escape_string($pwhash);
        $details = $this->conn->real_escape_string($details);
        $email = $this->conn->real_escape_string($email);
        $imgUrl = $this->conn->real_escape_string($imgUrl);
        
        $sql = "INSERT INTO `Company`(`CompanyName`, `CompanyPass`, `CompanyDetails`, `email`, `imgUrl`) VALUES ('".$user."','".$pwhash."','".$details."','".$email."','".$imgUrl."')";
        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            echo "Error: " . $sql . "<br>" . $this->conn->error;
            return false;
        }*/
    }
    
    public static function createProject($projectName,$category,$discription,$companyID)
    {
        $result = DB::insert('Project', array('ProjectName', 'Category', 'Discription', 'fk_CompanyID'))->values(array($projectName, $category, $discription, $companyID))->execute();
        
        if($result[1] == 1){
            return true;
        }
        return false;

    }
    
    public static function getInactiveCompanies()
    {
        $result = DB::select()->from('Company')->where('active', '=', '0')->execute();
        $res = array();
        
        foreach($result as $row)
        {
            array_push($res,$row);
        }
        return $res;
        
        /*$sql = "SELECT * from `Company` WHERE `active` = '0' ";
        
        
        $result = $this->conn->query($sql);
        $r = array();
        if ($result->num_rows > 0) {
        // output data of each row
            while($row = $result->fetch_assoc()) {
            array_push($r,$row);
            }
        } else {
            return -1;
        }
        mysql_free_result($result);

        return $r;*/
    }
    
    public static function checkIfApproved($companyID){
        
        $result = DB::select('active')->from('Company')->where('id_pk', '=', $companyID)->execute();
        foreach($result as $row)
        {
            return $row;
        }
        return -1;
        
        /*$companyID = $this->conn->real_escape_string($companyID);
        
        $sql = "SELECT `active` FROM `Company` WHERE `id_pk` = '".$companyID."'";
        $result = $this->conn->query($sql);
                
        if ($result->num_rows > 0) {
            $r = $result->fetch_assoc();
            return $r['active'];
        
        } else {
            return 0;
        }*/
    }
    
        public static function getCompanyInfo($companyID){
        $result = DB::select('CompanyName','CompanyDetails','imgUrl')->from('Company')->where('id_pk', '=', $companyID)->execute();    
        
        foreach($result as $row)
        {
            return $row;
        }
        return -1;
            
        /*   $companyID = $this->conn->real_escape_string($companyID);
        
        $sql = "SELECT `CompanyName`,`CompanyDetails`,`imgUrl` FROM `Company` WHERE `id_pk` = '".$companyID."'";
        $result = $this->conn->query($sql);
                
        if ($result->num_rows > 0) {
            $r = $result->fetch_assoc();
            return $r;
        
        } else {
            return 0;
        }*/
        
    }
    
    public static function getCompanyProjects($companyID){
        
        $result = DB::select('id_pk')->from('Project')->where('fk_companyID', '=', $companyID)->execute();
        $res = array();
        
        foreach($result as $row)
        {
            array_push($res,$row);
        }
        return $res;
        
        
        
        
        /*$companyID = $this->conn->real_escape_string($companyID);
        $sql = "SELECT `id_pk`
                FROM Project p 
                WHERE p.fk_companyID = '".$companyID."'";
                
                $result = $this->conn->query($sql);
        $r = array();
        if ($result->num_rows > 0) {
        // output data of each row
            while($row = $result->fetch_assoc()) {
            array_push($r,$row['id_pk']);
            }
        } else {
            return -1;
        }

        mysql_free_result($result);
        
        return $r;*/
                
        
    }
    
    ///////////////////////////////////////////////////////////////////////////
    //////////////////////////////Project Part/////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////
    
    public static function getAllProjects(){
        $sub = DB::select(array(DB::expr('COUNT(*)'),'cnt'))->from('SignUps')->where('fk_projectId', '=', DB::expr('p.id_pk'));
        $result = DB::select('p.id_pk','p.ProjectName','p.Category','p.Discription','p.completed','c.CompanyName',array($sub,'cnt'))
                    ->from(array('Project','p'))
                    ->join(array('Company', 'c'), 'LEFT')->on('p.fk_CompanyID', '=', 'c.id_pk')
                    ->where('p.active', '=', '1')->and_where('p.completed', '=', '0')
                    ->execute();
        $res = array();
        foreach($result as $row)
        {
            array_push($res,$row);
        }
        return $res;
        
        
        /*$sql = "SELECT p.id_pk, p.ProjectName, p.Category, p.Discription, c.CompanyName, p.completed, (SELECT count( * )FROM SignUps WHERE fk_projectId = p.id_pk) as cnt
                FROM `Project` p
                LEFT JOIN `Company` c ON p.fk_CompanyID = c.id_pk
                WHERE p.active = 1 and p.completed = 0 ";
        
        $result = $this->conn->query($sql);
        $r = array();
        if ($result->num_rows > 0) {
        // output data of each row
            while($row = $result->fetch_assoc()) {
            array_push($r,$row);
            }
        } else {
            return -1;
        }

        mysql_free_result($result);
        
        return $r;*/
    }
    
    public static function getProjectByCategory($Category)
    {
        
        $sub = DB::select(array(DB::expr('COUNT(*)'),'cnt'))->from('SignUps')->where('fk_projectId', '=', DB::expr('p.id_pk'));
        $result = DB::select('p.id_pk','p.ProjectName','p.Category','p.Discription','p.completed','c.CompanyName',array($sub,'cnt'))
                    ->from(array('Project', 'p'))
                    ->join(array('Company', 'c'), 'LEFT')->on('p.fk_CompanyID', '=', 'c.id_pk')
                    ->where('p.active', '=', '1')->and_where('p.completed', '=', '0')->and_where('Category', '=', $Category)
                    ->execute();
        $res = array();
        foreach($result as $row)
        {
            array_push($res,$row);
        }
        return $res;
        
        
        /*$Category = $this->conn->real_escape_string($Category);
        $sql = "SELECT p.id_pk, p.ProjectName, p.Category, p.Discription, c.CompanyName, (SELECT count( * )FROM SignUps WHERE fk_projectId = p.id_pk) as cnt
                FROM `Project` p
                LEFT JOIN `Company` c ON p.fk_CompanyID = c.id_pk
                WHERE `Category` = '".$Category."' AND p.active = 1 and p.completed = 0 ";
        
        $result = $this->conn->query($sql);
        $r = array();
        if ($result->num_rows > 0) {
        // output data of each row
            while($row = $result->fetch_assoc()) {
            array_push($r,$row);
            }
        } else {
            return -1;
        }

        mysql_free_result($result);
        
        return $r;*/
    }
    
    public static function signUpForProject($project_id,$student_id)
    {
        $result = DB::insert('SignUps',array('fk_projectId', 'fk_studentId'))->values(array($project_id,$student_id))->execute();
                
        if($result[1] == 1){
            return true;
        }
        return false;
        
        /*$project_id = $this->conn->real_escape_string($project_id);
        $student_id = $this->conn->real_escape_string($student_id);
        $sql = "INSERT INTO `SignUps`(`fk_projectId`, `fk_studentId`) VALUES ('".$project_id."','".$student_id."')";
        
        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            echo "Error: " . $sql . "<br>" . $this->conn->error;
            return false;
        }*/
    }
    
    public static function deleteStudentFromSignups($studentID){
        
        $result = DB::delete('SignUps')->where('fk_studentId', '=', $studentID)->execute();
        if($result > 0){
            return true;
        }
        return false;
        
        /*$studentID = $this->conn->real_escape_string($studentID);
        $sql = "DELETE FROM `SignUps` WHERE fk_studentId = '".$studentID."'";
            if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            echo "Error: " . $sql . "<br>" . $this->conn->error;
            return false;
        }*/
    }
    
    
    
    public static function getInactiveProjects()
    {
        
        $result = DB::select()->from('Project')->where('active', '=', '0')->execute();
        
        $res = array();
        foreach($result as $row)
        {
            array_push($res,$row);
        }
        return $res;
        
        /*$sql = "SELECT * from `Project` WHERE `active` = '0' ";

        $result = $this->conn->query($sql);
        $r = array();
        if ($result->num_rows > 0) {
        // output data of each row
            while($row = $result->fetch_assoc()) {
            array_push($r,$row);
            }
        } else {
            return -1;
        }
        mysql_free_result($result);

        return $r;*/
    }
    
    public static function getprojectByID($projectID)
    {
        $result = DB::select()->from('Project')->where('id_pk', '=', $projectID)->execute();
        
        $res = array();
        foreach($result as $row)
        {
            array_push($res,$row);
        }
        $res = $res[0];
        
        
        $result = DB::select('Student.firstname', 'Student.lastname', 'Student.email')
                    ->from('SignUps')->join('Student', 'LEFT')->on('SignUps.fk_studentid', '=', 'Student.id_pk')
                    ->where('SignUps.fk_projectid', '=', $projectID)
                    ->execute();
        if(count($result) > 0)
        {
            $res['SignedUp'] = array();            
            foreach($result as $row)
            {
                array_push($res['SignedUp'],$row);
            }
        }
        else
        {
            $res['SignedUp'] = "There are no signed up students";
        }
        
        $result = DB::select()->from('ProjectComments')->where('fk_ProjectID', '=', $projectID)->execute();
        
        if(count($result) > 0)
        {
            $res['Comments'] = array();            
            foreach($result as $row)
            {
                array_push($res['Comments'],$row);
            }
        }
        else
        {
            $res['Comments'] = "There are no comments";
        }

        return $res;
        
        
        
        /*$projectID = $this->conn->real_escape_string($projectID);
        $sql = "SELECT * from `Project` Where `id_pk` = '".$projectID."'";
        
        $result = $this->conn->query($sql);
        $r = array();
        if ($result->num_rows > 0) {
        // output data of each row
            while($row = $result->fetch_assoc()) {
            array_push($r,$row);
            }
        } else {
            return -1;
        }
        
        $sql = "SELECT st.firstname,st.lastname, st.email FROM `SignUps` as si left join Student as st on si.fk_studentid = st.id_pk WHERE si.fk_projectid = '".$projectID."'";
        
        $result = $this->conn->query($sql);
        $r1 = array();
        if ($result->num_rows > 0) {
        // output data of each row
            while($row = $result->fetch_assoc()) {
            array_push($r1,$row);
            }
        } else {
            $r1 = "There are no signed up students";
        }
        
        
        $sql = "SELECT * from `ProjectComments` WHERE `fk_ProjectID` = '".$projectID."'";
        $result = $this->conn->query($sql);
        $r2 = array();
        if ($result->num_rows > 0) {
        // output data of each row
            while($row = $result->fetch_assoc()) {
            array_push($r2,$row);
            }
        } else {
            $r1 = "There are no comments";
        }
        
        
        
        $r = $r[0];
        $r['SignedUp'] = $r1;
        $r['comments'] = $r2;
        return $r;*/
        
    }
    
    
    public static function getCompletedProjects()
    {
        $sub = DB::select(array(DB::expr('COUNT(*)'),'cnt'))->from('SignUps')->where('fk_projectId', '=', DB::expr('p.id_pk'));
        $result = DB::select('p.id_pk', 'p.ProjectName', 'p.Category', 'p.Discription', 'c.CompanyName', 'p.completed', 'p.sourceLink', array($sub, 'cnt'))
                    ->from(array('Project', 'p'))->join(array('Company', 'c'), 'LEFT')->on('p.fk_CompanyID', '=', 'c.id_pk')
                    ->where('completed', '=', '1')
                    ->execute();
                    
        $res = array();
        foreach($result as $row)
        {
            array_push($res,$row);
        }
        return $res;
                    
        
        /*$sql = "SELECT p.id_pk, p.ProjectName, p.Category, p.Discription, c.CompanyName, p.completed, (SELECT count( * )FROM SignUps WHERE fk_projectId = p.id_pk) as cnt
                FROM `Project` p
                LEFT JOIN `Company` c ON p.fk_CompanyID = c.id_pk
                WHERE p.completed = 1 ";
        
        $result = $this->conn->query($sql);
        $r = array();
        if ($result->num_rows > 0) {
        // output data of each row
            while($row = $result->fetch_assoc()) {
            array_push($r,$row);
            }
        } else {
            return -1;
        }

        mysql_free_result($result);
        
        return $r;*/
    }
    
    public static function addProjectComment($projectID,$comment,$clientTime){
        
        $result = DB::insert('ProjectComments', array('fk_ProjectID', 'Date_Created', 'Comment'))->values(array($projectID,$clientTime,$comment))->execute();
        
        if($result[1] == 1){
            return true;
        }
        return false;
        
        
        /*$comment = $this->conn->real_escape_string($comment);
        $projectID = $this->conn->real_escape_string($projectID);
        $clientTime = $this->conn->real_escape_string($clientTime);
        
        $sql = "INSERT INTO `ProjectComments`(`fk_ProjectID`, `Date_Created`, `Comment`) VALUES ('".$projectID."','".$clientTime."' ,'".$comment."')";
        
        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            echo "Error: " . $sql . "<br>" . $this->conn->error;
            return false;
        }*/
    }
    



    ///////////////////////////////////////////////////////////////////////////
    //////////////////////////////Admin Part///////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////

    public static function loginAdmin($user)
    {
        $result = DB::select()->from('Admin')->where('Username', '=', $user)->execute();
        $res = array();
        foreach($result as $row)
        {
            return $row;
        }
        return -1;
        
        /*$user = $this->conn->real_escape_string($user);
        $pwhash = $this->conn->real_escape_string($pwhash);
        
        $sql = "SELECT *
                FROM `Admin`
                WHERE `Username` LIKE '".$user."'";
                
        $result = $this->conn->query($sql);
        $r = $result->fetch_assoc();

        mysql_free_result($result);

        if($user == $r['Username'] && $pwhash == md5($r['Password']))
        {
            return $r['id_pk'];
        }
        else {
            return -1;
        }*/
    }
    
    public static function approveCompany($companyID)
    {
        
        $result = DB::update('Company')->set(array('active' => '1'))->where('Company.id_pk', '=', $companyID)->execute();
        
        if($result == 1){
            return true;
        }
        return false;
        
        /*$companyID = $this->conn->real_escape_string($companyID);
        $sql = "UPDATE `fiktApp`.`Company` SET `active` = '1' WHERE `Company`.`id_pk` = '".$companyID."'";
        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            echo "Error: " . $sql . "<br>" . $this->conn->error;
            return false;
        }*/
    }
    
    public static function approveProject($projectID)
    {
        $result = DB::update('Project')->set(array('active' => '1'))->where('Project.id_pk', '=', $projectID)->execute();
        if($result == 1){
            return true;
        }
        return false;
        
        
        /*$projectID = $this->conn->real_escape_string($projectID);
        $sql = "UPDATE `fiktApp`.`Project` SET `active` = '1' WHERE `Project`.`id_pk` = '".$projectID."'";
        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            echo "Error: " . $sql . "<br>" . $this->conn->error;
            return false;
        }*/
    }
    
    public static function finishProject($projectID,$sourceLink){
        $result = DB::update('Project')->set(array('completed' => '1', 'sourceLink' => $sourceLink))->where('Project.id_pk', '=', $projectID)->execute();
        if($result == 1){
            return true;
        }
        return false;
        
        /*$projectID = $this->conn->real_escape_string($projectID);
        $sql = "UPDATE `Project` SET `completed` = '1' WHERE `Project`.`id_pk` = '".$projectID."'";
        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            echo "Error: " . $sql . "<br>" . $this->conn->error;
            return false;
        }*/
    }
    


    ///////////////////////////////////////////////////////////////////////////
    //////////////////////////////Session Part/////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////

    /*function createSession($sessionName,$startDate, $endDate)
    {
        $sessionName = $this->conn->real_escape_string($sessionName);
        $startDate = $this->conn->real_escape_string($startDate);
        $endDate = $this->conn->real_escape_string($endDate);
        echo $sessionName; echo "<br>";
        echo $startDate; echo "<br>";
        echo $endDate; echo "<br>";
        $sql = "INSERT INTO `Session`(`SessionName`, `StartDate`, `EndDate`) VALUES ('".$sessionName."','".$startDate."','".$endDate."')";
        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            echo "Error: " . $sql . "<br>" . $this->conn->error;
            return false;
        }
    }*/
}
?>