<?php ?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'include/header-section.php'; ?>

<title>Ghodazari Wildlife Sanctuary | Safari, Timings & Travel Guide</title>

<meta name="description" content="Ghodazari Wildlife Sanctuary in Maharashtra is famous for jungle safaris, lakes, birds, and rich biodiversity. Know timings, location & FAQs." />
<meta name="keywords" content="Ghodazari Wildlife Sanctuary, Ghodazari Jungle Safari, Ghodazari Lake, Wildlife Sanctuary Maharashtra" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="robots" content="index, follow">
<meta property="og:title" content="Ghodazari Wildlife Sanctuary – Safari, Timings & Travel Guide">
<meta property="og:description" content="Explore Ghodazari Wildlife Sanctuary in Maharashtra – jungle safari, lake views, wildlife & best visiting time.">
<meta property="og:image" content="images/ghodazari-main.avif">
<meta property="og:type" content="website">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link rel="canonical" href="https://www.balajihotelchimur.com/ghodazari-wildlife-sanctuary">

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
    height:200px;
    background:url('images/ghodazari-main.avif') center/cover no-repeat;
    position:relative;
    display:flex;
    align-items:center;
    justify-content:center;
    text-align:center;
}
.chimur-hero .overlay{
    position:absolute;
    inset:0;
    background:rgba(142,58,2,0.82);
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
    width: 100%;
}

.chimur-about .container{
    width:100%;
    margin:0;
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:40px;
    align-items:center;
    padding:0 5%;
}
.about-grid{
    display:grid;
    grid-template-columns:1fr 1fr;
    width:100%;
    align-items:center;
}
.about-content{
    padding:0 6%;
}

.about-image img{
    width:100%;
    height:420px;
    object-fit:cover;
}

.about-title{
    color:var(--theme);
    font-size:36px;
    margin-bottom:15px;
}
.chimur-about img{
    width:90%;
    height:360px;
    object-fit:cover;
    border-radius:18px;
}

@media(max-width:900px){
    .about-grid{
        grid-template-columns:1fr;
        gap: 30px;
    }
    .about-content{
        padding:40px 20px;
    }
    .about-image img{
        height:280px;
        width: 100%;
    }
}

@media(max-width:768px){
    .chimur-hero{
        height:160px;
    }
    .hero-content h1{
        font-size:26px;
    }
    .hero-content p{
        font-size:14px;
    }
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
    transition:0.4s ease;
}
.highlight-card:hover{transform:translateY(-10px);}
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

.muktai-visit{
    padding:80px 5%;
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
    gap:20px;
    background:#fbf7f2;
    padding:22px;
    border-radius:14px;
    border-left:6px solid var(--theme);
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
    height:280px;
    object-fit:cover;
    border-radius:16px;
}
@media(max-width:900px){
    .chimur-about .container{
        grid-template-columns:1fr;
    }
}
@media(max-width:600px){
    .gallery-grid img{
        height:220px;
    }
}

.faq-section{
    padding:40px 20px;
    background:var(--light);
    margin:50px 0;
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
    gap:18px;
}
.faq-item{
    background:#fff;
    padding:20px;
    border-radius:10px;
    border-left:5px solid var(--theme);
    cursor:pointer;
}
.faq-answer{display:none;margin-top:10px;}
.faq-item.active .faq-answer{display:block;}

@media(max-width:900px){
    .chimur-about .container{grid-template-columns:1fr;}
}
</style>
</head>

<body>
<?php include 'include/loader.php'; ?>
<?php include 'include/header.php'; ?>

<section class="chimur-hero">
    <div class="overlay"></div>
    <div class="hero-content">
        <h1>Ghodazari Wildlife Sanctuary</h1>
        <p>A paradise of forests, lakes & wildlife 🌿🦌</p>
    </div>
</section>

<section class="chimur-about">
    <div class="about-grid">
        <div class="about-content">
<h2 class="about-title">About Ghodazari Wildlife Sanctuary</h2>            <p>
                Ghodazari Wildlife Sanctuary is a beautiful forest reserve located in Chandrapur district, Maharashtra.
                It is known for dense forests, a scenic lake, and rich biodiversity.<br><br>
            </p>
            <p>
                The sanctuary is home to deer, wild boars, birds, reptiles, and various plant species.
                It is a perfect destination for nature lovers, photographers, and wildlife enthusiasts.
            </p>
        </div>
        <div class="about-image">
        <img src="images/ghodazari-main.avif" alt="Ghodazari Wildlife Sanctuary">
    </div>
    </div>
</section>

<section class="muktai-highlights">
    <h2 class="highlight-title">🌿 Sanctuary Highlights</h2>
    <div class="highlight-grid">
        <div class="highlight-card">
            <span class="icon-circle">🦌</span>
            <h3>Wildlife Diversity</h3>
            <p>Home to deer, wild boar, birds, and other forest animals.</p>
        </div>
        <div class="highlight-card">
            <span class="icon-circle">🌊</span>
            <h3>Ghodazari Lake</h3>
            <p>A scenic lake inside the sanctuary attracting birds and tourists.</p>
        </div>
        <div class="highlight-card">
            <span class="icon-circle">📸</span>
            <h3>Nature Photography</h3>
            <p>Perfect spot for wildlife and landscape photography.</p>
        </div>
    </div>
</section>

<section class="muktai-visit">
    <h2 class="visit-title">🧭 Plan Your Visit</h2>
    <div class="visit-strip">
        <div class="visit-pill">
            <span>📍</span>
            <div>
                <h4>Location</h4>
                <p>Chandrapur District, Maharashtra</p>
            </div>
        </div>
        <div class="visit-pill">
            <span>⏰</span>
            <div>
                <h4>Visiting Time</h4>
                <p>6:00 AM – 6:00 PM</p>
            </div>
        </div>
        <div class="visit-pill">
            <span>🍂</span>
            <div>
                <h4>Best Season</h4>
                <p>October to March</p>
            </div>
        </div>
    </div>
</section>

<section class="chimur-gallery">
    <div class="gallery-grid">
        <img src="images/ghodazari-img1.jpg"
             alt="Scenic view of Ghodazari Wildlife Sanctuary forest"
             loading="lazy">

        <img src="images/godhazari-img2.jpg"
             alt="Lake and greenery inside Ghodazari Wildlife Sanctuary"
             loading="lazy">

        <img src="images/ghodazari-img3.webp"
             alt="Wildlife and natural landscape of Ghodazari Sanctuary"
             loading="lazy">
    </div>
</section>

<div class="faq-section">
    <h2 class="section-title">❓ Frequently Asked Questions About Ghodazari Wildlife Sanctuary</h2>
    <div class="faq-container">

        <div class="faq-item">
            <div class="faq-question">Where is Ghodazari Wildlife Sanctuary located?</div>
            <div class="faq-answer">
                It is located in Chandrapur district of Maharashtra.
            </div>
        </div>

        <div class="faq-item">
            <div class="faq-question">Is safari available?</div>
            <div class="faq-answer">
                Yes, jungle safari is available with prior permission from forest authorities.
            </div>
        </div>

        <div class="faq-item">
            <div class="faq-question">Is entry free?</div>
            <div class="faq-answer">
                Entry fee is nominal and varies for visitors and vehicles.
            </div>
        </div>

        <div class="faq-item">
            <div class="faq-question">What is the best time to visit?</div>
            <div class="faq-answer">
                Winter and post-monsoon seasons are ideal for wildlife sightings and pleasant weather.
            </div>
        </div>

        <div class="faq-item">
            <div class="faq-question">What animals can be seen in Ghodazari Sanctuary?</div>
            <div class="faq-answer">
                Visitors can spot deer, wild boar, monkeys, various bird species and rich forest biodiversity.
            </div>
        </div>

        <div class="faq-item">
            <div class="faq-question">Is Ghodazari Wildlife Sanctuary suitable for family visits?</div>
            <div class="faq-answer">
                Yes, the sanctuary is suitable for families, nature lovers, photographers and students.
            </div>
        </div>

    </div>
</div>


<script>
document.querySelectorAll('.faq-item').forEach(item=>{
    item.addEventListener('click',()=>{
        item.classList.toggle('active');
    });
});
</script>

<?php include 'include/footer.php'; ?>
<?php include 'include/footer-section.php'; ?>
</body>
</html>
