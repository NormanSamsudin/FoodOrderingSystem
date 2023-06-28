 <!DOCTYPE html>  
 <html>  
      <head>  
     <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/Yummy/assets/fonts/icomoon/style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/Yummy/assets/css/bootstrap.min.css">
    <!-- Style -->
    <link rel="stylesheet" href="/Yummy/assets/css/login.css">
    <title>Login Page</title>
    </head>  
      <body>  
        
        <div class="d-lg-flex half">
          <!-- gambar -->
            <div class="bg order-1 order-md-2" style="background-image: url('/Yummy/assets/img/logokedai.jpg');"></div>
            <div class="contents order-2 order-md-1">

            <div class="container">
                <div class="row align-items-center justify-content-center">
                <div class="col-md-7">
                    <h3>Login to <strong>Kedai Ayam Geprek Dahsyat</strong></h3>
                    <p class="mb-4">Selamat Datang Ke Kedai Ayam Geprek Dahsyat. Jangan nangis masa makan yee !!!.</p>
                    <form action="loginProcessing.php" method="post">
                    <div class="form-group first">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" placeholder="Your Username" id="username" name="username">
                    </div>
                    <div class="form-group last mb-3">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" placeholder="Your Password" id="password" name="password">
                    </div>
                    
                    <div class="d-flex mb-5 align-items-center">
                    <label for="message">
                    <!-- display error message -->
                    <?php
                         if(isset($message))  
                         {  
                              echo '<label class="text-danger">'.$message.'</label>';  
                         }
                    ?>

                    </label>

                        </label>
                        <span class="ml-auto"><a href="#" class="forgot-pass">Forgot Password</a></span> 
                    </div>

                    <input type="submit" class="btn btn-block btn-primary" style="background-color: #F36262;">

                    </form>
                </div>
                </div>
            </div>
            </div>
        </div>
    
        <script src="/Yummy/assets/js/jquery-3.3.1.min.js"></script>
        <script src="/Yummy/assets/js/popper.min.js"></script>
        <script src="/Yummy/assets/js/bootstrap.min.js"></script>
        <script src="/Yummy/assets/js/main.js"></script>
      </body>
 </html>  
 