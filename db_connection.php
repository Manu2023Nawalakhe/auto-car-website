<?php
$db = "localhost";
$username = "root";
$password = "";
$db_name = "srauto_car_db";

$conn = new mysqli($db, $username, $password, $db_name);
mysqli_set_charset($conn, "utf8");
mysqli_report(MYSQLI_REPORT_ERROR);



// <?php
// $db = "localhost";
// $username = "electroclonoid_sr_auto";
// $password = "prathmesh1991";
// $db_name = "electroclonoid_sr_auto";

// $conn = new mysqli($db, $username, $password, $db_name);
// mysqli_set_charset($conn, "utf8");
// mysqli_report(MYSQLI_REPORT_ERROR);