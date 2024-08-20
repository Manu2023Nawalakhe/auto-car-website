<?php
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
      <!-- Breadcrumb -->
      <div class="row pt-2 pb-2">
        <div class="col-sm-9">
          <h4 class="page-title">View Car</h4>
        </div>
      </div>
      <!-- End Breadcrumb -->

      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header">
              <i class="fa fa-table"></i> Select
              <a href="add_cars.php">
                <button type="button" class="btn btn-primary waves-effect waves-light m-1">Add New Car</button>
              </a>
            </div>

            <div class="card-body">
              <div class="table-responsive">
                <table id="example" class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Action</th>
                      <th>Sr.No</th>
                      <th>Car Company</th>-
                      <th>Car Image</th>
                      <th>Car Name</th>
                      <th>Car Price</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $count = 1;
                    $fetch_car = mysqli_query($conn, "SELECT * FROM `tbl_car` WHERE `is_del`='approved'");

                    if ($fetch_car) {
                      while ($car = $fetch_car->fetch_object()) {
                        $unique_id = htmlspecialchars($car->unique_id);
                        $car_company = htmlspecialchars($car->car_company);
                        $car_image = htmlspecialchars($car->car_image);
                        $car_name = htmlspecialchars($car->car_name);
                        $car_price = htmlspecialchars($car->car_price);
                    ?>
                        <tr>
                          <td>
                            <div class="dropdown">
                              <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Action
                              </button>
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="edit_cars.php?unique_id=<?php echo $unique_id; ?>">Edit</a>
                                <a class="dropdown-item" href="delete_cars.php?unique_id=<?php echo $unique_id; ?>" onclick="return confirm('Are you sure you want to delete this car?');">Delete</a>
                              </div>
                            </div>
                          </td>
                          <td><?php echo $count; ?></td>
                          <td><?php echo  $car_company; ?></td>
                          <td class="center"><img src="car_image/<?php echo $car_image; ?>" height="150px" width="150px" alt="Car Image"></td>
                          <td><?php echo   $car_name; ?></td>
                          <td style="height:50px;width:20%;text-overflow: none;"><?php echo $car_price; ?></td>
                        </tr>
                    <?php
                        $count++;
                      }
                    } else {
                      echo '<tr><td colspan="6">No Car found.</td></tr>';
                    }
                    ?>
                  </tbody>
                </table>

              </div>
            </div>
          </div>
        </div><!-- End Row -->

      </div><!-- End container-fluid -->
    </div><!-- End content-wrapper -->

  </div>

  <?php footer(); ?>
  <?php js(); ?>
</body>

</html>