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
               <h2 style="font-size: 2.5rem; font-weight: 700; color: #1f1f1f; margin-bottom: 10px;">Our Services</h2>
               <p style="font-size: 1.1rem; color: #666; max-width: 600px; margin: 0 auto;">Choose from our range of services for a complete experience</p>
            </div>
         </div>
         <div class="row mt-4">
            <div class="col-lg-4 col-md-6 mb-4">
               <div class="service-card" style="background: #fff; border-radius: 15px; padding: 35px; text-align: center; box-shadow: 0 5px 20px rgba(0,0,0,0.1); transition: all 0.3s ease; height: 100%;">
                  <div class="service-icon" style="width: 80px; height: 80px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px; font-size: 2.5rem; color: #fff;">
                     <i class="fa fa-bed"></i>
                  </div>
                  <h3 style="font-size: 1.5rem; font-weight: 700; color: #1f1f1f; margin-bottom: 15px;">Hotel Rooms</h3>
                  <p style="color: #666; line-height: 1.7; margin-bottom: 25px;">Comfortable AC and Non-AC rooms with modern amenities for a relaxing stay</p>
                  <a href="room.php" class="service-btn" style="display: inline-block; padding: 12px 30px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: #fff; border-radius: 50px; text-decoration: none; font-weight: 600; transition: all 0.3s ease;">
                     <i class="fa fa-arrow-right"></i> Book Room
                  </a>
               </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
               <div class="service-card" style="background: #fff; border-radius: 15px; padding: 35px; text-align: center; box-shadow: 0 5px 20px rgba(0,0,0,0.1); transition: all 0.3s ease; height: 100%;">
                  <div class="service-icon" style="width: 80px; height: 80px; background: linear-gradient(135deg, #f5576c 0%, #f093fb 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px; font-size: 2.5rem; color: #fff;">
                     <i class="fa fa-cutlery"></i>
                  </div>
                  <h3 style="font-size: 1.5rem; font-weight: 700; color: #1f1f1f; margin-bottom: 15px;">Restaurant</h3>
                  <p style="color: #666; line-height: 1.7; margin-bottom: 25px;">Delicious veg, non-veg, and South Indian dishes prepared fresh daily</p>
                  <a href="restaurant.php" class="service-btn" style="display: inline-block; padding: 12px 30px; background: linear-gradient(135deg, #f5576c 0%, #f093fb 100%); color: #fff; border-radius: 50px; text-decoration: none; font-weight: 600; transition: all 0.3s ease;">
                     <i class="fa fa-arrow-right"></i> Book Table
                  </a>
               </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
               <div class="service-card" style="background: #fff; border-radius: 15px; padding: 35px; text-align: center; box-shadow: 0 5px 20px rgba(0,0,0,0.1); transition: all 0.3s ease; height: 100%;">
                  <div class="service-icon" style="width: 80px; height: 80px; background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px; font-size: 2.5rem; color: #fff;">
                     <i class="fa fa-map-marker"></i>
                  </div>
                  <h3 style="font-size: 1.5rem; font-weight: 700; color: #1f1f1f; margin-bottom: 15px;">Travel Guide</h3>
                  <p style="color: #666; line-height: 1.7; margin-bottom: 25px;">Explore Chimur, Tadoba, and nearby tourist attractions with our guide</p>
                  <a href="chimur-tourism.php" class="service-btn" style="display: inline-block; padding: 12px 30px; background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); color: #fff; border-radius: 50px; text-decoration: none; font-weight: 600; transition: all 0.3s ease;">
                     <i class="fa fa-arrow-right"></i> Explore
                  </a>
               </div>
            </div>
         </div>
      </div>
   </section>
   <style>
   .service-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 10px 30px rgba(0,0,0,0.15);
   }
   .service-btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 5px 15px rgba(0,0,0,0.2);
      text-decoration: none;
      color: #fff;
   }
   @media (max-width: 768px) {
      .service-cards-section {
         padding: 40px 0;
      }
      .service-card {
         margin-bottom: 20px;
      }
   }
   </style>
   
   <!-- about -->
   <div class="about" style="padding: 60px 0; background: #fff;">
      <div class="container">
         <div class="row mb-5">
            <div class="col-md-12 text-center">
               <h2 style="font-size: 2.5rem; font-weight: 700; color: #1f1f1f; margin-bottom: 10px;">About Us</h2>
               <p style="font-size: 1.1rem; color: #666; max-width: 700px; margin: 0 auto;">Your trusted partner for comfortable stay and delicious meals in Chimur</p>
            </div>
         </div>
         <div class="row">
            <div class="col-lg-6 col-md-6 mb-4">
               <div class="about-feature-card" style="background: linear-gradient(135deg, rgba(102, 126, 234, 0.05) 0%, rgba(118, 75, 162, 0.05) 100%); border-radius: 15px; padding: 35px; height: 100%; border-left: 4px solid #667eea;">
                  <div class="feature-icon" style="width: 70px; height: 70px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-bottom: 20px; font-size: 2rem; color: #fff;">
                     <i class="fa fa-bed"></i>
                  </div>
                  <h3 style="font-size: 1.8rem; font-weight: 700; color: #1f1f1f; margin-bottom: 15px;">Our Hotel</h3>
                  <p style="color: #666; line-height: 1.8; margin-bottom: 20px;">Balaji Hotel is a clean, comfortable, and family-friendly place to stay in Chimur. We offer well-maintained AC and Non-AC rooms for travelers, families, and tourists visiting Chimur and nearby attractions.</p>
                  <a href="room.php" class="feature-btn" style="display: inline-block; padding: 10px 25px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: #fff; border-radius: 50px; text-decoration: none; font-weight: 600; transition: all 0.3s ease; margin-right: 10px;">
                     <i class="fa fa-eye"></i> View Rooms
                  </a>
                  <a href="about.php" class="feature-btn-outline" style="display: inline-block; padding: 10px 25px; background: transparent; color: #667eea; border: 2px solid #667eea; border-radius: 50px; text-decoration: none; font-weight: 600; transition: all 0.3s ease;">
                     Learn More
                  </a>
               </div>
            </div>
            <div class="col-lg-6 col-md-6 mb-4">
               <div class="about-feature-card" style="background: linear-gradient(135deg, rgba(245, 87, 108, 0.05) 0%, rgba(240, 147, 251, 0.05) 100%); border-radius: 15px; padding: 35px; height: 100%; border-left: 4px solid #f5576c;">
                  <div class="feature-icon" style="width: 70px; height: 70px; background: linear-gradient(135deg, #f5576c 0%, #f093fb 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-bottom: 20px; font-size: 2rem; color: #fff;">
                     <i class="fa fa-cutlery"></i>
                  </div>
                  <h3 style="font-size: 1.8rem; font-weight: 700; color: #1f1f1f; margin-bottom: 15px;">Our Restaurant</h3>
                  <p style="color: #666; line-height: 1.8; margin-bottom: 20px;">Our restaurant serves pure veg, non-veg, and South Indian dishes, prepared fresh with good quality and homely taste. Whether you are looking for a simple meal or a full family lunch/dinner, we have something for everyone.</p>
                  <a href="restaurant.php" class="feature-btn" style="display: inline-block; padding: 10px 25px; background: linear-gradient(135deg, #f5576c 0%, #f093fb 100%); color: #fff; border-radius: 50px; text-decoration: none; font-weight: 600; transition: all 0.3s ease; margin-right: 10px;">
                     <i class="fa fa-cutlery"></i> View Menu
                  </a>
                  <a href="restaurant.php" class="feature-btn-outline" style="display: inline-block; padding: 10px 25px; background: transparent; color: #f5576c; border: 2px solid #f5576c; border-radius: 50px; text-decoration: none; font-weight: 600; transition: all 0.3s ease;">
                     Book Table
                  </a>
               </div>
            </div>
         </div>
      </div>
   </div>
   <style>
   .about-feature-card {
      transition: all 0.3s ease;
   }
   .about-feature-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 25px rgba(0,0,0,0.1);
   }
   .feature-btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 5px 15px rgba(0,0,0,0.2);
      text-decoration: none;
      color: #fff;
   }
   .feature-btn-outline:hover {
      background: #667eea;
      color: #fff;
      border-color: #667eea;
      text-decoration: none;
      transform: translateY(-2px);
   }
   .feature-btn-outline[style*="#f5576c"]:hover {
      background: #f5576c;
      border-color: #f5576c;
   }
   @media (max-width: 768px) {
      .about {
         padding: 40px 0;
      }
      .about-feature-card {
         margin-bottom: 20px;
      }
   }
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