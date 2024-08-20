<?php
$db = "localhost";
$username = "root";
$password = "";
$db_name = "srauto_car_db";

$conn = new mysqli($db, $username, $password, $db_name);
mysqli_set_charset($conn, "utf8");
mysqli_report(MYSQLI_REPORT_ERROR);



