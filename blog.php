<!DOCTYPE html>
<html lang="en">
   <head>
      <?php include 'include/header-section.php'; ?>
      <title>Blog - Balaji Hotel And Lodge Chimur</title>
   </head>
   <!-- body -->
   <body class="main-layout inner_page">
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
                     <h2><span>Blog</span></h2>
                     <p class="subtitle">Latest News, Travel Tips & Updates from Balaji Hotel</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- blog -->
      <?php 
      $hide_section_title = true;
      include 'include/blog.php'; 
      ?>
      <!-- end blog -->
     
      <!--  footer -->
      <?php include 'include/footer.php'; ?>
      <!-- end footer -->
      <?php include 'include/footer-section.php'; ?>
   </body>
</html>