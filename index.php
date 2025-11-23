<?php
require_once __DIR__ . '/include/functions.php';
start_session_secure(); // Start session before any output
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <?php include 'include/header-section.php'; ?>
   <link rel="stylesheet" href="css/style.css">
   <!-- site metas -->
   <title>Balaji Hotel And Lodge Chimur</title>
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
   <!-- banner -->
   <?php include 'include/banner.php'; ?>
   <!-- end banner -->
   <!-- about -->
   <div class="about">
      <div class="container-fluid pt-5">
         <div class="row">
            <div class="col-md-5">
               <div class="titlepage">
                  <h2>About Us</h2>
                  <p>Balaji Hotel & Restaurant is a clean, comfortable, and family-friendly place to stay in Chimur. We offer well-maintained AC and Non-AC rooms for travelers, families, and tourists visiting Chimur and nearby attractions. Our restaurant serves pure veg, non-veg, and South Indian dishes, prepared fresh with good quality and homely taste.</p>
                  <a class="read_more" href="about.php"> Read More</a>
               </div>
            </div>
            <div class="col-md-7">
               <div class="about_img">
                  <figure><img src="images/about.png" alt="Balaji Hotel & Restaurant Chimur" /></figure>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- end about -->
   <!-- our_room -->
  <?php
   include 'include/our_room.php';
   ?>
   <!-- end our_room -->
   <!-- gallery -->
 <?php
   include 'include/gallery.php';
   ?>
   <!-- end gallery -->
   <!-- blog -->
 <?php
   include 'include/blog.php';
   ?>
   <!-- end blog -->
   <!--  contact -->
   <?php include 'include/contact.php'; ?>
   <!-- end contact -->
   <!--  footer -->
   <?php include 'include/footer.php'; ?>
   <!-- end footer -->
   <?php include 'include/footer-section.php'; ?>
</body>

</html>