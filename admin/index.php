<?php
    include "includes/header.inc.php";

        if(isset($_POST['login'])){
            $email = $_POST['email'];
            $password = $_POST['password'];
            $cpassword = md5($password);
            $query = "SELECT * FROM `users` WHERE `email`='$email' AND `password`='$cpassword'";

            $runq = $con->query($query);

            $rowcnt = mysqli_num_rows($runq);

            if($rowcnt > 0 ){
                $_SESSION['email'] = $email;
                header("location:dashboard.php?stats=stats.php"); 
            };

        }
?>

<div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card bg-pattern">

                            <div class="card-body p-4">
                                
                                <div class="text-center w-75 ">
                                    <a href="index.html">
                                        <span><img src="assets/images/h2logo.png" alt="" height="100"></span>
                                    </a>
                                
                                </div>
                                <br><br>
                                <?php if($rowcnt === 0){   ?>
                                    <div class="alert alert-dark mb-0" role="alert">
                                    <a href="#" class="alert-link">Ooops</a>. Check Login Cridentials.
                                    </div><br>
                                  <?php  }?>
                             
                                <form action="index.php" method="POST">

                                    <div class="form-group mb-3">
                                        <label for="emailaddress">Email address</label>
                                        <input class="form-control" name="email" type="email" id="emailaddress" required="" placeholder="Enter your email">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="password">Password</label>
                                        <input class="form-control" type="password" name="password" required="" id="password" placeholder="Enter your password">
                                    </div>

                                    <div class="form-group mb-3">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="checkbox-signin" checked>
                                            <label class="custom-control-label" for="checkbox-signin">Remember me</label>
                                        </div>
                                    </div>

                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-success btn-block" name="login" type="submit"> Log In </button>
                                    </div>

                                </form>

                           

                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                    
                        <!-- end row -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->

        <?php
    include "includes/footer.inc.php"
?>