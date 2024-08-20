<?php
session_start();
include "../db_connection.php";

if (isset($_POST['otp'])) {
	$email = $_POST['email'];

	$user_otp = mt_rand(100000, 999999);

	$result = mysqli_query($conn, "SELECT * FROM `tbl_admin_reg` WHERE `email_status`='approved' AND `is_del`='approved' AND `email_id`='$email'");

	$num = mysqli_num_rows($result);


	while ($super = $result->fetch_object()) {

		$super_admin_unique_id = $super->unique_id;
		$admin_name = $super->fullname;

		$message11 = '
   
          <br>
								  Forgot Admin Panel Password OF Website
								 <br>
								  Hi ' . $admin_name . '<br>
                                <br>
                                Your One Time Password(OTP) To Create New Password is ' . $user_otp . '<br>
                                
								 <br>
								 Regards,<br>
							Highclonoid Softec Pvt LTd<br>
							
								  ';

		$to = $email;

		$subject1 = "FORGOT PASSWORD";
		$mail_body = '
								  
								
								  Subject: ' . $subject1 . '<br>
								  Message:' . $message11 . '
								  ';


		$headers = "From:accounttick@accounttick.com" . " \r\n";
		$headers  .= "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		mail($to, $subject1, $mail_body, $headers);


		$_SESSION['otp'] = $user_otp;

?>
		<script>
			alert("Check Mail Box");
			window.location = "password_otp.php?unique_id=<?php echo $super_admin_unique_id; ?>";
		</script>
<?php

	}
}
?>