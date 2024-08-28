<?php
include "db_connection.php";
include "common_function.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  meta_tag();
  css_tag(); ?>
</head>

<body>
  <?php navbar_tag() ?>
  <!-- END nav -->

  <section class="hero-wrap hero-wrap-2 " style="background-image:url(images/Carwasher.png); height: 250px;" data-stellar-background-ratio="0.5">
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

  <section class="ftco-section ftco-no-pt bg-light my-5">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-12 heading-section text-center ftco-animate mb-5">
          <span class="subheading" style="color:#c80207;">What we offer</span>
          <h2 class="mb-2">Our Services</h2>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="carousel-car owl-carousel">
            <?php
            $fetch_user = mysqli_query($conn, "SELECT * FROM `tbl_services` WHERE `is_del`='approved'");
            while ($fcs = $fetch_user->fetch_object()) {
              $unique_id = $fcs->unique_id;
              $service_name = $fcs->service_name;
              $service_image = $fcs->service_image;
            ?>
              <div class="item">
                <a href="services-single.php?id=<?php echo htmlspecialchars($unique_id); ?>" style="text-decoration: none;">
                  <div class="car-wrap rounded ftco-animate">
                    <div class="img rounded d-flex align-items-end">
                      <img src="./admin_panel/admin/servicesImage/<?php echo htmlspecialchars($service_image); ?>" alt="Service Image">
                    </div>
                    <div class="text">
                      <h2 class="mb-0"><?php echo htmlspecialchars($service_name); ?></h2>
                    </div>
                  </div>
                </a>
              </div>
            <?php } ?>
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