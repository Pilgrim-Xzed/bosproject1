<?php
include 'core/init.php'; 
    include "includes/header.inc.php";
    include 'partials/components/nav.php';
    
    $fetchwork = "SELECT * FROM `gallery`";
    $seeworks = $con->query($fetchwork);
?>


<div class="container">
<div class="row">
                     <?php while($image=mysqli_fetch_assoc($seeworks)){ ?>
                     <div class="col-md-4 col-sm-6">
                        <div class="news-box">
                           <div class="new-thumb">
                            <img src="<?=$image['image_path']?>" alt="">
                             
                           </div>
                           <div class="new-txt">
                         
                            
                           </div>
                         
                        </div>
                     </div>
                     <!--News Box End--> 
                     <?php } ?>
                  </div>
<br><br>
</div>

<?php
    include 'includes/footer.inc.php'
?>