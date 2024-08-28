<?php
include "../../db_connection.php";

// Check if the form is submitted
if (isset($_POST['submit'])) {
  // Escape the input to prevent SQL injection
  $blog_title = mysqli_real_escape_string($conn, $_POST['blog_title']);
  $blog_description = mysqli_real_escape_string($conn, $_POST['blog_description']);

  // Generate a unique ID for the blog
  $strtil = str_replace(' ', '_', $blog_title);
  $unique_id = $strtil . "_" . rand();

  // Create the keyword by concatenating the title and description
  $keyword = $blog_title . ' ' . $blog_description;

  // Handle the image upload
  $blog_image = $_FILES['blog_image'];
  $image_name = '';

  if (isset($blog_image) && $blog_image['error'] == UPLOAD_ERR_OK) {
    $image_name = date("d-m") . "_" . rand() . "_" . str_replace(" ", "_", $blog_image['name']);

    // Move the uploaded image to the "blogs_image" directory
    if (!move_uploaded_file($blog_image['tmp_name'], "blogs_image/" . $image_name)) {
      echo "<script>
                alert('Image upload failed.');
                window.location = 'add_blog.php';
            </script>";
      exit();
    }
  }

  // Prepare the SQL query using prepared statements for added security
  $stmt = $conn->prepare("INSERT INTO `tbl_blogs` (`unique_id`, `blog_title`, `blog_description`, `blog_image`, `keywords`, `e_date`, `is_del`) VALUES (?, ?, ?, ?, ?, ?, 'approved')");

  // Check if the prepare statement was successful
  if ($stmt === false) {
    die('Prepare failed: ' . htmlspecialchars($conn->error));
  }

  $e_date = date('Y-m-d');
  $stmt->bind_param("ssssss", $unique_id, $blog_title, $blog_description, $image_name, $keyword, $e_date);

  // Execute the query and check if it was successful
  if ($stmt->execute()) {
    echo "<script>
              alert('Added Successfully');
              window.location = 'view_blogs.php';
          </script>";
  } else {
    echo "<script>
              alert('Failed to add blog.');
              window.location = 'add_blog.php';
          </script>";
  }

  // Close the prepared statement
  $stmt->close();
}

// Close the database connection
$conn->close();
