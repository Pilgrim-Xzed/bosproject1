<?php
if (isset($_GET['stats'])) {
    $getCnt = "SELECT * FROM `contents`";
    $runcnt = $con->query($getCnt)
    ?>
    <script>
        var editor = new Quill('.editor');
    </script>
    <br><br>
    <div class="row">
        <div class="col-md-6 col-xl-3">
            <div class="card-box">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-sm bg-blue shadow-lg rounded">
                            <i class="fa fa-dashboard ml-1 mt-1 avatar-title font-22 text-white"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-right">

                            <p class="text-muted mb-1 text-truncate">DASHBOARD</p>
                        </div>
                    </div>
                </div>

            </div> <!-- end card-box-->
        </div> <!-- end col -->

        <div class="col-md-6 col-xl-3">
            <div class="card-box">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-sm bg-success shadow-lg rounded">
                            <i class="fa fa-folder mt-1 ml-1 avatar-title font-22 text-white"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-right">
                            <p class="text-muted mb-1 text-truncate">DOCUMENTS</p>
                        </div>
                    </div>
                </div>

            </div> <!-- end card-box-->
        </div> <!-- end col -->

        <div class="col-md-6 col-xl-3">
            <div class="card-box">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-sm bg-warning shadow-lg rounded">
                            <i class="fa fa-image mt-1 ml-1 avatar-title font-22 text-white"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-right">
                            <p class="text-muted mb-1 text-truncate">WORKS</p>
                        </div>
                    </div>
                </div>

            </div> <!-- end card-box-->
        </div> <!-- end col -->

        <div class="col-md-6 col-xl-3">
            <div class="card-box">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-sm bg-info shadow-lg rounded">
                            <i class="fa fa-edit ml-1 mt-1 avatar-title font-22 text-white"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-right">
                            <p class="text-muted mb-1 text-truncate">CONTENTS</p>
                        </div>
                    </div>
                </div>

            </div> <!-- end card-box-->
        </div> <!-- end col -->
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h5 class="mt-0">Inline edit</h5>
                    <button type="button" class="btn btn-info waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-lg">Add Content</button><br><br>
                    <div class="table-responsive">
                        <table class="table table-centered mb-0" id="inline-editable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>DATE & TIME</th>

                                    <th>Delete</th>
                                    <th>Edit</th>

                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $i = 0;
                                while ($content = mysqli_fetch_assoc($runcnt)) {
                                    $i++;
                                    ?>

                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= $content['content_title'] ?></td>
                                        <td><?= $content['posted_on'] ?></td>

                                        <td>

                                            <form action="" method="POST">
                                                <input type="hidden" name="postId" value="<?= $content['id'] ?>">
                                                <button class="btn btn-danger" name="removePost">Delete</button>
                                        </td>
                                        </form>
                                        </td>
                                        <td><button class="btn btn-success">Edit</button></td>

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
<?php
}


function resizeImage($resourceType, $image_width, $image_height)
{
    $resizeWidth = 600;
    $resizeHeight = 400;
    $imageLayer = imagecreatetruecolor($resizeWidth, $resizeHeight);
    imagecopyresampled($imageLayer, $resourceType, 0, 0, 0, 0, $resizeWidth, $resizeHeight, $image_width, $image_height);
    return $imageLayer;
}

if (isset($_POST['addContent'])) {
    $content_title = mysqli_real_escape_string($con, $_POST['post_title']);
    $content_desc = mysqli_real_escape_string($con, $_POST['content_desc']);
    $timeposted = date('Y-m-d H:i:s');
    if (isset($_FILES['image'])) {
        $imageProcess = 0;
        $file_name = $_FILES['image']['tmp_name'];
        $fileExt = end($fileExt);
        $sourceProperties = getimagesize($file_name);
        $resizeFileName = "thump_" . time();
        $uploadPath = BASEURL . '/bos/uploads/gallery/';
        @$fileExt = explode('.', $_FILES['image']['name']);
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




        $insertq = "INSERT INTO `contents`(`id`,`content_title`,`content_img`,`content_desc`,`posted_on`) VALUES (NULL,'$content_title','$dbpath','$content_desc','$timeposted')";
        $runinsert1 = $con->query($insertq);

        if ($runinsert1) {
            echo "<script>window.location.href = window.location.href;</script>";
        } else {
            echo "failed";
        }
    }
}

?>

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Large modal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group mb-3">
                        <label for="example-input-normal">Normal</label>
                        <input type="text" name="post_title" class="form-control" placeholder="Normal">
                    </div>


                    <div class="form-group mb3">
                        <label class="col-md-3">File Upload</label>
                        <div class="col-md-9">

                            <input type="file" name="image" id="profile-img" required /><br><br>
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

                    <div class="form-group mb-3">
                        <label for="example-input-normal">Normal</label>
                        <textarea name="content_desc" id="" cols="30" rows="10"></textarea>
                    </div>

                    <center> <button type="submit" name="addContent" class="btn btn-danger">POST CONTENT</button></center>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>