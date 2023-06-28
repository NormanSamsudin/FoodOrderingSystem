<?php
session_start()
?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.108.0">
    <link href="assets/img/flavicon.png" rel="icon">
    <link href="assets/img/flavicon.png" rel="apple-touch-icon">
    <title>Sign Up</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sign-in/">

<link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    </style>


    <!-- Custom styles for this template -->
    <link href="sign-in.css" rel="stylesheet">
    
  </head>
  <body class="text-center">

<main class="form-signin w-100 m-auto">
  <form action="signupProcessing.php" method="post">
    <img class="mb-4" src="ayam.jpg" alt="" width="300" height="200">
    <h1 class="h3 mb-3 fw-normal">Please sign up</h1>

    <div class="form-floating">
      <input type="text" class="form-control" id="floatingInput" placeholder="Username" name="username">
      <label for="floatingInput">Username</label>
    </div><br>
    <div class="form-floating">
      <input type="text" class="form-control" id="floatingInput" placeholder="Phone Number" name="phone">
      <label for="floatingInput">Phone Number</label>
    </div><br>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="pass">
      <label for="floatingPassword">Password</label>
    </div>
    <div class="form-floating">
      <?php
              if(!empty($_SESSION['username_err2']) || !empty($_SESSION['pass_err2']) || !empty($_SESSION['phone_err2'])){

                if(!empty($_SESSION['username_err2'])){
                  echo "<p class='text-danger'>", $_SESSION['username_err2'] ,"</p>";
                  unset($_SESSION['username_err2']);
                }if(!empty($_SESSION['pass_err2'])){
                  echo "<p class='text-danger'>", $_SESSION['pass_err2'] ,"</p>";
                  unset($_SESSION['pass_err2']);
                }if(!empty($_SESSION['phone_err2'])){
                  echo "<p class='text-danger'>", $_SESSION['phone_err2'] ,"</p>";
                  unset($_SESSION['phone_err2']);
                }
              }elseif(!empty($_SESSION['exist_err'])){
                echo "<p class='text-danger'>", $_SESSION['exist_err'] ,"</p>";
                unset($_SESSION['exist_err']);
              }
      
      ?>
    </div>

    <div class="checkbox mb-3">
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign up</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2020–2023</p>
  </form>
</main>



  </body>
</html>
