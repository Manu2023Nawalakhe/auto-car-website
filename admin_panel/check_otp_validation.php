<?php
session_start();
include "../db_connection.php";

if (isset($_POST['submit'])) {
  echo $otp = $_POST['pass'];
  echo $session_otp = $_GET['session_otp'];
  echo  $super_admin_id = $_GET['unique_id'];

  if ($otp == $session_otp) {

?>

    <script>
      window.location = "change_password.php?unique_id=<?php echo $super_admin_id; ?>";
    </script>

  <?php

  } else {  ?>

    <script>
      alert("OTP IS Not Matched, U Entered Wrong OTP");
      window.location = "password_otp.php?unique_id=<?php echo $super_admin_id; ?>";
    </script>

<?php
  }
}
?>