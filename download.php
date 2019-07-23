<?php
include 'core/init.php'; 
include 'core/init.php';
include "includes/header.inc.php";
include 'partials/components/nav.php';
    if(isset($_GET['dow'])){
        $path = $_GET['dow'];
    
      ?>
      <div class="container">
          <div class="row">
              <div class="col-md-12">
              <embed src="<?=$path?>" type="application/pdf"   width="100%" height="600px" />
              </div>
          </div>
      </div>
   
     <?php 

    }
    include "includes/footer.inc.php";
?>