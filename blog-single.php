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
            <span class="mr-2"><a href="blog.php">Blog <i class="ion-ios-arrow-forward"></i></a></span>
            <span>Blog Single <i class="ion-ios-arrow-forward"></i></span>
          </p>
          <h1 class="mb-3 bread">Read our blog</h1>
        </div>
      </div>
    </div>
  </section>

  <?php
  // Fetch and display blog data using prepared statements
  $bid = isset($_GET['id']) ? $_GET['id'] : '';

  // Validate input to prevent SQL injection
  if (!empty($bid)) {
    $stmt = $conn->prepare("SELECT * FROM `tbl_blogs` WHERE `is_del`='approved' AND `unique_id`=?");
    $stmt->bind_param("s", $bid);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
      while ($ns = $result->fetch_object()) {
        $unique_id = htmlspecialchars($ns->unique_id);
        $blog_title = htmlspecialchars($ns->blog_title);
        $blog_description = htmlspecialchars($ns->blog_description);
        $blog_image = htmlspecialchars($ns->blog_image);
  ?>

        <section class="listings-content-wrapper section-padding-100" style="margin-top:40px;">
          <div class="container header bg-white p-0" style="margin-top:2px;">
            <div class="row g-2 align-items-center flex-column-reverse flex-md-row">
              <div class="col-md-12 animated fadeIn">
                <div class="owl-carousel header-carousel">
                  <div class="owl-carousel-item">
                    <img src="admin_panel/admin/blogs_image/<?php echo $blog_image; ?>" class="block-20" alt="Image">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-12 col-lg-12">
                <div class="listings-content">
                  <h2><?php echo $blog_title; ?></h2>
                  <p><?php echo $blog_description; ?></p>
                </div>
              </div>
            </div>
          </div>
        </section>

  <?php
      }
    } else {
      echo "<p>No blogs found.</p>";
    }
    $stmt->close();  // Close the prepared statement
  } else {
    echo "<p>Invalid blog ID.</p>";
  }
  mysqli_close($conn);  // Close the database connection
  ?>

  <?php
  footer_tag();  // Include footer
  loader();  // Include loader
  java_script();  // Include JavaScript
  ?>

</body>

</html>