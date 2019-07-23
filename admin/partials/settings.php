<?php
if (isset($_GET['settings'])) {
    $query = "SELECT * FROM `settings` WHERE `id`='1'";
    $runq = $con->query($query);
    $settings = mysqli_fetch_assoc($runq);

    $usersq = "SELECT * FROM `users`";
    $runuser = $con->query($usersq);

    $deptq = "SELECT * FROM `department`";
    $rundept = $con->query($deptq);

    if (isset($_POST['updateSettings'])) {
        $mda_email = mysqli_real_escape_string($con, $_POST['email']);
        $mda_address = mysqli_real_escape_string($con, $_POST['address']);
        $mda_phone = mysqli_real_escape_string($con, $_POST['phone']);

        $updateq = "UPDATE `settings` SET `mda_email`='$mda_email',`mda_address`='$mda_address',`mda_phone`='$mda_phone' WHERE `id`=1";

        if ($con->query($updateq)) {;
            echo "<div class='alert alert-success' role='alert'>
        <i class='fa fa-check-all mr-2'></i> Uploaded <strong>successfully</strong> !
      </div>";
            echo "<script>window.location.href = window.location.href;</script>";
        }
    }
    ?>
    <br><br>
    <div class="row">

        <div class="col-lg-12 ">
            <div class="card">
                <div class="card-body">

                    <h4 class="header-title">SITE SETTINGS</h4>
                    <p class="sub-header">
                        This page makes it easy for the Admin to modify basic site settings
                    </p>

                    <form action="" method="POST">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>Mail</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope"></i></span>
                                    </div>
                                    <input type="text" value="<?= $settings['mda_email'] ?>" class="form-control" placeholder="MDA Email" name="email" aria-label="E-mail" aria-describedby="basic-addon1">
                                </div>
                            </div>

                            <div class="form-group col-md-4">
                                <label>Address</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-map"></i></span>
                                    </div>
                                    <input type="text" value=<?= $settings['mda_address'] ?> class="form-control" placeholder="" name="address" aria-label="" aria-describedby="basic-addon1">
                                </div>
                            </div>


                            <div class="form-group col-md-4">
                                <label>Phone</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-phone"></i></span>
                                    </div>
                                    <input type="text" value=<?= $settings['mda_phone'] ?> class="form-control" name="phone" placeholder="" aria-label="" aria-describedby="basic-addon1">
                                </div>
                            </div>




                            <div class="form-group mb-0 ">

                                <button type="submit" name="updateSettings" class="btn btn-primary waves-effect waves-light">UPDATE SETTINGS</button>
                            </div>
                        </div>

                    </form>

                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div> <!-- end col -->
    </div>


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                <h4 class="header-title">SYSTEM ADMIN</h4>
                   
                    <form action="" method="POST">
                        <?php
                            if(isset($_POST['addUser'])){
                                $fullname = mysqli_real_escape_string($con,$_POST['fullname']);
                                $user_email = mysqli_real_escape_string($con,$_POST['user_email']);
                                $password = md5($_POST['password']);
                                $user_phone = $_POST['user_phone'];

                                $checkq = "SELECT * FROM `users` WHERE `email`='$user_email' AND `password`='$password'";
                                $runcheck = $con->query($checkq);
                                $usr_rw_cnt = mysqli_num_rows($runcheck);

                                if($usr_rw_cnt > 0){
                                    echo "<div class='alert alert-danger' role='alert'>
                                    <i class='fa fa-notification mr-2'></i> User Already Exist !
                                  </div>";
                                }else{
                                    $insert_user = "INSERT INTO `users`(`id`, `fullname`, `email`, `password`, `phone`) VALUES (NULL,'$fullname','$user_email','$password','$user_phone')";
                                    $rq =$con->query($insert_user);
                                    if($rq){
                                        echo "<div class='alert alert-success' role='alert'>
                                        <i class='fa fa-notification mr-2'></i> User Successfully Added !
                                      </div>";

                                      echo "<script>window.location.href = window.location.href;</script>";
                                    }
                                }

                            }
                            
                        ?>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label>Full Name</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Enter Full Name" name="fullname" aria-label="E-mail" aria-describedby="basic-addon1">
                                </div>
                            </div>

                            <div class="form-group col-md-3">
                                <label>Email</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope"></i></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Enter E-mail" name="user_email" aria-label="" aria-describedby="basic-addon1">
                                </div>
                            </div>

                            <div class="form-group col-md-2">
                                <label>Password</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-lock"></i></span>
                                    </div>
                                    <input type="password" class="form-control" name="password" placeholder="********" aria-label="" aria-describedby="basic-addon1">
                                </div>
                            </div>


                            <div class="form-group col-md-2">
                                <label>Phone</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-phone"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="user_phone" placeholder="Enter Phone" aria-label="" aria-describedby="basic-addon1">
                                </div>
                            </div>

                            <div class="form-group col-md-2">
                                <label>---</label>
                                <div class="input-group">
                                    <button class="btn btn-success" type="submit" name="addUser">ADD USER</button>
                                </div>
                            </div>





                        </div>

                    </form>



                    <div class="table-responsive">
                        <table class="table table-centered mb-0" id="inline-editable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>FULL NAME</th>
                                    <th>E-MAIL</th>

                                    <th>PHONE</th>
                                    <th>DELETE</th>

                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $i = 0;
                                while ($user = mysqli_fetch_assoc($runuser)) {
                                    $i++;
                                    ?>

                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= $user['fullname'] ?></td>
                                        <td><?= $user['email'] ?></td>
                                        <td><?= $user['phone'] ?></td>
                                        <td>

                                            <form action="" method="POST">
                                                <input type="hidden" name="postId" value="<?= $content['id'] ?>">
                                                <button class="btn btn-info" name="removePost">EDIT</button>
                                                <button class="btn btn-danger" name="removePost">DELETE</button>
                                        </td>
                                        </form>



                                    </tr>

                                <?php }


                                if (isset($_POST['removePost'])) {
                                    $id = $_POST['postId'];
                                    $query = "DELETE FROM `contents` WHERE `id`='$id'";
                                    $delete = $con->query($query);
                                    if ($delete) {

                                        echo "<script>window.location.href = window.location.href;</script>";
                                    }
                                }

                                ?>
                            </tbody>
                        </table>
                    </div> <!-- end .table-responsive-->
                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div> <!-- end col -->
    </div>







    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                <h4 class="header-title">DEPARTMENTS</h4>
                   
                    <form action="" method="POST">
                        <?php
                            if(isset($_POST['addDepartment'])){
                                $department = mysqli_real_escape_string($con,$_POST['department']);
                               

                                $checkq = "SELECT * FROM `department` WHERE `dept_name`='$department'";
                                $runcheck = $con->query($checkq);
                                $usr_rw_cnt = mysqli_num_rows($runcheck);

                                if($usr_rw_cnt > 0){
                                    echo "<div class='alert alert-danger' role='alert'>
                                    <i class='fa fa-notification mr-2'></i> Department Already Exist !
                                  </div>";
                                }else{
                                    $insert_department = "INSERT INTO `department`(`id`, `dept_name`) VALUES (NULL,'$department')";
                                    $rq =$con->query($insert_department);
                                    if($rq){
                                        echo "<div class='alert alert-success' role='alert'>
                                        <i class='fa fa-notification mr-2'></i> Department Successfully Added !
                                      </div>";

                                      echo "<script>window.location.href = window.location.href;</script>";
                                    }
                                }

                            }
                            
                        ?>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label>Department Name</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Enter Department" name="department" aria-label="E-mail" aria-describedby="basic-addon1">
                                </div>
                            </div>

                           

                         

                            <div class="form-group col-md-2">
                                <label>---</label>
                                <div class="input-group">
                                    <button class="btn btn-success" type="submit" name="addDepartment">ADD DEPARTMENT</button>
                                </div>
                            </div>





                        </div>

                    </form>



                    <div class="table-responsive">
                        <table class="table table-centered mb-0" id="inline-editable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Department</th>
                                    <th>Actions</th>
                                   

                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $i = 0;
                                while ($department = mysqli_fetch_assoc($rundept)) {
                                    $i++;
                                    ?>

                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?=$department['dept_name']?></td>
                                       
                                        <td>

                                            <form action="" method="POST">
                                                <input type="hidden" name="deptId" value="<?= $department['id'] ?>">
                                            
                                                <button type="submit" class="btn btn-danger" name="removeDept">DELETE</button>
                                        </td>
                                        </form>



                                    </tr>

                                <?php }


                                if (isset($_POST['removeDept'])) {
                                    $id = $_POST['deptId'];
                                    $query = "DELETE FROM `department` WHERE `id`='$id'";
                                    $delete = $con->query($query);
                                    if ($delete) {

                                        echo "<script>window.location.href = window.location.href;</script>";
                                    }
                                }

                                ?>
                            </tbody>
                        </table>
                    </div> <!-- end .table-responsive-->
                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div> <!-- end col -->
    </div>
<?php
}
?>