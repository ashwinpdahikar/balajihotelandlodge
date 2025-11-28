<!-- Responsive Header (HTML + CSS + JS) -->
<header class="site-header">
  <div class="container header-inner">
    <a class="brand" href="index.php" aria-label="Balaji Hotel">
      <img src="images/BalajiHotelLogo.png" alt="Balaji Hotel Logo" class="brand-img" />
    </a>

    <!-- Desktop nav -->
    <nav class="main-nav" aria-label="Primary">
      <ul class="nav-list">
        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
        <li class="nav-item"><a class="nav-link" href="room.php">Our Rooms</a></li>
        <li class="nav-item"><a class="nav-link" href="restaurant.php">Restaurant</a></li>
        <li class="nav-item"><a class="nav-link" href="gallery.php">Gallery</a></li>
        <li class="nav-item"><a class="nav-link" href="tourist_place.php">Tourist Places Chimur</a></li>
        <li class="nav-item"><a class="nav-link" href="blog.php">Blog</a></li>
        <li class="nav-item cta"><a class="nav-link btn-cta" href="contact.php">Contact Us</a></li>
      </ul>
    </nav>

    <!-- Toggle (tablet & mobile) -->
    <button class="menu-toggle" aria-expanded="false" aria-controls="offcanvas" aria-label="Open menu">
      <span class="hamburger" aria-hidden="true"></span>
    </button>
  </div>

  <!-- Offcanvas (right) -->
  <aside id="offcanvas" class="offcanvas" role="dialog" aria-hidden="true" aria-labelledby="menu-title">
    <div class="offcanvas-inner">
      <div class="offcanvas-head">
        <a class="brand-small" href="index.php" aria-label="Balaji Home">
          <img src="images/BalajiHotelLogo.png" alt="Balaji" />
        </a>
        <button class="offcanvas-close" aria-label="Close menu">✕</button>
      </div>

      <nav class="offcanvas-nav" aria-label="Mobile primary">
        <ul>
          <li class="off-item"><a href="index.php">Home</a></li>
          <li class="off-item"><a href="about.php">About</a></li>
          <li class="off-item"><a href="room.php">Our Rooms</a></li>
          <li class="off-item"><a href="restaurant.php">Restaurant</a></li>
          <li class="off-item"><a href="gallery.php">Gallery</a></li>
          <li class="off-item"><a href="chimur-tourism.php">Chimur Travel Guide</a></li>
          <li class="off-item"><a href="blog.php">Blog</a></li>
          <li class="off-item cta"><a href="contact.php">Contact Us</a></li>
        </ul>
      </nav>
    </div>
  </aside>

  <!-- Overlay -->
  <div class="offcanvas-overlay" tabindex="-1" aria-hidden="true"></div>
</header>

<!-- Styles (move to your main stylesheet if you want) -->
<style>
  :root{
    --accent:#d35400;
    --accent-dark:#b84300;
    --bg:#ffffff;
    --dark:#222;
    --header-h:76px;
  }
  *{box-sizing:border-box}
  body{margin:0;font-family:Inter,system-ui,Arial,Helvetica,sans-serif}
  .container{max-width:1140px;margin:0 auto;padding:0 16px}

  /* Header */
  .site-header{background:var(--bg);position:sticky;top:0;z-index:1100;border-bottom:1px solid rgba(0,0,0,0.06)}
  .header-inner{display:flex;align-items:center;justify-content:space-between;height:var(--header-h)}
  .brand-img{max-height:75px;transition:transform .25s ease}
  .brand-img:hover{transform:scale(1.03)}

  /* Desktop nav */
  .main-nav{display:block}
  .nav-list{display:flex;gap:6px;align-items:center;margin:0;padding:0;list-style:none}
  .nav-item{position:relative}
  .nav-link{display:inline-block;padding:10px 14px;color:var(--dark);text-decoration:none;font-weight:600;transition:color .18s ease}
  .nav-link:hover{color:var(--accent)}
  /* underline */
  .nav-link::after{content:'';position:absolute;left:0;bottom:6px;height:3px;background:var(--accent);width:0;transition:width .28s ease}
  .nav-item.active .nav-link::after,.nav-link:hover::after{width:100%}

  /* CTA */
  .cta .nav-link{background:var(--accent);color:#fff;padding:8px 18px;border-radius:30px}
  .cta .nav-link:hover{background:var(--accent-dark)}

  /* Toggler */
  .menu-toggle{display:none;background:none;border:0;cursor:pointer;padding:8px;border-radius:8px}
  .hamburger{width:26px;height:2px;background:var(--dark);display:block;position:relative}
  .hamburger::before,.hamburger::after{content:'';position:absolute;left:0;width:26px;height:2px;background:var(--dark);transition:transform .25s ease}
  .hamburger::before{top:-8px}
  .hamburger::after{top:8px}

  /* Offcanvas */
  .offcanvas{position:fixed;top:0;right:-360px;width:360px;height:100%;background:var(--bg);box-shadow:-12px 0 30px rgba(0,0,0,0.12);z-index:1200;transition:right .36s ease;display:flex;flex-direction:column}
  .offcanvas.open{right:0}
  .offcanvas-inner{padding:18px}
  .offcanvas-head{display:flex;align-items:center;justify-content:space-between;padding-bottom:6px}
  .offcanvas-head img{max-height:50px}
  .offcanvas-close{background:none;border:0;font-size:26px;cursor:pointer}
  .offcanvas-nav ul{list-style:none;padding:10px 0;margin:0}
  .off-item{padding:12px 0;border-bottom:1px solid rgba(0,0,0,0.04)}
  .off-item a{color:var(--dark);text-decoration:none;font-weight:600;display:block}
  .off-item.cta a{display:inline-block;background:var(--accent);color:#fff;padding:8px 16px;border-radius:26px}
  .offcanvas-overlay{position:fixed;inset:0;background:rgba(0,0,0,0.45);opacity:0;pointer-events:none;transition:opacity .3s ease;z-index:1150}
  .offcanvas.open + .offcanvas-overlay{opacity:1;pointer-events:auto}

  /* Responsive rules: Tablet and below (1024px) use offcanvas */
  @media (max-width:1024px){
    .main-nav{display:none}
    .menu-toggle{display:block}
    .header-inner{height:64px}
    .brand-img{max-height:55px}
    .offcanvas{width:320px}
  }

  @media (max-width:480px){
    .offcanvas{width:100%;right:-100%}
    .offcanvas.open{right:0}
  }

  @media (prefers-reduced-motion:reduce){
    .offcanvas,.offcanvas-overlay,.nav-link::after{transition:none}
  }
</style>

<!-- Script (self-contained) -->
<script>

// ----------------------------
// AUTO ACTIVE MENU BASED ON URL
// ----------------------------
(function() {
  const currentPage = location.pathname.split("/").pop();

  // Desktop
  document.querySelectorAll(".nav-item").forEach(li => {
    const a = li.querySelector("a");
    if(a && a.getAttribute("href") === currentPage){
      li.classList.add("active");
    } else {
      li.classList.remove("active");
    }
  });

  // Mobile
  document.querySelectorAll(".off-item").forEach(li => {
    const a = li.querySelector("a");
    if(a && a.getAttribute("href") === currentPage){
      li.classList.add("active");
    } else {
      li.classList.remove("active");
    }
  });
})();


// ----------------------------
// CLICK ACTIVE HIGHLIGHT
// ----------------------------
const allLinks = document.querySelectorAll('.nav-list .nav-link, .offcanvas-nav a');

allLinks.forEach(link => {
  link.addEventListener('click', function() {

    document.querySelectorAll('.nav-item').forEach(item =>
      item.classList.remove('active')
    );

    document.querySelectorAll('.off-item').forEach(item =>
      item.classList.remove('active')
    );

    const parentLi = this.closest('.nav-item');
    if(parentLi) parentLi.classList.add('active');

    const parentMobile = this.closest('.off-item');
    if(parentMobile) parentMobile.classList.add('active');
  });
});


// ----------------------------
// OFFCANVAS JS
// ----------------------------
(function(){
  const toggle = document.querySelector('.menu-toggle');
  const off = document.getElementById('offcanvas');
  const overlay = document.querySelector('.offcanvas-overlay');
  const closeBtn = document.querySelector('.offcanvas-close');
  const focusableSelector = 'a[href], button:not([disabled]), input, textarea, select, [tabindex]:not([tabindex="-1"])';
  let lastFocus = null;

  function openOffcanvas(){
    lastFocus = document.activeElement;
    off.classList.add('open');
    off.setAttribute('aria-hidden','false');
    toggle.setAttribute('aria-expanded','true');
    document.body.style.overflow = 'hidden';
    overlay.style.opacity = '1';
    overlay.style.pointerEvents = 'auto';
    const first = off.querySelector(focusableSelector);
    if(first) first.focus();
    trapFocus(off);
  }

  function closeOffcanvas(){
    off.classList.remove('open');
    off.setAttribute('aria-hidden','true');
    toggle.setAttribute('aria-expanded','false');
    document.body.style.overflow = '';
    overlay.style.opacity = '';
    overlay.style.pointerEvents = '';
    if(lastFocus) lastFocus.focus();
    releaseFocusTrap();
  }

  toggle && toggle.addEventListener('click', function(){
    if(off.classList.contains('open')) closeOffcanvas();
    else openOffcanvas();
  });

  closeBtn && closeBtn.addEventListener('click', closeOffcanvas);
  overlay && overlay.addEventListener('click', closeOffcanvas);

  off && off.addEventListener('click', function(e){
    const a = e.target.closest('a');
    if(!a) return;
    const href = a.getAttribute('href') || '';
    if(href && href !== '#'){
      setTimeout(closeOffcanvas, 120);
    }
  });

  document.addEventListener('keydown', function(e){
    if(e.key === 'Escape' && off.classList.contains('open')) closeOffcanvas();
  });

  let lastTabbable = null;
  function trapFocus(container){
    const nodes = Array.from(container.querySelectorAll(focusableSelector));
    if(nodes.length === 0) return;
    const first = nodes[0];
    const last = nodes[nodes.length - 1];
    function keyListener(e){
      if(e.key !== 'Tab') return;
      if(e.shiftKey && document.activeElement === first){ e.preventDefault(); last.focus(); }
      else if(!e.shiftKey && document.activeElement === last){ e.preventDefault(); first.focus(); }
    }
    container.__keyListener = keyListener;
    document.addEventListener('keydown', keyListener);
  }
  function releaseFocusTrap(){
    if(off.__keyListener) document.removeEventListener('keydown', off.__keyListener);
    off.__keyListener = null;
  }
})();
</script>
