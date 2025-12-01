<?php
require_once __DIR__ . '/include/functions.php';

$page_title       = 'Tadoba Tiger Reserve Safari Guide | Balaji Hotel Chimur';
$page_description = 'Complete guide to Tadoba-Andhari Tiger Reserve safari booking, best time to visit, gates, permits, and wildlife sightings. Stay at Balaji Hotel Chimur for the perfect Tadoba safari experience.';
$page_keywords    = 'Tadoba Tiger Reserve, Tadoba safari booking, Tadoba gates, Moharli gate, Kolara gate, Chimur gate, Tadoba permits, tiger safari Maharashtra, wildlife photography, Balaji Hotel Tadoba';
$scheme           = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
$host             = $_SERVER['HTTP_HOST'] ?? 'localhost';
$basePath         = rtrim(str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? '')), '/');
$basePath         = $basePath === '.' ? '' : $basePath;
$canonical_url    = $scheme . '://' . $host . $basePath . '/tadoba-tiger-reserve.php';
$og_image         = $scheme . '://' . $host . $basePath . '/images/tadoba.png';

$safari_gates = [
    [
        'name'        => 'Moharli Gate',
        'tag'         => 'Main Entry Point',
        'image'       => 'images/tadoba.png',
        'distance'    => '52 km from Balaji Hotel, ~1.2 hr drive',
        'best_time'   => 'Morning 6 AM & Evening 3 PM safaris',
        'summary'     => 'The most popular gate with highest tiger sighting probability. Core zone access with well-maintained routes and experienced guides.',
        'highlights'  => [
            'Highest tiger density zone in Tadoba',
            'Book permits 120 days in advance for peak season',
            'Morning safaris offer best photography light',
            'Evening safaris for golden hour wildlife viewing'
        ],
        'map_url'     => 'https://maps.app.goo.gl/hCw3q1yQe1pSew7m9'
    ],
    [
        'name'        => 'Kolara Gate',
        'tag'         => 'Alternative Entry',
        'image'       => 'images/tadoba.png',
        'distance'    => '48 km from Balaji Hotel, ~1.1 hr drive',
        'best_time'   => 'Year-round, less crowded than Moharli',
        'summary'     => 'Less crowded alternative with good tiger sightings. Ideal for photographers seeking quieter safari experiences.',
        'highlights'  => [
            'Better availability during peak season',
            'Scenic routes through dense teak forests',
            'Good for bird watching and leopard sightings',
            'Less commercial, more authentic experience'
        ],
        'map_url'     => 'https://maps.app.goo.gl/hCw3q1yQe1pSew7m9'
    ],
    [
        'name'        => 'Chimur Gate',
        'tag'         => 'Nearest Gate',
        'image'       => 'images/tadoba.png',
        'distance'    => '46 km from Balaji Hotel, ~1 hr drive',
        'best_time'   => 'Buffer zone safaris available year-round',
        'summary'     => 'Closest gate to Balaji Hotel. Perfect for buffer zone safaris and night drives. Great for families and first-time visitors.',
        'highlights'  => [
            'Shortest drive time from hotel',
            'Buffer zone permits easier to get',
            'Night safari options available',
            'Less strict timing, more flexible'
        ],
        'map_url'     => 'https://maps.app.goo.gl/hCw3q1yQe1pSew7m9'
    ],
    [
        'name'        => 'Navegaon Gate',
        'tag'         => 'Buffer Zone',
        'image'       => 'images/tadoba.png',
        'distance'    => '55 km from Balaji Hotel, ~1.3 hr drive',
        'best_time'   => 'Monsoon and winter seasons',
        'summary'     => 'Buffer zone entry with beautiful landscapes and good wildlife diversity. Less crowded with more flexible booking.',
        'highlights'  => [
            'Beautiful water bodies and scenic routes',
            'Good for sloth bear and wild dog sightings',
            'More affordable safari options',
            'Flexible timing and booking'
        ],
        'map_url'     => 'https://maps.app.goo.gl/hCw3q1yQe1pSew7m9'
    ],
    [
        'name'        => 'Pangdi Gate',
        'tag'         => 'Buffer Zone',
        'image'       => 'images/tadoba.png',
        'distance'    => '50 km from Balaji Hotel, ~1.2 hr drive',
        'best_time'   => 'October to May',
        'summary'     => 'Buffer zone gate with excellent birding opportunities and diverse wildlife. Great for nature enthusiasts.',
        'highlights'  => [
            'Excellent bird watching opportunities',
            'Diverse flora and fauna',
            'Less commercial, peaceful experience',
            'Good for extended wildlife photography'
        ],
        'map_url'     => 'https://maps.app.goo.gl/hCw3q1yQe1pSew7m9'
    ],
    [
        'name'        => 'Zari Gate',
        'tag'         => 'Core Zone',
        'image'       => 'images/tadoba.png',
        'distance'    => '58 km from Balaji Hotel, ~1.4 hr drive',
        'best_time'   => 'Peak season December to February',
        'summary'     => 'Core zone entry with pristine forest areas. Known for excellent tiger and leopard sightings with professional guides.',
        'highlights'  => [
            'Pristine core zone forest',
            'Professional and experienced guides',
            'High probability of big cat sightings',
            'Well-maintained safari routes'
        ],
        'map_url'     => 'https://maps.app.goo.gl/hCw3q1yQe1pSew7m9'
    ],
];

$rooms = list_rooms(3);

// Enhanced Structured Data for SEO
$structured_data = json_encode([
    '@context' => 'https://schema.org',
    '@type'    => 'TouristDestination',
    'name'     => 'Tadoba-Andhari Tiger Reserve Safari Guide | Balaji Hotel',
    'description' => $page_description,
    'touristType' => ['Wildlife', 'Safari', 'Photography'],
    'url' => $canonical_url,
    'image' => $og_image,
    'provider' => [
        '@type' => 'LodgingBusiness',
        'name'  => 'Balaji Hotel And Lodge Chimur',
        'url' => $scheme . '://' . $host . $basePath . '/index.php',
        'address' => [
            '@type' => 'PostalAddress',
            'streetAddress' => 'Near Bus Stand, Chimur',
            'addressLocality' => 'Chimur',
            'addressRegion' => 'Maharashtra',
            'postalCode'    => '442903',
            'addressCountry'=> 'IN'
        ],
        'telephone' => get_setting('phone', '+91 7350255026'),
        'email'     => get_setting('email', 'balajirestaurantandlodge@gmail.com'),
        'priceRange' => '₹₹'
    ],
    'hasPart' => array_map(static fn($gate) => [
        '@type' => 'TouristAttraction',
        'name'  => $gate['name'],
        'description' => $gate['summary'],
        'url' => $gate['map_url']
    ], $safari_gates)
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);

// Breadcrumb Structured Data
$breadcrumb_data = json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'BreadcrumbList',
    'itemListElement' => [
        [
            '@type' => 'ListItem',
            'position' => 1,
            'name' => 'Home',
            'item' => $scheme . '://' . $host . $basePath . '/index.php'
        ],
        [
            '@type' => 'ListItem',
            'position' => 2,
            'name' => 'Tadoba Tiger Reserve Guide',
            'item' => $canonical_url
        ]
    ]
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include 'include/header-section.php'; ?>
    <title><?php echo h($page_title); ?></title>
    <script type="application/ld+json">
<?php echo $breadcrumb_data; ?>
    </script>
  </head>
  <body class="main-layout tourist-guide">
    <?php include 'include/loader.php'; ?>
    <?php include 'include/header.php'; ?>

     <style>
      /* Base Styles */
      .tourist-guide main{background:#fdfaf6;padding-top:0;}
      
      /* Breadcrumb */
      .breadcrumb-nav{background:#fff;padding:16px 0;border-bottom:1px solid #eee;margin-top:0px;}
      .breadcrumb-list{list-style:none;padding:0;margin:0;display:flex;gap:8px;align-items:center;font-size:.9rem;}
      .breadcrumb-list li:not(:last-child)::after{content:'/';margin-left:8px;color:#999;}
      .breadcrumb-list a{color:#d35400;text-decoration:none;transition:color .3s;}
      .breadcrumb-list a:hover{color:#b84300;text-decoration:underline;}
      .breadcrumb-list li[aria-current]{color:#666;}

      /* Hero Section */
      .tour-hero{position:relative;color:#fff;padding:90px 0 100px;background-size:cover;background-position:center;background-attachment:fixed;}
      .tour-hero .overlay{position:absolute;inset:0;background:linear-gradient(135deg,rgba(0,0,0,.8),rgba(0,0,0,.5));}
      .tour-hero .hero-content{position:relative;z-index:2;text-align:left;animation:fadeInUp .8s ease;}
      .tour-hero .eyebrow{letter-spacing:.2em;text-transform:uppercase;font-size:.85rem;color:#ffd9b3;margin-bottom:8px;display:block;}
      .tour-hero h1{font-size:3rem;margin:16px 0 20px;max-width:800px;color:#fff;text-shadow:0 4px 20px rgba(0,0,0,.7);line-height:1.2;font-weight:700;}
      .tour-hero .lead{font-size:1.25rem;max-width:700px;color:#fff5d7;text-shadow:0 2px 10px rgba(0,0,0,.6);line-height:1.6;margin-bottom:32px;}
      .hero-cta{margin:32px 0;display:flex;gap:16px;flex-wrap:wrap;}
      .hero-cta .btn{padding:14px 28px;border-radius:50px;font-weight:600;text-decoration:none;display:inline-flex;align-items:center;gap:8px;transition:all .3s;font-size:1rem;}
      .btn.primary{background:#d35400;color:#fff;box-shadow:0 4px 15px rgba(211,84,0,.4);}
      .btn.primary:hover{background:#b84300;transform:translateY(-2px);box-shadow:0 6px 20px rgba(211,84,0,.5);}
      .btn.ghost{border:2px solid #fff;color:#fff;background:rgba(255,255,255,.1);backdrop-filter:blur(10px);}
      .btn.ghost:hover{background:rgba(255,255,255,.2);transform:translateY(-2px);}
      .btn.small{padding:10px 20px;font-size:.9rem;}
      .btn.large{padding:16px 36px;font-size:1.1rem;}
      .hero-badges{list-style:none;padding:0;margin:24px 0 0;display:flex;gap:24px;flex-wrap:wrap;font-weight:500;font-size:.95rem;}
      .hero-badges li{color:#ffecc4;text-shadow:0 2px 8px rgba(0,0,0,.5);display:flex;align-items:center;gap:8px;}
      .hero-badges i{color:#ffd9b3;}

      /* Container & Sections */
      .container{max-width:1200px;margin:0 auto;padding:0 20px;}
      .section-head{text-align:center;margin:50px auto 50px;max-width:800px;}
      .section-head .eyebrow{text-transform:uppercase;font-size:.9rem;letter-spacing:.3em;color:#d35400;font-weight:600;margin-bottom:12px;display:block;}
      .section-head h2{font-size:2.5rem;margin:16px 0;color:#2c3e50;font-weight:700;}
      .section-head p{font-size:1.1rem;color:#666;line-height:1.7;margin-top:12px;}

      /* Tour Cards Grid */
      .tour-grid{padding:5px 0;}
      .tour-grid .grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(320px,1fr));gap:30px;margin-bottom:60px;}
      .tour-card{background:#fff;border-radius:24px;box-shadow:0 10px 40px rgba(0,0,0,.1);display:flex;flex-direction:column;overflow:hidden;transition:transform .3s,box-shadow .3s;}
      .tour-card:hover{transform:translateY(-8px);box-shadow:0 20px 60px rgba(0,0,0,.15);}
      .tour-card figure{position:relative;height:240px;margin:0;overflow:hidden;}
      .tour-card img{width:100%;height:100%;object-fit:cover;transition:transform .5s;}
      .tour-card:hover img{transform:scale(1.1);}
      .tour-card figcaption{position:absolute;bottom:16px;left:16px;background:#fff;color:#d35400;padding:8px 16px;border-radius:30px;font-size:.85rem;font-weight:600;z-index:2;}
      .card-overlay{position:absolute;inset:0;background:rgba(0,0,0,.4);opacity:0;transition:opacity .3s;display:flex;align-items:center;justify-content:center;z-index:1;}
      .tour-card:hover .card-overlay{opacity:1;}
      .overlay-btn{color:#fff;font-size:2rem;text-decoration:none;transition:transform .3s;}
      .overlay-btn:hover{transform:scale(1.2);}
      .tour-card .card-body{padding:28px;flex:1;}
      .tour-card .meta{display:flex;gap:16px;font-size:.9rem;color:#6b6b6b;margin-bottom:16px;flex-wrap:wrap;}
      .meta-item{display:flex;align-items:center;gap:6px;}
      .meta-item i{color:#d35400;}
      .tour-card h3{margin:0 0 12px;font-size:1.5rem;color:#2c3e50;font-weight:700;}
      .tour-card p{margin:0 0 16px;color:#555;line-height:1.7;font-size:1rem;}
      .highlights{list-style:none;padding:0;margin:16px 0 0;color:#333;}
      .highlights li{margin-bottom:10px;display:flex;align-items:flex-start;gap:10px;font-size:.95rem;line-height:1.6;}
      .highlights i{color:#d35400;margin-top:4px;flex-shrink:0;}
      .tour-card .card-footer{padding:20px 28px;display:flex;align-items:center;justify-content:space-between;gap:16px;border-top:1px solid #f0f0f0;flex-wrap:wrap;background:#fafafa;}
      .btn-link{color:#d35400;font-weight:600;text-decoration:none;display:inline-flex;align-items:center;gap:6px;transition:color .3s;}
      .btn-link:hover{color:#b84300;text-decoration:underline;}

      /* Itinerary Section */
      .itinerary{padding:90px 0;background:linear-gradient(135deg,#1a1a1a 0%,#2d2d2d 100%);color:#fff;margin:80px 0;}
      .itinerary-inner{display:flex;gap:50px;flex-wrap:wrap;align-items:flex-start;}
      .itinerary-header{flex:1;min-width:300px;}
      .itinerary-header .eyebrow{color:#ffd9b3;}
      .itinerary-header h2{color:#fff;margin:16px 0;}
      .itinerary-header p{color:#e0e0e0;font-size:1.1rem;}
      .itinerary-cards{display:grid;grid-template-columns:repeat(auto-fit,minmax(280px,1fr));gap:24px;flex:1.5;min-width:300px;}
      .itinerary-card{background:rgba(255,255,255,.08);backdrop-filter:blur(10px);border-radius:20px;padding:32px;border:1px solid rgba(255,255,255,.1);transition:transform .3s,background .3s;}
      .itinerary-card:hover{transform:translateY(-5px);background:rgba(255,255,255,.12);}
      .itinerary-icon{width:60px;height:60px;background:rgba(211,84,0,.2);border-radius:50%;display:flex;align-items:center;justify-content:center;margin-bottom:20px;font-size:1.8rem;color:#ffa366;}
      .itinerary-card h3{font-size:1.5rem;margin:0 0 12px;color:#fff;}
      .itinerary-card p{color:#e0e0e0;line-height:1.7;margin-bottom:20px;}
      .itinerary-link{color:#ffa366;text-decoration:none;font-weight:600;display:inline-flex;align-items:center;gap:8px;transition:gap .3s;}
      .itinerary-link:hover{gap:12px;}

      /* Benefits Section */
      .stay-benefits{padding:80px 0;}
      .benefit-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(280px,1fr));gap:28px;margin-bottom:60px;}
      .benefit{background:#fff;border-radius:20px;padding:32px;box-shadow:0 8px 30px rgba(0,0,0,.08);transition:transform .3s,box-shadow .3s;text-align:center;}
      .benefit:hover{transform:translateY(-5px);box-shadow:0 15px 40px rgba(0,0,0,.12);}
      .benefit-icon{width:70px;height:70px;background:linear-gradient(135deg,#d35400,#ff6b35);border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 20px;font-size:2rem;color:#fff;}
      .benefit h3{font-size:1.4rem;margin:0 0 12px;color:#2c3e50;font-weight:700;}
      .benefit p{color:#666;line-height:1.7;margin:0;font-size:1rem;}

      /* Rooms Section */
      .rooms{padding:80px 0;background:#fff;}
      .room-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(300px,1fr));gap:30px;margin-bottom:50px;}
      .room-card{background:#fff;border-radius:20px;overflow:hidden;box-shadow:0 10px 35px rgba(0,0,0,.1);display:flex;flex-direction:column;transition:transform .3s,box-shadow .3s;}
      .room-card:hover{transform:translateY(-8px);box-shadow:0 20px 50px rgba(0,0,0,.15);}
      .room-image-wrapper{position:relative;height:220px;overflow:hidden;}
      .room-card img{width:100%;height:100%;object-fit:cover;transition:transform .5s;}
      .room-card:hover img{transform:scale(1.1);}
      .room-overlay{position:absolute;inset:0;background:rgba(0,0,0,.5);opacity:0;transition:opacity .3s;display:flex;align-items:center;justify-content:center;}
      .room-card:hover .room-overlay{opacity:1;}
      .room-view-btn{background:#fff;color:#d35400;padding:12px 24px;border-radius:30px;text-decoration:none;font-weight:600;transition:transform .3s;}
      .room-view-btn:hover{transform:scale(1.1);}
      .room-content{padding:24px;}
      .room-content h3{font-size:1.4rem;margin:0 0 12px;color:#2c3e50;font-weight:700;}
      .room-content p{color:#666;line-height:1.6;margin-bottom:20px;font-size:.95rem;}
      .room-cta{text-align:center;margin-top:40px;}

      /* FAQ Section */
      .faq{padding:80px 0;background:#f9f9f9;}
      .faq-list{max-width:900px;margin:0 auto;}
      .faq-list details{background:#fff;border-radius:16px;padding:24px;margin-bottom:16px;box-shadow:0 4px 20px rgba(0,0,0,.06);transition:box-shadow .3s;}
      .faq-list details:hover{box-shadow:0 6px 25px rgba(0,0,0,.1);}
      .faq summary{cursor:pointer;font-weight:600;font-size:1.1rem;color:#2c3e50;display:flex;align-items:center;gap:12px;list-style:none;user-select:none;}
      .faq summary::-webkit-details-marker{display:none;}
      .faq summary::marker{display:none;}
      .faq summary i{color:#d35400;font-size:1.2rem;}
      .faq-content{padding:20px 0 0 32px;color:#555;line-height:1.8;}
      .faq-content a{color:#d35400;text-decoration:none;}
      .faq-content a:hover{text-decoration:underline;}

      /* Social Share */
      .social-share{padding:60px 0;background:#fff;border-top:1px solid #eee;border-bottom:1px solid #eee;}
      .share-content{text-align:center;max-width:600px;margin:0 auto;}
      .share-content h3{font-size:1.8rem;margin:0 0 8px;color:#2c3e50;}
      .share-content p{color:#666;margin-bottom:30px;}
      .share-buttons{display:flex;gap:16px;justify-content:center;flex-wrap:wrap;}
      .share-btn{padding:12px 24px;border-radius:30px;text-decoration:none;color:#fff;font-weight:600;display:inline-flex;align-items:center;gap:8px;transition:transform .3s,opacity .3s;}
      .share-btn:hover{transform:translateY(-3px);opacity:.9;}
      .share-btn.facebook{background:#1877f2;}
      .share-btn.whatsapp{background:#25d366;}
      .share-btn.twitter{background:#1da1f2;}
      .share-btn.email{background:#d35400;}

      /* CTA Section */
      .cta-section{background:linear-gradient(135deg,#d35400,#ff6b35);color:#fff;padding:80px 0;margin:60px 0;}
      .cta-content{text-align:center;max-width:700px;margin:0 auto;}
      .cta-content h2{font-size:2.5rem;margin:0 0 16px;color:#fff;}
      .cta-content p{font-size:1.2rem;margin-bottom:40px;color:#fff5d7;}
      .cta-buttons{display:flex;gap:20px;justify-content:center;flex-wrap:wrap;}
      .cta-section .btn.ghost{border-color:#fff;color:#fff;background:rgba(255,255,255,.1);}
      .cta-section .btn.ghost:hover{background:rgba(255,255,255,.2);}

      /* Animations */
      @keyframes fadeInUp{
        from{opacity:0;transform:translateY(30px);}
        to{opacity:1;transform:translateY(0);}
      }

      /* Responsive */
      @media (max-width:1024px){
        .tour-hero h1{font-size:2.5rem;}
        .section-head h2{font-size:2rem;}
        .itinerary-inner{flex-direction:column;}
      }
      @media (max-width:768px){
        .breadcrumb-nav{margin-top:0px;}
        .tour-hero{padding:55px 0 80px;background-attachment:scroll;}
        .tour-hero h1{font-size:2rem;}
        .tour-hero .lead{font-size:1.1rem;}
        .section-head h2{font-size:1.8rem;}
        .tour-grid .grid{grid-template-columns:1fr;gap:24px;}
        .benefit-grid{grid-template-columns:1fr;}
        .room-grid{grid-template-columns:1fr;}
        .itinerary-cards{grid-template-columns:1fr;}
        .hero-cta{flex-direction:column;}
        .hero-cta .btn{width:100%;justify-content:center;}
        .cta-content h2{font-size:2rem;}
        .cta-buttons{flex-direction:column;}
        .cta-buttons .btn{width:100%;}
      }
      @media (max-width:480px){
        .container{padding:0 16px;}
        .tour-hero h1{font-size:1.75rem;}
        .section-head h2{font-size:1.5rem;}
        .tour-card .card-footer{flex-direction:column;}
        .tour-card .card-footer .btn{width:100%;justify-content:center;}
      }
    </style>
    <main>
      <div class="back_re">
         <div class="decorative-corner top-left"></div>
         <div class="decorative-corner top-right"></div>
         <div class="decorative-corner bottom-left"></div>
         <div class="decorative-corner bottom-right"></div>
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="title">
                     <h2>Tadoba Tiger Reserve Safari Guide</h2>
                     <p class="subtitle">Complete Guide to Safari Booking, Gates, Permits & Wildlife Sightings</p>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <section class="tour-grid container">
        <header class="section-head">
          <span class="eyebrow">Safari Entry Gates</span>
          <h2>Tadoba Safari Gates & Entry Points</h2>
          <p>Choose the right gate based on your preferences, distance, and safari type. We help you book permits and arrange transportation.</p>
        </header>
        <div class="grid">
          <?php foreach ($safari_gates as $index => $gate): ?>
          <article class="tour-card" data-aos="fade-up" data-aos-delay="<?php echo $index * 100; ?>">
            <figure>
              <img src="<?php echo h($gate['image']); ?>" alt="<?php echo h($gate['name']); ?> - <?php echo h($gate['tag']); ?>" loading="lazy">
              <figcaption><?php echo h($gate['tag']); ?></figcaption>
              <div class="card-overlay">
                <a href="<?php echo h($gate['map_url']); ?>" target="_blank" rel="noopener" class="overlay-btn" title="View on Map">
                  <i class="fa fa-map-marker"></i>
                </a>
              </div>
            </figure>
            <div class="card-body">
              <div class="meta">
                <span class="meta-item"><i class="fa fa-road"></i> <?php echo h($gate['distance']); ?></span>
                <span class="meta-item"><i class="fa fa-clock-o"></i> <?php echo h($gate['best_time']); ?></span>
              </div>
              <h3><?php echo h($gate['name']); ?></h3>
              <p><?php echo h($gate['summary']); ?></p>
              <ul class="highlights">
                <?php foreach ($gate['highlights'] as $tip): ?>
                <li><i class="fa fa-star"></i> <?php echo h($tip); ?></li>
                <?php endforeach; ?>
              </ul>
            </div>
            <div class="card-footer">
              <a class="btn-link" href="<?php echo h($gate['map_url']); ?>" target="_blank" rel="noopener">
                <i class="fa fa-map-marker"></i> View Location
              </a>
              <a class="btn primary small" href="book_room.php" data-book-room>
                <i class="fa fa-calendar"></i> Book Safari Stay
              </a>
            </div>
          </article>
          <?php endforeach; ?>
        </div>
      </section>

      <section class="itinerary">
        <div class="container itinerary-inner">
          <div class="itinerary-header">
            <span class="eyebrow">Safari Packages</span>
            <h2>Complete Tadoba Safari Experience</h2>
            <p>From permit booking to transportation, we handle everything for your perfect Tadoba safari adventure. Stay with us and focus on wildlife.</p>
          </div>
          <div class="itinerary-cards">
            <article class="itinerary-card">
              <div class="itinerary-icon"><i class="fa fa-sun-o"></i></div>
              <h3>Morning Safari Package</h3>
              <p>Early morning 6 AM safari with packed breakfast. Wake-up call at 4:30 AM, transportation arranged, and return to hotel by 10 AM for brunch.</p>
              <a href="book_room.php" class="itinerary-link">Book Now <i class="fa fa-arrow-right"></i></a>
            </article>
            <article class="itinerary-card">
              <div class="itinerary-icon"><i class="fa fa-moon-o"></i></div>
              <h3>Evening Safari Package</h3>
              <p>Afternoon 3 PM safari with golden hour photography. Leave hotel at 2 PM, enjoy 3-hour safari, return by 6:30 PM for dinner.</p>
              <a href="book_room.php" class="itinerary-link">Book Now <i class="fa fa-arrow-right"></i></a>
            </article>
            <article class="itinerary-card">
              <div class="itinerary-icon"><i class="fa fa-camera"></i></div>
              <h3>Full Day Safari</h3>
              <p>Morning + Evening safaris with lunch break. Perfect for photographers and wildlife enthusiasts. Maximum wildlife viewing opportunities.</p>
              <a href="book_room.php" class="itinerary-link">Book Now <i class="fa fa-arrow-right"></i></a>
            </article>
          </div>
        </div>
      </section>

      <section class="stay-benefits container">
        <header class="section-head">
          <span class="eyebrow">Why Stay With Us</span>
          <h2>Perfect Base for Tadoba Safari Adventures</h2>
          <p>Located just 46 km from Tadoba, we offer safari-ready services, early wake-up calls, and expert guidance for your wildlife experience.</p>
        </header>
        <div class="benefit-grid">
          <div class="benefit">
            <div class="benefit-icon"><i class="fa fa-clock-o"></i></div>
            <h3>Early Wake-Up Service</h3>
            <p>Wake-up calls at 4:30 AM for morning safaris. Packed breakfast ready before departure.</p>
          </div>
          <div class="benefit">
            <div class="benefit-icon"><i class="fa fa-ticket"></i></div>
            <h3>Safari Permit Assistance</h3>
            <p>We help you book Tadoba safari permits in advance. Guidance on gate selection and timing.</p>
          </div>
          <div class="benefit">
            <div class="benefit-icon"><i class="fa fa-car"></i></div>
            <h3>Transportation Arranged</h3>
            <p>Reliable local jeeps and vehicles arranged for safari trips. Experienced drivers familiar with routes.</p>
          </div>
          <div class="benefit">
            <div class="benefit-icon"><i class="fa fa-camera-retro"></i></div>
            <h3>Photography Support</h3>
            <p>Tips on best photography spots, golden hour timings, and equipment storage facilities.</p>
          </div>
          <div class="benefit">
            <div class="benefit-icon"><i class="fa fa-cutlery"></i></div>
            <h3>Flexible Meal Timings</h3>
            <p>Meals adjusted to your safari schedule. Early breakfast, late dinner options available.</p>
          </div>
          <div class="benefit">
            <div class="benefit-icon"><i class="fa fa-users"></i></div>
            <h3>Expert Guidance</h3>
            <p>Local insights on best gates, wildlife sightings, and seasonal variations from our experienced team.</p>
          </div>
        </div>
      </section>

      <section class="rooms container">
        <header class="section-head">
          <span class="eyebrow">Pick Your Room</span>
          <h2>Comfortable Stay for Safari Guests</h2>
          <p>Choose a room and mention "Tadoba Safari" while booking to get safari package assistance and early check-in.</p>
        </header>
        <div class="room-grid">
          <?php 
          $pdo = get_pdo();
          foreach ($rooms as $room): 
            // Check availability for each room
            $approvedCount = $pdo->prepare('SELECT COUNT(*) FROM booking_inquiries WHERE room_id = ? AND status = ?');
            $approvedCount->execute([(int)$room['id'], 'approved']);
            $approvedBookings = (int)$approvedCount->fetchColumn();
            $quantity = isset($room['quantity']) && $room['quantity'] !== null ? (int)$room['quantity'] : 1;
            $available = max(0, $quantity - $approvedBookings);
            $isSoldOut = $available <= 0;
          ?>
          <article class="room-card" <?php if ($isSoldOut): ?>style="opacity: 0.7;"<?php endif; ?>>
            <div class="room-image-wrapper">
              <img src="<?php echo h($room['image_path'] ?? 'images/room1.jpg'); ?>" alt="<?php echo h($room['title']); ?> - Balaji Hotel" loading="lazy">
              <?php if ($isSoldOut): ?>
              <div class="room-sold-out-badge" style="position: absolute; top: 10px; right: 10px; background: #dc3545; color: #fff; padding: 5px 12px; border-radius: 4px; font-weight: 600; font-size: 12px; z-index: 2;">
                <i class="fa fa-times-circle"></i> Sold Out
              </div>
              <?php endif; ?>
              <div class="room-overlay">
                <?php if (!$isSoldOut): ?>
                <a href="book_room.php?room_id=<?php echo (int)$room['id']; ?>" class="room-view-btn">View Details</a>
                <?php else: ?>
                <div class="room-view-btn" style="cursor: not-allowed; opacity: 0.8;">Sold Out</div>
                <?php endif; ?>
              </div>
            </div>
            <div class="room-content">
              <h3>
                <?php echo h($room['title']); ?>
                <?php if ($isSoldOut): ?>
                  <span style="color: #dc3545; font-size: 12px; font-weight: 600;">
                    <i class="fa fa-ban"></i> Sold Out
                  </span>
                <?php elseif ($available < $quantity): ?>
                  <span style="color: #28a745; font-size: 12px; font-weight: 600;">
                    <i class="fa fa-check-circle"></i> Available (<?php echo $available; ?>)
                  </span>
                <?php endif; ?>
              </h3>
              <?php if (!empty($room['description'])): ?>
              <p><?php echo h(mb_substr($room['description'], 0, 120)); ?><?php echo mb_strlen($room['description']) > 120 ? '...' : ''; ?></p>
              <?php endif; ?>
              <?php if (!$isSoldOut): ?>
              <a class="btn primary" href="book_room.php?room_id=<?php echo (int)$room['id']; ?>">
                <i class="fa fa-calendar-check"></i> Check Availability
              </a>
              <?php else: ?>
              <a class="btn primary" href="#" style="background: #6c757d; cursor: not-allowed; pointer-events: none;" onclick="return false;">
                <i class="fa fa-ban"></i> Sold Out
              </a>
              <?php endif; ?>
            </div>
          </article>
          <?php endforeach; ?>
        </div>
        <div class="room-cta">
          <a href="room.php" class="btn ghost">View All Rooms <i class="fa fa-arrow-right"></i></a>
        </div>
      </section>

      <section class="faq container">
        <header class="section-head">
          <span class="eyebrow">Safari FAQs</span>
          <h2>Frequently Asked Questions About Tadoba</h2>
        </header>
        <div class="faq-list">
          <details open>
            <summary><i class="fa fa-question-circle"></i> How do I book Tadoba safari permits?</summary>
            <div class="faq-content">
              <p>Tadoba safari permits can be booked online 120 days in advance through the official Maharashtra Forest Department website. We assist our guests with permit booking guidance and can help arrange permits through authorized operators. Contact us in advance for assistance.</p>
            </div>
          </details>
          <details>
            <summary><i class="fa fa-question-circle"></i> Which gate is best for tiger sightings?</summary>
            <div class="faq-content">
              <p>Moharli Gate has the highest tiger density and best sighting probability. However, it's also the most popular and requires advance booking. Kolara and Chimur gates offer good alternatives with less crowd. Our team can guide you based on your preferences and availability.</p>
            </div>
          </details>
          <details>
            <summary><i class="fa fa-question-circle"></i> What is the best time to visit Tadoba?</summary>
            <div class="faq-content">
              <p>October to May is the best time for wildlife sightings. Peak season is December to February when tiger sightings are highest. Monsoon (June-September) offers lush greenery but limited safari access. Morning safaris (6 AM) and evening safaris (3 PM) are both excellent for different experiences.</p>
            </div>
          </details>
          <details>
            <summary><i class="fa fa-question-circle"></i> What should I carry for the safari?</summary>
            <div class="faq-content">
              <p>Carry binoculars, camera with telephoto lens, warm clothing (mornings are cold), water bottle, cap/hat, sunscreen, and insect repellent. Wear earth-toned clothes (avoid bright colors). We provide packed breakfast for morning safaris.</p>
            </div>
          </details>
          <details>
            <summary><i class="fa fa-question-circle"></i> Can you arrange transportation to Tadoba?</summary>
            <div class="faq-content">
              <p>Yes, we arrange reliable local jeeps and vehicles for Tadoba safaris. Our drivers are familiar with all gates and routes. Transportation can be arranged for both morning and evening safaris. Contact us in advance to book.</p>
            </div>
          </details>
          <details>
            <summary><i class="fa fa-question-circle"></i> What wildlife can I see in Tadoba?</summary>
            <div class="faq-content">
              <p>Tadoba is home to tigers, leopards, sloth bears, wild dogs, Indian bison (gaur), sambar deer, spotted deer, and over 195 species of birds. The reserve has one of the highest tiger densities in India, making it excellent for big cat sightings.</p>
            </div>
          </details>
          <details>
            <summary><i class="fa fa-question-circle"></i> Is early check-in possible for morning safaris?</summary>
            <div class="faq-content">
              <p>Absolutely! We prioritize safari guests for early check-in. If you're arriving late night for an early morning safari, we can arrange early check-in when rooms are available. Contact us in advance to confirm.</p>
            </div>
          </details>
        </div>
      </section>

      <!-- Social Share Section -->
      <section class="social-share container">
        <div class="share-content">
          <h3>Share This Guide</h3>
          <p>Help others plan their perfect Tadoba safari experience</p>
          <div class="share-buttons">
            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode($canonical_url); ?>" target="_blank" rel="noopener" class="share-btn facebook" title="Share on Facebook">
              <i class="fa fa-facebook"></i> Facebook
            </a>
            <a href="https://wa.me/?text=<?php echo urlencode($page_title . ' - ' . $canonical_url); ?>" target="_blank" rel="noopener" class="share-btn whatsapp" title="Share on WhatsApp">
              <i class="fa fa-whatsapp"></i> WhatsApp
            </a>
            <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode($canonical_url); ?>&text=<?php echo urlencode($page_title); ?>" target="_blank" rel="noopener" class="share-btn twitter" title="Share on Twitter">
              <i class="fa fa-twitter"></i> Twitter
            </a>
            <a href="mailto:?subject=<?php echo urlencode($page_title); ?>&body=<?php echo urlencode($canonical_url); ?>" class="share-btn email" title="Share via Email">
              <i class="fa fa-envelope"></i> Email
            </a>
          </div>
        </div>
      </section>

      <!-- Call to Action Section -->
      <section class="cta-section">
        <div class="container">
          <div class="cta-content">
            <h2>Ready for Your Tadoba Safari Adventure?</h2>
            <p>Book your stay with Balaji Hotel and experience the best of Tadoba Tiger Reserve with our safari-ready services.</p>
            <div class="cta-buttons">
              <a href="book_room.php" class="btn primary large">Book Your Safari Stay</a>
              <a href="contact.php" class="btn ghost large">Contact Us</a>
            </div>
          </div>
        </div>
      </section>
    </main>

    <?php include 'include/footer.php'; ?>
    <?php include 'include/footer-section.php'; ?>

   
  </body>
</html>

