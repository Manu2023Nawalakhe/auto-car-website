<?php
session_start();
include "../../db_connection.php";
include "comman_function.php";

$admin_id = $_SESSION['admin_id'] ?? null;

if (!$admin_id) {
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

        <div class="clearfix"></div>
        <div class="content-wrapper">
            <div class="container-fluid">
                <!-- Breadcrumb-->
                <div class="row pt-2 pb-2">
                    <div class="col-sm-9">
                        <h4 class="page-title"> View News</h4>
                    </div>
                </div>
                <!-- End Breadcrumb-->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <a href="add_blogs.php" style="color:white;">
                                    <button type="button" class="btn btn-primary btn-round waves-effect waves-light m-1">
                                        Write New Blog
                                    </button>
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Action</th>
                                                <th>Blog Title</th>
                                                <th>Description</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $count = 1;
                                            $neps = mysqli_query($conn, "SELECT * FROM `tbl_blogs` WHERE `is_del`='approved'");
                                            while ($ns = $neps->fetch_object()) {
                                                $unique_id = $ns->unique_id;
                                                $blog_title = $ns->blog_title;
                                                $blog_description = $ns->blog_description;
                                                $blog_image = $ns->blog_image;
                                            ?>
                                                <tr>
                                                    <td><?php echo $count; ?></td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                <a href="delete_blogs.php?unique_id=<?php echo $unique_id; ?>" class="dropdown-item"> <i class="fa fa-trash"></i>&nbsp; Delete </a>
                                                                <a href="edit_blogs.php?unique_id=<?php echo $unique_id; ?>" class="dropdown-item"><i class="fa fa-pencil"></i>&nbsp; Edit</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <?php echo $blog_title; ?><br><br>
                                                        <img src="blogs_image/<?php echo $blog_image ?>" style="width:200px;height:150px;border-radius:20px;">
                                                    </td>
                                                    <td>
                                                        <?php
                                                        $charLimit = 200;
                                                        if (strlen($blog_description) > $charLimit) {
                                                            $truncatedContent = substr($blog_description, 0, $charLimit);
                                                            $remainingContent = substr($blog_description, $charLimit);

                                                            echo '<div class="content">';
                                                            echo '<div class="truncated-content">' . wordwrap($truncatedContent, 40, "<br>", true) . '<span class="dots">...</span>';
                                                            echo '<a href="javascript:void(0);" class="read-more-link">Read More</a></div>';
                                                            echo '<div class="remaining-content" style="display:none;">' . wordwrap($remainingContent, 40, "<br>", true) . ' ';
                                                            echo '<a href="javascript:void(0);" class="read-less-link">Read Less</a></div>';
                                                            echo '</div>';
                                                        } else {
                                                            echo wordwrap($blog_description, 40, "<br>", true);
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

            </div>
            <!-- End container-fluid-->

        </div><!--End content-wrapper-->
        <!--Start Back To Top Button-->
        <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
        <!--End Back To Top Button-->

        <!--Start footer-->
        <?php js(); footer(); ?>
        <!--End footer-->

    </div><!--End wrapper-->

    <!-- JavaScript for Read More/Read Less functionality -->
    <script>
        document.querySelectorAll('.read-more-link').forEach(function(link) {
            link.addEventListener('click', function() {
                var parentContent = this.closest('.content');
                parentContent.querySelector('.truncated-content').style.display = 'none';
                parentContent.querySelector('.remaining-content').style.display = 'block';
            });
        });

        document.querySelectorAll('.read-less-link').forEach(function(link) {
            link.addEventListener('click', function() {
                var parentContent = this.closest('.content');
                parentContent.querySelector('.truncated-content').style.display = 'block';
                parentContent.querySelector('.remaining-content').style.display = 'none';
            });
        });
    </script>
</body>

</html>
