<?php
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
}

include "comman_function.php";
include "../../db_connection.php";


error_reporting(0);
?>


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

      <!--Start Dashboard Content-->

      <div class="row mt-3" style="height:200px;">



        <div class="col-12 col-lg-6 col-xl-3">
          <div class="card gradient-bloody" style="height:120px;">
            <a href="#">
              <div class="card-body">
                <div class="media align-items-center">
                  <div class="media-body">

                    <p class="text-white">Customer Count</p>
                    <h3 class="text-white line-height-5 my-4">200+</h3>

                  </div>
                  <div class="w-circle-icon rounded-circle border border-white">
                    <i class="fa fa-users text-white"></i>
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>
        <div class="col-12 col-lg-6 col-xl-3">
          <div class="card gradient-bloody" style="height:120px;">
            <a href="#">
              <div class="card-body">
                <div class="media align-items-center">
                  <div class="media-body">

                    <p class="text-white">Completed Project</p>
                    <h3 class="text-white line-height-5 my-4">150+</h3>

                  </div>
                  <div class="w-circle-icon rounded-circle border border-white">
                    <i class="fa fa-users text-white"></i>
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>

        <div class="col-12 col-lg-6 col-xl-3">
          <div class="card gradient-bloody" style="height:120px;">
            <a href="#">
              <div class="card-body">
                <div class="media align-items-center">
                  <div class="media-body">

                    <p class="text-white">In Process Work</p>
                    <h3 class="text-white line-height-5 my-4">40</h3>

                  </div>
                  <div class="w-circle-icon rounded-circle border border-white">
                    <i class="fa fa-users text-white"></i>
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>


      </div><!--End Row-->



      <!--End Dashboard Content-->

    </div>
    <!-- End container-fluid-->


    <?php
    js();

    ?>


</body>

</html>