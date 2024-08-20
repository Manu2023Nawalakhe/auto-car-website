<?php
include "db_connection.php";
include "common_function.php";

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Validate and sanitize input data
  $customer_name = isset($_POST['customer_name']) ? mysqli_real_escape_string($conn, trim($_POST['customer_name'])) : '';
  $email = isset($_POST['email_id']) ? mysqli_real_escape_string($conn, trim($_POST['email_id'])) : '';
  $phone = isset($_POST['phone']) ? mysqli_real_escape_string($conn, trim($_POST['phone'])) : '';
  $message = isset($_POST['message']) ? mysqli_real_escape_string($conn, trim($_POST['message'])) : '';
  $entry_date = date("Y-m-d");
  $unique_id = date("YmdHis") . rand();

  // Check if required fields are not empty
  if (!empty($customer_name) && !empty($email) && !empty($phone) && !empty($message)) {
    // Insert query
    $insert = "INSERT INTO `customer_queries`(`unique_id`, `customer_name`, `contact_num`, `email_id`, `message`, `entry_date`, `is_del`) 
                   VALUES ('$unique_id','$customer_name', '$phone', '$email', '$message', '$entry_date', 'approved')";

    $result = mysqli_query($conn, $insert);

    if ($result) {
      echo "<script>
                    alert('Success!');
                    window.location = 'index.php';
                  </script>";
    } else {
      echo "<script>
                    alert('Error in saving your query!');
                    window.location = 'index.php';
                  </script>";
    }
  } else {
    echo "<script>
                alert('Please fill in all required fields.');
                window.location = 'index.php';
              </script>";
  }
} else {
  echo "<script>
            alert('Invalid request method!');
            window.location = 'index.php';
          </script>";
}
