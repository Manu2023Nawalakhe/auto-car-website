<?php
include "../../db_connection.php";
?>
<?php

$unique_id = $_GET['unique_id'];

$update = mysqli_query($conn, "UPDATE `add_keyword` SET `is_del`='deleted' where `is_del`='approved' and `unique_id`='$unique_id'");
?>
<script>
	alert("Deleted Successfully");
	window.location = "view_keyword.php";
</script>
<?php

$conn->close();

?>