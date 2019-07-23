<?php
if (isset($_GET['gallery'])) {
    $query = "SELECT * FROM `gallery`";
    $run1 = $con->query($query);



    $doc_q = "SELECT * FROM `documents`";
    $rund = $con->query($doc_q)
    ?>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">ADD DOCUMENT</h4>
                    <?php

                    if (isset($_POST['addDocs'])) {
                        $doc_title =mysqli_real_escape_string($con,$_POST['doc_title']);

                        $name = $_FILES['doc']['name'];
                        $tmpname = $_FILES['doc']['tmp_name'];

                        if ($name) {
                            $location = BASEURL . '/bos/uploads/documents/' . $name;
                            $doc_path = 'uploads/documents/' . $name;
                            move_uploaded_file($tmpname, $location);
                            $query = "INSERT INTO `documents`(`id`,`title`,`doc_desc`,`doc_path`) VALUES (NULL,'$doc_title','description','$doc_path')";
                            if ($con->query($query)) {
                                echo "<div class='alert alert-success' role='alert'>
                                        <i class='fa fa-check-all mr-2'></i> Uploaded <strong>successfully</strong> !
                                      </div>";
                                      echo "<script>window.location.href = window.location.href;</script>";
                            }
                        }
                    }

                    ?>

                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4" class="col-form-label">Document Title</label>
                                <input type="text" name="doc_title" class="form-control" placeholder="Enter Document Title">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4" class="col-form-label">Select Document</label>
                                <input type="file" class="form-control" name="doc">
                            </div>
                        </div>




                        <button type="submit" name="addDocs" class="btn btn-primary waves-effect waves-light">Upload</button>

                    </form>

                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col -->

        <div class="col-lg-12">
            <div class="card-box">
                <h4 class="header-title">ADD DOCUMENTS</h4>
                <?php 
      if (isset($_POST['deleteDoc'])) {
        $id = $_POST['docId'];
        $query = "DELETE FROM `documents` WHERE `id`='$id'";
        $delete = $con->query($query);
        if ($delete) {
        
            echo "<script>window.location.href = window.location.href;</script>";
        }
    }
    ?>    
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>TITLE</th>
                                <th>DESCRIPTION</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $counter = 0;
                            while ($doc = mysqli_fetch_assoc($rund)) {
                                $counter += 1;
                                ?>

                                <tr>
                                    <th scope="row"><?=$counter?></th>
                                    <td><?= $doc['title'] ?></td>
                                    <td><?= $doc['doc_desc'] ?></td>
                                    <td>
                                        <form action="" method="POST">
                                            <input type="hidden" value="<?=$doc['id']?>" name="docId">
                                            <button type="submit" class="btn btn-success waves-effect waves-light" name="deleteDoc">DELETE</button>
                                            
                                        </form>    
                                  
                                    </td>
                                </tr>
                            <?php } ?>

                        </tbody>
                    </table>
                </div> <!-- end table-responsive-->

            </div> <!-- end card-box -->
        </div> <!-- end col -->

    </div>
    <br><br>
    <h4 class="header-title">ADD IMAGES TO GALLERY</h4>
                          
    <button type="button" class="btn btn-success waves-effect waves-light" data-toggle="modal" data-target="#con-close-modal">Add Image</button>
    <?php 
      if (isset($_POST['deleteImage'])) {
        $id = $_POST['imageId'];
        $query = "DELETE FROM `gallery` WHERE `id`='$id'";
        $delete = $con->query($query);
        if ($delete) {
        
            echo "<script>window.location.href = window.location.href;</script>";
        }
    }
    ?>    
    <br><br><br>
    <div class="row">

        <?php while ($image = mysqli_fetch_assoc($run1)) { ?>
            <div class="col-lg-6 col-xl-3">
                <div class="card">
                    <img class="card-img-top img-fluid" src="..<?= $image['image_path'] ?>" alt="Card image cap">

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><?= $image['title'] ?></li>
                    </ul>
                    <div class="card-body">
                        <form action="" method="POST">
                            <input type="hidden" name="imageId" value="<?=$image['id']?>">
                            <center><button type="submit" name="deleteImage" class="btn btn-danger">Delete</button></center>
                        </form>
                       

                    </div>
                </div>
            </div><!-- end col -->




        <?php } ?>


    </div>


    <?php

    function resizeImage($resourceType, $image_width, $image_height)
    {
        $resizeWidth = 600;
        $resizeHeight = 400;
        $imageLayer = imagecreatetruecolor($resizeWidth, $resizeHeight);
        imagecopyresampled($imageLayer, $resourceType, 0, 0, 0, 0, $resizeWidth, $resizeHeight, $image_width, $image_height);
        return $imageLayer;
    }

    if (isset($_POST['add'])) {
        $imagetitle = $_POST['title'];

        if (isset($_FILES['photo'])) {
            $imageProcess = 0;
            $file_name = $_FILES['photo']['tmp_name'];
            $fileExt = end($fileExt);
            $sourceProperties = getimagesize($file_name);
            $resizeFileName = "thump_" . time();
            $uploadPath = BASEURL . '/bos/uploads/gallery/';
            @$fileExt = explode('.', $_FILES['photo']['name']);
            $uploadImageType = $sourceProperties[2];
            $sourceImageWidth = $sourceProperties[0];
            $sourceImageHeight = $sourceProperties[1];
            $uploadName = $resizeFileName . "." . $fileExt;
            $dbpath = '/uploads/gallery/' . $uploadName;

            switch ($uploadImageType) {
                case IMAGETYPE_JPEG:
                    $resourceType = imagecreatefromjpeg($file_name);
                    $imageLayer = resizeImage($resourceType, $sourceImageWidth, $sourceImageHeight);
                    imagejpeg($imageLayer, $uploadPath . $resizeFileName . '.' . $fileExt);
                    break;

                case IMAGETYPE_GIF:
                    $resourceType = imagecreatefromjpeg($file_name);
                    $imageLayer = resizeImage($resourceType, $sourceImageWidth, $sourceImageHeight);
                    imagegif($imageLayer, $uploadPath . $resizeFileName . '.' . $fileExt);
                    break;

                case IMAGETYPE_PNG:
                    $resourceType = imagecreatefromjpeg($file_name);
                    $imageLayer = resizeImage($resourceType, $sourceImageWidth, $sourceImageHeight);
                    imagepng($imageLayer, $uploadPath . $resizeFileName . '.' . $fileExt);
                    break;

                default:
                    $imageProcess = 0;
                    break;
            };



            move_uploaded_file($file, $uploadPath . $resizeFileName . "." . $fileExt);

            $insert = "INSERT INTO `gallery`(`id`, `title`, `image_path`) VALUES (NULL,'$imagetitle','$dbpath')";
            $runinsert = $con->query($insert);

            echo "<script>window.location.href = window.location.href;</script>";
        }
    }
}



?>


<div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Modal Content is Responsive</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body p-4">
                <div class="card">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="card-body">
                            <h5 class="card-title">Gallery</h5>

                            <div class="form-group row">

                                <div class="col-md-9">
                                    <input type="text" id="TextInput" name="title" class="form-control" placeholder="Enter Title">
                                </div>
                            </div>



                            <div class="form-group row">
                                <label class="col-md-3">File Upload</label>
                                <div class="col-md-9">

                                    <input type="file" name="photo" id="profile-img" required /><br><br>
                                    <img src="" id="profile-img-tag" width="200px" />
                                    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
                                    <script type="text/javascript">
                                        function readURL(input) {
                                            if (input.files && input.files[0]) {
                                                var reader = new FileReader();

                                                reader.onload = function(e) {
                                                    $('#profile-img-tag').attr('src', e.target.result);
                                                }
                                                reader.readAsDataURL(input.files[0]);
                                            }
                                        }
                                        $("#profile-img").change(function() {
                                            readURL(this);
                                        });
                                    </script><br>


                                </div>
                            </div>

                        </div>
                        <div class="border-top">
                            <div class="card-body">
                                <center><button type="submit" name="add" class="btn btn-primary">Add to Gallery</button>
                                </center>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>