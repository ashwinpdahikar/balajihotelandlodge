<?php ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'include/header-section.php'; ?>

<title>Muktai Temple | History, Timings & Travel Guide</title>

<meta name="description" content="Muktai Temple near Muktai Waterfall, Maharashtra is a famous spiritual destination dedicated to Goddess Muktai. Know history, timings & FAQs." />
<meta name="keywords" content="Muktai Temple, Muktai Mandir, Muktai Waterfall Temple, Muktai Temple Jalgaon" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="robots" content="index, follow">
		  	 <link rel="icon" href="images/BalajiHotelLogo.png" type="image" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
   <link rel="canonical" href="https://www.balajihotelchimur.com/" />
<style>
:root{
    --theme:#8e3a02;        
    --light:#f8f9fa;
}

body{
    margin:0;
    font-family:'Segoe UI',sans-serif;
    color:#333;
}
section{width:100%;}

.chimur-hero{
    height:180px;
    background:url('images/muktai-temple.jpg') center/cover no-repeat;
    position:relative;
    display:flex;
    align-items:center;
    justify-content:center;
    text-align:center;
}
@media(max-width:600px){
    .chimur-hero{
        height:auto;
        padding:40px 0;
    }
    .hero-content h1{
        font-size:28px;
    }
    .hero-content p{
        font-size:16px;
    }
}
.chimur-hero .overlay{
    position:absolute;
    inset:0;
background: rgba(142, 58, 2, 0.82);
}
.hero-content{
    position:relative;
    z-index:2;
}
.hero-content h1{
    color:#fff;
    font-size:42px;
}
.hero-content p{
    color:#fff;
    font-size:18px;
    opacity:0;
    transform:translateY(25px);
    animation:slideUp 1s ease forwards;
    animation-delay:0.6s;
}
@keyframes slideUp{
    to{opacity:1;transform:translateY(0);}
}

.chimur-about{
    background:var(--light);
    padding:70px 0;
}
.chimur-about .container{
    max-width:1400px;
    margin:auto;
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:40px;
    align-items:center;
    padding:0 20px;
}
.about-title{
    color:var(--theme);
    font-size:36px;
    margin-bottom:15px;
}
.chimur-about img{
    width:100%;
    height:360px;
    object-fit:cover;
    border-radius:18px;
}
@media(max-width:600px){
    .chimur-about .container,
    .history-grid{
        grid-template-columns:1fr;
        gap:20px;
    }
}


.chimur-history{
    padding:80px 5%;
}
.history-grid{
    display:grid;
    grid-template-columns:repeat(3,1fr);
    gap:30px;
}
.history-card{
    background:#fff;
    padding:30px;
    border-radius:16px;
    border-left:5px solid var(--theme);
    box-shadow:0 10px 25px rgba(0,0,0,0.1);
}
.history-card i{
    font-size:36px;
    color:var(--theme);
}

.muktai-highlights{
    padding:90px 5%;
    background:linear-gradient(135deg,#fbf7f2,#f1e6d8);
    text-align:center;
}
.highlight-title{
    font-size:32px;
    color:var(--theme);
    margin-bottom:50px;
    font-weight:700;
}
.highlight-grid{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(260px,1fr));
    gap:35px;
}
.highlight-card{
    background:#fff;
    padding:45px 30px;
    border-radius:22px;
    box-shadow:0 15px 35px rgba(0,0,0,0.12);
    position:relative;
    transition:0.4s ease;
}
.highlight-card::before{
    content:"";
    position:absolute;
    left:0;
    bottom:0;
    width:100%;
    height:6px;
    background:var(--theme);
    border-radius:0 0 22px 22px;
}
.highlight-card:hover{
    transform:translateY(-12px);
}
.icon-circle{
    width:70px;
    height:70px;
    background:var(--theme);
    color:#fff;
    border-radius:50%;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:32px;
    margin:0 auto 18px;
}
.highlight-card h3{
    color:var(--theme);
    margin-bottom:10px;
}
.highlight-card p{
    font-size:15px;
    color:#555;
    line-height:1.6;
}

@media(max-width:700px){
    .highlight-grid{
        grid-template-columns:1fr;
        gap:25px;
    }
}

.muktai-visit{
    padding:80px 5%;
    background:#ffffff;
}
.visit-title{
    text-align:center;
    font-size:30px;
    color:var(--theme);
    margin-bottom:40px;
}
.visit-strip{
    max-width:1100px;
    margin:auto;
    display:flex;
    flex-direction:column;
    gap:20px;
}
.visit-pill{
    display:flex;
    align-items:center;
    gap:20px;
    background:#fbf7f2;
    padding:22px 25px;
    border-radius:14px;
    border-left:6px solid var(--theme);
    box-shadow:0 8px 20px rgba(0,0,0,0.08);
}
.visit-pill span{
    font-size:32px;
}
.visit-pill h4{
    margin:0;
    color:var(--theme);
}
.visit-pill p{
    margin:3px 0 0;
    color:#555;
}

@media(max-width:600px){
    .visit-strip{
        gap:15px;
    }
    .visit-pill{
        flex-direction:column;
        align-items:flex-start;
    }
    .visit-pill span{
        font-size:28px;
    }
}

.chimur-gallery{
    background:#f1f3f5;
    padding:80px 5%;
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
    border-radius:16px;
}
@media(max-width:500px){
    .gallery-grid img{
        height:200px;
    }
}

.faq-section{
    padding:30px;
    margin:40px 0;
    background:var(--light);
    border-radius:12px;
    box-shadow:0 4px 12px rgba(0,0,0,0.08);
}
.section-title{
    text-align:center;
    color:var(--theme);
    font-size:28px;
    margin-bottom:25px;
}
.faq-container{
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
}
.faq-question{
    display:flex;
    justify-content:space-between;
    font-weight:600;
}
.faq-answer{
    display:none;
    margin-top:10px;
}
.faq-item.active .faq-answer{display:block;}

@media(max-width:900px){
    .chimur-about .container,
    .history-grid{
        grid-template-columns:1fr;
    }
}
@media(max-width:600px){
    .faq-section{
        padding:25px 15px;
    }
    .faq-question{
        font-size:15px;
    }
    .faq-answer{
        font-size:14px;
    }
}
</style>
</head>

<body>
    <?php include 'include/loader.php'; ?>
<?php include 'include/header.php'; ?>

<!-- HERO -->
<section class="chimur-hero">
    <div class="overlay"></div>
    <div class="hero-content">
        <h1>Muktai Temple</h1>
        <p>A divine place near the famous Muktai Waterfall 🙏</p>
    </div>
</section>

<!-- ABOUT -->
<section class="chimur-about">
    <div class="container">
        <div>
            <h1 class="about-title">About Muktai Temple</h1>
            <p>Muktai Temple is a sacred Hindu temple dedicated to Goddess Muktai, located near the beautiful Muktai Waterfall in Maharashtra.</p>
        <p>While there isn't a famous temple dedicated to Saint Muktabai directly in Nagpur city, the region (Vidarbha) has the famous Muktai Waterfall near Chimur (about 95 km from Nagpur), and the main, significant Saint Muktabai Temple (Mehun Temple) is in Muktainagar, near Jalgaon (much further west in Maharashtra), dedicated to the revered Varkari saint. Devotees in Nagpur often visit the waterfall or travel to the main temple complex for pilgrimage.
            <br> <br>
        </p> 
        </div>
        <img src="images/muktai-temple1.jpg">
    </div>
</section>

<!-- TEMPLE HIGHLIGHTS -->
<section class="muktai-highlights">
    <h2 class="highlight-title">🌺 Temple Highlights</h2>

    <div class="highlight-grid">
        <div class="highlight-card">
            <span class="icon-circle">🕉️</span>
            <h3>Spiritual Importance</h3>
            <p>A sacred place believed to grant peace, strength and inner purification to devotees.</p>
        </div>

        <div class="highlight-card">
            <span class="icon-circle">🙏</span>
            <h3>Daily Worship</h3>
            <p>Morning and evening aartis are performed with traditional rituals and devotion.</p>
        </div>

        <div class="highlight-card">
            <span class="icon-circle">🎉</span>
            <h3>Festivals</h3>
            <p>Navratri and special monsoon festivals attract devotees from nearby regions.</p>
        </div>
    </div>
</section>

<!-- PLAN YOUR VISIT -->
<section class="muktai-visit">
    <h2 class="visit-title">🧭 Plan Your Visit</h2>

    <div class="visit-strip">
        <div class="visit-pill">
            <span>📍</span>
            <div>
                <h4>Location</h4>
                <p>Near Muktai Waterfall, Maharashtra</p>
            </div>
        </div>

        <div class="visit-pill">
            <span>⏰</span>
            <div>
                <h4>Temple Timings</h4>
                <p>6:00 AM – 8:00 PM</p>
            </div>
        </div>

        <div class="visit-pill">
            <span>🌧️</span>
            <div>
                <h4>Best Time</h4>
                <p>Monsoon season for scenic beauty</p>
            </div>
        </div>
    </div>
</section>

<!-- GALLERY -->
<section class="chimur-gallery">
    <div class="gallery-grid">
        <img src="images/muktai-img1.jpg" alt="Muktai Temple main view" loading="lazy">
        <img src="images/muktai-temple.jpg" alt="Muktai Temple view 1" loading="lazy">
        <img src="images/muktai-waterfall-about.jpg" alt="Muktai Waterfall near the temple" loading="lazy">
    </div>
</section>

<!-- FAQ -->
<div class="faq-section">
    <h2 class="section-title">❓ Frequently Asked Questions About Muktai Temple</h2>

    <div class="faq-container">

        <div class="faq-item">
            <div class="faq-question">
                Where is Muktai Temple located? <span>+</span>
            </div>
            <div class="faq-answer">
                Muktai Temple is located near the famous Muktai Waterfall in Maharashtra.
            </div>
        </div>

        <div class="faq-item">
            <div class="faq-question">
                What are the temple visiting hours? <span>+</span>
            </div>
            <div class="faq-answer">
                The temple is generally open from 6:00 AM to 8:00 PM.
            </div>
        </div>

        <div class="faq-item">
            <div class="faq-question">
                Is there any entry fee for Muktai Temple? <span>+</span>
            </div>
            <div class="faq-answer">
                No, entry to Muktai Temple is completely free for all devotees.
            </div>
        </div>

        <div class="faq-item">
            <div class="faq-question">
                Which is the best time to visit Muktai Temple? <span>+</span>
            </div>
            <div class="faq-answer">
                The monsoon season is considered the best time due to the nearby waterfall’s beauty.
            </div>
        </div>

        <div class="faq-item">
            <div class="faq-question">
                Are photography and videos allowed? <span>+</span>
            </div>
            <div class="faq-answer">
                Photography is allowed, but visitors should respect temple rules and sanctity.
            </div>
        </div>

        <div class="faq-item">
            <div class="faq-question">
                Is the temple suitable for family visits? <span>+</span>
            </div>
            <div class="faq-answer">
                Yes, Muktai Temple is peaceful and suitable for families and senior citizens.
            </div>
        </div>

    </div>
</div>

<script>
document.querySelectorAll('.faq-question').forEach(question => {
    question.addEventListener('click', () => {

        const faqItem = question.parentElement;
        const answer = faqItem.querySelector('.faq-answer');
        const icon = question.querySelector('span');

        document.querySelectorAll('.faq-item').forEach(item => {
            if(item !== faqItem){
                item.classList.remove('active');
                item.querySelector('.faq-answer').style.maxHeight = null;
                item.querySelector('.faq-question span').textContent = '+';
            }
        });

        faqItem.classList.toggle('active');

        if(faqItem.classList.contains('active')){
            answer.style.maxHeight = answer.scrollHeight + 'px';
            icon.textContent = '−';
        }else{
            answer.style.maxHeight = null;
            icon.textContent = '+';
        }

    });
});
</script>


<?php include 'include/footer.php'; ?>
<?php include 'include/footer-section.php'; ?>

</body>
</html>
