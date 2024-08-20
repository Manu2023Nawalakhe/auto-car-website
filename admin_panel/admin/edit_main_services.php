<?php

// Enable error reporting during development
// error_reporting(E_ALL); // Uncomment this line during development
error_reporting(0); // For production

include "../../db_connection.php";
include "comman_function.php";

// Check if admin is logged in
session_start();
$admin_id = $_SESSION['admin_id'];
if (!empty($_SESSION['admin_id'])) {
  $admin_id = $_SESSION['admin_id'];
  $admin_name = $_SESSION['admin_name'];
} else {
  session_destroy();
  echo "<script>";
  echo "window.location='../index.php'";
  echo "</script>";
} ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php meta(); ?>
    <?php css(); ?>
</head>

<body>
    <?php header_tag(); ?>

    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumb-->
            <div class="row pt-2 pb-2">
                <div class="col-sm-9">
                    <h4 class="page-title">Update Services</h4>
                </div>
            </div>
            <!-- End Breadcrumb-->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <!--<div class="card-header text-uppercase bg-white"></div>-->
                        <div class="card-body">
                            <?php
                            // Sanitize and validate the input
                            if (isset($_GET['unique_id'])) {
                                $unique_id = mysqli_real_escape_string($conn, $_GET['unique_id']);

                                // Fetch the service details
                                $fetch_service = mysqli_query($conn, "SELECT * FROM `tbl_services` WHERE `is_del`='approved' AND `unique_id`='$unique_id'");

                                if ($fetch_service && $fcs = $fetch_service->fetch_object()) {
                                    $unique_id = htmlspecialchars($fcs->unique_id);
                                    $services_name = htmlspecialchars($fcs->services_name);
                                    $services_image = htmlspecialchars($fcs->service_image);
                                    $services_heading = htmlspecialchars($fcs->services_heading);
                                    $services_desc = htmlspecialchars($fcs->services_desc);
                            ?>
                                    <form method="post" action="update_main_services.php" enctype="multipart/form-data">
                                        <input type="hidden" value="<?php echo $unique_id; ?>" class="form-control" name="unique_id">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Update Service Name</label>
                                                <input type="text" style="color:gray;padding:10px;border-color:gray;border-radius:10px;" value="<?php echo $services_name; ?>" class="form-control" name="services_name" placeholder="Enter Services Name" required><br>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Update Service Image</label>
                                                <input type="file" style="color:gray;padding:10px;border-color:gray;border-radius:10px;" class="form-control" name="service_image"><br>
                                                <?php if (!empty($services_image)) { ?>
                                                    <img src="servicesImage/<?php echo $services_image; ?>" alt="Service Image" style="max-width: 100px;">
                                                <?php } ?>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Update Service Heading</label>
                                                <input type="text" style="color:gray;padding:10px;border-color:gray;border-radius:10px;" value="<?php echo $services_heading; ?>" class="form-control" name="services_heading" placeholder="Enter Services Heading" required><br>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Service Description</label>
                                                <input type="text" class="form-control" name="services_desc" required placeholder="Enter Description" style="color:gray;padding:10px;border-color:gray;border-radius:10px;"><br>
                                            </div>
                                        </div>


                                        <br>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <button type="submit" class="btn btn-primary shadow-primary px-5" name="submit" id="submit"><i class="icon-lock"></i> Update</button>
                                            </div>
                                        </div>
                                    </form>
                                <?php } else { ?>
                                    <p>Service not found or has been deleted.</p>
                                <?php }
                            } else { ?>
                                <p>Invalid Service ID.</p>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End container-fluid-->
    </div>

    <?php footer(); ?>
    <?php js(); ?>
</body>

</html>