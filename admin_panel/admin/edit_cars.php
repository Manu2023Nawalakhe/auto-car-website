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
            <h4 class="page-title">Add Car</h4>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="view_cars.php">View Car</a></li>
              <li class="breadcrumb-item active" aria-current="page">Edit Car</li>
            </ol>
          </div>
        </div>
        <!-- End Breadcrumb-->

        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header text-uppercase">Car Details</div>
              <div class="card-body">
                <?php
                // Fetch service details
                $unique_id = $_GET['unique_id'];
                $result = mysqli_query($conn, "SELECT * FROM `tbl_car` WHERE `is_del`='approved' AND `unique_id`='$unique_id'");
                if ($row = $result->fetch_object()) {
                  $unique_id = $row->unique_id;
                  $car_company = $row->car_company;
                  $car_name = $row->car_name;
                  $car_description = $row->car_description;
                  $car_image = $row->car_image;
                  $keywords = $ns->keywords;
                ?>
                  <form method="post" action="update_cars.php" enctype="multipart/form-data">
                    <input type="hidden" name="unique_id" value="<?php echo $unique_id; ?>">

                    <div class="row">
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label for="car_company">Car Company Name</label>
                          <input type="text" class="form-control" id="car_company" name="car_company" value="<?php echo $car_company; ?>">
                        </div>
                        <div class="form-group">
                          <label for="car_name">Car Name</label>
                          <input type="text" class="form-control" id="car_name" name="car_name" value="<?php echo $car_name; ?>">
                        </div>
                        <div class="form-group">
                          <label for="car_description">Write Description</label>
                          <textarea class="form-control" id="summernoteEditor1" name="car_description" cols="50" rows="5"><?php echo $car_description; ?></textarea>
                        </div>
                      </div>

                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="car_image">Car Image</label>
                          <input type="file" class="form-control" id="car_image" name="new_car_image">
                          <input type="hidden" name="old_car_image" value="<?php echo $car_image; ?>">
                          <br>
                          <?php if (empty($car_image)) { ?>
                            <img src="https://icon-library.com/images/ios-gallery-icon/ios-gallery-icon-29.jpg" style="width:200px; height:200px;border-radius:20px;">
                          <?php } else { ?>
                            <img src="car_image/<?php echo $car_image; ?>" style="width:200px; height:200px;border-radius:20px;">
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