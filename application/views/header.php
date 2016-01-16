
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Demola-FIKT</title>
        <link rel="stylesheet" href="<?php echo URL::base() .'media/Site.css';?> " type="text/css"/>
       <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        
       
  <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
 
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        <?php 
        //session_start();
        ?>



    </head>
    <body>
       
        <header>
    <div class="row">
           <div class="col-xs-12  col-sm-4 col-md-2 col-lg-3">
                <div class="site-logo">
                    
                   <a href="welcome"> </a>
                   <img src="<?php echo URL::base() .'media/images/fict_logo.png';?>" alt="FIKT-LOGO" width="250px" height="100px" >
                    
                </div>
            </div>
             
        <div class="col-xs-12 col-sm-4 col-md-7 col-lg-6"></div>

        <div class="col-sm-4 col-md-3 col-lg-3">
                <ul id="login">
                <?php
                
                if(isset($_SESSION['auth_user']))
                {
                    echo "<li>".$_SESSION['auth_user']." <a href='".URL::base()."login?logout=true' class='btn btn-success'>Logout</a>  </li>";
                }
                else {
                    echo '<li><a class="btn btn-success" href="login"><span class="glyphicon glyphicon-user"></span> Login</a></li>' . "\n";
                    echo '<li><a class="btn btn-success" href="register" ><span class="glyphicon glyphicon-log-in"></span> Register</a></li>' . "\n";
                }
               
                if(isset($_GET['logout']))
                {
                    Auth::instance()->logout();
                    $_SESSION = array();
                    session_destroy();
                    header("Refresh:0; url=login");
                }
                ?>
                </ul>
         </div>
    </div>        
    <div class="row">
        <div class="col-xs-12 col-sm-2 col-md-3 col-lg-3"></div>
         <div class="col-xs-12 col-sm-10 col-md-8 col-lg-8" > 
         
    <nav  class="navbar navbar-default"  role="navigation">
          <div class="navbar-header" >
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myNavbar"aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          
          </div>

         <div class="collapse navbar-collapse" id="myNavbar">
         
                 <ul class="nav navbar-nav">
                    <li><a class="btn btn-success btn-lg" href='welcome' ><span class="glyphicon glyphicon-home"></span>Home</a></li>
                    <li><a class="btn btn-success btn-lg" href='forStudents'>For Students</a></li>
                    <li><a class="btn btn-success btn-lg" href='forCompanies'>For Companies</a></li> 
                    <li><a class="btn btn-success btn-lg" href='forFikt'>For FIKT</a></li> 
                    <li><a class="btn btn-success btn-lg" href='project' >Projects</a></li>
                 </ul>
           
         </div>
    </nav>
            
  </div>
</div> 
         
       <div class="col-xs-12 col-md-1 col-lg-1"></div>
         
         
         
     </header>
       

