<?php
session_start();
include "../../db_connection.php";
include "comman_function.php";

// Session validation
if (!isset($_SESSION['admin_id']) || empty($_SESSION['admin_id'])) {
  session_destroy();
  echo "<script>window.location = '../index.php';</script>";
  exit();
}

$admin_id = $_SESSION['admin_id'];

// Consider turning error reporting off in production
error_reporting(E_ALL & ~E_NOTICE);
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
    <!-- Start sidebar-wrapper-->
    <div class="clearfix"></div>
    <div class="content-wrapper">
      <div class="container-fluid">
        <!-- Breadcrumb-->
        <div class="row pt-2 pb-2">
          <div class="col-sm-9">
            <h4 class="page-title">Write Blog</h4>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="view_blogs.php">View Blog</a></li>
              <li class="breadcrumb-item"><a href="#">Add Blogs</a></li>
            </ol>
          </div>
        </div>
        <!-- End Breadcrumb-->

        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header text-uppercase">News Details</div>
              <div class="card-body">
                <form method="post" action="insert_blogs.php" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label for="news_title">Blog Title</label>
                        <input class="form-control" id="news_title" name="blog_title" type="text" required>
                      </div>

                      <div class="form-group">
                        <label for="summernoteEditor1">Write Description</label>
                        <textarea class="form-control" name="blog_description" id="summernoteEditor1" cols="50" rows="5" tabindex="4" required></textarea>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="news_image">Blog Image</label>
                        <input class="form-control-file" id="news_image" name="blog_image" type="file" accept="image/*" required>
                        <br>
                        <img src="https://icon-library.com/images/ios-gallery-icon/ios-gallery-icon-29.jpg" id="imagePreview" style="width:200px; height:200px; border-radius:20px;" alt="Blog Image Preview">
                      </div>
                    </div>
                  </div>

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

      </div><!-- End container-fluid-->
    </div><!-- End content-wrapper-->

    <!-- Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i></a>
    <!-- End Back To Top Button-->

    <!-- Start footer-->
    <?php footer(); ?>
    <?php js(); ?>

    <!-- Include Summernote JS and initialize -->
    <script src="assets/plugins/summernote/dist/summernote-bs4.min.js"></script>
    <script>
      $('#summernoteEditor1').summernote({
        height: 150,
        tabsize: 1
      });
    </script>

    <!-- Image Preview Script -->
    <script>
      function readURL(input) {
        if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function(e) {
            $('#imagePreview').attr('src', e.target.result);
          }
          reader.readAsDataURL(input.files[0]);
        }
      }
      $("#news_image").change(function() {
        readURL(this);
      });
    </script>

  </div><!-- End wrapper -->
</body>

</html>