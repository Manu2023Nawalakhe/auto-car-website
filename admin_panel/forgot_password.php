<?php
include "comman_function.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<?php meta(); ?>

	<?php css(); ?>


</head>

<body class="bg-dark">
	<!-- Start wrapper-->
	<div id="wrapper">
		<div class="card card-authentication1 mx-auto my-5">
			<div class="card-body">
				<div class="card-content p-2">
					<div class="text-center">
						<img src="user_image/company.png" class="logo-icon" alt="machine.org" style="width:350px;height:150px;">
					</div>
					<div class="card-title text-uppercase text-center py-3">Forgot Password</div>
					<form method="POST" action="insert_otp.php">
						<div class="form-group">
							<label for="exampleInputUsername" class="">Enter E-mail</label>
							<div class="position-relative has-icon-right">
								<input type="email" id="login_username" name="email" class="form-control input-shadow" placeholder="Enter E-mail">
								<div class="form-control-position">
									<i class="icon-user"></i>
								</div>
							</div>
						</div>


						<button type="submit" class="btn btn-primary shadow-primary btn-block waves-effect waves-light" name="otp" id="otp">Send OTP</button>


					</form>
				</div>
			</div>

		</div>

		<!--Start Back To Top Button-->
		<a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
		<!--End Back To Top Button-->
	</div><!--wrapper-->

	<?php js(); ?>

</body>

</html>