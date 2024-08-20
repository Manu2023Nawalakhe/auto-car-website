<?php
session_start();
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
					<div class="card-title text-uppercase text-center py-3">Enter OTP</div>

					<form method="post" action="update_superadmin_status.php?unique_id=<?php echo $_GET['unique_id']; ?>">
						<div class="form-group">
							<label for="exampleInputUsername" class="">OTP</label>
							<div class="position-relative has-icon-right">
								<input type="text" id="otp" name="otp" class="form-control input-shadow" placeholder="Enter OTP">
								<div class="form-control-position">
									<i class="icon-user"></i>
								</div>
							</div>
						</div>


						<button type="submit" class="btn btn-primary shadow-primary btn-block waves-effect waves-light" name="submit" id="submit">Submit</button>


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