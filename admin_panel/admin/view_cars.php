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
            <h4 class="page-title">View Car</h4>
          </div>
        </div>
        <!-- End Breadcrumb-->

        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header">
                <a href="add_cars.php" style="color:white;">
                  <button type="button" class="btn btn-primary btn-round waves-effect waves-light m-1">Add New Car</button>
                </a>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table id="example" class="table table-bordered">
                    <thead>
                      <tr>
                        <th>Id</th>
                        <th>Action</th>
                        <th>Car Company Name</th>
                        <th>Car Name</th>
                        <th>Car Description</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $count = 1;
                      $result = mysqli_query($conn, "SELECT * FROM `tbl_car` WHERE `is_del`='approved'");
                      while ($row = $result->fetch_object()) {
                        $unique_id = $row->unique_id;
                        $car_company = $row->car_company;
                        $car_name = $row->car_name;
                        $car_description = $row->car_description;
                        $car_image = $row->car_image;
                        $keywords = $ns->keywords;
                      ?>
                        <tr>
                          <td><?php echo $count; ?></td>
                          <td>
                            <div class="dropdown">
                              <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a href="delete_cars.php?unique_id=<?php echo $unique_id; ?>" class="dropdown-item">
                                  <i class="fa fa-trash"></i>&nbsp; Delete
                                </a>
                                <a href="edit_cars.php?unique_id=<?php echo $unique_id; ?>" class="dropdown-item">
                                  <i class="fa fa-pencil"></i>&nbsp; Edit
                                </a>
                              </div>
                            </div>
                          </td>
                          <td>
                            <?php echo $car_company; ?>
                            <br><br>
                            <img src="car_image/<?php echo $car_image ?>" style="width:200px;height:150px;border-radius:20px;">
                          </td>
                          <td><?php echo $car_name; ?></td>
                          <td>
                            <?php
                            $charLimit1 = 200;
                            if (strlen($car_description) > $charLimit1) {
                              $truncatedContent1 = substr($car_description, 0, $charLimit1);
                              $remainingContent1 = substr($car_description, $charLimit1);

                              echo '<div id="content">';
                              echo '<div id="truncated-content1">' . wordwrap($truncatedContent1, 40, "<br>", true) . '<span id="dots1">...</span> ';
                              echo '<a href="javascript:void(0);" id="read-more-link1">Read More</a></div>';
                              echo '<div id="remaining-content1" style="display:none;">' . wordwrap($remainingContent1, 40, "<br>", true) . ' ';
                              echo '<a href="javascript:void(0);" id="read-less-link1">Read Less</a></div>';
                              echo '</div>';
                            } else {
                              echo wordwrap($car_description, 40, "<br>", true);
                            }
                            ?>
                          </td>
                        </tr>
                      <?php
                        $count++;
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div><!-- End Row-->
      </div><!-- End container-fluid-->
    </div><!-- End content-wrapper-->

    <!-- Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i></a>
    <!-- End Back To Top Button-->

    <!-- Start footer-->
    <?php
    js();
    footer();
    ?>
    <!-- End footer-->

  </div><!-- End wrapper-->

  <script>
    document.getElementById('read-more-link1').addEventListener('click', function() {
      document.getElementById('truncated-content1').style.display = 'none';
      document.getElementById('remaining-content1').style.display = 'block';
      document.getElementById('dots1').style.display = 'none';
    });

    document.getElementById('read-less-link1').addEventListener('click', function() {
      document.getElementById('truncated-content1').style.display = 'block';
      document.getElementById('remaining-content1').style.display = 'none';
      document.getElementById('dots1').style.display = 'inline';
    });
  </script>
</body>

</html>