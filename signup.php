<?php

// $salt = 'XyZzy12*_';
// $md5;
// $failure = false;

// // Check to see if we have some POST data, if we do process it
// if ( isset($_POST['name']) && isset($_POST['pass']) ) {
//     if ( strlen($_POST['name']) < 1 || strlen($_POST['pass']) < 1 ) {
//       $failure = "User name and password are required";}
//     else {
//       $key = $salt.$_POST["pass"];
//       $md5 = hash('md5', $key);
//       //Redirect the browser to game.php
//       header("Location: menu.php?name=".urlencode($_POST['name']));
//       return;}}
?>

<html>
<head>
  <title>Geprek Restaurant</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="/Yummy/assets/css/signup.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
</head>
<body>
  <div class="div1 text-center">
    <h2>Welcome to Ayam Geprek</h2>
    <p>Create an account</p>
    <form action="signupProcessing.php" method="post">
      <?php
      //if we have no POST data
      if ( $failure !== false ) {
      // Look closely at the use of single and double quotes
      echo('<p style="color: red;">'.htmlentities($failure)."</p>\n");
      }
      
       ?>
      <label>Username</label><br>
      <input type="text" name="name"><br><br>
      <label>Phone Number</label><br>
      <input type="text" name="phone"><br><br>
      <label>Password</label><br>
      <input type="text" name="pass"><br><br>
      <input type="checkbox" id="check">
      <label for="check">I don't want to receive promotional messages from Ayam Geprek.</label>
      <p>By clicking the "Sign up" button, you are creating Ayam Geprek account
         and agree with <b>Term of Use</b> and <b>Privacy Policy</b>.
      </p>
      <input type="submit" value="Sign Up">
    </form>
  </div>
  <div>
    <img id="chick" src="chicks.png">
  </div>
</body>
</html>
