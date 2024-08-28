<?php
include "../../db_connection.php";

if (isset($_POST['submit'])) {
    $unique_id = $_POST['unique_id'];
    $car_company = mysqli_real_escape_string($conn, $_POST['car_company']);
    $car_name = mysqli_real_escape_string($conn, $_POST['car_name']);
    $car_description = mysqli_real_escape_string($conn, $_POST['car_description']);
    $keyword = $car_company . ' ' . $car_name;
    $old_car_image = $_POST['old_car_image'];

    $newImage = $_FILES['new_car_image']['name'];

    // Image upload handling
    if (!empty($newImage)) {
        // Generate a unique name for the new image
        $newImageName = date("d-m") . "_" . rand() . "_" . str_replace(" ", "_", $newImage);

        // Move the new image to the "car_image" folder
        if (move_uploaded_file($_FILES['new_car_image']['tmp_name'], "car_image/" . $newImageName)) {
            // Store the new image name for the update
            $imageUpdates = $newImageName;

            // Delete the old image if it exists and is not the same as the new image
            if (!empty($old_car_image) && file_exists("car_image/" . $old_car_image)) {
                unlink("car_image/" . $old_car_image);
            }
        } else {
            echo "<script>
                alert('Image upload failed.');
                window.location = 'view_cars.php';
            </script>";
            exit();
        }
    } else {
        // No new image provided, keep the old one
        $imageUpdates = $old_car_image;
    }

    // Update the database
    $stmt = $conn->prepare("UPDATE tbl_car SET car_company = ?, car_name = ?, car_description = ?, car_image = ?, keywords = ? WHERE is_del = 'approved' AND unique_id = ?");
    $stmt->bind_param("ssssss", $car_company, $car_name, $car_description, $imageUpdates, $keyword, $unique_id);

    if ($stmt->execute()) {
        echo "<script>
            alert('Update Successful');
            window.location = 'view_cars.php';
        </script>";
    } else {
        echo "<script>
            alert('Update Failed');
            window.location = 'view_cars.php';
        </script>";
    }
    $stmt->close();
}

$conn->close();
