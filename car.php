<?php include "common_function.php";
include "db_connection.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<?php meta_tag();
	css_tag(); ?>
</head>

<body>

	<?php navbar_tag() ?>
	<!-- END nav -->

	<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/bg_3.jpg');" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
				<div class="col-md-9 ftco-animate pb-5">
					<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Cars <i class="ion-ios-arrow-forward"></i></span></p>
					<h1 class="mb-3 bread">Choose Your Car</h1>
				</div>
			</div>
		</div>
	</section>


	<section class="ftco-section bg-light">
		<div class="container">
			<div class="row">
				<?php
				$count = 1;
				$fetch_car = mysqli_query($conn, "SELECT * FROM `tbl_car` WHERE `is_del`='approved'");

				if ($fetch_car) {
					while ($car = $fetch_car->fetch_object()) {
						$unique_id = htmlspecialchars($car->unique_id);
						$car_company = htmlspecialchars($car->car_company);
						$car_image = htmlspecialchars($car->car_image);
						$car_name = htmlspecialchars($car->car_name);
						$car_price = htmlspecialchars($car->car_price);
				?>
						<div class="col-md-4">
							<div class="car-wrap rounded ftco-animate">
								<!-- <div> -->
								<img src="./admin_panel/admin/car_image/<?php echo htmlspecialchars($car_image) ?>" alt="Image" class="img rounded d-flex align-items-end">
								<!-- </div> -->
								<div class="text">
									<h2 class="mb-0"><?php echo htmlspecialchars($car_company); ?></h2>
									<div class="d-flex mb-3">
										<span class="cat"><?php echo htmlspecialchars($car_name); ?></span>
										<p class="price ml-auto"><?php echo htmlspecialchars($car_price); ?> <span>Rupees</span></p>
									</div>
									<p class="d-flex mb-0 d-block"><a href="#" class="btn btn-primary py-2 mr-1">Book now</a> <a href="car-single.html" class="btn btn-secondary py-2 ml-1">Details</a></p>
								</div>
							</div>

						</div>
				<?php
						$count++;
					}
				} else {
					echo '<tr><td colspan="6">No Car found.</td></tr>';
				}
				?>
			</div>

			<div class="row mt-5">
				<div class="col text-center">
					<div class="block-27">
						<ul>
							<li><a href="#">&lt;</a></li>
							<li class="active"><span>1</span></li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">4</a></li>
							<li><a href="#">5</a></li>
							<li><a href="#">&gt;</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>

	<?php
	footer_tag();
	loader();
	java_script(); ?>
</body>

</html>