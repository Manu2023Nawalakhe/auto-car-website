<?php
session_start();
include "../../db_connection.php";
include "comman_function.php";
?>
<?php
$admin_id = $_SESSION['admin_id'];
if (!empty($_SESSION['admin_id'])) {
  $user_id = $_SESSION['admin_id'];
} else {
  session_destroy();
?>
  <script>
    window.location = "../index.php"
  </script>
<?php
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

  <div id="wrapper">
    <?php header_tag(); ?>
    <div class="content-wrapper">
      <div class="container-fluid">
        <!-- Breadcrumb-->
        <div class="row pt-2 pb-2">
          <div class="col-sm-9">
            <h4 class="page-title">Keyword List
          </div>

        </div>
        <!-- End Breadcrumb-->
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header"><i class="fa fa-table"></i>Select
                <a href="add_keyword.php"><button type="button" class="btn btn-primary waves-effect waves-light m-1">Add Keyword</button></a>


              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table id="example" class="table table-bordered">
                    <thead>
                      <tr>

                        <th>S.No</th>
                        <th>keywords</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $count = 1;
                      $keywords_details = mysqli_query($conn, "SELECT * FROM `add_keyword` WHERE is_del='approved'");
                      while ($key = $keywords_details->fetch_object()) {

                        $unique_id = $key->unique_id;
                        $keyword = $key->keyword;

                      ?>
                        <tr style="height:80px;">

                          <td><?php echo $count; ?></td>
                          <td><?php echo $keyword; ?></td>


                          <td>
                            <a class="btn btn-sm btn-danger" href="delete_keyword.php?unique_id=<?php echo $unique_id; ?>"><i class="fa fa-trash"></i></a>
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

    <?php
    footer();
    js();
    ?>