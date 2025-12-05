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
   
   <!-- Service Cards Section -->
<section class="service-cards-section" style="padding: 60px 0; background: #f8f9fa;">
   <div class="container">
      <div class="row">
         <div class="col-md-12 text-center mb-4">
            <h2 style="font-size: 2.5rem; font-weight: 700; color: #1f1f1f; margin-bottom: 10px;">
               Our Services
            </h2>
            <p style="font-size: 1.1rem; color: #666; max-width: 600px; margin: 0 auto;">
               Choose from our range of services for a complete experience
            </p>
         </div>
      </div>

      <div class="row mt-4">

         <!-- Hotel Rooms -->
         <div class="col-lg-4 col-md-6 mb-4">
            <div class="service-card">
               <div class="service-icon" style="background: linear-gradient(135deg, #8e3a02, #f95e03);">
                  <i class="fa fa-bed"></i>
               </div>
               <h3>Hotel Rooms</h3>
               <p>Comfortable AC and Non-AC rooms with modern amenities for a relaxing stay.</p>
               <a href="room.php" class="service-btn">
                  <i class="fa fa-arrow-right"></i> Book Room
               </a>
            </div>
         </div>

         <!-- Restaurant -->
         <div class="col-lg-4 col-md-6 mb-4">
            <div class="service-card">
               <div class="service-icon" style="background: linear-gradient(135deg, #f95e03, #8e3a02);">
                  <i class="fa fa-cutlery"></i>
               </div>
               <h3>Restaurant</h3>
               <p>Delicious veg, non-veg, and South Indian dishes prepared fresh daily.</p>
               <a href="restaurant.php" class="service-btn">
                  <i class="fa fa-arrow-right"></i> Book Table
               </a>
            </div>
         </div>

         <!-- Travel Guide -->
         <div class="col-lg-4 col-md-6 mb-4">
            <div class="service-card">
               <div class="service-icon" style="background: linear-gradient(135deg, #8e3a02, #f95e03);">
                  <i class="fa fa-map-marker"></i>
               </div>
               <h3>Travel Guide</h3>
               <p>Explore Chimur, Tadoba, and nearby tourist attractions with our guide.</p>
               <a href="chimur-tourism.php" class="service-btn">
                  <i class="fa fa-arrow-right"></i> Explore
               </a>
            </div>
         </div>

      </div>
   </div>
</section>

<style>
/* Card */
.service-card {
   background: #fff;
   border-radius: 15px;
   padding: 35px;
   text-align: center;
   box-shadow: 0 5px 20px rgba(0,0,0,0.1);
   transition: 0.3s ease;
   height: 100%;
}
.service-card:hover {
   transform: translateY(-10px);
   box-shadow: 0 10px 30px rgba(0,0,0,0.15);
}

/* Icon Circle */
.service-icon {
   width: 80px;
   height: 80px;
   border-radius: 50%;
   display: flex;
   align-items: center;
   justify-content: center;
   margin: 0 auto 20px;
   font-size: 2.5rem;
   color: #fff;
}

.service-card h3 {
   font-size: 1.5rem;
   font-weight: 700;
   color: #1f1f1f;
   margin-bottom: 15px;
}

.service-card p {
   color: #666;
   line-height: 1.7;
   margin-bottom: 25px;
}


.service-btn {
   display: inline-block;
   padding: 12px 30px;
   background: linear-gradient(135deg, #8e3a02, #f95e03);
   color: #fff !important;
   border-radius: 50px;
   font-weight: 600;
   text-decoration: none;
   transition: 0.3s ease;
}
.service-btn:hover {
   transform: translateY(-2px);
   box-shadow: 0 5px 15px rgba(0,0,0,0.2);
}

@media (max-width: 768px) {
   .service-cards-section {
      padding: 40px 0 !important;
   }
   .service-card {
      margin-bottom: 20px;
      padding: 28px !important;
   }
   .service-btn {
      width: 100%;
      padding: 14px;
   }
}
</style>

  <!-- ABOUT SECTION -->
<section class="about" style="padding:60px 0; background:#fff;">
   <div class="container">

     
      <div class="row mb-5">
         <div class="col-md-12 text-center">
            <h2 style="font-size:2.5rem; font-weight:700; color:#1f1f1f; margin-bottom:10px;">
               About Balaji Hotel & Lodge
            </h2>
            <p style="font-size:1.1rem; color:#666; max-width:700px; margin:0 auto;">
               Comfort, delicious food, and a peaceful stay in the heart of Chimur.
            </p>
         </div>
      </div>

      <div class="row">

   <!-- HOTEL CARD -->
<div class="col-lg-6 col-md-6 mb-4">
   <article class="about-feature-card hotel-section"
      style="background:rgba(142,58,2,0.08); border-left:4px solid #8e3a02; border-radius:15px; padding:35px; height:100%;">

      <div class="feature-icon"
         style="width:70px; height:70px; background:#8e3a02; border-radius:50%; display:flex; align-items:center; justify-content:center; margin-bottom:20px; font-size:2rem; color:#fff;">
         <i class="fa fa-bed"></i>
      </div>

      <h3 style="font-size:1.8rem; font-weight:700; color:#1f1f1f; margin-bottom:15px;">Our Hotel</h3>

      <p style="color:#555; line-height:1.7;">
         Balaji Hotel provides clean, comfortable AC & Non-AC rooms with a peaceful atmosphere.
         Ideal for families, tourists, and travelers visiting Chimur and nearby locations.
      </p>

<a href="room.php" class="feature-btn hotel-btn"
   style="
      display:inline-block;
      padding:12px 28px;
      border-radius:50px;
      text-decoration:none;
      font-weight:600;
      margin-right:12px;
      background:#8e3a02;       
      color:#fff;
      border:none;
   ">
   <i class="fa fa-eye"></i> View Rooms
</a>


<a href="about.php" class="feature-btn-outline hotel-btn-outline"
   style="
      display:inline-block;
      padding:12px 28px;
      border-radius:50px;
      text-decoration:none;
      font-weight:600;
      color:#8e3a02;            
      border:2px solid #8e3a02; 
      background:transparent;    
   ">
   Learn More
</a>


   </article>
</div>




         <!-- RESTAURANT CARD -->
         <div class="col-lg-6 col-md-6 mb-4">
            <article class="about-feature-card restaurant-section"
               style="background:rgba(46,139,87,0.08); border-left:4px solid #2E8B57; border-radius:15px; padding:35px; height:100%;">

               <div class="feature-icon"
                  style="width:70px; height:70px; background:#2E8B57; border-radius:50%; display:flex; align-items:center; justify-content:center; margin-bottom:20px; font-size:2rem; color:#fff;">
                  <i class="fa fa-cutlery"></i>
               </div>

               <h3 style="font-size:1.8rem; font-weight:700; color:#1f1f1f; margin-bottom:15px;">Our Restaurant</h3>

               <p style="color:#555; line-height:1.7;">
                  Enjoy fresh, tasty veg & non-veg food with homely flavor. Perfect for family meals, 
                  lunch, dinner, and group gatherings.
               </p>

               <a href="restaurant.php" class="feature-btn restaurant-btn"
                  style="display:inline-block; padding:12px 28px; border-radius:50px; text-decoration:none; font-weight:600; margin-right:12px;">
                  <i class="fa fa-cutlery"></i> View Menu
               </a>

               <a href="restaurant.php" class="feature-btn-outline restaurant-btn-outline"
                  style="display:inline-block; padding:12px 28px; border-radius:50px; text-decoration:none; font-weight:600;">
                  Book Table
               </a>

            </article>
         </div>

      </div>
   </div>
</section>

<style>
.about-feature-card {
   transition:0.3s;
}
.about-feature-card:hover {
   transform:translateY(-5px);
   box-shadow:0 10px 25px rgba(0,0,0,0.12);
}


.feature-btn,
.feature-btn-outline {
   display:inline-block;
   padding:12px 32px;      
   border-radius:50px;
   font-weight:600;
   font-size:1rem;
   text-decoration:none;
   transition:0.3s ease;
   min-width:165px;          
   text-align:center;        
}


.hotel-btn {
   background:#8e3a02 !important;
   color:#fff !important;
}
.hotel-btn-outline {
   background:transparent !important;
   color:#8e3a02 !important;
   border:2px solid  #8e3a02 !important;
}


.restaurant-btn {
   background:#2E8B57 !important;
   color:#fff !important;
}
.restaurant-btn-outline {
   background:transparent !important;
   color:#2E8B57 !important;
   border:2px solid #2E8B57 !important;
}


.hotel-btn:hover,
.hotel-btn-outline:hover,
.restaurant-btn:hover,
.restaurant-btn-outline:hover {
   transform:translateY(-3px);
   box-shadow:0 4px 10px rgba(0,0,0,0.15);
}


@media (max-width:768px) {
   .feature-btn,
   .feature-btn-outline {
      width:100%;           
      min-width:100%;       
      margin-bottom:10px;
   }
}

   h2 { font-size:2rem !important; }
   h3 { font-size:1.5rem !important; }

</style>



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