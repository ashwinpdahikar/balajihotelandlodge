<!DOCTYPE html>
<html lang="en">

<head>
   <?php include 'include/header-section.php'; ?>
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
   <?php require_once __DIR__ . '/include/functions.php'; $page = get_page_by_slug('about'); ?>
   <div class="about">
      <div class="container-fluid">
         <div class="row">
            <div class="col-md-5">
               <div class="titlepage">
                  <h2><?php echo h($page['title'] ?? 'About Us'); ?></h2>
                  <p><?php echo h(mb_substr(strip_tags($page['content'] ?? ''), 0, 250)); ?>...</p>
                  <a class="read_more" href="about.php"> Read More</a>
               </div>
            </div>
            <div class="col-md-7">
               <div class="about_img">
                  <figure><img src="images/about.png" alt="#" /></figure>
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