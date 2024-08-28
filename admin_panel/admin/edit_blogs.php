<?php
session_start();
include "../../db_connection.php";
include "comman_function.php";

// Validate session
if (empty($_SESSION['admin_id'])) {
    session_destroy();
    echo "<script>window.location = '../index.php'</script>";
    exit();
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
        <!--Start sidebar-wrapper-->
        <div class="clearfix"></div>
        <div class="content-wrapper">
            <div class="container-fluid">
                <!-- Breadcrumb-->
                <div class="row pt-2 pb-2">
                    <div class="col-sm-9">
                        <h4 class="page-title">Edit Blog</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="view_blogs.php">View Blog</a></li>
                            <li class="breadcrumb-item active">Edit Blog</li>
                        </ol>
                    </div>
                </div>
                <!-- End Breadcrumb-->

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header text-uppercase">Blog Details</div>
                            <div class="card-body">
                                <?php
                                $unique_id = $_GET['unique_id'];
                                $result = mysqli_query($conn, "SELECT * FROM `tbl_blogs` WHERE `is_del`='approved' AND `unique_id`='$unique_id'");

                                if ($result) {
                                    $ns = $result->fetch_object();
                                    if ($ns) {
                                        $blog_title = htmlspecialchars($ns->blog_title);
                                        $blog_description = htmlspecialchars($ns->blog_description);
                                        $blog_image = htmlspecialchars($ns->blog_image);
                                ?>
                                <form method="POST" action="update_blogs.php" enctype="multipart/form-data">
                                    <input type="hidden" name="unique_id" value="<?php echo $unique_id; ?>">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <label>Blog Title</label>
                                                    <input class="form-control" name="blog_title" type="text" value="<?php echo $blog_title; ?>">
                                                </div>
                                                <div class="col-sm-12">
                                                    <br>
                                                    <label>Write Description</label>
                                                    <textarea class="form-control" name="blog_description" id="summernoteEditor1" cols="50" rows="5"><?php echo $blog_description; ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <label>Blog Image</label>
                                            <input class="form-control" name="new_blog_image" type="file">
                                            <input type="hidden" name="old_blog_image" value="<?php echo $blog_image; ?>">
                                            <br>
                                            <?php
                                            if (empty($blog_image)) { ?>
                                                <img src="https://icon-library.com/images/ios-gallery-icon/ios-gallery-icon-29.jpg" style="width:200px; height:200px;border-radius:20px;">
                                            <?php } else { ?>
                                                <img src="blogs_image/<?php echo $blog_image; ?>" style="width:200px; height:200px;border-radius:20px;">
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <button type="submit" class="btn btn-primary shadow-primary px-5" name="submit"><i class="icon-lock"></i> Update</button>
                                        </div>
                                    </div>
                                </form>
                                <?php
                                    } else {
                                        echo "<p>Blog not found.</p>";
                                    }
                                } else {
                                    echo "<p>Error retrieving blog details.</p>";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div><!--End Row-->

            </div>
            <!-- End container-fluid-->

        </div><!--End content-wrapper-->
        <!--Start Back To Top Button-->
        <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i></a>
        <!--End Back To Top Button-->

        <!--Start footer-->
        <?php js(); footer(); ?>
        <!--End footer-->

    </div><!--End wrapper-->

    <script src="assets/plugins/summernote/dist/summernote-bs4.min.js"></script>
    <script>
        $('#summernoteEditor1').summernote({
            height: 150,
            tabsize: 1
        });
    </script>

</body>

</html>
