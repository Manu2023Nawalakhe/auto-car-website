<?php
include "db_connection.php";
include "common_function.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php meta_tag(); ?>
  <?php css_tag(); ?>
  <link rel="stylesheet" type="text/css" href="engine1/style.css" />
  <script type="text/javascript" src="engine1/jquery.js"></script>
</head>

<body>

  <?php navbar_tag(); ?>

  <div id="wowslider-container1">
    <div class="ws_images">
      <ul class="list-unstyled d-flex m-0 p-0">
        <li><img src="./images/Compressor.png" alt="Compressor" title="Compressor" id="wows1_0" /></li>
        <li><a href="http://wowslider.net"><img src="./images/Carcoat.png" alt="Car Coat" title="Car Coat" id="wows1_1" /></a></li>
        <li><img src="./images/Carwork.png" alt="Car Work" title="Car Work" id="wows1_2" /></li>
      </ul>
    </div>
    <div class="ws_script" style="position:absolute;left:-99%"><a href="http://wowslider.net">css slider</a> by WOWSlider.com v9.0</div>
    <div class="ws_shadow"></div>
  </div>

  <script type="text/javascript" src="engine1/wowslider.js"></script>
  <script type="text/javascript" src="engine1/script.js"></script>

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
                      <h2 class="mb-0" style="color:#c80207;"><?php echo htmlspecialchars($service_name); ?></h2>
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

  <section class="custom-block-3 page-section-ptb bg-10">
    <div class="container">
      <div class="row">
        <!-- Left Column: Image -->
        <div class="col-lg-4 col-md-12">
          <img src="images/about_us.jpg" alt="RS Auto Craft" class="img-fluid rounded">
        </div>

        <!-- Right Column: Text Content -->
        <div class="col-lg-8 col-md-12">
          <div class="title">
            <h3 style="color:#c80207;">RS Auto Craft</h3>
          </div>
          <div class="content">
            <h4 class="text-dark">Welcome to RS Auto Craft</h4>
            <p style="color:black;font-weight:600">
              RS Auto Craft is your trusted car care center, offering a comprehensive range of services to keep your vehicle in top condition. Specializing in car denting, painting, and polishing, we ensure your car looks as good as new. Our detailing and ceramic coating services provide long-lasting protection and shine. At RS Auto Craft, we also offer expert mechanical and electrical repairs, ensuring every aspect of your vehicle is functioning perfectly.<br>
              Equipped with state-of-the-art workshop machinery, including painting booths, polish rooms, and advanced tools like dent pullers and compressors, we deliver precision and quality in every job. Whether it’s a mechanical lift, welding, or car washing, our skilled technicians are dedicated to providing the best care for your car. Trust RS Auto Craft for all your automotive needs, where craftsmanship meets excellence.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="ftco-section">
    <div class="container">
      <div class="row justify-content-center mb-5">
        <div class="col-md-7 heading-section text-center ftco-animate">
          <span class="subheading" style="color:#c80207;">Blog</span>
          <h2>Recent Blog</h2>
        </div>
      </div>

      <div class="row d-flex">
        <?php
        $neps = mysqli_query($conn, "SELECT * FROM `tbl_blogs` WHERE `is_del`='approved'");
        while ($ns = $neps->fetch_object()) {
          $unique_id = $ns->unique_id;
          $blog_title = $ns->blog_title;
          $blog_description = $ns->blog_description;
          $blog_image = $ns->blog_image;
        ?>
          <div class="col-md-4 d-flex ftco-animate">
            <div class="blog-entry justify-content-end">
              <a href="blog-single.php?id=<?php echo htmlspecialchars($unique_id); ?>" class="block-20">
                <img src="admin_panel/admin/blogs_image/<?php echo htmlspecialchars($blog_image); ?>" class="block-20" alt="Image">
              </a>
              <div class="text pt-4">
                <div class="meta mb-3">
                  <div style="color: black;">Oct. 29, 2019</div>
                  <div style="color: black;">Admin</div>
                </div>
                <h3 class="heading mt-2">
                  <a href="blog-single.php?id=<?php echo htmlspecialchars($unique_id); ?>" style="color:#c80207;">
                    <?php echo htmlspecialchars($blog_title);  ?>
                  </a>
                </h3>
                <p><a href="blog-single.php?id=<?php echo htmlspecialchars($unique_id); ?>" class="btn btn-danger">Read more</a></p>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </section>

  <?php
  footer_tag();
  loader();
  java_script();
  ?>

</body>

</html>