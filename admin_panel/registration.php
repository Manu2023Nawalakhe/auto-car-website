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
		<div class="card card-authentication1 mx-auto my-3">
			<div class="card-body">
				<div class="card-content p-2">
					<div class="text-center">
						<img src="user_image/company.png" class="logo-icon" alt="machine.org" style="width:350px;height:150px;">
					</div>
					<div class="card-title text-uppercase text-center py-3">Sign In</div>
					<form method="POST" action="insert_new_superadmin.php" enctype="multipart/form-data">
						<div class="form-group">
							<label for="exampleInputUsername" class="">Full Name</label>
							<div class="position-relative has-icon-right">
								<input type="text" id="login_username" name="fullname" class="form-control input-shadow" placeholder="Enter Your Name">
								<div class="form-control-position">
									<i class="icon-user"></i>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="exampleInputUsername" class="">E-mail</label>
							<div class="position-relative has-icon-right">
								<input type="email" id="login_username" name="username" class="form-control input-shadow" placeholder="Enter Username(E-mail)">
								<div class="form-control-position">
									<i class="icon-envelope"></i>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="exampleInputUsername" class="">Contact Number</label>
							<div class="position-relative has-icon-right">
								<input type="text" id="contact_number" name="contact_number" class="form-control input-shadow" placeholder="Contact Number" pattern="[0-9]{10}" minlength="10" maxlength="10">
								<div class="form-control-position">
									<i class="icon-phone"></i>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="exampleInputUsername" class="">Password</label>
							<div class="position-relative has-icon-right">
								<input type="password" id="login_username" name="password" class="form-control input-shadow" placeholder="Enter Your Password" maxlength="12" minlength="4">
								<div class="form-control-position">
									<i class="icon-lock"></i>
								</div>
							</div>
						</div>





						<button type="submit" class="btn btn-primary shadow-primary btn-block waves-effect waves-light" name="register" id="sign_in">Register</button>
						<div class="position-relative has-icon-right text-center my-3">
							<span>Already have an account?<a href="index.php">Sign In</a></span>
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