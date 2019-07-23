
<?php
  $dptq = "SELECT * FROM `department`";
  $rundpt=$con->query($dptq);
?>

<header class="wf100 header">
  <div class="topbar">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-sm-6">

        </div>
        <div class="col-md-6 col-sm-6">
          <ul class="right-links">

            <li> <a href="home-two.html#"><i class="fa fa-map"></i><?=$setting['mda_address']?></a> </li>
            <li> <a href="home-two.html#"><i class="fa fa-envelope"></i> <strong><?=$setting['mda_email']?></strong></a> </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="logo-nav-row">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <nav class="navbar">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle
                  navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span
                  class="icon-bar"></span> </button>
              <a class="navbar-brand" href="index.html"><img src="assets/images/h2logo.png" style="height:100px"
                  alt=""></a> </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav">

                <li><a href="index.php">HOME</a></li>
                <li><a href="documents.php">DOCUMENTS</a></li>
                <li><a href="works.php">WORKS</a></li>
                <li><a href="publications.php">PUBLICATIONS</a></li>
                <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">Departments <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <?php while($dept=mysqli_fetch_assoc($rundpt)){ ?>
                      <li><a href="event.html"><?=$dept['dept_name']?></a></li>
                      <?php } ?>
                     
                    </ul>
                  </li>
                <li class="bars-btn"><a href="home-two.html#" id="sidebarCollapse"><i class="fa fa-bars"
                      style="font-size:24px;"></i> </a></li>
              </ul>
              <div id="search">
                <button type="button" class="close">×</button>
                <form class="search-overlay-form">
                  <input type="search" value="" placeholder="type keyword(s) here" />
                  <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                </form>
              </div>
            </div>
          </nav>
        </div>
      </div>
    </div>
  </div>
</header>
