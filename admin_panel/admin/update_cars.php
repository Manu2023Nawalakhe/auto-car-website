<?php
include "comman_function.php";
include "../../db_connection.php";

if (isset($_POST['submit'])) {
    $unique_id = $_POST['unique_id'];

    // Fetch the existing data
    $query = $conn->prepare("SELECT car_company, car_name, car_price, car_image FROM tbl_car WHERE is_del='approved' AND unique_id=?");
    $query->bind_param("s", $unique_id);
    $query->execute();
    $result = $query->get_result();
    $existing_data = $result->fetch_assoc();
    $query->close();

    // Use the existing data as default
    $car_company = ucwords(strtolower($_POST['car_company'])) ?: $existing_data['car_company'];
    $car_name = ucwords(strtolower($_POST['car_name'])) ?: $existing_data['car_name'];
    $car_price = ucwords(strtolower($_POST['car_price'])) ?: $existing_data['car_price'];
    $car_image = $_FILES['car_image'];
    $image = $existing_data['car_image']; // Default to the existing image

    // Check if a new image is uploaded
    if ($car_image && $car_image["tmp_name"]) {
        $tt1 = $car_image["name"];
        $image = date("d-m-Y") . '-' . rand() . '-' . str_replace(" ", "", $tt1);
        $image_path = "car_image/" . $image;

        if (move_uploaded_file($car_image["tmp_name"], $image_path)) {
            // Optionally, delete the old image if it's not the default image
            if (!empty($existing_data['car_image']) && file_exists("car_image/" . $existing_data['car_image'])) {
                unlink("car_image/" . $existing_data['car_image']);
            }
        } else {
            // Handle file upload error
            echo "<script>
                    alert('Image upload failed.');
                    window.location = 'view_cars.php';
                  </script>";
            exit();
        }
    }

    // Update the database with the new values (or existing ones if not changed)
    $stmt = $conn->prepare("UPDATE tbl_car SET car_company=?, car_name=?, car_price=?, car_image=? WHERE is_del='approved' AND unique_id=?");
    $stmt->bind_param("sssss", $car_company, $car_name, $car_price, $image, $unique_id);

    if ($stmt->execute()) {
        echo "<script>
                alert('Successfully Updated');
                window.location = 'view_cars.php';
              </script>";
    } else {
        echo "<script>
                alert('Update Failed');
                window.location = 'view_cars.php';
              </script>";
    }

    // Close the prepared statement
    $stmt->close();
}

// Close the database connection
mysqli_close($conn);
