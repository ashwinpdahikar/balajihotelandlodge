<?php // hirapur-dolmen.php ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'include/header-section.php'; ?>

<title>Hirapur Dolmen Site | Ancient Megalithic Heritage of Maharashtra</title>

<meta name="description" content="Hirapur Dolmen Site in Maharashtra is an ancient megalithic burial site known for its prehistoric stone structures and archaeological importance." />
<meta name="keywords" content="Hirapur Dolmen, Hirapur Megalithic Site, Dolmen Site Maharashtra, Ancient Stone Structures" />
<meta name="robots" content="index, follow">
<meta name="author" content="https://www.balajihotelchimur.com/">
<meta property="og:title" content="Hirapur Dolmen Site | Ancient Megalithic Heritage of Maharashtra">
<meta property="og:description" content="Explore the ancient Hirapur Dolmen Site in Maharashtra, a prehistoric megalithic burial site with archaeological significance.">
<meta property="og:image" content="images/hirapur-dolmen.jpg">
<meta property="og:url" content="https://www.balajihotelchimur.com/hirapur-dolmen.php">
<meta name="twitter:card" content="summary_large_image">


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
   <link rel="canonical" href="https://www.balajihotelchimur.com/" />
   		  	 <link rel="icon" href="images/BalajiHotelLogo.png" type="image" />

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
    background:url('images/hirapur-dolmen-img.jpg') center/cover no-repeat;
    position:relative;
    display:flex;
    align-items:center;
    justify-content:center;
    text-align:center;
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
    transition:.4s;
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
    font-size:30px;
    margin:0 auto 18px;
}
.highlight-card h3{color:var(--theme);}

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
    .chimur-about .container{grid-template-columns:1fr;}
}

@media(max-width:1200px){
    .chimur-about .container,
    .highlight-grid,
    .visit-strip,
    .gallery-grid{
        gap:25px;
    }
}

@media(max-width:900px){
    .chimur-about .container{
        grid-template-columns:1fr;
    }
    .highlight-grid{
        grid-template-columns:1fr;
    }
    .visit-strip{
        flex-direction:column;
        gap:15px;
    }
    .gallery-grid{
        grid-template-columns:1fr;
    }
    .chimur-hero{
        height:140px;
    }
    .hero-content h1{
        font-size:32px;
    }
    .hero-content p{
        font-size:16px;
    }
}

@media(max-width:600px){
    .chimur-hero{
        height:120px;
    }
    .hero-content h1{
        font-size:24px;
    }
    .hero-content p{
        font-size:14px;
    }
    .faq-item{
        padding:16px 18px;
    }
    .visit-pill{
        padding:16px;
        flex-direction:column;
        align-items:flex-start;
    }
    .visit-pill span{
        font-size:24px;
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
        <h1>Hirapur Dolmen Site</h1>
        <p>An ancient megalithic heritage of Maharashtra 🗿</p>
    </div>
</section>

<!-- ABOUT -->
<section class="chimur-about">
    <div class="container">
        <div>
            <h1 class="about-title">About Hirapur Dolmen</h1>
            <p>
                Hirapur Dolmen Site is a prehistoric megalithic burial ground located in Maharashtra.
                These massive stone structures date back thousands of years and reflect early human
                civilization, burial practices, and social beliefs.
                <br><br>
                The Hirapur Dolmen site is a significant prehistoric megalithic site in Chandrapur district, Maharashtra, India, known for large stone burial chambers (dolmens) from the Satavahana era (2nd-3rd Century BCE) that show unique evidence of iron smelting, making it a crucial archaeological location for understanding early iron technology in Central India.
            </p>
        </div>
        <img src="images/dolmen-site1.jpg" alt="Prehistoric stone dolmens at Hirapur">
    </div>
</section>

<!-- HIGHLIGHTS -->
<section class="muktai-highlights">
    <h2 class="highlight-title">🗿 Site Highlights</h2>
    <div class="highlight-grid">
        <div class="highlight-card">
            <div class="icon-circle">🏺</div>
            <h3>Ancient Burial Site</h3>
            <p>Used by prehistoric communities for ceremonial burials.</p>
        </div>
        <div class="highlight-card">
            <div class="icon-circle">🪨</div>
            <h3>Megalithic Stones</h3>
            <p>Huge stone slabs arranged without mortar.</p>
        </div>
        <div class="highlight-card">
            <div class="icon-circle">📜</div>
            <h3>Archaeological Value</h3>
            <p>Important site for historians and researchers.</p>
        </div>
    </div>
</section>

<!-- VISIT -->
<section class="muktai-visit">
    <h2 class="visit-title">🧭 Plan Your Visit</h2>
    <div class="visit-strip">
        <div class="visit-pill"><span>📍</span> Hirapur, Maharashtra</div>
        <div class="visit-pill"><span>⏰</span> Open all day</div>
        <div class="visit-pill"><span>🌤️</span> Best time: Winter season</div>
    </div>
</section>

<!-- GALLERY -->
<section class="chimur-gallery">
    <div class="gallery-grid">
        <img src="images/hirapur-dolmen-img.jpg" alt="Hirapur Dolmen Site view">
        <img src="images/Hirapur_Dolmen.jpg" alt="Prehistoric stone dolmens at Hirapur">
        <img src="images/dolmen-img1.jpg" alt="Tourists visiting Hirapur Dolmen">
    </div>
</section>

<!-- FAQ -->
<div class="faq-section">
    <h2 class="section-title">❓ Frequently Asked Questions About Hirapur Dolmen</h2>

    <div class="faq-item">
        <div class="faq-question">What is a Dolmen? <span class="faq-icon">+</span></div>
        <div class="faq-answer">A dolmen is a prehistoric stone burial structure.</div>
    </div>

    <div class="faq-item">
        <div class="faq-question">Is entry free? <span class="faq-icon">+</span></div>
        <div class="faq-answer">Yes, entry is free for visitors.</div>
    </div>

    <div class="faq-item">
        <div class="faq-question">Is it suitable for students? <span class="faq-icon">+</span></div>
        <div class="faq-answer">Yes, it is ideal for educational visits.</div>
    </div>

    <div class="faq-item">
        <div class="faq-question">What are the visiting hours? <span class="faq-icon">+</span></div>
        <div class="faq-answer">The site is open from 9:00 AM to 6:00 PM daily.</div>
    </div>

    <div class="faq-item">
        <div class="faq-question">Is photography allowed? <span class="faq-icon">+</span></div>
        <div class="faq-answer">Photography is allowed, but drones may require prior permission.</div>
    </div>

    <div class="faq-item">
        <div class="faq-question">Are guides available? <span class="faq-icon">+</span></div>
        <div class="faq-answer">Yes, local guides are available to explain the history and significance of the Dolmens.</div>
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
