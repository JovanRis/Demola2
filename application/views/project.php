<div id="main">
    <div class="col-md-2">
        <div class="btn-group-vertical">
            <!-- Ako e najaven kako Kompanija da mozi da dodaj  -->
            <?php
            if ($showCreateProject) 
            {
                echo htmlspecialchars_decode("<button onclick= &quot; location.href='NewProject' &quot; type= &quot; button &quot; class= &quot; btn btn-success btn-md &quot; >New Project</button>");
            }
            echo htmlspecialchars_decode("
                <button type='button' class='btn btn-success btn-md' onclick= &quot; location.href='?p=coding'; &quot; >Coding</button>
                <button type='button' class='btn btn-success btn-md' onclick= &quot; location.href='?p=design'; &quot; >Design</button>
                <button type='button' class='btn btn-success btn-md' onclick= &quot; location.href='?p=communication'; &quot; >Communication</button>
                <button type='button' class='btn btn-success btn-md' onclick= &quot; location.href='?p=education'; &quot; >Education</button>
            ");
            ?>
       </div>
    </div>
    
    <div class="col-md-8">
        <div class="well">
            <?php
                $p = 1;
                for ($i = 0; $i < count($projects) / 3; $i++) {
                    echo "<div class='row'>";
                    for ($q = 0; $q < 3; $q++) {
    	                if ($p > count($projects)) {
    		                continue;
    	                }
            ?>
                <div class="col-xs-6 col-sm-4">
                    <div class="panel-group">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" href="#collapse<?php
                                echo $p; ?>"> <?php
                                echo $projects[$p - 1]['ProjectName'] ?> </a>
                                </h4>
                            </div>
                            <div id="collapse<?php
    	    	                    echo $p; ?>" class="panel-collapse collapse">
    	                        <div class="panel-body"> <?php
    	    	                    echo $projects[$p - 1]['Discription'] . "<br />";
    	    	                    echo "<b>" . $projects[$p - 1]['CompanyName'] . "</b>";?>                  
    	                        </div>
    
    	                        <div class="panel-footer" style='text-align: right;'> <?php
    	                    	echo htmlspecialchars_decode("<button type='button' style='margin-right: 60px;' class='btn btn-success btn-md' onclick= &quot; location.href='projectDetails?pid=" . $projects[$p - 1]['id_pk'] . "' &quot; >Details</button>") ?>
    	                    	<span>Spots left: </span> <span class="badge"><?php echo $studentsPerProject-$projects[$p - 1]['cnt'] ?> </span>
    			                </div>
                        	</div>
                    	</div>
                	</div>
            	</div>
                 <?php
    	                $p++;
                    }
                ?> 
        	</div>
                <?php
                }
                ?>
        </div>  
    </div>
    
</div>