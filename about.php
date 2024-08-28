<?php
include "common_function.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php meta_tag();
  css_tag(); ?>

<body>

  <?php navbar_tag(); ?>

  <section class="hero-wrap hero-wrap-2" style="background-image:url(images/Carwasher.png); height: 250px;" data-stellar-background-ratio=" 0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
        <div class="col-md-9 ftco-animate pb-5">
          <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>About us <i class="ion-ios-arrow-forward"></i></span></p>
          <h1 class="mb-3 bread">About Us</h1>
        </div>
      </div>
    </div>
  </section>

  <section class="custom-block-3 page-section-ptb bg-10 my-5">
    <div class="container">
      <div class="row">
        <!-- Left Column: Image -->
        <div class="col-lg-4 col-md-12 ">
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

  <!-- <section class="ftco-section testimony-section bg-light">
    <div class="container">
      <div class="row justify-content-center mb-5">
        <div class="col-md-7 text-center heading-section ftco-animate">
          <span class="subheading">Testimonial</span>
          <h2 class="mb-3">Happy Clients</h2>
        </div>
      </div>
      <div class="row ftco-animate">
        <div class="col-md-12">
          <div class="carousel-testimony owl-carousel ftco-owl">
            <div class="item">
              <div class="testimony-wrap rounded text-center py-4 pb-5">
                <div class="user-img mb-2" style="background-image: url(images/person_1.jpg)">
                </div>
                <div class="text pt-4">
                  <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                  <p class="name">Roger Scott</p>
                  <span class="position">Marketing Manager</span>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="testimony-wrap rounded text-center py-4 pb-5">
                <div class="user-img mb-2" style="background-image: url(images/person_2.jpg)">
                </div>
                <div class="text pt-4">
                  <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                  <p class="name">Roger Scott</p>
                  <span class="position">Interface Designer</span>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="testimony-wrap rounded text-center py-4 pb-5">
                <div class="user-img mb-2" style="background-image: url(images/person_3.jpg)">
                </div>
                <div class="text pt-4">
                  <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                  <p class="name">Roger Scott</p>
                  <span class="position">UI Designer</span>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="testimony-wrap rounded text-center py-4 pb-5">
                <div class="user-img mb-2" style="background-image: url(images/person_1.jpg)">
                </div>
                <div class="text pt-4">
                  <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                  <p class="name">Roger Scott</p>
                  <span class="position">Web Developer</span>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="testimony-wrap rounded text-center py-4 pb-5">
                <div class="user-img mb-2" style="background-image: url(images/person_1.jpg)">
                </div>
                <div class="text pt-4">
                  <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                  <p class="name">Roger Scott</p>
                  <span class="position">System Analyst</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="ftco-counter ftco-section img" id="section-counter">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
          <div class="block-18">
            <div class="text text-border d-flex align-items-center">
              <strong class="number" data-number="60">0</strong>
              <span>Year <br>Experienced</span>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
          <div class="block-18">
            <div class="text text-border d-flex align-items-center">
              <strong class="number" data-number="1090">0</strong>
              <span>Total <br>Cars</span>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
          <div class="block-18">
            <div class="text text-border d-flex align-items-center">
              <strong class="number" data-number="2590">0</strong>
              <span>Happy <br>Customers</span>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
          <div class="block-18">
            <div class="text d-flex align-items-center">
              <strong class="number" data-number="67">0</strong>
              <span>Total <br>Branches</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> -->

  <?php
  footer_tag();
  loader();
  java_script(); ?>

</body>

</html>