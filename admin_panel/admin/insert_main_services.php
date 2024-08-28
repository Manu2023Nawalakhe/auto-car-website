<?php
include "comman_function.php";
include "../../db_connection.php";

if (isset($_POST['submit'])) {
    // Generate a unique ID
    $unique_id = rand(1000, 9999) . date('ymdHis');

    // Sanitize and format the inputs
    $service_name = mysqli_real_escape_string($conn, trim($_POST['service_name']));
    $service_heading = mysqli_real_escape_string($conn, trim($_POST['service_heading']));
    $service_description = mysqli_real_escape_string($conn, trim($_POST['service_description']));

    $keyword = $service_name . '' . $service_description;
    $service_image = $_FILES['service_image'];

    // Initialize image variable
    $image = '';

    // Handle file upload
    if (!empty($service_image['tmp_name'])) {
        $tt1 = basename($service_image["name"]);
        $image = date("d-m") . rand() . str_replace(" ", "", $tt1);

        // Move the uploaded file to the desired directory
        $target_directory = "servicesImage/";
        $target_file = $target_directory . $image;

        if (!move_uploaded_file($service_image["tmp_name"], $target_file)) {
            echo '<script>alert("Failed to upload the image."); 
            window.location = "view_main_services.php";</script>';
            exit;
        }
    }

    // Set the entry date
    $entry_date = date("Y-m-d");

    // Prepare the SQL query
    $stmt = $conn->prepare("INSERT INTO `tbl_services` (`unique_id`, `service_name`, `service_image`, `service_heading`, `service_description`, `entry_date`, `is_del`) VALUES (?, ?, ?, ?, ?, ?, 'approved')");
    $stmt->bind_param("ssssss", $unique_id, $service_name, $image, $service_heading, $service_description, $entry_date);

    // Execute the query and check the result
    if ($stmt->execute()) {
        echo '<script>alert("Successfully Added"); 
        window.location = "view_main_services.php";</script>';
    } else {
        echo '<script>alert("Not Added"); 
        window.location = "view_main_services.php";</script>';
    }

    // Close the prepared statement
    $stmt->close();
}

// Close the database connection
mysqli_close($conn);
