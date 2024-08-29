<?php
include "common_function.php";
include "db_connection.php";

error_reporting(E_ALL);  // Enable error reporting for debugging
ini_set('display_errors', 1);  // Display errors for debugging

// Ensure database connection
if (!$conn) {
  die("Database connection failed: " . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  meta_tag();  // Include meta tags
  css_tag();   // Include CSS tags
  ?>
</head>

<body>

  <?php navbar_tag(); ?> <!-- Include navbar -->

  <!-- Hero Section -->
  <section class="hero-wrap hero-wrap-2" style="background-image:url(images/Carwasher.png); height: 250px;" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
        <div class="col-md-9 ftco-animate pb-5">
          <p class="breadcrumbs">
            <span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span>
            <span class="mr-2"><a href="services.php">Services <i class="ion-ios-arrow-forward"></i></a></span>
            <span>Service Details <i class="ion-ios-arrow-forward"></i></span>
          </p>
          <h1 class="mb-3 bread">Our Service</h1>
        </div>
      </div>
    </div>
  </section>

  <section class="ftco-section">
    <div class="container">
      <div class="row d-flex justify-content-center">
        <div class="col-md-12 text-center d-flex ftco-animate">
          <?php
          // Fetch service data based on unique_id from URL parameter
          $unique_id = isset($_GET['id']) ? mysqli_real_escape_string($conn, $_GET['id']) : '';

          $query = "SELECT * FROM `tbl_services` WHERE `is_del`='approved' AND `unique_id`='$unique_id'";
          $fetch_user = mysqli_query($conn, $query);

          if (mysqli_num_rows($fetch_user) > 0) {
            while ($fcs = $fetch_user->fetch_object()) {
              $service_name = htmlspecialchars($fcs->service_name);
              $service_heading = htmlspecialchars($fcs->service_heading);
              $service_description = htmlspecialchars($fcs->service_description);
              $service_image = htmlspecialchars($fcs->service_image);
          ?>
              <div class="blog-entry justify-content-end mb-md-5">
                <img src="./admin_panel/admin/servicesImage/<?php echo $service_image; ?>" alt="service_image" class="block-20 img">
                <div class="text px-md-5 pt-4">
                  <div class="meta mb-3">
                    <div>Oct. 29, 2019</div>
                    <div>Admin</div>
                    <div><span class="icon-chat meta-chat"></span> 3</div>
                  </div>
                  <h3 class="heading mt-2" style="color:#c80207;"><?php echo $service_heading; ?></h3>
                  <p style="color:black;"><?php echo html_entity_decode($service_description); ?></p>
                </div>
              </div>
          <?php
            }
          } else {
            echo "<p>No services found.</p>";
          }
          mysqli_close($conn);  // Close the database connection
          ?>

        </div>
      </div>
    </div>
  </section>

  <?php
  footer_tag();  // Include footer
  loader();  // Include loader
  java_script();  // Include JavaScript
  ?>

</body>

</html>