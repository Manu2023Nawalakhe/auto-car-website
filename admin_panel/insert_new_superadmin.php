<?php
session_start();
include "../db_connection.php";

if (isset($_POST['register'])) {
	$admin_name = $_POST['fullname'];
	$admin_email = $_POST['username'];
	$email = $_POST['username'];
	$password = $_POST['password'];
	$contact_number = $_POST['contact_number'];

	$user_otp = mt_rand(100000, 999999);
	$unique_id_admin = rand() . date("ymdhis");


	date_default_timezone_set('Asia/Kolkata');
	$currentTime = date('d-m-Y h:i:s A', time());


	$result = mysqli_query($conn, "SELECT * FROM `tbl_admin_reg` WHERE `is_del`='approved' and `email_id`='$admin_email'");
	$count1 = mysqli_num_rows($result);
	if ($count1 == 0) {


		$insert_seller = mysqli_query($conn, "INSERT INTO `tbl_admin_reg`( `unique_id`, `fullname`, `contact_num`, `email_id`, `username`, `password`, `email_status`, `e_date`, `is_del`) VALUES ('$unique_id_admin','$admin_name','$contact_number','$admin_email','$email','$password','pending','" . date('Y-m-d') . "','approved')");

		if ($insert_seller === true) {

			$message11 = '
								 <br>
								  Hi ' . $admin_name . '<br>
								  <br>
								  Your Username and Password are as follows:
								  <br>
								  Username : ' . $admin_email . '<br>
								  Password : ' . $password . '<br>
								  
								  <br>
								
                                <br>
                                Your One Time Password(OTP)  To Activate your profile is ' . $user_otp . '<br>
                                
								 <br>
								 Regards,<br>
							Highclonoid Softec Pvt LTd<br>
							
								  ';

			$to = $admin_email;

			$subject1 = "Thank you for registration";
			$mail_body = '
								  
								
								  Subject: ' . $subject1 . '<br>
								  Message:' . $message11 . '
								  ';


			$headers = "From:accounttick@accounttick.com" . "\r\n";
			$headers  .= "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			mail($to, $subject1, $mail_body, $headers);


			$_SESSION['otp'] = $user_otp;

?>
			<script>
				alert("Verify Mail Id By Visiting your Mail id");
				window.location = "otp.php?unique_id=<?php echo $unique_id_admin; ?>";
			</script>
		<?php


		} else { ?>
			<script>
				alert('Not Added Successfully');
				window.location = "registration.php";
			</script>


		<?php
		}
	} else {
		?>
		<script>
			alert("Your Email Is Already Registered Please Login");
			window.location = "index.php";
		</script>


<?php
	}
}
?>