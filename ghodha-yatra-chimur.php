<?php include 'include/header-section.php'; ?>
<?php include 'include/loader.php'; ?>
<?php include 'include/header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ghodha Yatra Chimur</title>

    <style>
        body{
            margin:0;
            font-family: Arial, sans-serif;
            background:#f5f5f5;
        }

/* ---------- Banner ---------- */
.top-banner{
    width: 100%;
    height: 170px; 
    background: 
        linear-gradient(
            rgba(169, 87, 10, 0.83),   /* Warm Orange */
            rgba(138, 61, 2, 0.64)     /* Deep Brown */
        ), 
        url('images/balaji_img4.jpeg') no-repeat center center/cover;

    display: flex;
    flex-direction: column;      /* <-- FIX: title ke niche subtitle */
    align-items: center;
    justify-content: center;
    color: white;
    text-align: center;
    font-size: 36px;
    font-weight: bold;
    text-shadow: 2px 2px 6px rgba(0,0,0,0.5);
}

/* Main title */
.main-title{
    font-size: 36px;
}

/* Subtitle */
.subtitle{
    font-size: 18px;
    margin-top: 5px;
    opacity: 0;
    transform: translateY(10px);
    animation: slideUp 1s ease-out forwards;
}

/* Slide-up animation */
@keyframes slideUp{
    from{
        opacity: 0;
        transform: translateY(10px);
    }
    to{
        opacity: 1;
        transform: translateY(0);
    }
}

/* Responsive */
@media(max-width:768px){
    .main-title{ font-size: 26px; }
    .subtitle{ font-size: 15px; }
}
/* ---------- Banner ---------- */
.top-banner{
    width: 100%;
    height: 170px; 
    background: 
        linear-gradient(
            rgba(169, 87, 10, 0.83),   /* Warm Orange */
            rgba(138, 61, 2, 0.64)     /* Deep Brown */
        ), 
        url('images/balaji_img4.jpeg') no-repeat center center/cover;

    display: flex;
    flex-direction: column;      /* <-- FIX: title ke niche subtitle */
    align-items: center;
    justify-content: center;
    color: white;
    text-align: center;
    font-size: 36px;
    font-weight: bold;
    text-shadow: 2px 2px 6px rgba(0,0,0,0.5);
}

/* Main title */
.main-title{
    font-size: 36px;
}

/* Subtitle */
.subtitle{
    font-size: 18px;
    margin-top: 5px;
    opacity: 0;
    transform: translateY(10px);
    animation: slideUp 1s ease-out forwards;
}

/* Slide-up animation */
@keyframes slideUp{
    from{
        opacity: 0;
        transform: translateY(10px);
    }
    to{
        opacity: 1;
        transform: translateY(0);
    }
}

/* Responsive */
@media(max-width:768px){
    .main-title{ font-size: 26px; }
    .subtitle{ font-size: 15px; }
}



        /* ---------- MAIN CONTAINER ---------- */
        .section-box{
    width:100%;
    margin:20px 0;
    padding:25px 40px;
    background:white;
    border-radius:0; 
    box-shadow:none; 
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
            align-items:flex-start;
            width: 100%;
        }

        .about-section img{
            width:45%;
            min-width:280px;
            border-radius:10px;
            border:3px solid #8e3a02;
            flex-shrink: 0;
        }

        .about-text{
            width:50%;
            min-width:280px;
            flex: 1;
            margin-right: 0;
        }
        .about-text p {
    margin-bottom: 12px;
    line-height: 1.7;
    
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

        /* ---------- NEW SECTION STYLES ---------- */

        .timing-box{
            display:flex;
            flex-wrap:wrap;
            gap:20px;
        }

        .time-card{
            flex:1 1 calc(50% - 20px);
            background:#f9f2ed;
            border-left:4px solid #8e3a02;
            padding:18px;
            border-radius:8px;
        }

        .testimonial-box{
            display:flex;
            flex-direction:column;
            gap:15px;
        }

        .testimonial{
            background:#fff7e9;
            padding:15px;
            border-radius:8px;
            border-left:4px solid #8e3a02;
        }

        .nearby-list a{
            text-decoration:none;
            color:#8e3a02;
            font-weight:bold;
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

            .time-card{
                flex:1 1 100%;
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
        /*Visitor Guidelines Box Styling */
.guidelines-section {
    background: #fff8e8;
    padding: 25px 30px;
    border-radius: 12px;
    border-left: 5px solid #c47b00; 
    box-shadow: 0 4px 12px rgba(0,0,0,0.08);
}

/* Heading style */
.guidelines-section h2 {
    color: #8e3a02;   
    font-weight: 700;
    margin-bottom: 18px;
    text-align: left;
}

/* List styling */
.guidelines-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.guidelines-list li {
    font-size: 16px;
    color: #444;
    margin-bottom: 12px;
    padding: 10px 14px;
    border-radius: 8px;
    background: #ffffff;
    display: flex;
    align-items: center;
    gap: 10px;
    box-shadow: 0 2px 6px rgba(0,0,0,0.05);
    transition: transform 0.2s ease, background 0.2s ease;
}

/* Icon style */
.guidelines-list li i {
    color: #c47b00;
    font-size: 18px;
}

/* Hover animation */
.guidelines-list li:hover {
    transform: translateX(6px);
    background: #fff3d6;
}

/* Mobile */
@media (max-width: 768px) {
    .guidelines-section {
        padding: 20px;
    }

    .guidelines-list li {
        font-size: 15px;
    }
}

/* Nearby Places Section Styling */
.nearby-section {
    margin: 40px 0;
    padding: 30px;
    background: #f7f4ef;
    border-radius: 18px;
    box-shadow: 0px 4px 15px rgba(0,0,0,0.08);
}

.section-title {
    font-size: 28px;
    margin-bottom: 20px;
    text-align: center;
    color: #4c2e05;
    font-weight: 700;
}

.nearby-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
    gap: 20px;
}

.nearby-card {
    background: #ffffff;
    border-radius: 16px;
    padding: 20px;
    border-left: 4px solid #8e3a02;
    transition: 0.3s ease;
    box-shadow: 0px 3px 10px rgba(0,0,0,0.05);
}

.nearby-card .icon {
    font-size: 36px;
    margin-bottom: 10px;
}

.nearby-card h3 a,
.nearby-card h3 {
    color: #8e3a02;
    text-decoration: none;
    font-size: 20px;
    font-weight: 600;
}

.nearby-card p {
    font-size: 14px;
    color: #444;
    line-height: 1.6;
}

/* Hover Effect */
.nearby-card:hover {
    transform: translateY(-6px);
    box-shadow: 0px 8px 18px rgba(0,0,0,0.15);
}

/* Highlight Main Attraction */
.highlight {
    border-left: 6px solid #d47a24;
    background: #fff9f3;
}


.faq-section {
    background: #fdf5e6; /* Soft warm background */
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    margin: 40px 0;
}

.faq-section .section-title {
    color: #8e3a02;
    font-size: 28px;
    text-align: center;
    margin-bottom: 25px;
    font-weight: 700;
}

.faq-container {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.faq-item {
    background: #fff7e9;
    padding: 18px 20px;
    border-radius: 10px;
    border-left: 4px solid #8e3a02;
    cursor: pointer;
    transition: 0.3s ease;
    position: relative;
}

.faq-item:hover {
    transform: translateX(5px);
    background: #fff3d6;
}

.faq-question {
    font-weight: 600;
    font-size: 16px;
    color: #4c2e05;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.faq-answer {
    display: none; /* Hidden by default */
    margin-top: 10px;
    font-size: 14px;
    color: #444;
    line-height: 1.6;
}

/* Plus/Minus Icon */
.faq-icon {
    font-weight: bold;
    font-size: 18px;
    transition: transform 0.3s ease;
}

/* Rotate icon when active */
.faq-item.active .faq-icon {
    transform: rotate(45deg);
}

/* ---------- Responsive ---------- */
@media(max-width:768px){
    .faq-section {
        padding: 20px;
    }
    .faq-section .section-title {
        font-size: 24px;
    }
}




    </style>
</head>

<body>

 <div class="top-banner">
    <div class="main-title">Ghodha Yatra Chimur</div>
    <div class="subtitle">Blessings for Peace, Prosperity & Devotion</div>
</div>



    <!-- ABOUT -->
<div class="section-box">
    <h2>About Ghodha Yatra Chimur
    </h2>
    <div class="about-section">
        <img src="images/ghoda-yatra.jpg" 
             alt="Temple Image" 
             style="width:450px; height:300px; object-fit:cover; border-radius:10px;">
        <div class="about-text">
            <p>
                Ghoda Yatra in Chimur is an ancient festival centered around the old Shri Hari Balaji Temple. According to tradition, a wooden horse chariot carrying the idol of Lord Balaji is taken in a grand night-long procession through Chimur town. The festival begins around Magh (as per the Hindu calendar) and continues for about 15 days, culminating on Maha Shivratri.
ABP Majha
+2
Maharashtra Times
+2
 Over the generations, this yatra has become a symbol of devotion, unity and cultural heritage for the people of Vidarbha.
            </p>
            <p>
                Beyond religion, Ghoda Yatra is also a vibrant community event. Thousands of devotees and visitors from nearby districts gather to participate in the procession, prayers, and fair.
 The streets come alive with energy, faith, and social interactions — for many, visiting Chimur during Ghoda Yatra becomes a pilgrimage of togetherness, faith, and tradition. 
            </p>
        </div>
    </div>
</div>

    <!-- GALLERY -->
    <div class="section-box">
        <h2>Temple View Gallery</h2>
        <p>The beauty of the temple is captured in the images below.</p>

        <div class="gallery">
            <img src="images/balaji_gate.jpg">
            <img src="images/balaji_img2.jpeg">
            <img src="images/balaji_img3.jpeg">
            <img src="images/balaji_img4.jpeg">
        </div>
    </div>

    <!--NEW SECTION: DARSHAN TIMINGS -->
    <div class="section-box">
        <h2>Darshan & Aarti Timings</h2>

        <div class="timing-box">
            <div class="time-card">
                <h3 style="color:#8e3a02;">Morning Timings</h3>
                <p>🔹 Temple Opens: <b>5:30 AM</b></p>
                <p>🔹 Morning Aarti: <b>6:00 AM</b></p>
                <p>🔹 Darshan Hours: <b>6:00 AM – 12:00 PM</b></p>
            </div>

            <div class="time-card">
                <h3 style="color:#8e3a02;">Evening Timings</h3>
                <p>🔹 Temple Opens: <b>4:00 PM</b></p>
                <p>🔹 Evening Aarti: <b>7:00 PM</b></p>
                <p>🔹 Darshan Hours: <b>4:00 PM – 9:00 PM</b></p>
            </div>
        </div>
    </div>

   <!-- NEW SECTION: TESTIMONIALS -->
<div class="section-box">
    <h2>Devotees Testimonials</h2>

    <div class="testimonial-box">

        <div class="testimonial">
            <img src="images/testimonial1.jpg" 
                 alt="Rakesh Kumar"
                 style="width:80px; height:80px; object-fit:cover; border-radius:50%;">
            <p>“A very peaceful and divine place. The morning aarti feels magical!”</p>
            <b>– Rakesh Kumar</b>
        </div>

        <div class="testimonial">
            <img src="images/testimonial2.jpg" 
                 alt="Manisha Sharma"
                 style="width:80px; height:80px; object-fit:cover; border-radius:50%;">
            <p>“Clean and well-maintained temple. The environment is full of positive energy.”</p>
            <b>– Manisha Sharma</b>
        </div>

        <div class="testimonial">
            <img src="images/testimonial3.jpg" 
                 alt="Amit Verma"
                 style="width:80px; height:80px; object-fit:cover; border-radius:50%;">
            <p>“Perfect place to spend time in devotion and silence. Must visit!”</p>
            <b>– Amit Verma</b>
        </div>

    </div>
</div>


    <!--NEW SECTION: VISITOR GUIDELINES -->
<div class="guidelines-section section-box">
    <h2>Visitor Guidelines</h2>

    <ul class="guidelines-list">
        <li><i class="fa fa-check-circle"></i> Maintain silence inside the temple premises.</li>
        <li><i class="fa fa-check-circle"></i> Photography inside the main sanctum may be restricted.</li>
        <li><i class="fa fa-check-circle"></i> Please remove footwear before entering.</li>
        <li><i class="fa fa-check-circle"></i> Follow queue and darshan discipline.</li>
        <li><i class="fa fa-check-circle"></i> Do not touch idols or decorations.</li>
        <li><i class="fa fa-check-circle"></i> Keep the temple clean and avoid littering.</li>
    </ul>
</div>

   <!-- NEW SECTION: NEARBY PLACES -->
<div class="section-box nearby-section">
    <h2 class="section-title">🌍 Nearby Places to Visit</h2>

    <div class="nearby-grid">

        <!-- Place 1 -->
        <div class="nearby-card highlight">
            <a href="tadoba.php" style="text-decoration:none; color:inherit;">
                <div class="icon">🐅</div>
                <h3>Tadoba National Park</h3>
                <p>One of India's finest tiger reserves, perfect for wildlife photography & adventure safari.</p>
            </a>
        </div>

        <!-- Place 2 -->
        <div class="nearby-card">
            <a href="tadoba.php" style="text-decoration:none; color:inherit;">
                <div class="icon">🛕</div>
                <h3>Local Heritage Temples</h3>
                <p>Visit beautiful small temples around Chimur, known for peace & spiritual ambience.</p>
            </a>
        </div>

        <!-- Place 3 -->
        <div class="nearby-card">
            <a href="tadoba.php" style="text-decoration:none; color:inherit;">
                <div class="icon">🌿</div>
                <h3>Nature Trails & Villages</h3>
                <p>Relaxing green landscapes and authentic village sightseeing areas near Chimur.</p>
            </a>
        </div>

    </div>
</div>


    <!-- ACCOMMODATION -->
    <div class="section-box" id="accommodation">
        <h2>Accommodation</h2>
        <p>Comfortable rooms and guest facilities are available.</p>

        <div class="our_room">
            <div class="row">
                <?php
                $rooms = [
                    ['id'=>1,'name'=>'Deluxe AC Room','price'=>'1200','image'=>'images/room1.jpg','desc'=>'A premium AC room with modern facilities.','category'=>'AC Room','available'=>'Available'],
                    ['id'=>2,'name'=>'Luxury Room','price'=>'1800','image'=>'images/room2.jpg','desc'=>'Spacious luxury room with elegant interiors.','category'=>'Luxury AC Room','available'=>'Available'],
                    ['id'=>3,'name'=>'Non-AC Budget Room','price'=>'700','image'=>'images/room3.jpg','desc'=>'Affordable non-AC room with all basic amenities.','category'=>'Non-AC Room','available'=>'Few Rooms Left'],
                    ['id'=>4,'name'=>'Family Suite','price'=>'2500','image'=>'images/room4.jpg','desc'=>'Perfect for families with spacious room.','category'=>'Family Room','available'=>'Available'],
                    ['id'=>5,'name'=>'Premium AC Room','price'=>'1500','image'=>'images/room5.jpg','desc'=>'Well-furnished premium room.','category'=>'Premium AC','available'=>'Not Available'],
                    ['id'=>6,'name'=>'Standard Room','price'=>'900','image'=>'images/room6.jpg','desc'=>'Comfortable standard room.','category'=>'Standard Room','available'=>'Available']
                ];

                foreach($rooms as $room){ ?>
                    <div class="room_card">
                        <img src="<?php echo $room['image']; ?>" class="room_img">
                        <h3 class="room_title"><?php echo $room['name']; ?></h3>
                        <p class="room_desc"><?php echo $room['desc']; ?></p>
                        <div class="room_details">
                            <p><strong>Category:</strong> <?php echo $room['category']; ?></p>
                            <p><strong>Status:</strong>
                                <span class="status <?php echo strtolower(str_replace(' ', '_', $room['available'])); ?>">
                                    <?php echo $room['available']; ?>
                                </span>
                            </p>
                        </div>
                        <h4 class="room_price">₹<?php echo $room['price']; ?>/Night</h4>
                        <button class="book_btn">Book Now</button>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

 <!-- ⭐ NEW SECTION: FAQ -->
<div class="section-box faq-section">
    <h2 class="section-title">❓ Frequently Asked Questions About Ghodha Yatra Chimur

    </h2>

    <div class="faq-container">

        <!-- FAQ 1 -->
        <div class="faq-item">
            <div class="faq-question">What are the temple timings? <span class="faq-icon">+</span></div>
            <div class="faq-answer">
                The temple opens from 5:30 AM to 12:00 PM in the morning and 4:00 PM to 9:00 PM in the evening. Morning and evening Aarti timings are 6:00 AM and 7:00 PM respectively.
            </div>
        </div>

        <!-- FAQ 2 -->
        <div class="faq-item">
            <div class="faq-question">Is photography allowed inside the temple? <span class="faq-icon">+</span></div>
            <div class="faq-answer">
                Photography inside the main sanctum is generally restricted. Visitors are advised to maintain decorum and follow temple rules.
            </div>
        </div>

        <!-- FAQ 3 -->
        <div class="faq-item">
            <div class="faq-question">Are there accommodation facilities near the temple? <span class="faq-icon">+</span></div>
            <div class="faq-answer">
                Yes, comfortable rooms and guest facilities are available near the temple. Booking in advance is recommended during festivals.
            </div>
        </div>

        <!-- FAQ 4 -->
        <div class="faq-item">
            <div class="faq-question">What are the nearby attractions? <span class="faq-icon">+</span></div>
            <div class="faq-answer">
                Nearby attractions include Tadoba National Park, local heritage temples, and scenic nature trails & villages around Chimur.
            </div>
        </div>

        <!-- FAQ 5 -->
        <div class="faq-item">
            <div class="faq-question">Is there any special dress code? <span class="faq-icon">+</span></div>
            <div class="faq-answer">
                Visitors are advised to wear modest clothing and remove footwear before entering the temple premises.
            </div>
        </div>

    </div>
</div>


    <!-- MAP SECTION -->
    <div class="section-box">
        <h2>Temple Location</h2>
        <p>Find the temple location on the map below:</p>

        <div class="map-box">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3737.317833786463!2d79.36532257524205!3d20.493193081025595!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bd34dcb15cd3cc1%3A0x3744c2711b092c13!2sShri%20balaji%20restaurant%20and%20lounge%20chimur!5e0!3m2!1sen!2sin!4v1764997340088!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>    </div>

    <div class="bottom-space"></div>

    <script>
document.addEventListener('DOMContentLoaded', function() {
    const faqItems = document.querySelectorAll('.faq-item');

    faqItems.forEach(item => {
        item.addEventListener('click', () => {
            const answer = item.querySelector('.faq-answer');
            const isActive = item.classList.contains('active');

            // Close all answers
            faqItems.forEach(i => {
                i.classList.remove('active');
                i.querySelector('.faq-answer').style.display = 'none';
            });

            // Toggle current
            if(!isActive){
                item.classList.add('active');
                answer.style.display = 'block';
            }
        });
    });
});
</script>
</body>
</html>

<?php include 'include/footer.php'; ?>
<?php include 'include/footer-section.php'; ?>
