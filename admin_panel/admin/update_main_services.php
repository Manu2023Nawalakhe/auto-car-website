<?php
include "comman_function.php";
include "../../db_connection.php";

if (isset($_POST['submit'])) {
    $unique_id = $_POST['unique_id'];

    // Fetch the existing data
    $query = $conn->prepare("SELECT services_name, services_heading, services_desc, service_image FROM tbl_services WHERE is_del='approved' AND unique_id=?");
    $query->bind_param("s", $unique_id);
    $query->execute();
    $result = $query->get_result();
    $existing_data = $result->fetch_assoc();
    $query->close();

    // Use the existing data as default
    $services_name = ucwords(strtolower($_POST['services_name'])) ?: $existing_data['services_name'];
    $services_heading = ucwords(strtolower($_POST['services_heading'])) ?: $existing_data['services_heading'];
    $services_desc = ucwords(strtolower($_POST['services_desc'])) ?: $existing_data['services_desc'];
    $service_image = $_FILES['service_image'];
    $image = $existing_data['service_image']; // Default to the existing image

    // Check if a new image is uploaded
    if ($service_image && $service_image["tmp_name"]) {
        $tt1 = $service_image["name"];
        $image = date("d-m-Y") . '-' . rand() . '-' . str_replace(" ", "", $tt1);
        $image_path = "servicesImage/" . $image;

        if (move_uploaded_file($service_image["tmp_name"], $image_path)) {
            // Optionally, delete the old image if it's not the default image
            if (!empty($existing_data['services_image']) && file_exists("servicesImage/" . $existing_data['services_image'])) {
                unlink("servicesImage/" . $existing_data['services_image']);
            }
        } else {
            // Handle file upload error
            echo "<script>
                    alert('Image upload failed.');
                    window.location = 'view_main_services.php';
                  </script>";
            exit();
        }
    }

    // Update the database with the new values (or existing ones if not changed)
    $stmt = $conn->prepare("UPDATE tbl_services SET services_name=?, services_heading=?, services_desc=?, service_image=? WHERE is_del='approved' AND unique_id=?");
    $stmt->bind_param("sssss", $services_name, $services_heading, $services_desc, $image, $unique_id);

    if ($stmt->execute()) {
        echo "<script>
                alert('Successfully Updated');
                window.location = 'view_main_services.php';
              </script>";
    } else {
        echo "<script>
                alert('Update Failed');
                window.location = 'view_main_services.php';
              </script>";
    }

    // Close the prepared statement
    $stmt->close();
}

// Close the database connection
mysqli_close($conn);
