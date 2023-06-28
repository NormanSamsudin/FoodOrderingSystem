<?php
  session_start();
  if (isset($_COOKIE["user"]) && isset($_COOKIE["pass"])){ 
    $_SESSION["username"] = $_COOKIE['user'];

    if($_SESSION['username'] == "admin"){
      header("Location: dashboard.php");
   }else{
      header("Location: menu.php");
   }
   
  }
?>

<html>
    <head>
    <title>Login</title>
    <link href="assets/img/flavicon.png" rel="icon">
    <link href="assets/img/flavicon.png" rel="apple-touch-icon">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.108.0">
    <title>Signin Template · Bootstrap v5.3</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sign-in/">

    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="sign-in.css" rel="stylesheet">
    
    <style>
        body { font: 400 1em/1.5 "Neuton"; background: #090d00; color: rgba(255,255,255,.25); text-align: center; margin: 0 }

p {
	text-transform: uppercase;
	letter-spacing: .5em;
	display: inline-block;
	border: 4px double rgba(255,255,255,.25);
	border-width: 4px 0;
	padding: 1.5em 0em;
	position: absolute;
	top: 18%;
	left: 50%;
	width: 40em;
	margin: 0 0 0 -20em;
  
  span {

  	font: 700 4em/1 "Oswald", sans-serif;
  	letter-spacing: 0;
  	padding: .25em 0 .325em;
	  display: block;
	  margin: 0 auto;
  	text-shadow: 0 0 80px rgba(255,255,255,.5);

/* Clip Background Image */

	  background: url(https://i.ibb.co/RDTnNrT/animated-text-fill.png) repeat-y;
	  -webkit-background-clip: text;
	  background-clip: text;

/* Animate Background Image */

	  -webkit-text-fill-color: transparent;
	  -webkit-animation: aitf 80s linear infinite;

/* Activate hardware acceleration for smoother animations */

	  -webkit-transform: translate3d(0,0,0);
	  -webkit-backface-visibility: hidden;

  }
}

/* Animate Background Image */

@-webkit-keyframes aitf {
	0% { background-position: 0% 50%; }
	100% { background-position: 100% 50%; }
}
    </style>

         
    </head>
    <body>
      
    <p>
  Spice up your type with CSS
  <span>
    Animated text fill
  </span>
  &mdash; no JavaScript required &mdash;
</p>
  


    </body>
</html>