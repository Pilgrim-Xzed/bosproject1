<?php
    include "includes/header.inc.php";
    include 'partials/components/nav.php';

    $doclist ="SELECT * FROM `documents`";
    $rundoclist = $con->query($doclist);
    
?>

        <section class="wf100 subheader">
            <div class="container">
               <h2>Documents</h2>
              <p>Available Downloads</p>
            </div>
         </section>

         <div class="container">
         <div class="row"> 
             
                <!--Local Service Box Start-->
                <div class="col-md-12 col-sm-6">
                  <ul class="lb-ser-box">
                    <?php 
                        while($doc=mysqli_fetch_assoc($rundoclist)){
                    ?>               <!--Start-->
                    <li> <span class="lb-icon"><img src="assets/images/local-icon5.png" alt=""></span>
                      <h6><?= ucwords($doc['title']) ?></h6>
                      <p>Click on the link below</p>
                      <div class="single-post-tags pull-right"> <a href="download.php?dow=<?=$doc['doc_path']?>">View  Document</a>  </div>
                    </li>
                    <!--End--> 
                        <?php }?>
                        
                  </ul>
                </div>
                <!--Local Service Box End--> 
                
            
                
              </div>
         </div>
<br><br>
<?php
    include "includes/footer.inc.php"
?>