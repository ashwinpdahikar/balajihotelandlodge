<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'include/header-section.php'; ?>
    <title>Our Rooms - Balaji Hotel And Lodge Chimur</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
			 <link rel="icon" href="images/BalajiHotelLogo.png" type="image" />

  <link rel="canonical" href="https://www.balajihotelchimur.com/" />
  <meta name="title" content="Balaji Hotel And Lodge Chimur">
   <meta name="description" content="Comfortable rooms, delicious food, and best stay experience at Balaji Hotel & Lodge Chimur near Tadoba. Book rooms, restaurant, and travel services.">
   <meta name="keywords" content="Balaji Hotel Chimur, Lodge Chimur, Rooms Chimur, Tadoba Hotels, Restaurant Chimur">
   <meta name="robots" content="index, follow">

   <meta property="og:title" content="Balaji Hotel And Lodge Chimur">
   <meta property="og:description" content="Best hotel near Tadoba with rooms, restaurant & travel services.">
<meta property="og:image" content="https://www.balajihotelchimur.com/images/og-image.jpg"> 
  <meta property="og:type" content="website">
   <meta name="twitter:card" content="summary_large_image">

<script async src="https://www.googletagmanager.com/gtag/js?id=G-F0L8N4ZV5G"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'G-F0L8N4ZV5G');
</script>

    <style>
        /* Room Card Styling */
        .room-card {
            background: #fff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0,0,0,0.15);
            transition: .3s ease;
        }
        .room-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 6px 25px rgba(0,0,0,0.22);
        }
        .room-img img {
            width: 100%;
            height: 230px;
            object-fit: cover;
            transition: .3s;
        }
        .room-card:hover .room-img img {
            transform: scale(1.05);
        }
        .room-info {
            padding: 20px;
        }
        .room-info h3 {
            font-size: 22px;
            font-weight: 600;
        }
        .room-info p {
            font-size: 15px;
            color: #555;
        }
        .room-amenities {
            margin-top: 10px;
            font-size: 14px;
        }
        .room-amenities i {
            color: #c59d5f;
            margin-right: 8px;
        }
        .price-box {
            font-size: 20px;
            font-weight: 700;
            color: #c59d5f;
            margin-top: 10px;
        }
        .book-btn {
            margin-top: 15px;
            padding: 10px 18px;
            background: #c59d5f;
            color: white;
            border-radius: 6px;
            display: inline-block;
            transition: .3s;
        }
        .book-btn:hover {
            background: #a8854d;
            color: #fff;
        }
    </style>

</head>

<body class="main-layout">

    <?php include 'include/loader.php'; ?>
    <?php include 'include/header.php'; ?>

    <div class="back_re">
        <div class="decorative-corner top-left"></div>
        <div class="decorative-corner top-right"></div>
        <div class="decorative-corner bottom-left"></div>
        <div class="decorative-corner bottom-right"></div>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title text-center">
                        <h1><span>Our Rooms</span></h1>
                        <p class="subtitle">Comfortable AC & Non-AC Rooms for Your Perfect Stay</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php 
        $hide_section_title = true; 
        include 'include/our_room.php'; 
    ?>

    <?php include 'include/footer.php'; ?>
    <?php include 'include/footer-section.php'; ?>

</body>
</html>