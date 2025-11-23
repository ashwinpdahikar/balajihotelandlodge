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
      <div class="back_re">
         <div class="decorative-corner top-left"></div>
         <div class="decorative-corner top-right"></div>
         <div class="decorative-corner bottom-left"></div>
         <div class="decorative-corner bottom-right"></div>
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="title">
                     <h2><span>Our Restaurant</span></h2>
                     <p class="subtitle">Pure Veg, Non-Veg & South Indian Dishes - Fresh & Homely Taste</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- restaurant -->
      <?php include 'include/restaurant.php'; ?>
      <!-- end restaurant -->
     
      <!--  footer -->
      <?php include 'include/footer.php'; ?>
      <!-- end footer -->
      <?php include 'include/footer-section.php'; ?>
   </body>
</html>

