<?php ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'include/header-section.php'; ?>

<title>Antique Balaji Temple | History, Timings & Travel Guide</title>

<meta name="description" content="Antique Balaji Temple is a peaceful and historic Hindu temple dedicated to Lord Balaji. Explore history, timings, location & FAQs." />
<meta name="keywords" content="Antique Balaji Temple, Balaji Mandir, Lord Balaji Temple, Balaji Temple Maharashtra" />

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="robots" content="index, follow">
<meta property="og:title" content="Antique Balaji Temple – History, Timings & Travel Guide">
<meta property="og:description" content="Visit Antique Balaji Temple – a peaceful Hindu temple dedicated to Lord Balaji with spiritual significance.">
<meta property="og:image" content="images/muktai-temple.jpg">
<meta property="og:type" content="website">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link rel="canonical" href="https://yourwebsite.com/antique-balaji-temple">

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
/* ABOUT RESPONSIVE FIX */
@media(max-width:900px){
    .chimur-about .container{
        grid-template-columns:1fr;
        gap:30px;
    }
    .chimur-about img{
        height:280px;
    }
}

@media(max-width:480px){
    .hero-content h1{
        font-size:24px;
        line-height:1.2;
    }
    .hero-content p{
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
       <h1>Antique Balaji Temple</h1>
<p>A sacred and serene temple dedicated to Lord Balaji 🙏</p>

    </div>
</section>

<!-- ABOUT -->
<section class="chimur-about">
    <div class="container">
        <div>
           <h2 class="about-title">About Antique Balaji Temple</h2>

<p>
Antique Balaji Temple is a revered Hindu temple dedicated to Lord Balaji, known for its calm surroundings and spiritual atmosphere.
</p>

<p>
The temple is admired for its traditional architecture, ancient idols, and peaceful environment that attracts devotees and tourists alike. 
It is a perfect place for meditation, prayer, and spiritual reflection.
<br><br>
Devotees believe that visiting Antique Balaji Temple brings prosperity, peace of mind, and divine blessings.
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
    <h3>Divine Significance</h3>
    <p>Dedicated to Lord Balaji, believed to fulfill wishes and bless devotees with prosperity.</p>
</div>

<div class="highlight-card">
    <span class="icon-circle">🏛️</span>
    <h3>Traditional Architecture</h3>
    <p>The temple reflects antique design elements and spiritual heritage.</p>
</div>

<div class="highlight-card">
    <span class="icon-circle">🎉</span>
    <h3>Festivals & Rituals</h3>
    <p>Special poojas and festivals like Vaikunta Ekadashi are celebrated with devotion.</p>
</div>

    </div>
</div>
</section>

<!-- PLAN YOUR VISIT -->
<section class="muktai-visit">
    <h2 class="visit-title">🧭 Plan Your Visit</h2>

<div class="visit-pill">
    <span>📍</span>
    <div>
        <h4>Location</h4>
        <p>Antique Balaji Temple, Maharashtra</p>
    </div>
</div>

<div class="visit-pill">
    <span>⏰</span>
    <div>
        <h4>Temple Timings</h4>
        <p>6:00 AM – 9:00 PM</p>
    </div>
</div>

<div class="visit-pill">
    <span>🌤️</span>
    <div>
        <h4>Best Time to Visit</h4>
        <p>Early morning and evening for a peaceful darshan</p>
    </div>
</div>

    </div>
</section>

<!-- GALLERY -->
<section class="chimur-gallery">
    <div class="gallery-grid">
        <img src="images/shri-hari-balaji-devsthan-chimur.avif" alt="Antique Balaji Temple front view"  loading="lazy">
<img src="images/balaji_gate.jpg" alt="Balaji Temple inner sanctum"  loading="lazy">
<img src="images/balaji_img3.jpeg" alt="Devotees at Antique Balaji Temple"  loading="lazy">

    </div>
</section>

<!-- FAQ -->
<div class="faq-section">
   <h2 class="section-title">❓ FAQs About Antique Balaji Temple</h2>

<div class="faq-item">
    <div class="faq-question">
        Where is Antique Balaji Temple located? <span>+</span>
    </div>
    <div class="faq-answer">
        Antique Balaji Temple is located in Maharashtra and is easily accessible by road.
    </div>
</div>

<div class="faq-item">
    <div class="faq-question">
        What are the temple timings? <span>+</span>
    </div>
    <div class="faq-answer">
        The temple is open daily from 6:00 AM to 9:00 PM.
    </div>
</div>

<div class="faq-item">
    <div class="faq-question">
        Is there any entry fee? <span>+</span>
    </div>
    <div class="faq-answer">
        No, entry to Antique Balaji Temple is free for all visitors.
    </div>
</div>

<div class="faq-item">
    <div class="faq-question">
        Which god is worshipped here? <span>+</span>
    </div>
    <div class="faq-answer">
        Lord Balaji (Lord Venkateshwara) is the main deity worshipped in the temple.
    </div>
</div>

<div class="faq-item">
    <div class="faq-question">
        Is the temple suitable for families? <span>+</span>
    </div>
    <div class="faq-answer">
        Yes, the temple is peaceful and suitable for families, elders, and children.
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
