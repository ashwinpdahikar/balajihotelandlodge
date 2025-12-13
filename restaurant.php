<?php
require_once __DIR__ . '/include/functions.php';
start_session_secure(); // Start session before any output
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <?php include 'include/header-section.php'; ?>
      <title>Restaurant - Balaji Hotel And Lodge Chimur</title>
      <!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<meta name="description" content="Balaji Restaurant Chimur offers Pure Veg, Non-Veg, South Indian food, beverages and desserts. Fresh ingredients, homely taste and family dining experience.">

<meta name="keywords" content="Balaji Restaurant Chimur, Pure Veg Restaurant Chimur, Non Veg Food Chimur, South Indian Dosa Chimur, Best Restaurant in Chimur">

<meta name="author" content="Balaji Hotel Restaurant and Lodge">

<meta name="robots" content="index, follow">

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

