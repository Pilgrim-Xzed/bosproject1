<?php
include 'core/init.php';
include "includes/header.inc.php";
include 'partials/components/nav.php';

$id = trim($_GET['id']);

$getnews = "SELECT * FROM `contents` WHERE `id`='$id'";
$runfunct = $con->query($getnews);
$news =mysqli_fetch_assoc($runfunct);

?>

<div class="main-content p80">
            <!--News Details Page Start-->
            <div class="news-details">
               <div class="container">
                  <div class="row">
                     <!--Content Col Start-->
                     <div class="col-md-12">
                        <div class="news-box">
      
                           <div class="new-txt">
                              <ul class="news-meta">
                                 <li><?=$news['posted_on']?></li>
                             
                              </ul>
                              <h4><?=$news['content_title']?></h4>
                              <p><?=$news['content_desc']?> </p>
                             
                           
                           </div>
                        </div>
                     </div>
                     <!--Content Col End--> 
                     
                  </div>
               </div>
            </div>
            <!--News Details Page End--> 
         </div>

<?php
include 'includes/footer.inc.php'
?>