<?php
require_once __DIR__ . '/include/functions.php';

$page_title       = 'Chimur Tourist Places & Travel Guide | Balaji Hotel Stay';
$page_description = 'Explore the best tourist places near Chimur, Tadoba and Chandrapur with Balaji Hotel as your stay partner for wildlife safaris and heritage getaways. Discover Tadoba Tiger Reserve, Mahakali Temple, Ramdegi Forest, Irai Dam, and more.';
$page_keywords    = 'tourist places in Chimur, Tadoba safari stay, Nagpur weekend trip, Chandrapur tourism, Balaji Hotel Chimur, Tadoba-Andhari Tiger Reserve, Mahakali Temple Chimur, Ramdegi Forest, Irai Dam, places to visit near Chimur, hotels near Tadoba, budget stay Chimur';
$scheme           = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
$host             = $_SERVER['HTTP_HOST'] ?? 'localhost';
$basePath         = rtrim(str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? '')), '/');
$basePath         = $basePath === '.' ? '' : $basePath;
$canonical_url    = $scheme . '://' . $host . $basePath . '/chimur-tourism.php';
$og_image         = $scheme . '://' . $host . $basePath . '/images/banner1.jpg';

$tour_spots = [
    [
        'name'        => 'Tadoba-Andhari Tiger Reserve',
        'tag'         => 'Wildlife Safari',
        'image'       => 'images/tadoba.png',
        'distance'    => '46 km from Balaji Hotel, ~1 hr drive',
        'best_time'   => 'October to May for peak sightings',
        'summary'     => 'India’s legendary tiger reserve with core and buffer safaris, birding trails, and night drives that begin just a short drive from Chimur.',
        'highlights'  => [
            'Book morning or evening jeep safaris from Moharli/Chimur gates',
            'Carry telephoto lens for tiger, leopard, and sloth bear sightings',
            'Combine with buffer zone night safari for a 360° Tadoba experience'
        ],
        'map_url'     => 'https://maps.app.goo.gl/hCw3q1yQe1pSew7m9'
    ],
    [
        'name'        => 'Shri Mahakali Temple, Chimur',
        'tag'         => 'Heritage & Spiritual',
        'image'       => 'images/MahakaliMandir.png',
        'distance'    => '1.2 km | 5 min walk',
        'best_time'   => 'Year-round, special aartis in Shravan/Navratri',
        'summary'     => 'An 800-year-old temple dedicated to Maa Mahakali and Bhimashankar—perfect for sunrise darshan before you start your excursions.',
        'highlights'  => [
            'Experience early morning arti followed by local breakfast',
            'Shop brass diyas and locally made prasad items in the bazaar',
            'Join the evening palkhi procession during major festivals'
        ],
        'map_url'     => 'https://maps.app.goo.gl/5FQfWq2A5z4F7Aix7'
    ],
    [
        'name'        => 'Ramdegi Forest & Shiv Temple',
        'tag'         => 'Nature + Pilgrimage',
        'image'       => 'images/RamdegiTemple.png',
        'distance'    => '18 km | 25 min drive',
        'best_time'   => 'Monsoon & winter mornings',
        'summary'     => 'Dense teak forest, a peaceful lake, and the historic Shri Ramdegi temple complex known for meditation camps and serene walks.',
        'highlights'  => [
            'Climb to the hilltop shrine for panoramic Chimur views',
            'Picnic by the Ramdegi lake (carry waste-back bags)',
            'Watch for peacocks and deer during golden hour'
        ],
        'map_url'     => 'https://maps.app.goo.gl/7g8Eu7gB5gzA1ENX7'
    ],
    [
        'name'        => 'Irai Dam & Boat Ride Point',
        'tag'         => 'Scenic Sunset',
        'image'       => 'images/iraiLake.png',
        'distance'    => '33 km | 45 min drive',
        'best_time'   => 'Sunset hours, September to February',
        'summary'     => 'Catch dreamy sunsets over Tadoba’s lifeline reservoir, opt for buffer safari plus boat ride combination, and photograph migratory birds.',
        'highlights'  => [
            'Golden-hour photography with Tadoba backwaters',
            'Chance to spot crocodiles and bar-headed geese',
            'Pack Balaji’s takeaway snacks for a sunset picnic'
        ],
        'map_url'     => 'https://maps.app.goo.gl/dBQpgUULYzRXfaSd9'
    ],
    [
        'name'        => 'Zero Mile Nagpur & Sitabuldi Fort',
        'tag'         => 'City Excursion',
        'image'       => 'images/sitaburdifort.png',
        'distance'    => '116 km | 2.5 hr drive',
        'best_time'   => 'Weekend day trips',
        'summary'     => 'Trace India’s geographical centre, go cafe hopping, explore Futala Lake evenings, and return to the serenity of Balaji Hotel the same night.',
        'highlights'  => [
            'Street food crawl at Sadar Bazaar',
            'Visit Deekshabhoomi & Sitabuldi fort museum',
            'Shop orange sweets for your return journey'
        ],
        'map_url'     => 'https://maps.app.goo.gl/NVP1zQ6w7mYgsh5T8'
    ],
    [
        'name'        => 'Sevagram Ashram, Wardha',
        'tag'         => 'Heritage Circuit',
        'image'       => 'images/sevagram.png',
        'distance'    => '97 km | 2 hr drive',
        'best_time'   => 'October to March mornings',
        'summary'     => 'Walk through Mahatma Gandhi’s Sevagram, spin the charkha, and learn about India’s freedom movement before looping back via Hinganghat food stops.',
        'highlights'  => [
            'Attend guided heritage walk (10 AM & 3 PM batches)',
            'Explore Magan Sangrahalaya Khadi museum',
            'Pair with Hinganghat cotton & saree shopping'
        ],
        'map_url'     => 'https://maps.app.goo.gl/FxH7ZSQqkWKFfpJw9'
    ],
];

$rooms         = list_rooms(3);

// Enhanced Structured Data for SEO
$structured_data = json_encode([
    '@context' => 'https://schema.org',
    '@type'    => 'TouristDestination',
    'name'     => 'Chimur & Tadoba Tourist Guide | Balaji Hotel And Lodge',
    'description' => $page_description,
    'touristType' => ['Wildlife', 'Spiritual', 'Weekend-getaway'],
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
    'hasPart' => array_map(static fn($spot) => [
        '@type' => 'TouristAttraction',
        'name'  => $spot['name'],
        'description' => $spot['summary'],
        'url' => $spot['map_url']
    ], $tour_spots)
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
            'name' => 'Chimur Tourism Guide',
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
      <!-- Breadcrumb Navigation
      <nav class="breadcrumb-nav" aria-label="Breadcrumb">
        <div class="container">
          <ol class="breadcrumb-list">
            <li><a href="index.php">Home</a></li>
            <li aria-current="page">Chimur Tourism Guide</li>
          </ol>
        </div>
      </nav> -->

      <div class="back_re">
         <div class="decorative-corner top-left"></div>
         <div class="decorative-corner top-right"></div>
         <div class="decorative-corner bottom-left"></div>
         <div class="decorative-corner bottom-right"></div>
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="title">
                     <h2><span>Chimur Travel Guide</span></h2>
                     <p class="subtitle">Discover Tourist Places, Tadoba Safari & Heritage Sites Near Chimur</p>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <section class="tour-grid container">
        <header class="section-head">
          <span class="eyebrow">Curated Nearby Attractions</span>
          <h2>Top Tourist Places Around Chimur</h2>
          <p>Shortlist your itinerary with drive times, best seasons, and on-ground tips from the Balaji Hotel team.</p>
        </header>
        <div class="grid">
          <?php foreach ($tour_spots as $index => $spot): ?>
          <article class="tour-card" data-aos="fade-up" data-aos-delay="<?php echo $index * 100; ?>">
            <figure>
              <img src="<?php echo h($spot['image']); ?>" alt="<?php echo h($spot['name']); ?> - <?php echo h($spot['tag']); ?>" loading="lazy">
              <figcaption><?php echo h($spot['tag']); ?></figcaption>
              <div class="card-overlay">
                <a href="<?php echo h($spot['map_url']); ?>" target="_blank" rel="noopener" class="overlay-btn" title="View on Map">
                  <i class="fa fa-map-marker"></i>
                </a>
              </div>
            </figure>
            <div class="card-body">
              <div class="meta">
                <span class="meta-item"><i class="fa fa-road"></i> <?php echo h($spot['distance']); ?></span>
                <span class="meta-item"><i class="fa fa-calendar"></i> <?php echo h($spot['best_time']); ?></span>
              </div>
              <h3><?php echo h($spot['name']); ?></h3>
              <p><?php echo h($spot['summary']); ?></p>
              <ul class="highlights">
                <?php foreach ($spot['highlights'] as $tip): ?>
                <li><i class="fa fa-star"></i> <?php echo h($tip); ?></li>
                <?php endforeach; ?>
              </ul>
            </div>
            <div class="card-footer">
              <a class="btn-link" href="<?php echo h($spot['map_url']); ?>" target="_blank" rel="noopener">
                <i class="fa fa-map-marker"></i> Open in Google Maps
              </a>
              <a class="btn primary small" href="#" data-book-room>
                <i class="fa fa-bed"></i> Book Stay
              </a>
            </div>
          </article>
          <?php endforeach; ?>
        </div>
      </section>

      <section class="itinerary">
        <div class="container itinerary-inner">
          <div class="itinerary-header">
            <span class="eyebrow">Suggested Mini-Itineraries</span>
            <h2>Make the Most of Your Chimur Trip</h2>
            <p>Mix wildlife, heritage, and food-trails without wasting time searching for stays. Our team handles taxi partners, safari permits, and meal timings.</p>
          </div>
          <div class="itinerary-cards">
            <article class="itinerary-card">
              <div class="itinerary-icon"><i class="fa fa-paw"></i></div>
              <h3>48-Hour Tadoba Sprint</h3>
              <p>Day 1 evening buffer safari + Irai sunset. Day 2 sunrise core safari, temple darshan, depart post brunch.</p>
              <a href="book_room.php" class="itinerary-link">Book Now <i class="fa fa-arrow-right"></i></a>
            </article>
            <article class="itinerary-card">
              <div class="itinerary-icon"><i class="fa fa-building"></i></div>
              <h3>Weekend Heritage Loop</h3>
              <p>Day 1 Mahakali & Ramdegi. Day 2 Sevagram Ashram + Hinganghat shopping halt.</p>
              <a href="book_room.php" class="itinerary-link">Book Now <i class="fa fa-arrow-right"></i></a>
            </article>
            <article class="itinerary-card">
              <div class="itinerary-icon"><i class="fa fa-laptop"></i></div>
              <h3>Nagpur Workation</h3>
              <p>Morning drive from Nagpur, spend 2 nights at Balaji, plug-and-play Wi-Fi, evening safaris or nature walks.</p>
              <a href="book_room.php" class="itinerary-link">Book Now <i class="fa fa-arrow-right"></i></a>
            </article>
          </div>
        </div>
      </section>

      <section class="stay-benefits container">
        <header class="section-head">
          <span class="eyebrow">Why Balaji Hotel & Lodge</span>
          <h2>Stay Strategically Between Nagpur, Chandrapur & Tadoba</h2>
          <p>We are 200 meters from Chimur bus stand, offer private parking, and arrange meals that match your safari slots.</p>
        </header>
        <div class="benefit-grid">
          <div class="benefit">
            <div class="benefit-icon"><i class="fa fa-camera-retro"></i></div>
            <h3>Safari-Ready Services</h3>
            <p>Wake-up calls at 4:30 AM, packed breakfast, and on-call local jeeps for last-minute buffer permits.</p>
          </div>
          <div class="benefit">
            <div class="benefit-icon"><i class="fa fa-users"></i></div>
            <h3>Family-Friendly Rooms</h3>
            <p>AC/non-AC options, extra bedding, and hygiene-focused housekeeping for multi-generational travel.</p>
          </div>
          <div class="benefit">
            <div class="benefit-icon"><i class="fa fa-map-signs"></i></div>
            <h3>Hyper-local Insights</h3>
            <p>Get directions to hidden ghats, seasonal fairs, and trusted food joints in Chandrapur & Nagpur.</p>
          </div>
          <div class="benefit">
            <div class="benefit-icon"><i class="fa fa-wifi"></i></div>
            <h3>High-Speed Wi-Fi</h3>
            <p>Reliable internet connection for remote work and staying connected with family and friends.</p>
          </div>
          <div class="benefit">
            <div class="benefit-icon"><i class="fa fa-car"></i></div>
            <h3>Free Parking</h3>
            <p>Secure private parking space available for all guests, perfect for self-drive travelers.</p>
          </div>
          <div class="benefit">
            <div class="benefit-icon"><i class="fa fa-utensils"></i></div>
            <h3>Delicious Meals</h3>
            <p>Fresh, home-cooked meals available throughout the day, customized to your safari schedule.</p>
          </div>
        </div>
      </section>

      <section class="rooms container">
        <header class="section-head">
          <span class="eyebrow">Pick Your Room</span>
          <h2>Popular Stays for Tourist Travellers</h2>
          <p>Choose a room category and mention "Tourist Guide Page" while booking to unlock curated itineraries.</p>
        </header>
        <div class="room-grid">
          <?php 
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
          <span class="eyebrow">Traveller FAQs</span>
          <h2>Questions Guests Ask Us Most</h2>
        </header>
        <div class="faq-list">
          <details open>
            <summary><i class="fa fa-question-circle"></i> How do I reach Balaji Hotel from Nagpur or Chandrapur?</summary>
            <div class="faq-content">
              <p>Drive via Umred-Bhiwapur road from Nagpur (2.5 hrs) or take NH930 from Chandrapur (1.5 hrs). We can schedule cabs or guide bus timings. For detailed directions, <a href="contact.php">contact us</a>.</p>
            </div>
          </details>
          <details>
            <summary><i class="fa fa-question-circle"></i> Can you arrange Tadoba safari permits?</summary>
            <div class="faq-content">
              <p>Yes. Share your preferred gate (Moharli, Chimur, Kolara) and dates. We coordinate with authorized operators while you enjoy your stay. Advance booking recommended during peak season (Oct-May).</p>
            </div>
          </details>
          <details>
            <summary><i class="fa fa-question-circle"></i> Do you have Wi-Fi and workspace for workations?</summary>
            <div class="faq-content">
              <p>Every floor has high-speed Wi-Fi, backup power, and ergonomic chairs on request—ideal for remote workers planning longer stays. We also offer flexible meal timings for workation guests.</p>
            </div>
          </details>
          <details>
            <summary><i class="fa fa-question-circle"></i> Is early check-in possible for morning safaris?</summary>
            <div class="faq-content">
              <p>Absolutely. Let us know your arrival time; we prioritize safari guests for early check-in/late checkout when rooms are available. Contact us in advance to arrange this.</p>
            </div>
          </details>
          <details>
            <summary><i class="fa fa-question-circle"></i> What are the best months to visit Tadoba?</summary>
            <div class="faq-content">
              <p>October to May is the best time for wildlife sightings. Monsoon (June-September) offers lush greenery but limited safari access. Peak season is December to February.</p>
            </div>
          </details>
          <details>
            <summary><i class="fa fa-question-circle"></i> Do you provide transportation services?</summary>
            <div class="faq-content">
              <p>We can arrange local taxis and jeeps for safaris and sightseeing. Contact us in advance to book transportation services at competitive rates.</p>
            </div>
          </details>
        </div>
      </section>

      <!-- Social Share Section -->
      <section class="social-share container">
        <div class="share-content">
          <h3>Share This Guide</h3>
          <p>Help others discover the beauty of Chimur and Tadoba</p>
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
            <h2>Ready to Explore Chimur & Tadoba?</h2>
            <p>Book your stay with Balaji Hotel and experience the best of wildlife, heritage, and nature tourism.</p>
            <div class="cta-buttons">
              <a href="book_room.php" class="btn primary large">Book Your Room Now</a>
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

