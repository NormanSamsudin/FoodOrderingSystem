<?php
session_start();
require_once ("pdo.php");




?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Profile</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/flavicon.png" rel="icon">
  <link href="assets/img/flavicon.png" rel="apple-touch-icon">

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
  <link href="assets/css/mainSoma.css" rel="stylesheet">
  <link href="assets/css/resit.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Yummy - v1.2.1
  * Template URL: https://bootstrapmade.com/yummy-bootstrap-restaurant-website-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center me-auto me-lg-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1>Ayam Geprek <span>Dahsyat</span></h1>

      </a>

      
      <!-- <a class="btn-book-a-table" href="menu.php">Back</a> -->
      <a class="btn-book-a-table" href="logout.php">Log out</a>
      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
  </header><!-- End Header -->

    <!-- ======= resit section =========== -->
  <section id="why-us" class="why-us section-bg">
    <div class="wrapper">
        <div class="container-fluid">
            <h2 class="mt-5 mb-3">Profile</h2>
            <?php
                          $stmt = $pdo->prepare("SELECT username, password, phone FROM users WHERE username = :username");
                          $stmt->execute(array(":username" => $_SESSION['username'])); // get ni daripada 
                          $row = $stmt->fetch(PDO::FETCH_ASSOC);
                      if ( $row === false ) {
                          $_SESSION['error'] = 'Bad value for username';
                          header( 'Location: menu.php' ) ;
                          return;
                      }
                      $n = htmlentities($row['username']);
                      $e = htmlentities($row['password']);
                      $p = htmlentities($row['phone']);
                      
                      echo "<div class='form-group'>";
                      echo "<label>Username</label>";
                      echo "<input type='text' name='username' class='form-control' value='",  htmlentities($row['username']), "'disabled>";
                      echo "<span></span>";
                      echo "</div>";
                      
                      echo "<div class='form-group'>";
                      echo "<label>Password hashed</label>";
                      echo "<input type='password' name='username' class='form-control' value='",  htmlentities($row['password']), "'disabled>";
                      echo "<span></span>";
                      echo "</div>";
                      
                      echo "<div class='form-group'>";
                      echo "<label>Phone</label>";
                      echo "<input type='text' name='username' class='form-control' value='",  htmlentities($row['phone']), "'disabled>";
                      echo "<span></span>";
                      echo "</div>";

                    //============================================================

                    if(!empty($_SESSION['success'])){
                      echo "<p class='text-success'>", $_SESSION['success'] ,"</p>";
                      unset($_SESSION['success']);
                    }
            ?>

                    <a href="update.php" class="btn btn-danger">Update</a>
                    <a href="delete.php" class="btn btn-secondary ml-2">Delete</a>

            
        </div>
    </div>
  </section><!-- End Why Us Section -->


  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="container">
      <div class="row gy-3">
        <div class="col-lg-3 col-md-6 d-flex">
          <i class="bi bi-geo-alt icon"></i>
          <div>
            <h4>Address</h4>
            <p>
              Universiti Putra Malaysia<br>
              Serdang, Selangor<br>
            </p>
          </div>

        </div>

        <div class="col-lg-3 col-md-6 footer-links d-flex">
          <i class="bi bi-telephone icon"></i>
          <div>
            <h4>Reservations</h4>
            <p>
              <strong>Phone:</strong> +011 1231006<br>
              <strong>Email:</strong> syahid@example.com<br>
            </p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 footer-links d-flex">
          <i class="bi bi-clock icon"></i>
          <div>
            <h4>Opening Hours</h4>
            <p>
              <strong>Mon-Sat: 11AM</strong> - 23PM<br>
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
        &copy; Copyright <strong><span>Yummy</span></strong>. All Rights Reserved
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

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

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

<!-- ================================================================== -->
