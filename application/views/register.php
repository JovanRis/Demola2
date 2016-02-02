<script type="text/javascript">

  function checkPassword(str)
  {
    var re = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}$/;
    return re.test(str);
  }

  function checkForm(form)
  {
    if(form.username.value == "") {
      alert("Error: Username cannot be blank!");
      form.username.focus();
      return false;
    }
    
    if(!checkPassword(form.password.value)) {
        alert("The password you have entered is not valid! The password must contain at least one number, one lowercase, one uppercase letter and size of at least six characters");
        form.password.focus();
        return false;
    }
    
    return true;
  }
  
    function showCompanyDetails(){
        document.getElementById("firstnameItem").style.display = "none";
        document.getElementById("lastnameItem").style.display = "none";
        document.getElementById("companyDetailsItem").style.display = "block";
        document.getElementById("companyImgItem").style.display = "block";
    }
  
    function showStudentDetails(){
        document.getElementById("firstnameItem").style.display = "block";
        document.getElementById("lastnameItem").style.display = "block";
        document.getElementById("companyDetailsItem").style.display = "none";
        document.getElementById("companyImgItem").style.display = "none";
    }

</script>

<div id="mainRegister">
<div class = 'container'>
   
    <?php
    if($ret != '')
    {
        echo $ret;
        ?>
    </div>  <!-- closes container div -->
    </div>  <!-- closes main div -->
        <?php
        if(strpos($ret, 'already') != false)
        {
            header("Refresh:4; url=login");
        }
        else
        {
            header("Refresh:4; url=register");
        }

    }
    ?>
    
        <form id='registerForm' action='register' method='POST' onsubmit='return checkForm(this);'>
            <fieldset>
                <legend>Register an account</legend>
                <ol>
                <li>
                    <input type='radio' name='logtype' value='student' checked onclick="showStudentDetails();">Student
                    <input type='radio' name='logtype' value='company' onclick="showCompanyDetails();">Company
                </li>
                <li id="firstnameItem">
                    <label for='firstname'>Firstname:</label>
                    <input type='text' class='form-control' name='firstname' value='' id='firstname' />
                </li>
                <li id="lastnameItem">
                    <label for='lastname'>Lastname:</label> 
                    <input type='text' class='form-control' name='lastname' value='' id='lastname' />
                </li>
                
                
                
                <li id="companyDetailsItem" style="display:none;">
                    <label for='companyDetails'>Company Name:</label> 
                    <input type='text' class='form-control' name='companyDetails' value='' id='companyDetails' />
                </li>
                <li id="companyImgItem" style="display:none;">
                    <label for='companyImg'>Company logo url:</label> 
                    <input type='text' class='form-control' name='companyImg' value='' id='companyImg' />
                </li>
                
                
                
                <li>
                    <label for='email'>Email:</label> 
                    <input type='text' class='form-control' name='email' value='' id='email' />
                </li>
                <li>
                    <label for='username'>Username:</label> 
                    <input type='text' class='form-control' name='username' value='' id='username' />
                </li>
                <li>
                    <label for='password'>Password:</label>
                    <input type='password' class='form-control' name='password' value='' id='password' />
                </li>
                </ol>
                <input type='submit' class='btn btn-default' name='submit' value='Register' />
               
            </fieldset>
        </form>
        </div>
     </div>