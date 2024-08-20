<?php

include "../db_connection.php";

if (isset($_POST['update'])) {
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];
    $super_admin_id = $_GET['unique_id'];

    if ($password == $repassword) {

        $update = mysqli_query($conn, "UPDATE `tbl_admin_reg` SET `password`='$password' where `is_del`='approved' and `unique_id`='$super_admin_id'");

?>

        <script>
            window.location = "index.php";
        </script>

    <?php

    } else {

    ?>

        <script>
            alert("Password Should Be Same");
            window.location = "change_password.php?unique_id=<?php echo $super_admin_id; ?>";
        </script>

<?php


    }
}
?>