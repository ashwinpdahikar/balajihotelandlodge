<?php // erai-river.php ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'include/header-section.php'; ?>

<title>Erai River | Natural Beauty & Travel Guide Maharashtra</title>

<meta name="description" content="Erai River in Maharashtra is a beautiful natural river site, perfect for sightseeing and nature lovers. Know timings, highlights, and FAQs." />
<meta name="keywords" content="Erai River, Maharashtra River, Natural River Maharashtra, Sightseeing Erai River" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="robots" content="index, follow">
		  	 <link rel="icon" href="images/BalajiHotelLogo.png" type="image" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
   <link rel="canonical" href="https://www.balajihotelchimur.com/" />
   <script async src="https://www.googletagmanager.com/gtag/js?id=G-F0L8N4ZV5G"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'G-F0L8N4ZV5G');
</script>

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
    background:url('images/erai-river3.jpg') center/cover no-repeat;
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
.faq-section{
    padding:40px 20px;
    background:var(--light);
    border-radius:12px;
    box-shadow:0 6px 20px rgba(0,0,0,0.08);
    margin:50px 0;
}
.section-title{
    text-align:center;
    color:var(--theme);
    font-size:28px;
    font-weight:700;
    margin-bottom:35px;
}
.faq-container{
    display:flex;
    flex-direction:column;
    gap:20px;
}
.faq-item{
    background:#fff;
    padding:22px 28px;
    border-radius:12px;
    border-left:6px solid var(--theme);
    cursor:pointer;
    position:relative;
    box-shadow:0 8px 25px rgba(0,0,0,0.06);
    transition:0.3s ease, transform 0.3s ease;
}
.faq-item:hover{
    transform:translateX(6px);
    background:#fff8f0;
}
.faq-question{
    display:flex;
    justify-content:space-between;
    align-items:center;
    font-weight:600;
    font-size:16px;
    color:#4c2e05;
}
.faq-answer{
    display:none;
    margin-top:12px;
    font-size:15px;
    color:#555;
    line-height:1.6;
}
.faq-icon{
    font-size:20px;
    font-weight:bold;
    color:var(--theme);
    transition:transform 0.3s ease;
}
.faq-item.active .faq-answer{
    display:block;
}
.faq-item.active .faq-icon{
    transform:rotate(45deg);
}

@media(max-width:900px){
    .chimur-about .container,
    .history-grid{
        grid-template-columns:1fr;
    }
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
    .visit-pill{
        flex-direction:column;
        align-items:flex-start;
    }
    .visit-pill span{
        font-size:28px;
    }
    .gallery-grid img{
        height:200px;
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
        <h1>Erai River</h1>
        <p>Explore the serene beauty of Erai River, Maharashtra 🌊</p>
    </div>
</section>

<!-- ABOUT -->
<section class="chimur-about">
    <div class="container">
        <div>
            <h1 class="about-title">About Erai River</h1>
            <p>Erai River is a tranquil river in Maharashtra, known for its scenic surroundings and peaceful environment. It is popular among nature lovers, photographers, and tourists seeking relaxation and adventure.
                <br><br>
                Erai river is a tributary of Wardha river and is an important river in Chandrapur district of Maharashtra. The river originates near Kasarbodi village of Chimur taluka and meets Wardha river near Hadasti village. It has a total length of 78 km and lies entirely within Chandrapur district.
            </p>
        </div>
        <img src="images/erai-river1.avif" alt="Erai River view">
    </div>
</section>

<!-- HIGHLIGHTS -->
<section class="muktai-highlights">
    <h2 class="highlight-title">🌿 Highlights of Erai River</h2>
    <div class="highlight-grid">
        <div class="highlight-card">
            <span class="icon-circle">💧</span>
            <h3>Natural Beauty</h3>
            <p>Clear waters surrounded by lush greenery and serene landscapes.</p>
        </div>
        <div class="highlight-card">
            <span class="icon-circle">🏞️</span>
            <h3>Adventure Activities</h3>
            <p>Fishing, boating, and riverside trekking opportunities.</p>
        </div>
        <div class="highlight-card">
            <span class="icon-circle">📸</span>
            <h3>Photography</h3>
            <p>Ideal spot for photographers to capture stunning natural vistas.</p>
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
                <p>Erai River, Maharashtra</p>
            </div>
        </div>
        <div class="visit-pill">
            <span>⏰</span>
            <div>
                <h4>Best Visiting Time</h4>
                <p>Early morning and late afternoon</p>
            </div>
        </div>
        <div class="visit-pill">
            <span>🌦️</span>
            <div>
                <h4>Ideal Season</h4>
                <p>Monsoon and winter for scenic views</p>
            </div>
        </div>
    </div>
</section>

<!-- GALLERY -->
<section class="chimur-gallery">
    <div class="gallery-grid">
        <img src="images/erai-river2.avif" alt="Erai River 1" loading="lazy">
        <img src="images/erai-river3.jpg" alt="Erai River 2" loading="lazy">
        <img src="images/erai-river4.jpg" alt="Erai River 3" loading="lazy">
    </div>
</section>

<!-- FAQ -->
<div class="faq-section">
    <h2 class="section-title">❓ Frequently Asked Questions About Erai River</h2>
    <div class="faq-container">
        <div class="faq-item">
            <div class="faq-question">Where is Erai River located? <span class="faq-icon">+</span></div>
            <div class="faq-answer">Erai River is located in Maharashtra, India, and flows through scenic rural areas.</div>
        </div>
        <div class="faq-item">
            <div class="faq-question">Is it safe for swimming? <span class="faq-icon">+</span></div>
            <div class="faq-answer">Yes, in designated areas, but always follow local safety guidelines.</div>
        </div>
        <div class="faq-item">
            <div class="faq-question">What is the best time to visit? <span class="faq-icon">+</span></div>
            <div class="faq-answer">Monsoon and winter seasons are ideal for visiting Erai River.</div>
        </div>
        <div class="faq-item">
            <div class="faq-question">Are there boating facilities? <span class="faq-icon">+</span></div>
            <div class="faq-answer">Yes, small boating and fishing activities are available in certain spots.</div>
        </div>
        <div class="faq-item">
            <div class="faq-question">Is photography allowed? <span class="faq-icon">+</span></div>
            <div class="faq-answer">Photography is allowed; the river is very popular for nature photography.</div>
        </div>
    </div>
</div>

<script>
document.querySelectorAll('.faq-question').forEach(question => {
    question.addEventListener('click', () => {
        const faqItem = question.parentElement;
        const answer = faqItem.querySelector('.faq-answer');
        const icon = question.querySelector('span');

        // Close other FAQs
        document.querySelectorAll('.faq-item').forEach(item => {
            if(item !== faqItem){
                item.classList.remove('active');
                item.querySelector('.faq-answer').style.maxHeight = null;
                item.querySelector('.faq-icon').textContent = '+';
            }
        });

        faqItem.classList.toggle('active');
        if(faqItem.classList.contains('active')){
            answer.style.maxHeight = answer.scrollHeight + 'px';
            icon.textContent = '−';
        } else {
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
