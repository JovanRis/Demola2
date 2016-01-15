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
                                No one has sighen up.
                                <?php 
                            }
                            ?>
                        </div>
                        
                        <div>
                            Comments:
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
                                There are no comments.
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
                echo "There are no active projects";
            }

        }
        else 
        {
            foreach($projects as $project){
                ?>
                <div class="panel panel-success">
                    <div  class="panel-heading"><?php echo $project['ProjectName'] ?></div>
                    <div class="panel-body"><?php echo $project['Discription'] ?></div>

                </div>
            <?php
            }
        }
        ?>

</div> <!-- End of outer-wrapper which opens in header.php -->