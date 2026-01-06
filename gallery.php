<!DOCTYPE html>
<html lang="en">
   <head>
      <?php include 'include/header-section.php'; ?>
      <title>Gallery - Balaji Hotel And Lodge Chimur</title>
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
		  	 <link rel="icon" href="images/BalajiHotelLogo.png" type="image" />

   <link rel="canonical" href="https://www.balajihotelchimur.com/" />
   <script async src="https://www.googletagmanager.com/gtag/js?id=G-F0L8N4ZV5G"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'G-F0L8N4ZV5G');
</script>
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
                     <h1><span>Gallery</span></h1>
                     <p class="subtitle">Explore Our Hotel, Rooms & Facilities Through Images</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- gallery -->
      <?php 
      $hide_section_title = true; // Hide duplicate title section on gallery.php page
      include 'include/gallery.php'; 
      ?>
      <!-- end gallery -->
    
      <!--  footer -->
      <?php include 'include/footer.php'; ?>
      <!-- end footer -->
      <?php include 'include/footer-section.php'; ?>
   </body>
</html>