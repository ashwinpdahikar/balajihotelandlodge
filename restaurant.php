<?php
require_once __DIR__ . '/include/functions.php';
start_session_secure(); // Start session before any output
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <?php include 'include/header-section.php'; ?>
      <title>Restaurant - Balaji Hotel And Lodge Chimur</title>
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

