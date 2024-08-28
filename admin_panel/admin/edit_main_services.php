<?php
session_start();
include "../../db_connection.php";
include "comman_function.php";

// Ensure the admin is logged in
if (!empty($_SESSION['admin_id'])) {
    $user_id = $_SESSION['admin_id'];
} else {
    session_destroy();
    echo '<script>window.location = "../index.php";</script>';
    exit;
}

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

        <div class="clearfix"></div>
        <div class="content-wrapper">
            <div class="container-fluid">
                <!-- Breadcrumb-->
                <div class="row pt-2 pb-2">
                    <div class="col-sm-9">
                        <h4 class="page-title">Add Services</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="view_main_services.php">View Services</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Service</li>
                        </ol>
                    </div>
                </div>
                <!-- End Breadcrumb-->

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header text-uppercase">Service Details</div>
                            <div class="card-body">
                                <?php
                                // Fetch service details
                                $unique_id = $_GET['unique_id'];
                                $result = mysqli_query($conn, "SELECT * FROM `tbl_services` WHERE `is_del`='approved' AND `unique_id`='$unique_id'");
                                if ($row = $result->fetch_object()) {
                                    $service_name = $row->service_name;
                                    $service_heading = $row->service_heading;
                                    $service_description = $row->service_description;
                                    $service_image = $row->service_image;
                                    $keywords= $ns->keywords;
                                ?>
                                    <form method="post" action="update_main_services.php" enctype="multipart/form-data">
                                        <input type="hidden" name="unique_id" value="<?php echo $unique_id; ?>">

                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="service_name">Service Name</label>
                                                    <input type="text" class="form-control" id="service_name" name="service_name" value="<?php echo $service_name; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="service_heading">Service Heading</label>
                                                    <input type="text" class="form-control" id="service_heading" name="service_heading" value="<?php echo $service_heading; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="service_description">Write Description</label>
                                                    <textarea class="form-control" id="summernoteEditor1" name="service_description" cols="50" rows="5"><?php echo $service_description; ?></textarea>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="service_image">Service Image</label>
                                                    <input type="file" class="form-control" id="service_image" name="new_service_image">
                                                    <input type="hidden" name="old_service_image" value="<?php echo $service_image; ?>">
                                                    <br>
                                                    <?php if (empty($service_image)) { ?>
                                                        <img src="https://icon-library.com/images/ios-gallery-icon/ios-gallery-icon-29.jpg" style="width:200px; height:200px;border-radius:20px;">
                                                    <?php } else { ?>
                                                        <img src="servicesImage/<?php echo $service_image; ?>" style="width:200px; height:200px;border-radius:20px;">
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>

                                        <br>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <button type="submit" class="btn btn-primary shadow-primary px-5" name="submit" id="submit"><i class="icon-lock"></i> Update </button>
                                            </div>
                                        </div>
                                    </form>
                                <?php } else { ?>
                                    <div class="alert alert-warning" role="alert">
                                        Service not found.
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div><!-- End Row-->

            </div><!-- End container-fluid-->
        </div><!-- End content-wrapper-->

        <!-- Start Back To Top Button-->
        <a href="javascript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i></a>
        <!-- End Back To Top Button-->

        <!-- Start footer-->
        <?php
        js();
        footer();
        ?>
        <!-- End footer-->

        <script src="assets/plugins/summernote/dist/summernote-bs4.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#summernoteEditor1').summernote({
                    height: 150,
                    tabsize: 1
                });
            });

            // Image preview functionality
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#blah').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }
            $("#service_image").change(function() {
                readURL(this);
            });
        </script>
</body>

</html>