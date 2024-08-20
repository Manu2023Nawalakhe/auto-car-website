<?php

include "../../db_connection.php";
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

// Check if unique_id is set and sanitize it
if (isset($_GET['unique_id'])) {
	$unique_id = $_GET['unique_id'];

	// Use prepared statements to prevent SQL injection
	$stmt = $conn->prepare("UPDATE `tbl_services` SET `is_del`='deleted' WHERE `is_del`='approved' AND `unique_id`=?");
	$stmt->bind_param("s", $unique_id);

	if ($stmt->execute()) {
		echo "<script>
                alert('Deleted Successfully');
                window.location = 'view_main_services.php';
              </script>";
	} else {
		echo "<script>
                alert('Deletion Failed');
                window.location = 'view_main_services.php';
              </script>";
	}

	// Close the prepared statement
	$stmt->close();
} else {
	echo "<script>
            alert('Invalid Request');
            window.location = 'view_main_services.php';
          </script>";
}

// Close
