<?php
  $works = "SELECT * FROM `gallery`";
  $runworks = $con->query($works);
?>
<section class="wf100 p80 city-highlights ">
  <div class="container">
    <div class="title-style-1 text-center white-text">
      <h2>Works</h2>

    </div>
  </div>
  <div class="container-fluid">
    <div id="highlight-slider" class="owl-carousel owl-theme owl-loaded owl-drag">

      <div class="owl-stage-outer">
        <div class="owl-stage"
          style="transform: translate3d(-757px, 0px, 0px); transition: all 0.18s ease 0s; width: 2273px;">
          <?php while($work = mysqli_fetch_assoc($runworks)){ ?>
          <div class="owl-item" style="width: 373.75px; margin-right: 5px;">
            <div class="item">
              <div class="ch-box">
                <div class="ch-thumb"> <a href="#"><i class="fa fa-image"></i></a> <img
                    src="<?=$work['image_path']?>" alt=""> </div>
                <div class="ch-txt">
                  <h6 style="color:white"><?=$work['title']?></h6>
               
                 
                </div>
              </div>
            </div>
          </div>
         
          <?php } ?>
        </div>
      </div>
   
    </div>
  </div>
</section>