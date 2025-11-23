<!DOCTYPE html>
<html lang="en">
   <head>
      <?php include 'include/header-section.php'; ?>
      <title>About - Balaji Hotel And Lodge Chimur</title>
      <style>
         /* About Page Custom Styles */
         .about {
            padding: 60px 0;
         }
         .about .titlepage h2 {
            font-size: 32px;
            font-weight: 600;
            margin-bottom: 16px;
            color: #1f1f1f;
         }
         .about .titlepage p {
            font-size: 16px;
            line-height: 1.8;
            color: #555;
         }
         .about_img figure img {
            width: 100%;
            height: auto;
            transition: transform 0.3s ease;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
         }
         .about_img figure img:hover {
            transform: scale(1.02);
         }
         
         /* Introduction Section */
         .about-intro-text {
            font-size: 16px;
            line-height: 1.8;
            color: #555;
            margin-top: 20px;
         }
         .about-intro-text.second {
            margin-top: 15px;
         }
         
         /* Restaurant Section */
         .about-restaurant-section {
            background: #f8f9fa;
            padding: 40px 30px;
            border-radius: 10px;
            margin: 0 -15px;
         }
         .about-section-icon {
            font-size: 48px;
            color: #d4af37;
            margin-bottom: 20px;
        }
         .about-section-title {
            color: #1f1f1f;
            margin-bottom: 20px;
         }
         .about-section-text {
            font-size: 16px;
            line-height: 1.8;
            color: #555;
            text-align: center;
            max-width: 800px;
            margin: 0 auto;
         }
         
         /* Location Section */
         .about-location-text {
            font-size: 16px;
            line-height: 1.8;
            color: #555;
            text-align: center;
            max-width: 800px;
            margin: 0 auto 30px;
         }
         
         /* Attraction Cards */
         .about-attraction-card {
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
         }
         .about-attraction-icon {
            font-size: 36px;
            color: #d4af37;
            margin-bottom: 15px;
         }
         .about-attraction-title {
            font-size: 18px;
            margin-bottom: 10px;
         }
         .about-attraction-text {
            font-size: 14px;
            color: #666;
            margin: 0;
         }
         
         /* Service Focus Section */
         .about-service-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 50px 30px;
            border-radius: 10px;
            margin: 0 -15px;
            color: #fff;
         }
         .about-service-icon {
            font-size: 48px;
            color: #fff;
            margin-bottom: 20px;
         }
         .about-service-title {
            color: #fff;
            margin-bottom: 20px;
         }
         .about-service-item-icon {
            font-size: 40px;
            color: #fff;
            margin-bottom: 15px;
         }
         .about-service-item-title {
            color: #fff;
            font-size: 20px;
            margin-bottom: 10px;
         }
         .about-service-item-text {
            color: rgba(255,255,255,0.9);
            font-size: 15px;
            margin: 0;
         }
         
         /* Mission Section */
         .about-mission-box {
            padding: 40px 20px;
            background: #fff;
            border: 2px solid #d4af37;
            border-radius: 10px;
         }
         .about-mission-icon {
            font-size: 48px;
            color: #d4af37;
            margin-bottom: 20px;
         }
         .about-mission-title {
            color: #1f1f1f;
            margin-bottom: 20px;
         }
         .about-mission-text {
            font-size: 18px;
            line-height: 1.8;
            color: #555;
            max-width: 900px;
            margin: 0 auto;
            font-style: italic;
         }
         
         /* Responsive adjustments */
         @media (max-width: 991px) {
            .about {
               padding: 40px 0;
            }
            .about .titlepage h2 {
               font-size: 28px;
            }
            .about .titlepage p {
               font-size: 15px;
            }
            .about-restaurant-section,
            .about-service-section {
               padding: 30px 25px;
            }
         }
         @media (max-width: 767px) {
            .about {
               padding:0px
            }
            .about .titlepage h2 {
               font-size: 24px;
               margin-bottom: 20px;
            }
            .about .titlepage p {
               font-size: 14px;
            }
            .about-restaurant-section,
            .about-service-section {
               padding: 20px 20px;
            }
            .about-section-icon,
            .about-service-icon,
            .about-mission-icon {
               font-size: 36px;
            }
            .about .text-center h2 {
               font-size: 22px;
            }
            .about .col-md-4 {
               margin-bottom: 20px;
            }
            .about-section-text,
            .about-location-text {
               font-size: 15px;
            }
         }
         @media (max-width: 575px) {
            .about-restaurant-section,
            .about-service-section {
               padding: 25px 15px;
            }
            .about .text-center h2 {
               font-size: 20px;
            }
            .about-section-icon,
            .about-service-icon,
            .about-mission-icon {
               font-size: 32px;
            }
            .about-attraction-card {
               padding: 15px;
            }
            .about-attraction-title {
               font-size: 16px;
            }
            .about-attraction-text {
               font-size: 13px;
            }
            .about-service-item-title {
               font-size: 18px;
            }
            .about-service-item-text {
               font-size: 14px;
            }
            .about-mission-text {
               font-size: 16px;
            }
         }
      </style>
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
                     <h2><span>About Us</span></h2>
                     <p class="subtitle">Discover Our Story, Hospitality & Commitment to Your Comfort</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- about -->
      <?php require_once __DIR__ . '/include/functions.php'; ?>
      <div class="about">
         <div class="container">
            <!-- Introduction Section -->
            <div class="row mb-2">
               <div class="col-lg-6 col-md-12 mb-2 mb-lg-0">
                  <div class="about_img">
                     <figure><img src="images/about.png" alt="Balaji Hotel & Restaurant Chimur" class="img-fluid"/></figure>
                  </div>
               </div>
               <div class="col-lg-6 col-md-12">
                  <div class="titlepage">
                     <h2>Welcome to Balaji Hotel & Restaurant</h2>
                     <p class="about-intro-text">
                        Balaji Hotel & Restaurant is a clean, comfortable, and family-friendly place to stay in Chimur. We offer well-maintained AC and Non-AC rooms for travelers, families, and tourists visiting Chimur and nearby attractions.
                     </p>
                     <p class="about-intro-text second">
                        At Balaji Hotel & Restaurant, our goal is to make your stay easy, enjoyable, and memorable. We focus on cleanliness, comfort, and polite service, so every guest feels relaxed and satisfied.
                     </p>
                  </div>
               </div>
            </div>

            <!-- Restaurant Section -->
            <div class="row mb-2 about-restaurant-section">
               <div class="col-md-12">
                  <div class="text-center mb-4">
                     <i class="fa fa-cutlery about-section-icon"></i>
                     <h2 class="about-section-title">Our Restaurant</h2>
                  </div>
                  <p class="about-section-text">
                     Our restaurant serves pure veg, non-veg, and South Indian dishes, prepared fresh with good quality and homely taste. Whether you are looking for a simple meal or a full family lunch/dinner, we have something for everyone.
                  </p>
               </div>
            </div>

            <!-- Location & Attractions Section -->
            <div class="row mb-2">
               <div class="col-md-12">
                  <div class="text-center mb-4">
                     <i class="fa fa-map-marker about-section-icon"></i>
                     <h2 class="about-section-title">Prime Location</h2>
                  </div>
                  <p class="about-location-text">
                     The hotel is located close to popular tourist places like <strong>Tadoba National Park</strong>, <strong>Chimur City Temple</strong>, and other local sightseeing spots, making it a convenient stay for visitors.
                  </p>
                  <div class="row mt-4">
                     <div class="col-md-4 col-sm-6 mb-3">
                        <div class="text-center about-attraction-card">
                           <i class="fa fa-paw about-attraction-icon"></i>
                           <h4 class="about-attraction-title">Tadoba National Park</h4>
                           <p class="about-attraction-text">Wildlife sanctuary nearby</p>
                        </div>
                     </div>
                     <div class="col-md-4 col-sm-6 mb-3">
                        <div class="text-center about-attraction-card">
                           <i class="fa fa-building about-attraction-icon"></i>
                           <h4 class="about-attraction-title">Chimur City Temple</h4>
                           <p class="about-attraction-text">Spiritual destination</p>
                        </div>
                     </div>
                     <div class="col-md-4 col-sm-6 mb-3">
                        <div class="text-center about-attraction-card">
                           <i class="fa fa-camera about-attraction-icon"></i>
                           <h4 class="about-attraction-title">Local Sightseeing</h4>
                           <p class="about-attraction-text">Explore nearby attractions</p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>

            <!-- Service Focus Section -->
            <div class="row mb-5 about-service-section">
               <div class="col-md-12">
                  <div class="text-center mb-4">
                     <i class="fa fa-heart about-service-icon"></i>
                     <h2 class="about-service-title">Our Service Focus</h2>
                  </div>
                  <div class="row mt-4">
                     <div class="col-md-4 col-sm-6 mb-4">
                        <div class="text-center">
                           <i class="fa fa-check-circle about-service-item-icon"></i>
                           <h4 class="about-service-item-title">Cleanliness</h4>
                           <p class="about-service-item-text">Well-maintained rooms and facilities</p>
                        </div>
                     </div>
                     <div class="col-md-4 col-sm-6 mb-4">
                        <div class="text-center">
                           <i class="fa fa-bed about-service-item-icon"></i>
                           <h4 class="about-service-item-title">Comfort</h4>
                           <p class="about-service-item-text">AC and Non-AC rooms available</p>
                        </div>
                     </div>
                     <div class="col-md-4 col-sm-6 mb-4">
                        <div class="text-center">
                           <i class="fa fa-smile-o about-service-item-icon"></i>
                           <h4 class="about-service-item-title">Polite Service</h4>
                           <p class="about-service-item-text">Friendly and welcoming staff</p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>

            <!-- Mission Section -->
            <div class="row">
               <div class="col-md-12">
                  <div class="text-center about-mission-box">
                     <i class="fa fa-star about-mission-icon"></i>
                     <h2 class="about-mission-title">Our Mission</h2>
                     <p class="about-mission-text">
                        At Balaji Hotel & Restaurant, our goal is to make your stay easy, enjoyable, and memorable. We are committed to providing exceptional hospitality and ensuring every guest feels at home.
                     </p>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end about -->
     

      <!--  footer -->
      <?php include 'include/footer.php'; ?>
      <!-- end footer -->
      <?php include 'include/footer-section.php'; ?>
   </body>
</html>