<?php include 'include/header-section.php'; ?>
<?php include 'include/loader.php'; ?>
<?php include 'include/header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hari Balaji Temple</title>

    <style>
        body{
            margin:0;
            font-family: Arial, sans-serif;
            background:#f5f5f5;
        }

        /* ---------- Banner ---------- */
        .top-banner{
            width:100%;
            height:350px;
            background:url('images/balaji_img4.jpeg') no-repeat center center/cover;
            display:flex;
            align-items:center;
            justify-content:center;
            color:white;
            font-size:42px;
            font-weight:bold;
            text-shadow:2px 2px 6px rgba(0,0,0,0.5);
        }

        /* ---------- MAIN CONTAINER ---------- */
        .section-box{
            max-width:1100px;
            margin:40px auto;
            padding:30px;
            background:white;
            border-radius:10px;
            box-shadow:0 0 10px rgba(0,0,0,0.1);
        }

        h2{
            font-size:28px;
            color:#8e3a02;
            margin-bottom:15px;
        }

        p{
            font-size:16px;
            line-height:1.7;
            color:#444;
        }

        /* ---------- ABOUT SECTION ---------- */
        .about-section{
            display:flex;
            flex-wrap:wrap;
            gap:25px;
            align-items:center;
        }

        .about-section img{
            width:45%;
            min-width:280px;
            border-radius:10px;
            border:3px solid #8e3a02;
        }

        .about-text{
            width:50%;
            min-width:280px;
        }

        /* ---------- Gallery ---------- */
        .gallery{
            display:grid;
            grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
            gap:15px;
            margin-top:25px;
        }

        .gallery img{
            width:100%;
            height:180px;
            object-fit:cover;
            border-radius:8px;
            border:2px solid #8e3a02;
        }

        /* ---------- MAP ---------- */
        .map-box iframe{
            width:100%;
            height:350px;
            border:0;
            border-radius:10px;
        }

        .bottom-space{
            height:40px;
        }

        /* ---------- OUR ROOMS ---------- */
        .our_room .row{
            display:flex;
            flex-wrap:wrap;
            gap:20px;
            margin-top:20px;
        }

        .room_card{
            background:#fff;
            padding:15px;
            border-radius:10px;
            box-shadow:0 4px 10px rgba(0,0,0,0.1);
            text-align:center;
            flex:1 1 calc(33.333% - 20px);
        }

        .room_img{
            width:100%;
            height:230px;
            object-fit:cover;
            border-radius:10px;
        }

        .room_title{
            font-size:20px;
            margin-top:10px;
            font-weight:600;
        }

        .room_desc{
            font-size:14px;
            color:#555;
        }

        .room_details p{
            margin:5px 0;
            font-size:14px;
            color:#444;
        }

        .room_price{
            font-size:18px;
            font-weight:bold;
            margin-top:5px;
        }

        .book_btn{
            padding:10px 18px;
            background:#8e3a02; 
            color:#fff;
            border:none;
            border-radius:5px;
            cursor:pointer;
            margin-top:10px;
            transition:0.3s;
        }
        .book_btn:hover{
            background:#8A5F45; 
        }

        /* Status Colors */
        .status.available { color: green; font-weight: bold; }
        .status.not_available { color: red; font-weight: bold; }
        .status.few_rooms_left { color: #d08800; font-weight: bold; }

        /* ---------- RESPONSIVE ---------- */
        @media(max-width:1024px){
            .about-section img, .about-text{
                width:100%;
            }

            .room_card{
                flex:1 1 calc(50% - 20px);
            }
        }

        @media(max-width:768px){
            .top-banner{
                font-size:32px;
                height:250px;
            }

            .section-box{
                padding:20px;
                margin:30px 10px;
            }

            .room_card{
                flex:1 1 100%;
            }

            .gallery img{
                height:150px;
            }

            .map-box iframe{
                height:250px;
            }
        }

        @media(max-width:480px){
            h2{
                font-size:22px;
            }

            p{
                font-size:14px;
            }

            .top-banner{
                font-size:24px;
                height:200px;
            }
        }

    </style>
</head>

<body>

    <!-- TOP BANNER -->
    <div class="top-banner">
        Hari Balaji Temple
    </div>

    <!-- ABOUT SECTION -->
    <div class="section-box">
        <h2>About Hari Balaji Temple</h2>

        <div class="about-section">
            <img src="images/balaji_img2.jpeg" alt="Temple Image">

            <div class="about-text">
                <p>
                    Hari Balaji Temple is a peaceful and spiritual destination dedicated to Lord Balaji. 
                    Devotees visit this place to experience divine blessings, calm environment, and positive energy. 
                    The temple follows traditional rituals and provides various facilities for visitors.
                </p>

                <p>
                    Situated in a serene location, this temple offers a wonderful devotional atmosphere.
                </p>
            </div>
        </div>
    </div>

    <!-- GALLERY SECTION -->
    <div class="section-box">
        <h2>Temple View Gallery</h2>

        <p>The beauty of the temple is captured in the images below.The term "Hari Balaji Temple" can refer to different temples, most commonly the famous Tirumala Venkateswara Temple in Tirupati, Andhra Pradesh, which is dedicated to Lord Venkateswara (also known as Balaji). However, other temples named "Shri Hari Balaji Devsthan" or similar exist, such as one located in Chimur, Chandrapur. To find the correct temple, it's important to consider the location and specific name. </p>

        <div class="gallery">
            <img src="images/balaji_gate.jpg" alt="">
            <img src="images/balaji_img2.jpeg" alt="">
            <img src="images/balaji_img3.jpeg" alt="">
            <img src="images/balaji_img4.jpeg" alt="">
        </div>
    </div>

    <!-- ACCOMMODATION SECTION -->
    <div class="section-box" id="accommodation">
        <h2>Accommodation</h2>
        <p>Comfortable rooms and guest facilities are available for devotees who wish to stay. Clean rooms, peaceful environment, and basic amenities are provided.</p>

        <div class="our_room">
            <div class="row">
                <?php
                $rooms = [
                    ['id'=>1,'name'=>'Deluxe AC Room','price'=>'1200','image'=>'images/room1.jpg','desc'=>'A premium AC room with modern facilities.','category'=>'AC Room','available'=>'Available'],
                    ['id'=>2,'name'=>'Luxury Room','price'=>'1800','image'=>'images/room2.jpg','desc'=>'Spacious luxury room with elegant interiors.','category'=>'Luxury AC Room','available'=>'Available'],
                    ['id'=>3,'name'=>'Non-AC Budget Room','price'=>'700','image'=>'images/room3.jpg','desc'=>'Affordable non-AC room with all basic amenities.','category'=>'Non-AC Room','available'=>'Few Rooms Left'],
                    ['id'=>4,'name'=>'Family Suite','price'=>'2500','image'=>'images/room4.jpg','desc'=>'Perfect for families with spacious room and extra comfort.','category'=>'Family Room','available'=>'Available'],
                    ['id'=>5,'name'=>'Premium AC Room','price'=>'1500','image'=>'images/room5.jpg','desc'=>'A well-furnished premium AC room with king-size bed.','category'=>'Premium AC','available'=>'Not Available'],
                    ['id'=>6,'name'=>'Standard Room','price'=>'900','image'=>'images/room6.jpg','desc'=>'A simple and comfortable room for budget-friendly stays.','category'=>'Standard Room','available'=>'Available']
                ];

                foreach($rooms as $room){ ?>
                    <div class="room_card">
                        <img src="<?php echo $room['image']; ?>" class="room_img" alt="">
                        <h3 class="room_title"><?php echo $room['name']; ?></h3>
                        <p class="room_desc"><?php echo $room['desc']; ?></p>
                        <div class="room_details">
                            <p><strong>Category:</strong> <?php echo $room['category']; ?></p>
                            <p><strong>Status:</strong> <span class="status <?php echo strtolower(str_replace(' ', '_', $room['available'])); ?>"><?php echo $room['available']; ?></span></p>
                        </div>
                        <h4 class="room_price">₹<?php echo $room['price']; ?>/Night</h4>
                        <button class="book_btn" data-room-id="<?php echo $room['id']; ?>" data-room-name="<?php echo $room['name']; ?>" onclick="openBookingModal(this)">Book Now</button>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <!-- LOCATION MAP SECTION -->
    <div class="section-box">
        <h2>Temple Location</h2>
        <p>Find the temple location on the map below:</p>

        <div class="map-box">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15074.108601193536!2d79.345!3d20.441!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjDCsDI2JzI3LjYiTiA3OcKwMjEnMDIuMCJF!5e0!3m2!1sen!2sin!4v0000000000000"></iframe>
        </div>
    </div>

    <div class="bottom-space"></div>

</body>
</html>

<?php include 'include/footer.php'; ?>
<?php include 'include/footer-section.php'; ?>
