<?php
include 'core/init.php';
include "includes/header.inc.php";
include 'partials/components/nav.php';

$fetchpub = "SELECT * FROM `contents`";
$seepub = $con->query($fetchpub);
?>


<div class="main-content p80">
    <div class="news-wrapper news-grid">
        <div class="container">
            <div class="row">
                <?php while ($pub = mysqli_fetch_assoc($seepub)) { ?>
                    <!--News Box Start-->
                    <div class="col-md-3 col-sm-6">
                        <div class="news-box">
                            <div class="new-thumb">
                                <img src="<?= $pub['content_img'] ?>" alt="">
                            </div>
                            <div class="new-txt">
                                <ul class="news-meta">
                                    <li><?= $pub['posted_on'] ?></li>

                                </ul>
                                <h6><a href="news.html#"><?= $pub['content_title'] ?></a></h6>
                                <center><div class="single-post-tags"> <a href="single.php?id=<?=$pub['id']?>">Read More</a>  </div></center>
                            </div>

                        </div>
                    </div>
                    <!--News Box End-->
                <?php } ?>
            </div>

        </div>
    </div>
    <div class="row">

    </div>
    <br><br><br>
</div>

<?php
include 'includes/footer.inc.php'
?>