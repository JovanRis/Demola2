<div id="main">
<style>
td { padding: 5px; }
</style>

         <div class='col-md-4'>
           <div class='btn-group-vertical'>
                    <button onclick="location.href='?p=approvecompany'" type='button' class='btn btn-success btn-md' id='approvecompanybtn' >Approve Companies</button>
                    <button onclick="location.href='?p=approveproject'" type='button' class='btn btn-success btn-md' id='approveprojectbtn' >Approve Projects</button>
                    <button onclick="location.href='?p=finishproject'" type='button' class='btn btn-success btn-md' id='approveprojectbtn' >Finish Projects</button>
           </div>
        </div>
        
        <?php
        if($showLogin)
        {
        ?>
        <div class='col-md-8'>
            <form id='loginForm' role='form' action='admin' method='POST'>
                
                    <fieldset>
                    <legend>Log on</legend>
                    <ol>
                        <li>
                            <label for='username'>Username:</label> 
                            <input type='text' class='form-control' name='username' value='' id='username' />
                        </li>
                        <li>
                            <label for='password'>Password:</label>
                            <input type='password' class='form-control' name='password' value='' id='password' />
                        </li>
                    </ol>
                    <input type='submit' class='btn btn-default' name='submit' value='Login' />
                    
                </fieldset>
                </form>
                <br>
                
        <?php
        }
        else
        {
            if($p == 'approvecompany') 
            {
                ?>
                <form id='approvecompany' role='form' action='admin?p=approvecompany' method = 'POST'>
                    <fieldset>
                        <legend>Approve Companies</legend>
                                <table>
                                <?php
                                    foreach($inactiveCompanies as $iCom){
                                     ?>
                                     <tr>
                                         <td> <?php echo $iCom['CompanyName'] ?></td> <td><input type='checkbox' class='form-control' name='iCom[]' value="<?php echo $iCom['id_pk'] ?>" /> </td>
                                     </tr>
                                     <?php
                                    }
                                    ?>
                                </table>
                        <input type='submit' class='btn btn-default' name='submit-approvecompany' value='Approve Companies' />
                    </fieldset>
                </form>
                <?php
            }
            if($p == 'approveproject') {

                ?>
                
                <form id='approveproject' role='form' action='admin?p=approveproject' method = 'POST'>
                    <fieldset>
                        <legend>Approve Companies</legend>
                                <table>
                                <?php
                                    foreach($inactiveProjects as $iPro){
                                     ?>
                                     <tr>
                                        <td> <?php echo $iPro['ProjectName'] ?> </td> <td><input type='checkbox' class='form-control' name='iPro[]' value="<?php echo $iPro['id_pk'] ?>" /> </td>
                                     </tr>
                                     <?php
                                    }
                                    ?>
                                </table>
                        <input type='submit' class='btn btn-default' name='submit-approveproject' value='Approve Projects' />
                    </fieldset>
                </form>
                
                <?php
            }

            if($p == 'finishproject')
            {
            ?>
                <form id='approveproject' role='form' action='admin?p=finishproject' method = 'POST'>
                    <fieldset>
                        <legend>Approve Companies</legend>
                                <table>
                                <?php
                                    foreach($projects as $Pro){
                                        //print_r($Pro);
                                        if($Pro['completed'] == '0'){
                                     ?>
                                     <tr>
                                        <td> <?php echo $Pro['ProjectName'] ?> </td> <td><input type='text' class = 'form-control' name = 'linkPro<?php echo $Pro['id_pk']; ?>' /></td> <td><input type='checkbox' class='form-control' name='iPro[]' value="<?php echo $Pro['id_pk'] ?>" /></td> 
                                     </tr>
                                     <?php
                                        }
                                    }
                                    ?>
                                </table>
                        <input type='submit' class='btn btn-default' name='submit-finishproject' value='Finish Projects' />
                    </fieldset>
                </form>
                
                <?php
            }


            }
             ?>
        </div>
    </div>
