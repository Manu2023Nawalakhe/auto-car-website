<?php

include "../../db_connection.php";
?>
<?php
$unique_id = $_GET['unique_id'];
$ins_query = mysqli_query($conn, "UPDATE `tbl_services` SET `is_del`='deleted' where is_del='approved' and unique_id='$unique_id'");

echo "<script>";
echo "window.location ='view_main_services.php';";
echo "</script>";
?>
