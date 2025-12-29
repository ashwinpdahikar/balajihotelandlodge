<?php // erai-dam.php ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'include/header-section.php'; ?>

<title>Erai Dam | Sightseeing & Travel Guide Maharashtra</title>

<meta name="description" content="Erai Dam in Maharashtra is a scenic and popular spot for tourists and nature lovers. Explore the highlights, timings, and FAQs for your visit." />
<meta name="keywords" content="Erai Dam, Maharashtra Dam, Scenic Dam Maharashtra, Erai Dam Tourism" />
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

/* ---------- GLOBAL ---------- */
body{
    margin:0;
    font-family:'Segoe UI',sans-serif;
    color:#333;
}
section{width:100%;}

/* ---------- HERO ---------- */
.chimur-hero{
    height:180px;
    background:url('images/erai-dam1.jpg') center/cover no-repeat;
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

/* ---------- ABOUT ---------- */
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

/* ---------- HIGHLIGHTS ---------- */
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
    margin-bottom:50px;
}
.visit-grid{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
    gap:30px;
    max-width:1200px;
    margin:auto;
}
.visit-card{
    background:#fbf7f2;
    border-left:6px solid var(--theme);
    border-radius:16px;
    padding:25px;
    text-align:center;
    box-shadow:0 8px 20px rgba(0,0,0,0.08);
    transition:0.3s ease;
}
.visit-card:hover{
    transform:translateY(-8px);
}
.visit-card i{
    font-size:36px;
    color:var(--theme);
    margin-bottom:15px;
}
.visit-card h4{
    color:var(--theme);
    margin-bottom:8px;
    font-size:20px;
}
.visit-card p{
    color:#555;
    font-size:15px;
    line-height:1.6;
}

/* Responsive */
@media(max-width:600px){
    .visit-grid{
        grid-template-columns:1fr;
    }
}
/* ---------- GALLERY ---------- */
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

/* ---------- FAQ ---------- */
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

/* ---------- RESPONSIVE ---------- */
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
        <h1>Erai Dam</h1>
        <p>Discover the serene beauty of Erai Dam, Maharashtra 🌊</p>
    </div>
</section>

<!-- ABOUT -->
<section class="chimur-about">
    <div class="container">
        <div>
            <h1 class="about-title">About Erai Dam</h1>
            <p>Erai Dam is a picturesque dam located in Maharashtra, offering scenic views and a calm environment. The dam and surrounding area are ideal for picnics, nature walks, and photography.
                <br> <br>
                The Erai Dam (or Irai Dam) is a significant earthfill and gravity dam on the Irai River in Maharashtra, India, near Chandrapur and the Tadoba Andhari Tiger Reserve, serving as a major water source for the region's power plant and city, offering scenic views, wildlife spotting, and popular picnic spots, though entry is restricted.
            </p>
        </div>
        <img src="images/erai-dam1.jpg" alt="Erai Dam view">
    </div>
</section>

<!-- HIGHLIGHTS -->
<section class="muktai-highlights">
    <h2 class="highlight-title">🌿 Highlights of Erai Dam</h2>
    <div class="highlight-grid">
        <div class="highlight-card">
            <span class="icon-circle">💧</span>
            <h3>Scenic Views</h3>
            <p>Beautiful reservoir surrounded by lush greenery and hills.</p>
        </div>
        <div class="highlight-card">
            <span class="icon-circle">🏞️</span>
            <h3>Nature & Adventure</h3>
            <p>Ideal spot for trekking, riverside walks, and bird watching.</p>
        </div>
        <div class="highlight-card">
            <span class="icon-circle">📸</span>
            <h3>Photography</h3>
            <p>Capture the stunning landscapes and sunset views over the dam.</p>
        </div>
    </div>
</section>

<!-- PLAN YOUR VISIT -->
<section class="muktai-visit">
    <h2 class="visit-title">🧭 Plan Your Visit</h2>
    <div class="visit-grid">
        <div class="visit-card">
            <i class="fas fa-map-marker-alt"></i>
            <h4>Location</h4>
            <p>Erai Dam, Chandrapur, Maharashtra</p>
        </div>
        <div class="visit-card">
            <i class="fas fa-clock"></i>
            <h4>Visiting Hours</h4>
            <p>6:00 AM – 6:00 PM</p>
        </div>
        <div class="visit-card">
            <i class="fas fa-sun"></i>
            <h4>Best Time</h4>
            <p>Winter & post-monsoon for scenic beauty</p>
        </div>
        
        <div class="visit-card">
            <i class="fas fa-utensils"></i>
            <h4>Picnic Spots</h4>
            <p>Several safe and scenic spots available</p>
        </div>
        
    </div>
</section>

<!-- GALLERY -->
<section class="chimur-gallery">
    <div class="gallery-grid">
        <img src="images/irai-dam4.avif" alt="Erai Dam 1" loading="lazy">
        <img src="images/erai-dam2.avif" alt="Erai Dam 2" loading="lazy">
        <img src="images/irai-dam3.avif" alt="Erai Dam 3" loading="lazy">
    </div>
</section>

<!-- FAQ -->
<div class="faq-section">
    <h2 class="section-title">❓ Frequently Asked Questions About Erai Dam</h2>
    <div class="faq-container">
        <div class="faq-item">
            <div class="faq-question">Where is Erai Dam located? <span class="faq-icon">+</span></div>
            <div class="faq-answer">Erai Dam is located in Maharashtra, surrounded by scenic hills and greenery.</div>
        </div>
        <div class="faq-item">
            <div class="faq-question">Is boating allowed? <span class="faq-icon">+</span></div>
            <div class="faq-answer">Yes, boating is allowed in designated areas with prior permissions.</div>
        </div>
        <div class="faq-item">
            <div class="faq-question">What is the best time to visit? <span class="faq-icon">+</span></div>
            <div class="faq-answer">Winter and post-monsoon seasons are ideal for visiting Erai Dam.</div>
        </div>
        <div class="faq-item">
            <div class="faq-question">Are picnic areas available? <span class="faq-icon">+</span></div>
            <div class="faq-answer">Yes, there are several spots around the dam suitable for picnics.</div>
        </div>
        <div class="faq-item">
            <div class="faq-question">Is photography allowed? <span class="faq-icon">+</span></div>
            <div class="faq-answer">Photography is allowed; the dam is popular among photographers.</div>
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
