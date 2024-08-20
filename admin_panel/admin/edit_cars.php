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
          <h4 class="page-title">Update Car</h4>
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
                $fetch_car = mysqli_query($conn, "SELECT * FROM `tbl_car` WHERE `is_del`='approved' AND `unique_id`='$unique_id'");

                if ($fetch_car && $fcs = $fetch_car->fetch_object()) {
                  $unique_id = htmlspecialchars($fcs->unique_id);
                  $car_company = htmlspecialchars($fcs->car_company);
                  $car_image = htmlspecialchars($fcs->car_image);
                  $car_name = htmlspecialchars($fcs->car_name);
                  $car_price = htmlspecialchars($fcs->car_price);
              ?>
                  <form method="post" action="update_cars.php" enctype="multipart/form-data">
                    <input type="hidden" value="<?php echo $unique_id; ?>" class="form-control" name="unique_id">

                    <div class="row">
                      <div class="col-md-6">
                        <label>Update Company Name</label>
                        <input type="text" style="color:gray;padding:10px;border-color:gray;border-radius:10px;" value="<?php echo $car_company; ?>" class="form-control" name="car_company" placeholder="Enter Company Name" required><br>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <label>Update Image</label>
                        <input type="file" style="color:gray;padding:10px;border-color:gray;border-radius:10px;" class="form-control" name="car_image"><br>
                        <?php if (!empty($car_image)) { ?>
                          <img src="car_image/<?php echo $car_image; ?>" alt="Car Image" style="max-width: 100px;">
                        <?php } ?>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <label>Update Car Name</label>
                        <input type="text" style="color:gray;padding:10px;border-color:gray;border-radius:10px;" value="<?php echo $car_name; ?>" class="form-control" name="car_name" placeholder="Enter Car Name" required><br>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <label>Car Price</label>
                        <input type="text" class="form-control" name="car_price" required placeholder="Enter Description" style="color:gray;padding:10px;border-color:gray;border-radius:10px;"><br>
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
                  <p>Car not found or has been deleted.</p>
                <?php }
              } else { ?>
                <p>Invalid Car ID.</p>
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