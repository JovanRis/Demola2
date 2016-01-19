    <div id="main">
        <?php
        if($userType == 'student' OR $userType == 'company')
        {
            if(is_array($projects))
            {
                foreach($projects as $project)
                {
                    ?>
                    <div class="panel panel-success">
                        <div  class="panel-heading"><?php echo $project['ProjectName'] ?></div>
                        <div class="panel-body"><?php echo $project['Discription'] ?></div>
                        <div>
                            <?php
                            if(is_array($project['SignedUp']))
                                {
                                foreach($project['SignedUp'] as $colegue)
                                {
                                ?>
                                    <div class="panel-footer"> <?php echo $colegue['firstname']." ".$colegue['lastname']." ".$colegue['email']."</div>";
                              
                                }
                            }
                            else
                            {
                            ?>
                             <div class="alert alert-success">
                                <strong>No one has signed up!</strong> 
                             </div>
                              
                                <?php 
                            }
                            ?>
                        </div>
                        
                        <div>
                            Коментари:
                            <?php 
                            if(is_array($project['Comments']))
                            {
                                foreach($project['Comments'] as $comment)
                                {                           //komentari od kompanija
                                    echo "<div class='panel-footer' >".$comment['Comment']." ".$comment['Date_Created']."</div>";
                                }
                                ?>
                        </div>
                                <?php 
                            }
                            else
                            {
                            ?>
                              <div class="alert alert-success">
                                Нема Коментари.
                             </div>
                                
                        </div>
                                <?php
                            }
                            ?>
                            
                            
                    </div>
                <?php
                }
            }
            else
            {
                ?>
                  <div class="alert alert-success">
                    <strong>Нема активни проекти.</strong> 
                 </div>
                                
                <?php
            }

        }
        else 
        {
            foreach($projects as $project){
                ?>
                <div class="panel panel-success">
                    <div  class="panel-heading"><?php echo $project['ProjectName'] ?></div>
                    <div class="panel-body">
                        <?php echo $project['Discription'] ?>
                        <a href="<?php echo $project['sourceLink'] ?>"> Резултат </a>
                        
                    </div>
                    

                </div>
            <?php
            }
        }
        ?>

</div> <!-- End of outer-wrapper which opens in header.php -->