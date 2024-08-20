<?php
include "db_connection.php";
include "common_function.php";
?>

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
          <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Services <i class="ion-ios-arrow-forward"></i></span></p>
          <h1 class="mb-3 bread">Our Services</h1>
        </div>
      </div>
    </div>
  </section>

  <section class="ftco-section ftco-no-pt bg-light">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-12 heading-section text-center ftco-animate mb-5">
          <span class="subheading">What we offer</span>
          <h2 class="mb-2">Our Services</h2>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="carousel-car owl-carousel">
            <?php $fetch_user = mysqli_query($conn, "SELECT * FROM `tbl_services` WHERE `is_del`='approved'");
            while ($fcs = $fetch_user->fetch_object()) {
              $unique_id = $fcs->unique_id;
              $services_name = $fcs->services_name;
              $services_image = $fcs->service_image;
            ?>
              <div class="item">
                <div class="car-wrap rounded ftco-animate">
                  <div class="img rounded d-flex align-items-end"><img src="./admin_panel/admin//servicesImage/<?php echo htmlspecialchars($services_image) ?>" alt="Image">
                  </div>
                  <div class="text">
                    <h2 class="mb-0"><?php echo htmlspecialchars($services_name) ?></h2>
                  </div>
                </div>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="ftco-section ftco-intro" style="background-image: url(images/bg_3.jpg);">
    <div class="overlay"></div>
    <div class="container">
      <div class="row justify-content-end">
        <div class="col-md-6 heading-section heading-section-white ftco-animate">
          <h2 class="mb-3">Do You Want To Earn With Us? So Don't Be Late.</h2>
          <a href="#" class="btn btn-primary btn-lg">Become A Driver</a>
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