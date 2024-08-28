<?php
session_start();
include "../../db_connection.php";
include "comman_function.php";

// Check if the admin is logged in
if (!isset($_SESSION['admin_id'])) {
    session_destroy();
    echo "<script>window.location = '../index.php'</script>";
    exit();
}

$admin_id = $_SESSION['admin_id'];
error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php meta(); ?>
    <?php css(); ?>
</head>

<body>

    <!-- Start wrapper-->
    <div id="wrapper">

        <?php header_tag(); ?>
        <!--Start sidebar-wrapper-->
        <div class="clearfix"></div>
        <div class="content-wrapper">
            <div class="container-fluid">
                <!-- Breadcrumb-->
                <div class="row pt-2 pb-2">
                    <div class="col-sm-9">
                        <h4 class="page-title">Add Car</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="view_cars.php">View Car</a></li>
                            <li class="breadcrumb-item active"><a href="#">Add Car</a></li>
                        </ol>
                    </div>
                </div>
                <!-- End Breadcrumb-->

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header text-uppercase">Car Details</div>
                            <div class="card-body">
                                <form method="post" action="insert_cars.php" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="car_company">Car Company Name</label>
                                                <input class="form-control" id="car_company" name="car_company" type="text" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="car_name">Car Name</label>
                                                <input class="form-control" id="car_name" name="car_name" type="text" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="summernoteEditor1">Write Car Description</label>
                                                <textarea class="form-control" name="car_description" id="summernoteEditor1" cols="50" rows="5" tabindex="4" required></textarea>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="car_image">Car Image</label>
                                                <input class="form-control-file" id="imgInp" name="car_image" type="file" required>
                                            </div>
                                            <img id="blah" src="https://icon-library.com/images/ios-gallery-icon/ios-gallery-icon-29.jpg" style="width:200px; height:200px;border-radius:20px;">
                                        </div>
                                    </div>

                                    <br>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <button type="submit" class="btn btn-primary shadow-primary px-5" name="submit" id="submit"><i class="icon-lock"></i> Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div><!-- End Row -->
            </div>
            <!-- End container-fluid -->
        </div><!-- End content-wrapper -->

        <!-- Start footer -->
        <?php footer(); ?>
        <?php js(); ?>

        <script src="assets/plugins/summernote/dist/summernote-bs4.min.js"></script>
        <script>
            $('#summernoteEditor1').summernote({
                height: 150,
                tabsize: 1
            });

            function readURL(input, targetID) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#' + targetID).attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("#imgInp").change(function() {
                readURL(this, 'blah');
            });
        </script>
</body>

</html>