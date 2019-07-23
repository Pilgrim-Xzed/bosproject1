<?php
    include "includes/header.inc.php";
    if (!isset($_SESSION['email'])){
        echo "<script>window.location.href ='index.php';</script>";
    }
   $email = $_SESSION['email'];

    
   $authUser = "SELECT * FROM `users` WHERE `email`='$email'";
   $getUser = $con->query($authUser);
   $user = mysqli_fetch_assoc($getUser);


?>
 <!-- Begin page -->
 <div id="wrapper">

<!-- Topbar Start -->
<div class="navbar-custom">
    <ul class="list-unstyled topnav-menu float-right mb-0">

        <li class="d-none d-sm-block">
            <form class="app-search">
                <div class="app-search-box">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search...">
                        <div class="input-group-append">
                            <button class="btn" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </li>

      
        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
            <i class="fa fa-user"></i> 
                <span class="pro-user-name ml-1">
                    <?=$user['fullname']?> <i class="fa fa-chevron-down"></i> 
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                <!-- item-->
                <div class="dropdown-header noti-title">
                    <h6 class="text-overflow m-0">Welcome !</h6>
                </div>

                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i class="fa fa-user"></i>
                    <span>My Account</span>
                </a>

                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i class="fa fa-cog"></i>
                    <span>Settings</span>
                </a>

                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i class="fa fa-lock"></i>
                    <span>Lock Screen</span>
                </a>

                <div class="dropdown-divider"></div>

                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i class="fa fa-log-out"></i>
                    <span>Logout</span>
                </a>

            </div>
        </li>

    


    </ul>

    <!-- LOGO -->
    <div class="logo-box">
        <a href="index.html" class="logo text-center">
            <span class="logo-lg">
                <img src="assets/images/logo-light.png" alt="" height="18">
                <!-- <span class="logo-lg-text-light">UBold</span> -->
            </span>
            <span class="logo-sm">
                <!-- <span class="logo-sm-text-dark">U</span> -->
                <img src="assets/images/logo-sm.png" alt="" height="24">
            </span>
        </a>
    </div>

    <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
        <li>
            <button class="button-menu-mobile waves-effect waves-light">
                <i class="fa fa-bank"></i>
            </button>
        </li>

       
    </ul>
</div>
<!-- end Topbar -->

<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu">

    <div class="slimscroll-menu">

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul class="metismenu" id="side-menu">

                <li class="menu-title">Navigation</li>

                <li>
                    <a href="dashboard.php?stats=stats.php">
                        <i class="fa fa-dashboard"></i>
                        <span> Dashboards </span>
                    </a>
                  
                </li>


                <li>
                    <a href="dashboard.php?settings=settings.php">
                        <i class="fa fa-edit"></i>
                        <span> Site Settings </span>
                    </a>
                  
                </li>

                <li>
                    <a href="dashboard.php?gallery=gallery.php">
                        <i class="fa fa-file"></i>
                        <span> Site Contents CMS </span>
                    </a>
                  
                </li>

                <li>
                    <a href="dashboard.php?speech=speech.php">
                        <i class="fa fa-switch"></i>
                        <span> Logout </span>
                    </a>
                  
                </li>

            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->

<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->

<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
            
          <?php include 'partials/stats.php' ;
                include 'partials/settings.php' ;
                include 'partials/speech.php';
                include 'partials/gallery.php';
                
          
          
          ?>
        

        </div> <!-- container -->

    </div> <!-- content -->

    <!-- Footer Start -->
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    2015 - 2019 &copy; UBold theme by <a href="">Coderthemes</a> 
                </div>
                <div class="col-md-6">
                    <div class="text-md-right footer-links d-none d-sm-block">
                        <a href="javascript:void(0);">About Us</a>
                        <a href="javascript:void(0);">Help</a>
                        <a href="javascript:void(0);">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end Footer -->

</div>

<!-- ============================================================== -->
<!-- End Page content -->
<!-- ============================================================== -->


</div>
<!-- END wrapper -->

<!-- Right Sidebar -->
<div class="right-bar">
<div class="rightbar-title">
    <a href="javascript:void(0);" class="right-bar-toggle float-right">
        <i class="dripicons-cross noti-icon"></i>
    </a>
    <h5 class="m-0 text-white">Settings</h5>
</div>
<div class="slimscroll-menu">
    <!-- User box -->
    <div class="user-box">
        <div class="user-img">
            <img src="assets/images/users/user-1.jpg" alt="user-img" title="Mat Helme" class="rounded-circle img-fluid">
            <a href="javascript:void(0);" class="user-edit"><i class="mdi mdi-pencil"></i></a>
        </div>

        <h5><a href="javascript: void(0);">Geneva Kennedy</a> </h5>
        <p class="text-muted mb-0"><small>Admin Head</small></p>
    </div>

    <!-- Settings -->
    <hr class="mt-0" />
    <h5 class="pl-3">Basic Settings</h5>
    <hr class="mb-0" />

    <div class="p-3">
        <div class="checkbox checkbox-primary mb-2">
            <input id="Rcheckbox1" type="checkbox" checked>
            <label for="Rcheckbox1">
                Notifications
            </label>
        </div>
        <div class="checkbox checkbox-primary mb-2">
            <input id="Rcheckbox2" type="checkbox" checked>
            <label for="Rcheckbox2">
                API Access
            </label>
        </div>
        <div class="checkbox checkbox-primary mb-2">
            <input id="Rcheckbox3" type="checkbox">
            <label for="Rcheckbox3">
                Auto Updates
            </label>
        </div>
        <div class="checkbox checkbox-primary mb-2">
            <input id="Rcheckbox4" type="checkbox" checked>
            <label for="Rcheckbox4">
                Online Status
            </label>
        </div>
        <div class="checkbox checkbox-primary mb-0">
            <input id="Rcheckbox5" type="checkbox" checked>
            <label for="Rcheckbox5">
                Auto Payout
            </label>
        </div>
    </div>

    <!-- Timeline -->
    <hr class="mt-0" />
    <h5 class="pl-3 pr-3">Messages <span class="float-right badge badge-pill badge-danger">25</span></h5>
    <hr class="mb-0" />
    <div class="p-3">
        <div class="inbox-widget">
            <div class="inbox-item">
                <div class="inbox-item-img"><img src="assets/images/users/user-2.jpg" class="rounded-circle" alt=""></div>
                <p class="inbox-item-author"><a href="javascript: void(0);" class="text-dark">Tomaslau</a></p>
                <p class="inbox-item-text">I've finished it! See you so...</p>
            </div>
            <div class="inbox-item">
                <div class="inbox-item-img"><img src="assets/images/users/user-3.jpg" class="rounded-circle" alt=""></div>
                <p class="inbox-item-author"><a href="javascript: void(0);" class="text-dark">Stillnotdavid</a></p>
                <p class="inbox-item-text">This theme is awesome!</p>
            </div>
            <div class="inbox-item">
                <div class="inbox-item-img"><img src="assets/images/users/user-4.jpg" class="rounded-circle" alt=""></div>
                <p class="inbox-item-author"><a href="javascript: void(0);" class="text-dark">Kurafire</a></p>
                <p class="inbox-item-text">Nice to meet you</p>
            </div>

            <div class="inbox-item">
                <div class="inbox-item-img"><img src="assets/images/users/user-5.jpg" class="rounded-circle" alt=""></div>
                <p class="inbox-item-author"><a href="javascript: void(0);" class="text-dark">Shahedk</a></p>
                <p class="inbox-item-text">Hey! there I'm available...</p>
            </div>
            <div class="inbox-item">
                <div class="inbox-item-img"><img src="assets/images/users/user-6.jpg" class="rounded-circle" alt=""></div>
                <p class="inbox-item-author"><a href="javascript: void(0);" class="text-dark">Adhamdannaway</a></p>
                <p class="inbox-item-text">This theme is awesome!</p>
            </div>
        </div> <!-- end inbox-widget -->
    </div> <!-- end .p-3-->

</div> <!-- end slimscroll-menu-->
</div>
<!-- /Right-bar -->

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

<!-- Vendor js -->


<?php
    include "includes/footer.inc.php"
?>