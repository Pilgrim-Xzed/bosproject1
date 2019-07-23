<?php
  $getDocs1 = "SELECT * FROM `documents` LIMIT 3";
  $runDocs1 = $con->query($getDocs1);

  $getDocs2 = "SELECT * FROM `documents`";
  $runDocs2 = $con->query($getDocs2);

?>

      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <div class="local-brands"><br><br>
              <div class="title-style-1">
                <h2>Documents</h2>
                <p>Ministry of Budget and Planning,Borno State Government  </p>
              </div>
              <div class="row"> 
                
                <!--Local Service Box Start-->
                <div class="col-md-12 col-sm-6">
                  <ul class="lb-ser-box">
                    <?php while($doc=mysqli_fetch_assoc($runDocs1)){ ?>
                    <!--Start-->
                    <li> <span class="lb-icon"><img src="assets/images/local-icon5.png" alt=""></span>
                      <h6><?=ucwords($doc['title'])?></h6>
                      <p>Click on the link below</p>
                      <div class="single-post-tags pull-right"> <a href="download.php?dow=<?=$doc['doc_path']?>">View  Document</a>  </div>
                 
                    </li>
                    <!--End--> 
                    
                    <?php } ?>
                    <a href="documents.php" class="btn btn-success">VEW ALL DOCUMENTS</a>
                    <br><br>
                  </ul>
                  
                </div>
                <!--Local Service Box End--> 
                
                <!--Local Service Box Start-->
                <div class="col-md-6 col-sm-6">
                  <ul class="lb-ser-box">
                    
                  
                  </ul>
                </div>
                <!--Local Service Box End--> 
                
              </div>
            </div>
          </div>
          <div class="col-md-4"> 
            <!--Mayor Msg Start-->
            <div class="Mayor-msg">
              <div class="Mayor-thumb"><img src="assets/images/gallery/governor.jpg" alt=""> <span class="Mayor-sig"><img src="images/mayer-signature.png" alt=""></span> </div>
              <div class="Mayor-text"> <span>Speech from the</span>
                <h5>Governor</h5>
              
                <center><a href="download.php?dow=uploads/documents/GOVERNORS SPEECH.pdf">Readmore...</a></center> </div>
            </div>
            <!--Mayor Msg End--> 
          </div>
        </div>
      </div>
