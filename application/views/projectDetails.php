<div id='main'>
    
     <div class="panel panel-success">
       <div class="panel-heading"> <?php echo $currentProject['ProjectName'];?> </div>
       <div class="panel-body">
          <?php echo $currentProject['Category']; ?> <br>
          <?php echo $currentProject['Discription']; ?> <br>   
          <?php echo $companyDetails['CompanyName'] ?> <br>
          <?php echo $companyDetails['CompanyDetails'] ?> <br>
          <div style = "height:200px; width: 350px;"><img src="<?php echo $companyDetails['imgUrl'] ?>" alt="companyImg" style="max-height:100%; max-width:100%;"></div>
      
        </div>
      </div>
      
        <div>
        Currently signed up:
        <?php 
        if(is_array($currentProject['SignedUp']))
        {
            foreach($currentProject['SignedUp'] as $student){                           //Prijaveni studenti
                echo "<div class='panel-footer' >".$student['firstname']." ".$student['lastname']."</div>";
            }
        }
        else
        {
            echo $currentProject['SignedUp'];    
        }
        ?>
        </div>
        
        <?php
        if($currentProject['fk_CompanyID'] == $userId || $userType == 'student'){ ?>
        <div>
        Comments:
        <?php 
        if(is_array($currentProject['Comments']))
        {
            foreach($currentProject['Comments'] as $comment){                           //komentari od kompanija
                echo "<div class='panel-footer' >".$comment['Comment']." ".$comment['Date_Created']."</div>";
            }
        }
        else
        {
            echo $currentProject['Comments'];
        }

        ?>
        </div>
        
        <?php } ?>
        
        
        <?php
        if(count($currentProject['SignedUp']) < $studentsPerProject && $currentProject['completed'] == 0 AND $userType == 'student'){               //button za signup ako ima mesto
        ?>
            <button type='button' style='margin-right: 60px;' class='btn btn-success btn-md' onclick="location.href='?signup= <?php echo $projectID ?>'">Sign Up</button>
       <?php 
        }
        ?>
        
        
          
        <?php   //del za komentari / izvestuvajna od kompanija
        if($currentProject['fk_CompanyID'] == $userId AND $userType == 'company'){
        ?>
        <div>
            <form id='loginForm' role='form' action='projectDetails' method='POST'>
                <label for='comment'>Comment:</label>
                <textarea rows="4" cols="50" class='form-control' name='comment' value='' id='comment' ></textarea>
                <input type='text' style = "display:none;" name = "projectID" value="<?php echo $currentProject['id_pk']; ?>">
                <input type='text' style = "display:none;" name = "clientTime" id="clientTime">

                <input type='submit' class='btn btn-default' name='submit' value='Add comment' />
            </form>
        </div>
        <?php
        }
        ?>
        
    
    </div>
    <script type="text/javascript">
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!
    var hh = today.getHours();
    var min = today.getMinutes();
    var ss = today.getSeconds();

    var yyyy = today.getFullYear();
    if(dd<10){
        dd='0'+dd;
    } 
    if(mm<10){
        mm='0'+mm;
    }
    if(min<10){
        min='0'+min;
    }
    if(hh<10){
        hh = '0'+hh;
    }
    if(ss<10){
        ss='0'+ss;
    }
    
    var today = yyyy+'-'+mm+'-'+dd+' '+hh+':'+min+':'+ss;
    document.getElementById("clientTime").value = today;
    </script>