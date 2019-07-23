
<?php
  include 'components/nav.php'

?>
<!--Slider Start-->
<div class="main-slider wf100">
  <div id="home-slider" class="owl-carousel owl-theme">
    <!--Item Start-->
    <div class="item">
      <div class="slider-caption">
        <div class="container"> <strong>Borno State Government<br>
          </strong>
          <p>"Budget of Consolidation". </p>
          <p>2019 </p>
          <a href="documents.php">GET DOCUMENTS</a>
        </div>
      </div>
      <img src="assets/images/gallery/slider1.jpg" alt="">
    </div>
    <!--Item End-->

  </div>
</div>
<!--Slider End-->

<div class="main-content">
  <!--Local Boards & Services-->
  <?php
      include "components/documents.php";
      include "components/works.php";
      $fetchpub = "SELECT * FROM `contents` WHERE `id`>2";
$seepub = $con->query($fetchpub);
function truncate($string, $length, $html = true)
{
    if (strlen($string) > $length) {
        if ($html) {
            // Grabs the original and escapes any quotes
            $original = str_replace('"', '\"', $string);
        }

        // Truncates the string
        $string = substr($string, 0, $length);

        // Appends ellipses and optionally wraps in a hoverable span
        if ($html) {
            $string = '<span title="' . $original . '">' . $string . '&hellip;</span>';
        } else {
            $string .= '...';
        }
    }

    return $string;
}

    ?>
  <!--Event Festivals & News Articles Start-->

<script>
  
</script>
  <div class="news-wrapper news-grid">
      <div class="container">
         <div class="row">
          <?php while($pub=mysqli_fetch_assoc($seepub)){?>
            <div class="col-md-4 col-sm-6">
               <div class="news-post">
                  <div class="news-post-txt"><br><Br>
                     <span class="ecat c1">GOVT NEWS</span> 
                     <!--Share Start-->
                  
                     <!--Share End-->
                     <h5><a href="news-two.html#"><?=$pub['content_title']?></a>
                     </h5>
                     <p> <?=truncate($pub['content_desc'],30)?></p>
                     <ul class="news-meta">
                     <li><a href="single.php?id=<?=$pub['id']?>"><i class="fa fa-link"></i> Readmore....</a></li>
                        <li><i class="fa fa-calendar-alt"></i><?=$pub['posted_on']?></li>
                     </ul>
                  </div>
               </div>
            </div>
            <!--News Box End--> 
          <?php } ?>
       
         </div>
        
      </div>
   </div>
</div>