<?php
include "../../db_connection.php";
$unique_id = $_POST['unique_id'];
$service_name = mysqli_real_escape_string($conn, $_POST['service_name']);
$service_heading = mysqli_real_escape_string($conn, $_POST['service_heading']);
$service_description = mysqli_real_escape_string($conn, $_POST['service_description']);
$keyword = $service_heading . ' ' . $service_description;
$old_service_image = $_POST['old_service_image'];

$newImage = $_FILES['new_service_image']['name'];

if (!empty($newImage)) {
    // Generate a unique name for the new image
    $newImageName = date("d-m") . "_" . rand() . "_" . str_replace(" ", "_", $newImage);

    // Move the new image to the "serviceImage" folder
    move_uploaded_file($_FILES['new_service_image']['tmp_name'], "serviceImage/" . $newImageName);

    // Store the new image name for the update
    $imageUpdates = $newImageName;

    // Delete the old image if it exists
    if (!empty($old_service_image)) {
        unlink("serviceImage/" . $old_service_image);
    }
} else {
    // No new image provided, keep the old one
    $imageUpdates = $old_service_image;
}

if (isset($_POST['submit'])) {
    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("UPDATE tbl_services SET service_name = ?, service_description = ?, service_image = ?, keywords = ? WHERE is_del = 'approved' AND unique_id = ?");
    $stmt->bind_param("ssssi", $service_name, $service_description, $imageUpdates, $keyword, $unique_id);

    if ($stmt->execute()) {
        echo "<script>
            alert('Update Successful');
            window.location = 'view_main_services.php';
        </script>";
    } else {
        echo "<script>
            alert('Update Failed');
            window.location = 'view_main_services.php';
        </script>";
    }
    $stmt->close();
}
$conn->close();
