<!DOCTYPE html>
<html lang="en">
   <head>
      <?php include 'include/header-section.php'; ?>

      <style>
         /* remove underline, focus line, hover line, blue line, all lines */
         a, a:hover, a:focus, a:active {
            text-decoration: none !important;
            outline: none !important;
            box-shadow: none !important;
            border: none !important;
         }

         /* remove button bottom line */
         .btn, 
         .btn:hover, 
         .btn:focus, 
         .btn:active {
            outline: none !important;
            box-shadow: none !important;
            border: none !important;
         }
      </style>

      <title>Contact - Balaji Hotel And Lodge Chimur</title>
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
                     <h2><span>Contact Us</span></h2>
                     <p class="subtitle">Get in Touch - We're Here to Help You Plan Your Stay</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!--  contact -->
      <?php include 'include/contact.php'; ?>
      <!-- end contact -->
      <!--  footer -->
      <?php include 'include/footer.php'; ?>
      <!-- end footer -->
      <?php include 'include/footer-section.php'; ?>
   </body>
</html>