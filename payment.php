<?php
session_start();
$list = array();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Payment</title>
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
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="#hero">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#menu">Menu</a></li>
          <li><a href="#events">Events</a></li>
          <li><a href="#chefs">Chefs</a></li>
          <li><a href="#gallery">Gallery</a></li>
          <li><a href="#contact">Contact</a></li>
        </ul>
      </nav><!-- .navbar -->

      <a class="btn-book-a-table" href="menu.php">Add order</a>
      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
  </header><!-- End Header -->

    <!-- ======= resit section =========== -->
  <section id="why-us" class="why-us section-bg">

      <div class="panel-body">
        <!-- <h2 class="title">Resit</h2>
        <a>Confirm Your Order</a> -->
      </div>

    <div class="container" data-aos="fade-up">
      <div class="row gy-4">
        <div class="row justify-content-md-center">

          <div class="row gutters">

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
              <div class="card">

                <div class="card-body p-0">

                  <div class="invoice-container">

                    <!-- resit header -->
                    <div class="invoice-header">

                        <!-- Row start -->
                        <div class="row gutters">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                              <a href="index.html" class="invoice-logo">
                                  <?php echo 'Order : '.$_SESSION['orderid']?>
                              </a>
                            </div>
                        </div>
                        <!-- Row end -->

                    </div>
                      <!-- resit header end -->

                      <!-- resit body -->
                    <div class="invoice-body">

                      <!-- Row start -->
                        <div class="row gutters">
                          <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="table-responsive">
                              <table class="table custom-table m-0">
                                <thead>
                                  <tr>
                                    <th>Menu</th>
                                    <th>Quantity</th>
                                    <th>Total (RM)</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php
                                  $myfile = fopen("order.txt", "r") or die("Unable to open file!");
                                  // Output one line until end-of-file
                                  while(!feof($myfile)) {
                                    array_push($list, fgets($myfile));
                                  }
                                  fclose($myfile);

                                  $size = (count($list)-1)/3;
                                  $j = 0; $k = 3;
                                  for($i=0; $i<$size; $i++) {
                                      echo "<tr>";
                                      for($j; $j<$k; $j++) {
                                      // menu name
                                      echo "<td>";
                                      echo $list[$j];
                                      echo "</td>";
                                      }
                                      echo "</tr>";
                                      $k+= 3;
                                    }
                                  ?>
                                  <tr>
                                    <td>&nbsp;</td>
                                    <td></td>
                                    <td>
                                      <h5 class="text-success"><strong><?php echo $list[count($list)-1] ?></strong></h5>
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                        <!-- Row end -->
                      </div>
                            <div class="invoice-footer">
                              Thank you for your Order.
                            </div>
                            <br></br>
                      </div>
                    </div>
                  </div>
                </div>
              <!-- resit body end -->
            </div>
        </div>
      </div>
    </div>
  </section><!-- End Why Us Section -->

  <!-- ======= Why Us Section ======= -->
  <section id="why-us" class="why-us section-bg ">

      <div class="container">
        <h2 class="title">Payment</h2>
        <a>Choose your payment method</a>
      </div>

    <div class="container" data-aos="fade-up">

      <div class="row gy-4">
        <div class="row justify-content-md-center">
          <div class="row gy-4">

            <div class="col-xl-4" data-aos="fade-up" data-aos-delay="200">
              <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                <a href="paymentProcessing.php?payType=cash" class="cash"><i class="bi bi-cash"></i></a>
                <h4>Pay at counter</h4>
                <a>Meet our friendly cashier.</a>
              </div>
            </div><!-- End Icon Box -->

            <div class="col-xl-4" data-aos="fade-up" data-aos-delay="300">
              <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                <a href="paymentProcessing.php?payType=qr" class="cash"><i class="bi bi-qr-code"></i></a>
                <h4>QR code / e-wallet</h4>
                <a>Screenshot the resit and upload it.</a>
              </div>
            </div><!-- End Icon Box -->

            <div class="col-xl-4" data-aos="fade-up" data-aos-delay="400">
              <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                <a href="paymentProcessing.php?payType=online" class="cash"><i class="bi bi-bank"></i></a>
                <h4>Online Banking</h4>
                <a>Choose your preferred bank.</a>
              </div>
            </div><!-- End Icon Box -->

          </div>
        </div>

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
