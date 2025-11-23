<!DOCTYPE html>
<html lang="en">
   <head>
    <?php include 'include/header-section.php'; ?>
    <title>Our Room - Balaji Hotel And Lodge Chimur</title>
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
                     <h2><span>Our Rooms</span></h2>
                     <p class="subtitle">Comfortable AC & Non-AC Rooms for Your Perfect Stay</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- our_room -->
      <?php 
      $hide_section_title = true; // Hide duplicate title section on room.php page
      include 'include/our_room.php'; 
      ?>
      <!-- end our_room -->
     
      <!--  footer -->
      <?php include 'include/footer.php'; ?>
      <!-- end footer -->
      <?php include 'include/footer-section.php'; ?>
   </body>
</html>