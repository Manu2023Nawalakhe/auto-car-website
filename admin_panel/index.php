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
					<div class="card-title text-uppercase text-center py-3">Sign In</div>
					<form method="post" action="check_validation.php">
						<div class="form-group">
							<label for="exampleInputUsername" class="">Username</label>
							<div class="position-relative has-icon-right">
								<input type="text" id="login_username" name="username" class="form-control input-shadow" placeholder="Enter Username">
								<div class="form-control-position">
									<i class="icon-user"></i>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="exampleInputPassword" class="">Password</label>
							<div class="position-relative has-icon-right">
								<input type="password" id="login_user_password" name="password" class="form-control input-shadow" placeholder="Enter Password">
								<div class="form-control-position">
									<i class="icon-lock"></i>
								</div>
							</div>
						</div>

						<button type="submit" class="btn btn-primary shadow-primary btn-block waves-effect waves-light" name="sign_in" id="sign_in">Sign In</button>

						<div class="position-relative has-icon-right text-center my-3">
							<span>Create an account?<a href="registration.php"> Sign Up</a></span><br>
							<span><a href="forgot_password.php">Forgot Password</a></span>
						</div>


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