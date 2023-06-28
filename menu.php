<?php
    require_once("pdo.php");
    $path= array("assets/img/menu/indomie_geprek_original.png","assets/img/menu/nasi_ayam_geprek_original.png","assets/img/menu/soto_medan.png");


    /*if(file_exists("order.txt")){
      unlink("order.txt");
    }

    if (file_exists("menuId.txt")){
      unlink("menuId.txt");
    }*/


 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Kedai Ayam Geprek Dahsyat</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/flavicon.png" rel="icon">
    <link href="assets/img/flavicon.png" rel="apple-touch-icon">

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Amatic+SC:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">


  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">



  <!-- Template Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Yummy - v1.2.1
  * Template URL: https://bootstrapmade.com/yummy-bootstrap-restaurant-website-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center me-auto me-lg-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1>Ayam Geprek Dahsyat<span>.</span></h1>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="#menu">Menu</a></li>
          <li><a href="#contact">Contact</a></li>
        </ul>
      </nav><!-- .navbar -->
      <p><?php
          session_start();
          if (isset($_SESSION['username']) || isset($_GET['username'])){
            if(isset($_GET['username'])){
              $_SESSION['username'] = $_GET['username'];
            }
          }else{
            header("Location: index.php");
          }
        ?></p>
      <?php
      if ($_SESSION['username'] != 'guest'){
        echo "<a href='profile.php' class='btn'>", $_SESSION['username'] ,"'s Profile </a>";
      }
      ?>
      <form action="orderProcessing.php" method="post">
      <input class="btn-sign-up" type="submit" value="Confirm order" style="border-style:none;">
      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
  </header><!-- End Header -->


    <!-- ======= Menu Section ======= -->
    <section id="menu" class="menu p-7">

        <div class="section-header">
          <p>Check Our <span>Ayam Geprek Dahsyat Menu</span></p>
        </div>

        <ul class="nav nav-tabs d-flex justify-content-center" data-aos="fade-up" data-aos-delay="200">

          <li class="nav-item">
            <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#menu-lunch">
              <h4>Meal</h4>
            </a>
          </li><!-- End tab nav item -->

          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-dinner">
              <h4>Beverage</h4>
            </a>
          </li><!-- End tab nav item -->

        </ul>


        <div class="tab-content" data-aos="fade-up" data-aos-delay="300">

          <!-- ========= Meal Menu Content ===========-->
          <div class="tab-pane fade active show" id="menu-lunch">

            <div class="tab-header text-center">
              <p>Menu</p>
              <h3>Meal</h3>
            </div>

            <div class="row gy-5">

              <?php
                // ARRAY NI X PAKAI DAH
                // $pathMeal = array("assets/img/menu/bakso_daging.png", "assets/img/menu/gado_gado.png", "assets/img/menu/indomie_geprek_original.png", "assets/img/menu/nasi_ayam_geprek_original.png", "assets/img/menu/soto_medan.png", "assets/img/menu/lontong_medan.jpg");
                // $descMeal = array("Delicous Indonesian meatball soup.", "Sipanch, eansprouts, egg and cucmber.", "Best indomie with chicken and the best sambal.", "Rice with chicken and the best sambal.", "Bihun with our delicous spicy soup.", "Compressed rice cakes with curries and stews and peanut-based sauces");
                try{
                  $stmt = $pdo->prepare("SELECT menus.menu_id, menus.name, menus.price, menus.path, menus.description, menu_types.menu_type
                  FROM menus
                  LEFT JOIN menu_types ON menus.menu_id = menu_types.menu_id
                  WHERE menu_types.menu_type = 'meal'
                  ORDER BY menus.menu_id;");
                  $stmt->execute();
                  $j = 0;
                  while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {

                    echo "<div class='col-lg-4 menu-item'>";
                    echo "<a href='" . $row['path'] .  "'class='glightbox'><img src='" . $row['path'] . "' class='menu-img img-fluid' alt=''></a>";
                    echo "<h4>". htmlentities($row['name'])  ."</h4>";
                    echo "<p class='ingredients'>". htmlentities($row['description']) ."</p>";
                    echo "<p class='price'>RM".  htmlentities($row['price']) ."</p>";
                    echo"<label for='quantity'><h3>Quantity   :</h3></label>";
                    echo"<span> </span>";
                    echo"<input type='number'placeholder='0' id='quantity' name='quantity".$j."' min='0' max='10'>";
                    echo "</div>";
                    $j++;
                  }
                }catch(Exception $e) {
                    return $e->getMessage();
                }
              ?>
            </div>
          </div><!-- End Meal Menu Content -->


          <div class="tab-pane fade" id="menu-dinner">
            <div class="tab-header text-center">
              <p>Menu</p>
              <h3>Beverage</h3>
            </div>

            <div class="row gy-5">

                <?php
                    try{
                      $stmt = $pdo->prepare("SELECT menus.menu_id, menus.name, menus.price, menus.path, menus.description, menu_types.menu_type
                      FROM menus
                      LEFT JOIN menu_types ON menus.menu_id = menu_types.menu_id
                      WHERE menu_types.menu_type = 'beverage'
                      ORDER BY menus.menu_id;");
                      $stmt->execute();
                      $j = 6;
                      while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
                        echo "<div class='col-lg-4 menu-item'>";
                        echo "<a href='" . $row['path']  . "' class='glightbox'><img src='" . $row['path'] . "' class='menu-img img-fluid' alt=''></a>";
                        echo "<h4>". htmlentities($row['name']) ."</h4>";
                        echo "<p class='ingredients'>". htmlentities($row['description']) ."</p>";
                        echo "<p class='price'>RM". htmlentities($row['price']) ."</p>";
                        echo"<label for='quantity'><h3>Quantity   :</h3></label>";
                        echo"<span> </span>";
                        echo"<input type='number'placeholder='0' id='quantity' name='quantity".$j."' min='0' max='10'>";
                        echo "</div>";
                        $j++;
                      }
                    }catch(Exception $e){
                        return $e->getMessage();
                    }

                ?>

          </div><!-- End Beverage Menu Content -->


</form>
        </div>


    </section><!-- End Menu Section -->




    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Contact</h2>
          <p>Need Help? <span>Contact Us</span></p>
        </div>

        <div class="mb-3">
          <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" allowfullscreen></iframe>
        </div><!-- End Google Maps -->

        <div class="row gy-4">

          <div class="col-md-6">
            <div class="info-item  d-flex align-items-center">
              <i class="icon bi bi-map flex-shrink-0"></i>
              <div>
                <h3>Our Address</h3>
                <p>Taman Impian Ehsan, 43300 Seri Kembangan, Selangor</p>
              </div>
            </div>
          </div><!-- End Info Item -->

          <div class="col-md-6">
            <div class="info-item d-flex align-items-center">
              <i class="icon bi bi-envelope flex-shrink-0"></i>
              <div>
                <h3>Email Us</h3>
                <p>ayamgeprekdahsyat@gmail.com</p>
              </div>
            </div>
          </div><!-- End Info Item -->

          <div class="col-md-6">
            <div class="info-item  d-flex align-items-center">
              <i class="icon bi bi-telephone flex-shrink-0"></i>
              <div>
                <h3>Call Us</h3>
                <p>+6018-2402987</p>
              </div>
            </div>
          </div><!-- End Info Item -->

          <div class="col-md-6">
            <div class="info-item  d-flex align-items-center">
              <i class="icon bi bi-share flex-shrink-0"></i>
              <div>
                <h3>Opening Hours</h3>
                <div><strong>Mon-Sat:</strong> 8AM - 22PM;
                  <strong>Sunday:</strong> Closed
                </div>
              </div>
            </div>
          </div><!-- End Info Item -->
        </div>
      </div>
    </section><!-- End Contact Section -->


  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="container">
      <div class="row gy-3">
        <div class="col-lg-3 col-md-6 d-flex">
          <i class="bi bi-geo-alt icon"></i>
          <div>
            <h4>Address</h4>
            <p>
              A108 Adam Street <br>
              New York, NY 535022 - US<br>
            </p>
          </div>

        </div>

        <div class="col-lg-3 col-md-6 footer-links d-flex">
          <i class="bi bi-telephone icon"></i>
          <div>
            <h4>Reservations</h4>
            <p>
              <strong>Phone:</strong> +6018-2405698<br>
              <strong>Email:</strong> ayamgeprekdahsyat@gmail.com<br>
            </p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 footer-links d-flex">
          <i class="bi bi-clock icon"></i>
          <div>
            <h4>Opening Hours</h4>
            <p>
              <strong>Mon-Sat: 8AM</strong> - 22PM<br>
              Sunday: Closed
            </p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 footer-links">
          <h4>Follow Us</h4>
          <div class="social-links d-flex">
            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Kedai Ayam Geprek Dahsyat</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/yummy-bootstrap-restaurant-website-template/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>

  </footer><!-- End Footer -->
  <!-- End Footer -->

<!--  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a> -->

  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
