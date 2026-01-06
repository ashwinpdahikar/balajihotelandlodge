<?php
require_once __DIR__ . '/include/functions.php';
start_session_secure(); // Start session before any output
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <?php include 'include/header-section.php'; ?>
      <title>Veg & Non Veg Restaurant in Chimur | South Indian Restaurant – Balaji Hotel</title>

	  	 <link rel="icon" href="images/BalajiHotelLogo.png" type="image" />

	  <link rel="canonical" href="https://www.balajihotelchimur.com/restaurant.php" />
      <!-- Font Awesome -->
	   
	   
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<meta name="description" content="Balaji Hotel Restaurant is a popular veg and non veg restaurant in Chimur serving delicious South Indian food. Best family restaurant in Chimur with hygienic dining and great taste.">

<meta name="keywords" content="restaurant in chimur, veg non veg restaurant chimur, south indian restaurant chimur, family restaurant chimur, balaji hotel restaurant">

<meta name="author" content="Balaji Hotel Restaurant and Lodge">

<meta name="robots" content="index, follow">
<script async src="https://www.googletagmanager.com/gtag/js?id=G-F0L8N4ZV5G"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'G-F0L8N4ZV5G');
</script>
   </head>
   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
      <?php include 'include/loader.php'; ?>
      <!-- end loader -->
      <!-- header -->
      <?php include 'include/header.php'; ?>
      <!-- end header inner -->
      <!-- end header -->
      
      <!-- Restaurant banner -->
      <?php include 'include/banner-restaurant.php'; ?>
      <!-- end banner -->
      
      <!-- restaurant -->
      <?php include 'include/restaurant.php'; ?>
      <!-- end restaurant -->
     
      <!--  footer -->
      <?php include 'include/footer.php'; ?>
      <!-- end footer -->
      <?php include 'include/footer-section.php'; ?>
   </body>
</html>

