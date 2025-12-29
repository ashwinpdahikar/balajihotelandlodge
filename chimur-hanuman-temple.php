<?php ?>
<!DOCTYPE html>
<html lang="en">
<head>

<?php include 'include/header-section.php'; ?>

<title>Chimur Hanuman Temple | Timings, History & Travel Guide</title>

<meta name="description" content="Chimur Hanuman Temple in Maharashtra is a famous Hindu temple dedicated to Lord Hanuman. Know temple history, timings, location, and FAQs." />

<meta name="keywords" content="Chimur Hanuman Temple, Hanuman Mandir Chimur, Chimur temple, Lord Hanuman Temple Maharashtra" />

<meta name="author" content="Balaji Hotel Chimur" />
<meta property="og:title" content="Chimur Hanuman Temple | Timings & History">
<meta property="og:description" content="Explore the spiritual importance, timings and visitor guide for Chimur Hanuman Temple.">
<meta property="og:image" content="https://www.balajihotelchimur.com/images/chimur-hanuman-temple.jpg">
<meta property="og:url" content="https://www.balajihotelchimur.com/chimur-hanuman-temple.php">
<meta property="og:type" content="website">
<link rel="canonical" href="https://www.balajihotelchimur.com/chimur-hanuman-temple.php" />
		  	 <link rel="icon" href="images/BalajiHotelLogo.png" type="image" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
:root{
    --theme:#8e3a02;
    --light:#f8f9fa;
    --dark:#222;
    --white:#fff;
}

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}
body{
    font-family:'Poppins',sans-serif;
    line-height:1.7;
    color:var(--dark);
    background:#fff;
}
.container{
    max-width:1400px;
    margin:auto;
    padding:0 20px;
}
section{
    padding:70px 0;
}
img{
    width:100%;
    border-radius:12px;
}
.history-card,
.visit-box,
.faq-item{
    border-left:5px solid var(--theme);
}
.chimur-hero{
    height:180px;
    width:100%;
    position:relative;
    background:url('images/hanuman-temple-chimur.jpg') center/cover no-repeat;
    overflow:hidden;
}
.chimur-hero .overlay{
    position:absolute;
    inset:0;
    background:rgba(142,58,2,0.65); 
    opacity:0;
    animation:overlayFade 1.2s ease forwards;
    z-index:1;
}
.hero-content{
    position:relative;
    z-index:2;
    text-align:center;
}

.hero-content h1{
    color:#fff;                   
    font-size:3rem;
    
}
.hero-content p{
    color:#fff;                     
    font-size:1.2rem;
    opacity:0;
    transform:translateY(30px);
    animation:slideUp 1s ease forwards;
    animation-delay:0.8s;
}

@keyframes overlayFade{
    to{
        opacity:1;
    }
}

@keyframes slideUp{
    to{
        opacity:1;
        transform:translateY(0);
    }
}

@keyframes titleDrop{
    to{
        opacity:1;
        transform:translateY(0);
    }
}

@media(max-width:600px){
    .chimur-hero{
        height:180px;
    }
    .hero-content h1{
        font-size:2rem;
    }
}
@media(max-width:600px){
    .chimur-hero{
        height:180px;
        background-position:center;
    }
}

.chimur-about{
    width:100%;
    background:var(--light);
    padding:70px 0;
}
.chimur-about .container{
    width:100%;
    max-width:none;          
    margin:0 auto;
    padding:0 5%;            
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:40px;
    align-items:center;
}
.about-title{
    color:var(--theme);
    margin-bottom:15px;
}
.chimur-history{
    background:#fff;
}
.chimur-about img{
    width:100%;
    height:380px;
    object-fit:cover;
    border-radius:18px;
}
.history-grid{
    max-width:1200px;
    margin:auto;
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
    gap:30px;
    padding:0 20px;
}
.history-card{
    background:#fff;
    padding:30px;
    border-radius:15px;
    text-align:center;
    box-shadow:0 10px 25px rgba(0,0,0,0.08);
    transition:.3s;
}
.history-card:hover{
    transform:translateY(-8px);
}
.history-card i{
    font-size:40px;
    color:var(--theme);
    margin-bottom:15px;
}
.history-card h3{
    margin-bottom:10px;
    color:var(--theme);
}
.visit-info{
    background:var(--light);
}
.visit-grid{
    max-width:1100px;
    margin:auto;
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
    gap:25px;
    padding:0 20px;
}
.visit-box{
    background:#fff;
    padding:25px;
    border-radius:15px;
    text-align:center;
    box-shadow:0 8px 20px rgba(0,0,0,0.08);
}
.visit-icon{
    font-size:35px;
    margin-bottom:10px;
}
.chimur-gallery{
    background:#fff;
}
.gallery-grid{
    max-width:1200px;
    margin:auto;
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
    gap:20px;
    padding:0 20px;
}
.gallery-grid img{
    height:250px;
    object-fit:cover;
}

.faq-section{
    background: var(--light);
    padding: 30px;                 
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    margin: 40px 0;
}
.section-title{
    text-align:center;
    color:var(--theme);
    font-size:28px;
    margin-bottom:25px;
    font-weight:700;
}
.faq-container{
    max-width:100%;
    margin:auto;
    display:flex;
    flex-direction:column;
    gap:15px;
}
.faq-item{
    background:#fff;
    padding:18px 20px;
    border-radius:10px;
    border-left:4px solid var(--theme);   
    cursor:pointer;
    transition:0.3s ease;
    box-shadow:0 5px 15px rgba(0,0,0,0.08);
}
.faq-item:hover{
    transform:translateX(5px);
    background:#fff3d6;
}
.faq-question{
    font-weight:600;
    font-size:16px;
    color:#4c2e05;
    display:flex;
    justify-content:space-between;
    align-items:center;
}

.faq-answer{
    display:none;
    margin-top:10px;
    font-size:14px;
    color:#444;
    line-height:1.6;
}

.faq-icon{
    font-weight:bold;
    font-size:18px;
    transition:transform 0.3s ease;
    color:var(--theme);
}

.faq-item.active .faq-icon{
    transform:rotate(45deg);
}


@media(max-width:768px){
    .faq-section{
        padding:20px;
    }
    .section-title{
        font-size:24px;
    }
}
@media(max-width:900px){
    .chimur-about .container{
        grid-template-columns:1fr;
    }
    .hero-content h1{
        font-size:2.3rem;
    }
}
@media(max-width:500px){
    .hero-content h1{
        font-size:1.9rem;
    }
    section{
        padding:50px 0;
    }
}

</style>

</head>

<body>

<?php include 'include/loader.php'; ?>
<?php include 'include/header.php'; ?>
<section class="chimur-hero">
    <div class="overlay"></div>
    <div class="hero-content">
        <h1>Chimur Hanuman Temple</h1>
        <p>A powerful place of faith & devotion 🙏</p>
    </div>
</section>

<section class="chimur-about">
    <div class="container">
        <div>
            <h1 class="about-title">About Chimur Hanuman Temple</h1>
            <p>
                Chimur Hanuman Temple is a well-known Hindu temple located in Chimur town,
                Chandrapur district of Maharashtra. The temple is dedicated to Lord Hanuman,
                who symbolizes strength, devotion, and protection.
            </p><br>
            <p>
                Devotees visit the temple to seek blessings for courage, peace of mind,
                and success. The temple is especially crowded on Tuesdays and during
                Hanuman Jayanti celebrations.<br>
            </p>
            <p>similar to other regional temples like those near Chandrapur known for ancient origins and local deity worship. To find its exact story, you'd need local lore or specific historical records from Chimur or Chandrapur</p>
        </div>
        <img src="images/chimur-hanuman-temple.jpg" alt="Chimur Hanuman Temple Maharashtra">
    </div>
</section>

<section class="chimur-history">
    <div class="history-grid">

        <div class="history-card">
            <i class="fas fa-om"></i>
            <h3>Religious Importance</h3>
            <p>
                Chimur Hanuman Temple holds deep spiritual value and is believed to fulfill
                the wishes of true devotees.
            </p>
        </div>

        <div class="history-card">
            <i class="fas fa-praying-hands"></i>
            <h3>Daily Worship</h3>
            <p>
                Regular aartis, Hanuman Chalisa recitation, and prayers are performed
                every day in the temple.
            </p>
        </div>

        <div class="history-card">
            <i class="fas fa-calendar-alt"></i>
            <h3>Festivals</h3>
            <p>
                Hanuman Jayanti and Tuesdays attract large numbers of devotees from
                nearby villages.
            </p>
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
            <h3>Temple Timings</h3>
            <p>6:00 AM – 12:00 PM<br>4:00 PM – 9:00 PM</p>
        </div>

        <div class="visit-box">
            <div class="visit-icon">🙏</div>
            <h3>Best Time to Visit</h3>
            <p>Tuesdays & Hanuman Jayanti</p>
        </div>

    </div>
</section>

<section class="chimur-gallery">
    <div class="gallery-grid">
        <img src="images/hanuman-temple-chimur.jpg" alt="Chimur Hanuman Temple Front View">
        <img src="images/hanuman-temple.jpg" alt="Devotees at Chimur Hanuman Temple">
        <img src="images/hanuman-temple1.jpg" alt="Lord Hanuman Idol Chimur">
    </div>
</section>

<div class="section-box faq-section">
    <h1 class="section-title">❓ Frequently Asked Questions About Chimur Hanuman Temple</h1>

    <div class="faq-container">

       <div class="faq-item">
    <div class="faq-question">
        Is there any entry fee for Chimur Hanuman Temple?
        <span class="faq-icon">+</span>
    </div>
    <div class="faq-answer">
        No, there is no entry fee. The temple is open to all devotees free of cost.
    </div>
</div>

<div class="faq-item">
    <div class="faq-question">
        Is parking available near the temple?
        <span class="faq-icon">+</span>
    </div>
    <div class="faq-answer">
        Yes, limited parking space is available near the temple for two-wheelers and cars.
    </div>
</div>

<div class="faq-item">
    <div class="faq-question">
        Can devotees perform special pooja or offerings?
        <span class="faq-icon">+</span>
    </div>
    <div class="faq-answer">
        Yes, devotees can perform special poojas and offer prasad like laddoos, flowers,
        and sindoor with prior permission from temple authorities.
    </div>
</div>

<div class="faq-item">
    <div class="faq-question">
        Is the temple crowded on Tuesdays?
        <span class="faq-icon">+</span>
    </div>
    <div class="faq-answer">
        Yes, Tuesdays are considered very auspicious for Lord Hanuman, so the temple
        experiences a large number of devotees on that day.
    </div>
</div>

<div class="faq-item">
    <div class="faq-question">
        Are there any rules for visitors inside the temple?
        <span class="faq-icon">+</span>
    </div>
    <div class="faq-answer">
        Visitors are advised to maintain silence, dress modestly, and follow temple
        guidelines to respect the religious atmosphere.
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
            parent.classList.toggle("active");
            if (parent.classList.contains("active")) {
                answer.style.display = "block";
                icon.textContent = "×";
            } else {
                answer.style.display = "none";
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
