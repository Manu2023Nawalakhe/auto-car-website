<?php
include "../../db_connection.php";

if (isset($_POST['submit'])) {
    // Retrieve and sanitize input
    $unique_id = mysqli_real_escape_string($conn, $_POST['unique_id']);
    $blog_title = mysqli_real_escape_string($conn, $_POST['blog_title']);
    $blog_description = mysqli_real_escape_string($conn, $_POST['blog_description']);
    $keyword = $blog_title . ' ' . $blog_description;
    $old_blog_image = mysqli_real_escape_string($conn, $_POST['old_blog_image']);

    $newImage = $_FILES['new_blog_image']['name'];
    $imageUpdates = $old_blog_image; // Default to the old image

    if (!empty($newImage)) {
        // Generate a unique name for the new image
        $newImageName = date("d-m") . "_" . rand() . "_" . str_replace(" ", "_", $newImage);

        // Attempt to move the new image to the "blogs_image" folder
        if (move_uploaded_file($_FILES['new_blog_image']['tmp_name'], "blogs_image/" . $newImageName)) {
            $imageUpdates = $newImageName;

            // Delete the old image if it exists
            if (!empty($old_blog_image) && file_exists("blogs_image/" . $old_blog_image)) {
                unlink("blogs_image/" . $old_blog_image);
            }
        } else {
            echo "<script>
                alert('Failed to upload new image.');
                window.location = 'view_blogs.php';
            </script>";
            exit();
        }
    }

    // Use a prepared statement to securely update the blog details
    $stmt = $conn->prepare("UPDATE `tbl_blogs` SET `blog_title`=?, `blog_description`=?, `blog_image`=?, `keywords`=? WHERE `unique_id`=? AND `is_del`='approved'");
    if ($stmt) {
        $stmt->bind_param("sssss", $blog_title, $blog_description, $imageUpdates, $keyword, $unique_id);

        if ($stmt->execute()) {
            echo "<script>
                alert('Update Successful');
                window.location = 'view_blogs.php';
            </script>";
        } else {
            echo "<script>
                alert('Update Failed');
                window.location = 'view_blogs.php';
            </script>";
        }

        $stmt->close();
    } else {
        echo "<script>
            alert('Failed to prepare statement.');
            window.location = 'view_blogs.php';
        </script>";
    }
}

$conn->close();
