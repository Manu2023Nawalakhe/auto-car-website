<?php

session_start();
include "../db_connection.php";

if (isset($_POST['submit'])) {

    $otp = $_POST['otp'];
    $session_otp = $_SESSION['otp'];
    $unique_id = $_GET['unique_id'];

    if ($otp == $session_otp) {

        $update_status = mysqli_query($conn, "UPDATE `tbl_admin_reg` SET `email_status`='approved' where is_del='approved' and `unique_id`='$unique_id'");
?>
        <script>
            alert("Status Updated Successfully");
            window.location = 'index.php';
        </script>

    <?php
    } else {
    ?>
        <script>
            alert("Sorry OTP Is Wrong");
            window.location = 'index.php?unique_id=<?php echo $unique_id; ?>';
        </script>

<?php
    }
}

?>