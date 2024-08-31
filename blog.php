<?php
include "common_function.php";
include "db_connection.php"; // Added missing semicolon
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  meta_tag();
  css_tag();
  ?>
</head>

<body>

  <?php navbar_tag(); ?> <!-- Added semicolon -->
  <!-- END nav -->

  <section class="hero-wrap hero-wrap-2" style="background-image:url(images/Carwasher.png); height: 250px;" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
        <div class="col-md-9 ftco-animate pb-5">
          <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Blog <i class="ion-ios-arrow-forward"></i></span></p>
          <h1 class="mb-3 bread">Our Blog</h1>
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
                    <?php echo htmlspecialchars($blog_title); ?>
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