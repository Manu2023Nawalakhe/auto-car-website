<?php
include "db_connection.php";
include "common_function.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  meta_tag(); // Function should define meta tags
  css_tag(); // Function should link to the CSS files
  ?>
</head>

<body>
  <?php navbar_tag(); // Function to include the navigation bar 
  ?>
  <!-- END nav -->

  <section class="hero-wrap hero-wrap-2" style="background-image:url(images/Carwasher.png); height: 250px;" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
        <div class="col-md-9 ftco-animate pb-5">
          <p class="breadcrumbs">
            <span class="mr-2">
              <a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a>
            </span>
            <span>Contact <i class="ion-ios-arrow-forward"></i></span>
          </p>
          <h1 class="mb-3 bread">Contact Us</h1>
        </div>
      </div>
    </div>
  </section>

  <section class="ftco-section contact-section">
    <div class="container">
      <div class="row d-flex mb-5 contact-info">
        <div class="col-md-4">
          <div class="row mb-5">
            <div class="col-md-12">
              <div class="border w-100 p-4 rounded mb-2 d-flex">
                <div class="icon mr-3">
                  <span class="icon-map-o"></span>
                </div>
                <p><span>Address:</span> 198 West 21th Street, Suite 721 New York NY 10016</p>
              </div>
            </div>
            <div class="col-md-12">
              <div class="border w-100 p-4 rounded mb-2 d-flex">
                <div class="icon mr-3">
                  <span class="icon-mobile-phone"></span>
                </div>
                <p><span>Phone:</span> <a href="tel://1234567920">+ 1235 2355 98</a></p>
              </div>
            </div>
            <div class="col-md-12">
              <div class="border w-100 p-4 rounded mb-2 d-flex">
                <div class="icon mr-3">
                  <span class="icon-envelope-o"></span>
                </div>
                <p><span>Email:</span> <a href="mailto:info@yoursite.com">info@yoursite.com</a></p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-8 block-9 mb-md-5">
          <form action="insert_cust_query.php" method="post" class="bg-light p-5 contact-form">
            <div class="form-group">
              <input type="text" class="form-control" name="customer_name" id="name" placeholder="Your Name" required>
            </div>
            <div class="form-group">
              <input type="email" class="form-control" name="email_id" id="email" placeholder="Your Email" required>
            </div>
            <div class="form-group">
              <input type="tel" class="form-control" name="phone" id="phone" placeholder="Phone" required>
            </div>
            <div class="form-group">
              <textarea name="message" id="message" cols="30" rows="7" class="form-control" placeholder="Message" required></textarea>
            </div>
            <div class="form-group">
              <input type="submit" name="submit" value="Submit" class="btn btn-primary py-3 px-5">
            </div>
          </form>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-12">
          <div id="map" class="bg-white"></div>
        </div>
      </div>
    </div>
  </section>

  <?php
  footer_tag(); // Function to include the footer
  loader(); // Function to include the loader
  java_script(); // Function to include JavaScript files
  ?>
</body>

</html>