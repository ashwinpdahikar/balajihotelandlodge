<?php // chimur-fort.php (layout-compatible) ?>
<!DOCTYPE html>
<html lang="en">
<head>

<?php include 'include/header-section.php'; ?>

<title>Chimur Fort | History, Best Time to Visit & Travel Guide</title>

<meta name="description" content="Chimur Fort in Maharashtra is a historic fort known for its Maratha legacy, scenic views, and cultural importance. Explore history, best time to visit, location, and FAQs." />

<meta name="keywords" content="Chimur Fort, Chimur Fort Maharashtra, Historical forts in Maharashtra, Chimur history, Maratha forts, Chimur tourism" />

<meta name="author" content="Balaji Hotel Chimur" />
<meta property="og:title" content="Chimur Fort | History, Best Time to Visit & Travel Guide">
<meta property="og:description" content="Explore the history, location, best time to visit and travel tips for Chimur Fort in Maharashtra.">
<meta property="og:image" content="https://yourwebsite.com/images/chimur-fort.jpg">
<meta property="og:url" content="https://yourwebsite.com/chimur-fort.php">
<meta property="og:type" content="website">
<link rel="canonical" href="https://yourwebsite.com/chimur-fort.php" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
:root{
    --theme:#8e3a02;
}

/* ================= GENERAL ================= */
body{
    margin:0;
    font-family:'Segoe UI',sans-serif;
    color:#333;
}
section{width:100%;}

/* ================= HERO ================= */
.chimur-hero{
    height:180px;
    background:url('images/chimur-fort.jpg') center/cover no-repeat;
    position:relative;
    display:flex;
    align-items:center;
    justify-content:center;
    text-align:center;
    overflow:hidden;
}

.chimur-hero .overlay{
    position:absolute;
    inset:0;
    background:linear-gradient(
        120deg,
        rgba(142,58,2,0.85),
        rgba(142,58,2,0.6),
        rgba(0,0,0,0.35)
    );
    transition:0.6s ease;
}

.chimur-hero:hover .overlay{
    background:linear-gradient(
        120deg,
        rgba(142,58,2,0.95),
        rgba(142,58,2,0.75),
        rgba(0,0,0,0.45)
    );
}

.hero-content{
    position:relative;
    z-index:2;
}

.hero-content h1{
    font-size:48px;
    margin-bottom:5px;
    color:#fff;
}

.hero-content p{
    font-size:18px;
    color:#fff;
    opacity:0;
    transform:translateY(25px);
    animation: slideUpText 1.2s ease forwards;
    animation-delay:0.4s;
}

@keyframes slideUpText{
    from{
        opacity:0;
        transform:translateY(25px);
    }
    to{
        opacity:1;
        transform:translateY(0);
    }
}


/* ================= ABOUT ================= */
.chimur-about{
    padding:70px 0;
    background:#f8f9fa;
}
.chimur-about .container{
    width: 100%;
        max-width:90%;
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:40px;
    align-items:center;
    
}
.about-title{
    font-size:36px;
    margin-bottom:15px;
    color:var(--theme);
}
.chimur-about img{
    width:100%;
    height:360px;
    object-fit:cover;
    border-radius:18px;
    box-shadow:0 15px 35px rgba(0,0,0,0.2);
}

/* ================= HISTORY ================= */
.chimur-history{
    padding:80px 5%;
    background:#fff;
}
.history-grid{
    display:grid;
    grid-template-columns:repeat(3,1fr);
    gap:30px;
}
.history-card{
    background:#fff;
    border-radius:20px;
    padding:30px;
    box-shadow:0 15px 35px rgba(0,0,0,0.12);
    border:2px solid transparent;
    transition:0.4s;
}
.history-card:hover{
    transform:translateY(-10px);
    border-color:var(--theme);
}
.history-card i{
    font-size:38px;
    color:var(--theme);
    margin-bottom:15px;
}
.history-card h3{
    color:var(--theme);
}

/* ================= VISIT INFO – UNIQUE ================= */
.visit-info{
    padding:90px 5%;
 background:#fff8f3;
}

.visit-grid{
    display:grid;
    grid-template-columns:repeat(3,1fr);
    gap:30px;
}

.visit-box{
    background:#ffffff;
    padding:35px 25px;
    border-radius:16px;
    position:relative;
    text-align:center;
    box-shadow:0 10px 25px rgba(0,0,0,0.08);
    transition:0.35s;
}

.visit-box::before{
    content:"";
    position:absolute;
    top:0;
    left:0;
    width:100%;
    height:5px;
    background:#8e3a02;
    border-radius:16px 16px 0 0;
}

.visit-box:hover{
    transform:translateY(-10px);
    box-shadow:0 18px 40px rgba(142,58,2,0.25);
}

.visit-icon{
    font-size:38px;
    margin-bottom:12px;
}

.visit-box h3{
    color:#8e3a02;
    margin-bottom:8px;
    font-size:20px;
}

.visit-box p{
    color:#5a2a0a;
    font-size:15px;
    line-height:1.6;
}

/* Responsive */
@media(max-width:900px){
    .visit-grid{
        grid-template-columns:1fr;
    }


}


/* ================= GALLERY ================= */
.chimur-gallery{
    padding:80px 5%;
    background:#f1f3f5;
}
.gallery-grid{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(260px,1fr));
    gap:20px;
}
.gallery-grid img{
    width:100%;
    height:240px;
    object-fit:cover;
    border-radius:18px;
    transition:0.4s;
}
.gallery-grid img:hover{
    transform:scale(1.06);
}

/* ================= FAQ ================= */
.faq-section {
    /* background: #fdf5e6; Soft warm background */
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    margin: 40px 0;
}.faq-section .section-title {
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
    display: none; 
    margin-top: 10px;
    font-size: 14px;
    color: #444;
    line-height: 1.6;
}

.faq-icon {
    font-weight: bold;
    font-size: 18px;
    transition: transform 0.3s ease;
}

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

/* ================= RESPONSIVE ================= */
@media(max-width:900px){
    .chimur-about .container,
    .history-grid,
    .visit-grid{
        grid-template-columns:1fr;
    }
    .hero-content h1{font-size:36px;}
}
</style>
</head>

<body>

<?php include 'include/loader.php'; ?>
<?php include 'include/header.php'; ?>

<!-- ================= HERO ================= -->
<section class="chimur-hero">
    <div class="overlay"></div>
    <div class="hero-content">
        <h1>Chimur Fort</h1>
        <p>A silent witness of Maratha bravery 🏰</p>
    </div>
</section>

<!-- ================= ABOUT ================= -->
<section class="chimur-about">
    <div class="container">
        <div>
            <h1 class="about-title">About Chimur Fort</h1>
            <p>
                Chimur Fort is a historically significant fort located in the Chandrapur
                district of Maharashtra. It played an important role during the Maratha
                period and stands as a symbol of courage and resistance.
            </p> <br>
            <p>
                The fort is surrounded by scenic landscapes and offers a peaceful
                environment for history lovers and explorers.Chimur Fort, part of the larger Chandrapur Fort complex in Maharashtra, showcases typical Maratha fort architecture with strong earthen/mud walls, defensive bastions, intricate gateways, and internal structures like mosques and tombs, blending indigenous design with Mughal influences for robust defense and administration, characteristic of 16th-century construction under the Gond kings. 
            </p>
        </div>
        <img src="images/chimur-fort.jpg" alt="Chimur Fort Maharashtra">
    </div>
</section>

<!-- ================= HISTORY ================= -->
<section class="chimur-history">
    <div class="history-grid">
        <div class="history-card">
            <i class="fas fa-landmark"></i>
            <h3>Historical Importance</h3>
            <p>Chimur Fort played a vital role in regional resistance movements and reflects the architectural strength of the Maratha era.</p>
        </div>

        <div class="history-card">
            <i class="fas fa-shield-alt"></i>
            <h3>Maratha Legacy</h3>
            <p>The fort symbolizes bravery and strategic warfare techniques used by Maratha warriors.</p>
        </div>

        <div class="history-card">
            <i class="fas fa-mountain"></i>
            <h3>Scenic Location</h3>
            <p>Located on elevated terrain, the fort provides beautiful panoramic views of the surrounding region.</p>
        </div>
    </div>
</section>

<section class="visit-info">
    <div class="visit-grid">

        <div class="visit-box">
            <div class="visit-icon">📍</div>
            <h3>Location</h3>
            <p>Chimur, Chandrapur District, Maharashtra</p>
        </div>

        <div class="visit-box">
            <div class="visit-icon">⏰</div>
            <h3>Best Time</h3>
            <p>October to February for pleasant weather</p>
        </div>

        <div class="visit-box">
            <div class="visit-icon">📸</div>
            <h3>Things To Do</h3>
            <p>Photography, exploration, history learning</p>
        </div>

    </div>
</section>

<!-- ================= GALLERY ================= -->
<section class="chimur-gallery">
    <div class="gallery-grid">
        <img src="images/fort-view.jpg" alt="Chimur Fort in Chandrapur Maharashtra - Maratha era fort">
        <img src="images/fort-wall.jpg" alt="Chimur Fort walls and architecture">
        <img src="images/fort-architecture.jpg" alt="Scenic view from Chimur Fort">
    </div>
</section>

<!-- ⭐ NEW SECTION: FAQ -->
<div class="section-box faq-section">
    <h2 class="section-title">❓ Frequently Asked Questions About Chimur Fort</h2>

    <div class="faq-container">

        <!-- FAQ 1 -->
        <div class="faq-item">
            <div class="faq-question">
                Where is Chimur Fort located?
                <span class="faq-icon">+</span>
            </div>
            <div class="faq-answer">
                Chimur Fort is located in Chimur town of Chandrapur district, Maharashtra, and holds great historical importance from the Maratha period.
            </div>
        </div>

        <!-- FAQ 2 -->
        <div class="faq-item">
            <div class="faq-question">
                Is Chimur Fort open for visitors?
                <span class="faq-icon">+</span>
            </div>
            <div class="faq-answer">
                Yes, Chimur Fort is open to visitors and can be explored freely. There is currently no entry fee to visit the fort.
            </div>
        </div>

        <!-- FAQ 3 -->
        <div class="faq-item">
            <div class="faq-question">
                What is the best time to visit Chimur Fort?
                <span class="faq-icon">+</span>
            </div>
            <div class="faq-answer">
                The best time to visit Chimur Fort is between October and February when the weather is pleasant and ideal for exploration.
            </div>
        </div>

        <!-- FAQ 4 -->
        <div class="faq-item">
            <div class="faq-question">
                Is trekking required to reach Chimur Fort?
                <span class="faq-icon">+</span>
            </div>
            <div class="faq-answer">
                Chimur Fort does not require heavy trekking, but visitors should wear comfortable footwear as some areas involve walking on uneven paths.
            </div>
        </div>

        <!-- FAQ 5 -->
        <div class="faq-item">
            <div class="faq-question">
                What can visitors see at Chimur Fort?
                <span class="faq-icon">+</span>
            </div>
            <div class="faq-answer">
                Visitors can explore ancient fort walls, ruins, scenic viewpoints, and experience the historical atmosphere of the Maratha era.
            </div>
        </div>

    </div>
</div>


<script>
document.addEventListener("DOMContentLoaded", function () {

    document.querySelectorAll(".faq-question").forEach(item => {
        item.addEventListener("click", () => {

            const parent = item.parentElement;
            const answer = parent.querySelector(".faq-answer");
            const icon = item.querySelector(".faq-icon");

            // toggle active class
            parent.classList.toggle("active");

            if (parent.classList.contains("active")) {
                answer.style.display = "block";   // ✅ SHOW ANSWER
                icon.textContent = "×";
            } else {
                answer.style.display = "none";    // ✅ HIDE ANSWER
                icon.textContent = "+";
            }
        });
    });

});
</script>



<?php include 'include/footer.php'; ?>
<?php include 'include/footer-section.php'; ?>

</body>
</html>
