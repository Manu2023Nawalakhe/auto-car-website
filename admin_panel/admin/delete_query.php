<?php

include "../../db_connection.php";
?>
<?php
$id = $_GET['id'];

$sql = "UPDATE `customer_queries` SET `is_del` = 'deleted' WHERE `unique_id` = '$id' ";

if (mysqli_query($conn, $sql) == TRUE) {
  echo "<script>";
  echo "    alert('Deleted Successfully...!');";
  echo "    window.location='view_cust_queries.php';";
  echo "</script>";
} else {
  // If there was an error during execution
  echo "Error executing query: " . htmlspecialchars(mysqli_error($conn), ENT_QUOTES, 'UTF-8');
}
mysqli_close($conn);
