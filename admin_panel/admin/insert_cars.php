<?php
include "comman_function.php";
include "../../db_connection.php";

if (isset($_POST['submit'])) {
  // Generate a unique ID
  $unique_id = rand(1000, 9999) . date('ymdHis');

  // Sanitize and format the inputs
  $car_company = mysqli_real_escape_string($conn, trim($_POST['car_company']));
  $car_name = mysqli_real_escape_string($conn, trim($_POST['car_name']));
  $car_price = mysqli_real_escape_string($conn, trim($_POST['car_price']));
  $car_image = $_FILES['car_image'];

  // Initialize image variable
  $image = '';

  // Handle file upload
  if (!empty($car_image['tmp_name'])) {
    $tt1 = basename($car_image["name"]);
    $image = date("d-m") . rand() . str_replace(" ", "", $tt1);

    // Move the uploaded file to the desired directory
    $target_directory = "car_image/";
    $target_file = $target_directory . $image;

    if (!move_uploaded_file($car_image["tmp_name"], $target_file)) {
      echo '<script>alert("Failed to upload the image."); 
            window.location = "view_cars.php";</script>';
      exit;
    }
  }

  // Set the entry date
  $entry_date = date("Y-m-d");

  // Prepare the SQL query
  $stmt = $conn->prepare("INSERT INTO `tbl_car` (`unique_id`, `car_company`, `car_image`, `car_name`, `car_price`, `entry_date`, `is_del`) VALUES (?, ?, ?, ?, ?, ?, 'approved')");
  $stmt->bind_param("ssssss", $unique_id,  $car_company, $image, $car_name, $car_price, $entry_date);

  // Execute the query and check the result
  if ($stmt->execute()) {
    echo '<script>alert("Successfully Added"); 
        window.location = "view_cars.php";</script>';
  } else {
    echo '<script>alert("Not Added"); 
        window.location = "view_cars.php";</script>';
  }

  // Close the prepared statement
  $stmt->close();
}

// Close the database connection
mysqli_close($conn);
