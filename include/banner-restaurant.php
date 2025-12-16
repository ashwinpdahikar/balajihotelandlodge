<!-- Restaurant-style Banner (uses existing banner styles) -->
<section class="banner_main banner_restaurant">
  <div class="carousel slide banner" id="restaurantHero" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="images/gallery2.jpg" alt="Restaurant Banner" />
      </div>
    </div>
  </div>

  <div class="hero-overlay">
    <div class="hero-content">
      <h1 class="hero-title">Balaji Restaurant</h1>
      <p class="hero-subtitle">Fresh, homely meals — Pure Veg & Non-Veg specialties</p>
      <div class="hero-cta-buttons">
        <a href="restaurant.php#table-booking" class="btn-hero btn-hero-primary">
          <i class="fa fa-cutlery"></i> Book a Table
        </a>
        
      </div>
    </div>
  </div>

  <div style="background:#0b3d2e;color:#e8fff6;padding:6px 0;">
    <marquee behavior="scroll" direction="left" scrollamount="6">
      Enjoy delicious & hygienic meals at Balaji Restaurant — Call <?php echo h(get_setting('phone', '+91 7350255026')); ?> to reserve a table.
    </marquee>
  </div>
</section>

<style>
.banner_main {
	position: relative;
	overflow: hidden;
}

.banner_main img {
	object-fit: cover;
	width: 100%;
	height: 75vh;
	display: block;
}

.carousel-indicators li {
  width: 12px;
  height: 12px;
  border-radius: 50%;
  background-color: #ffffff;
  opacity: 0.6;
}
.carousel-indicators .active {
  background-color: #0b3d2e;
  opacity: 1;
  width: 14px;
  height: 14px;
}

.carousel-item {
  transition: transform 1.1s ease-in-out, opacity 1s ease-in-out;
}
.carousel-inner::after {
  content: "";
  position: absolute;
  inset: 0;
  background: rgba(0,0,0,0.35); /* overlay color */
  pointer-events: none;
}
.hero-overlay {
  position: absolute !important;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  text-align: center;
  z-index: 10;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 0 20px;
}

.hero-content {
  max-width: 720px;
  color: #fff;
  text-shadow: 2px 2px 8px rgba(0,0,0,0.7);
}

.hero-title {
  font-size: 3rem;
  font-weight: 700;
  color: #fff;
  text-shadow: 2px 2px 8px rgba(0,0,0,0.7);
  margin-bottom: 15px;
}

.hero-subtitle {
  font-size: 1.3rem;
  color: #fff;
  text-shadow: 1px 1px 6px rgba(0,0,0,0.7);
  margin-bottom: 25px;
  font-weight: 400;
}

.hero-cta-buttons {
  /* display: flex; */
  gap: 15px;
  justify-content: center;
  flex-wrap: wrap;
  text-align: center;
}

.btn-hero {
  padding: 14px 30px;
  border-radius: 50px;
  font-weight: 600;
  text-decoration: none;
  display: inline-flex;
  align-items: center;
  gap: 8px;
  transition: all 0.3s ease;
  font-size: 1.2rem;
  box-shadow: 0 4px 15px rgba(0,0,0,0.3);
  border: none;
}

.btn-hero-primary {
  background: linear-gradient(135deg, var(--jungle-bg) 0%, var(--jungle-accent) 100%);
  color: #f4fbf7;
}
.btn-hero-secondary {
  background: transparent;
  color: var(--brand-light);
  border: 2px solid var(--accent);
}

.btn-hero-primary:hover {
  transform: translateY(-3px);
  color: #042417;
  text-decoration: none;
  background: linear-gradient(135deg, var(--jungle-accent), var(--jungle-accent-2));
}
.btn-hero-secondary:hover {
  background: var(--accent);
  color: #1d1f20;
  border-color: var(--accent);
  transform: translateY(-3px);
}

/* ============================
  QUICK BOOKING MODAL - RESPONSIVE
============================ */
.quick-booking-panel {
  position: fixed !important; /* Always fixed to overlay banner */
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%) scale(0.92);
  max-width: 460px;
  width: 90%;
  z-index: 1000;
  opacity: 0;
  visibility: hidden;
  pointer-events: none;
  transition: all 0.3s ease;

}

.quick-booking-panel.open {
  opacity: 1;
  visibility: visible;
  pointer-events: auto;
  transform: translate(-50%, -50%) scale(1);
}

.quick-booking-close {
  position: absolute;
  top: 10px;
  right: 12px;
  font-size: 1.6rem;
  color: #0b3d2e;
  cursor: pointer;
  background: transparent;
  border: none;
  z-index: 1010;
}

/* ============================
  BOOK ROOM FORM
============================ */
.book_room {
  border-radius: 18px;
  box-shadow: 0 8px 25px rgba(0,0,0,0.18);
  background: #ffffffcc;
  backdrop-filter: blur(5px);
  position: relative;
  padding: 20px;
}

/* Labels and inputs */
.book_room label {
  font-weight: 600;
  color: #333;
  margin-bottom: 2px;
  display: flex;
  font-size: 0.95rem;
}

.book_room .required-star {
  color: #e74c3c;
  font-weight: 700;
  margin-left: 3px;
}

.book_room .form-control {
  width: 100%;
  padding: 8px 15px;
  border: 2px solid #e0e0e0;
  border-radius: 8px;
  font-size: 0.95rem;
  transition: all 0.3s ease;
  height: calc(3rem + 2px) !important;
}

.book_room .form-control:focus {
  outline: none;
  border-color: #0b3d2e;
  box-shadow: 0 0 0 3px rgba(11,61,46,0.1);
}

.book_room .error-message {
  color: #e74c3c;
  font-size: 0.85rem;
  margin-top: 5px;
  display: block;
}

.book_room .help-text {
  color: #666;
  font-size: 0.85rem;
  margin-top: 5px;
  font-style: italic;
}

/* ============================
  RESPONSIVE
============================ */
@media(max-width:991px){
  .banner_main img { height: 60vh; }
  /* Keep modal centered on all screens */
  .quick-booking-panel {
    position: fixed !important;  /* <-- fix here */
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%) scale(0.95);
    margin: 0;
    max-width: 520px;
  }
  .quick-booking-panel.open {
    transform: translate(-50%, -50%) scale(1);
  }
  
}

@media(max-width:768px){
  .banner_main img { height: 38vh !important; }
  
  /* Hero text */
  .hero-title { font-size: 2rem !important; line-height: 1.3; color: #fff !important; text-shadow: none !important; }
  .hero-subtitle { font-size: 1rem !important; color: #ffffe3 !important; margin-bottom: 18px; }

  /* CTA Buttons */
  .hero-cta-buttons { text-align: center !important; flex-direction: column; gap: 10px; width: 100%; }
  .btn-hero {  font-size: 0.9rem !important; padding: 10px 18px !important; text-align: center !important;}

  /* Quick booking panel */
 .quick-booking-panel {
    width: 95%;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%) scale(0.95);
    padding: 5px !important;
    height: 80% !important;
  }

  .quick-booking-panel.open {
    transform: translate(-50%, -50%) scale(1);
  }
   .book_room {
    width: 100%;
    padding: 15px;
  }

  .book_now .form-group,
  .book_now .col-md-6,
  .book_now .col-4 {
    margin-bottom: 12px !important;
  }

  .book_now input,
  .book_now select {
    font-size: 0.92rem !important;
    padding: 8px !important;
  }

  #closeQuickBooking {
    font-size: 1.8rem !important;
    top: 8px;
    right: 10px;
  }

  /* Form spacing */
  .book_now .form-group,
  .book_now .col-md-6,
  .book_now .col-4 { margin-bottom: 12px !important; }
  .book_now input,
  .book_now select { font-size: 0.92rem !important; padding: 10px !important; }

 
  .book_room h1,
  h1.text-center { color: #111 !important; font-size: 1.4rem !important; }


  .book_room, 
  .book_room label,
  .book_room p,
  .book_room .form-group label { color: #222 !important; }

  /* Marquee */
  marquee { font-size: 0.85rem !important; }
}

@media (max-width: 768px) {
  .hero-cta-buttons {
    text-align: center;       
  }

  .hero-cta-buttons .btn-hero {
    display: inline-block;    
    width: 80%;               
    margin: 8px auto;         
  }
}

</style>
<!-- Reuse banner.css from include/banner.php (styles already present in that file or in global CSS) -->
