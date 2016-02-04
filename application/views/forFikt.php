    <div class = "container">

   <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">

          <div class="item active">
            <img src="<?php echo URL::base() .'media/images/fikt1.jpg';?>" class="img-thumbnail" alt="Fikt 1" width="800" height="533">
            <div class="carousel-caption">
            </div>      
          </div>
    
          <div class="item">
            <img src="<?php echo URL::base() .'media/images/fikt2.jpg';?>"class="img-thumbnail"  alt="Fikt 2" width="800" height="533">
            <div class="carousel-caption">
          </div>      
      </div>
    </div>

         
    

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
    
   <div id="band" class="container text-left">
    <div class="jumbotron">
   <h3> DEMOLA FIKT  </h3>
        <p>
           <h4>University-Business Collaboration At Its Best</h4>
           <p>For FICT, Demola offers a way to build sustainable company relationships and a vantage point to market needs. We also offer a smooth project flow of practical real-case courses.
           The business contacts we provide are not valuable only for the schools involved, but will directly benefit the students as well.</p>
        </p>
        <p>
            <h4>Implement Research And Acquire New Knowledge</h4>
            <p>For researchers, Demola is an avenue for implementing and validating research outputs in real-life cases. It’s also a goldmine for new data, topics, and ideas.
            At Demola theory don’t only meet practice; they interact, and knowledge flows both ways.
            Demola cases are about future innovations, so instead of just researching what has already been, you’ll get visibility on what will happen next.</p>
        </p>

            </div>
        </div>

  </div>  
</div> <!-- End of outer-wrapper which opens in header.php -->
<?php 
 ?>