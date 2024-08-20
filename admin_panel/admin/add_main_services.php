<?php

include "../../db_connection.php";
include "comman_function.php";

// Check if the admin is logged in
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
            <!-- Breadcrumb -->
            <div class="row pt-2 pb-2">
                <div class="col-sm-9">
                    <h4 class="page-title">Add New Services</h4>
                </div>
            </div>
            <!-- End Breadcrumb -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form method="post" action="insert_main_services.php" enctype="multipart/form-data">

                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Enter Service Name</label>
                                        <input type="text" class="form-control" name="services_name" required placeholder="Enter Service Name" style="color:gray;padding:10px;border-color:gray;border-radius:10px;"><br>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Upload Service Image</label>
                                        <input type="file" class="form-control" name="service_image" required style="color:gray;padding:10px;border-color:gray;border-radius:10px;"><br>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Service Heading</label>
                                        <input type="text" class="form-control" name="service_heading" required placeholder="Enter Heading" style="color:gray;padding:10px;border-color:gray;border-radius:10px;"><br>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Service Description</label>
                                        <input type="text" class="form-control" name="services_desc" required placeholder="Enter Description" style="color:gray;padding:10px;border-color:gray;border-radius:10px;"><br>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <button type="submit" class="btn btn-primary shadow-primary px-5" name="submit" id="submit"><i class="icon-lock"></i> Add</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End container-fluid -->
    </div>
    <?php footer_tag(); ?>
    <?php js(); ?>
</body>

</html>