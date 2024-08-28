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
  <?php header_tag() ?>

  <div class="clearfix"></div>
  <div class="content-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header"><i class="fa fa-table"></i> View Customer Queries </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="example" class="table table-bordered">
                  <thead>
                    <tr class="text-center">
                      <th>Action</th>
                      <th>Sr. No.</th>

                      <th>Customer Name</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Message</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $count = 1;
                    $res = mysqli_query($conn, "SELECT * FROM customer_queries WHERE is_del='approved'");
                    if ($res) {
                      while ($r = $res->fetch_object()) {
                        $unique_id = $r->unique_id;
                    ?>
                        <tr>
                          <td>
                            <div class="btn-group">
                              <a class="btn btn-danger" href="delete_query.php?id=<?php echo htmlspecialchars($unique_id); ?>">Delete</a>
                            </div>
                          </td>
                          <td class="center"><?php echo $count; ?></td>
                          <td class="center"><?php echo htmlspecialchars($r->customer_name); ?></td>
                          <td class="center"><?php echo htmlspecialchars($r->email_id); ?></td>
                          <td class="center"><?php echo htmlspecialchars($r->contact_num); ?></td>
                          <td class="center"><?php echo htmlspecialchars($r->message); ?></td>
                        </tr>
                    <?php
                        $count++;
                      }
                    } else {
                      echo "<tr><td colspan='8' class='text-center'>No queries found</td></tr>";
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <span class="clear"></span>
      </div>
    </div>
  </div>
  <?php footer(); ?>
  <?php js(); ?>
</body>

</html>

