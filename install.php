<?php
// One-time installer: creates DB, tables, and seeds demo data
// Visit: http://localhost/xampnew/practice/install.php

ini_set('display_errors', 1);
error_reporting(E_ALL);

$host = '127.0.0.1';
$user = 'root';
$pass = '';
$db   = 'balaji_hotel';

try {
    $pdo = new PDO('mysql:host=' . $host, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
    $schema = file_get_contents(__DIR__ . '/database/schema.sql');
    $pdo->exec($schema);
    $pdo->exec('USE `' . $db . '`');

    // Seed admin if not exists
    $exists = $pdo->query("SELECT COUNT(*) c FROM admin_users")->fetch()['c'];
    if ((int)$exists === 0) {
        $hash = password_hash('admin123', PASSWORD_DEFAULT);
        $stmt = $pdo->prepare('INSERT INTO admin_users (username, password_hash) VALUES (?, ?)');
        $stmt->execute(['admin', $hash]);
    }

    // Seed site_pages (About)
    $stmt = $pdo->prepare('INSERT IGNORE INTO site_pages (slug, title, content) VALUES (?,?,?)');
    $about = "Balaji Hotel & Restaurant is a clean, comfortable, and family-friendly place to stay in Chimur. We offer well-maintained AC and Non-AC rooms for travelers, families, and tourists visiting Chimur and nearby attractions like Tadoba National Park. Our restaurant serves pure veg, non-veg, and South Indian dishes, prepared fresh with good quality and homely taste.";
    $stmt->execute(['about', 'About Us', $about]);

    // Ensure new columns exist (idempotent best-effort)
    try { $pdo->exec('ALTER TABLE rooms ADD COLUMN IF NOT EXISTS quantity INT NOT NULL DEFAULT 1'); } catch (Throwable $e) {}
    try { $pdo->exec('ALTER TABLE rooms ADD COLUMN IF NOT EXISTS max_adults INT NOT NULL DEFAULT 2'); } catch (Throwable $e) {}
    try { $pdo->exec('ALTER TABLE rooms ADD COLUMN IF NOT EXISTS max_children INT NOT NULL DEFAULT 2'); } catch (Throwable $e) {}
    try { $pdo->exec('ALTER TABLE rooms ADD COLUMN IF NOT EXISTS extra_guest_charge DECIMAL(10,2) NULL'); } catch (Throwable $e) {}

    // Seed rooms - Real Balaji Hotel Room Types with Actual Content (Bullet Points)
    $realRooms = [
        [
            'title' => 'AC Deluxe Room',
            'description' => '• Perfect for couples & small families\n• Clean bedding & attached bathroom\n• Hot water & essential amenities\n• Ideal for Tadoba safari travelers\n• Close to tourist attractions',
            'image_path' => 'images/room1.jpg',
            'price' => 1200.00,
            'quantity' => 3,
            'max_adults' => 2,
            'max_children' => 2,
            'extra_guest_charge' => 300.00
        ],
        [
            'title' => 'AC Family Room',
            'description' => '• Spacious room for families (up to 4 guests)\n• Clean facilities & homely atmosphere\n• Perfect for Tadoba National Park visits\n• Family-friendly amenities\n• Fresh restaurant meals available',
            'image_path' => 'images/room2.jpg',
            'price' => 1500.00,
            'quantity' => 2,
            'max_adults' => 3,
            'max_children' => 2,
            'extra_guest_charge' => 300.00
        ],
        [
            'title' => 'Non-AC Standard Room',
            'description' => '• Budget-friendly option\n• Good natural ventilation\n• Clean bedding & attached bathroom\n• Perfect for short stays\n• Great value for money',
            'image_path' => 'images/room3.jpg',
            'price' => 800.00,
            'quantity' => 4,
            'max_adults' => 2,
            'max_children' => 1,
            'extra_guest_charge' => 200.00
        ],
        [
            'title' => 'Non-AC Family Room',
            'description' => '• Affordable family room (3-4 guests)\n• Clean & well-maintained\n• Good ventilation\n• Close to local attractions\n• Fresh homely meals available',
            'image_path' => 'images/room4.jpg',
            'price' => 1000.00,
            'quantity' => 3,
            'max_adults' => 3,
            'max_children' => 2,
            'extra_guest_charge' => 200.00
        ],
        [
            'title' => 'AC Suite Room',
            'description' => '• Premium suite with extra space\n• Enhanced comfort & luxury amenities\n• Ideal for extended stays\n• Priority restaurant service\n• Perfect for special occasions',
            'image_path' => 'images/room5.jpg',
            'price' => 2000.00,
            'quantity' => 1,
            'max_adults' => 4,
            'max_children' => 2,
            'extra_guest_charge' => 400.00
        ],
        [
            'title' => 'Non-AC Double Room',
            'description' => '• Perfect for couples & solo travelers\n• Clean & well-maintained\n• Good natural ventilation\n• Ideal for Tadoba safari trips\n• Delicious meals available',
            'image_path' => 'images/room6.jpg',
            'price' => 700.00,
            'quantity' => 2,
            'max_adults' => 2,
            'max_children' => 1,
            'extra_guest_charge' => 200.00
        ]
    ];
    
    foreach ($realRooms as $room) {
        $stmt = $pdo->prepare('INSERT INTO rooms (title, description, image_path, price, quantity, max_adults, max_children, extra_guest_charge, status) VALUES (?,?,?,?,?,?,?,?,1)');
        $stmt->execute([
            $room['title'],
            $room['description'],
            $room['image_path'],
            $room['price'],
            $room['quantity'],
            $room['max_adults'],
            $room['max_children'],
            $room['extra_guest_charge']
        ]);
    }

    // Seed gallery - Real Balaji Hotel Gallery
    $galleryItems = [
        ['title' => 'Hotel Reception', 'image_path' => 'images/gallery1.jpg'],
        ['title' => 'AC Room Interior', 'image_path' => 'images/gallery2.jpg'],
        ['title' => 'Restaurant Dining Area', 'image_path' => 'images/gallery3.jpg'],
        ['title' => 'Hotel Exterior', 'image_path' => 'images/gallery4.jpg'],
        ['title' => 'Family Room', 'image_path' => 'images/gallery5.jpg'],
        ['title' => 'Restaurant Kitchen', 'image_path' => 'images/gallery6.jpg'],
        ['title' => 'Hotel Lobby', 'image_path' => 'images/gallery7.jpg'],
        ['title' => 'Room Amenities', 'image_path' => 'images/gallery8.jpg']
    ];
    
    foreach ($galleryItems as $item) {
        $stmt = $pdo->prepare('INSERT INTO gallery_images (title, image_path, status) VALUES (?,?,1)');
        $stmt->execute([$item['title'], $item['image_path']]);
    }

    // Seed blog - Real Balaji Hotel Blog Posts
    $blogPosts = [
        [
            'title' => 'Best Time to Visit Tadoba National Park',
            'content' => 'Tadoba National Park is one of the most popular tiger reserves in Maharashtra, located just a short distance from Chimur. The best time to visit is from October to June, with peak season being November to February when the weather is pleasant and wildlife sightings are frequent. Balaji Hotel & Lodge offers comfortable accommodation for tourists visiting Tadoba, with easy access to the park entrance. Our hotel provides early morning breakfast for safari-goers and can help arrange safari bookings.',
            'image_path' => 'images/blog1.jpg'
        ],
        [
            'title' => 'Exploring Chimur - A Hidden Gem Near Tadoba',
            'content' => 'Chimur is a peaceful town in Chandrapur district, known for its proximity to Tadoba Andhari Tiger Reserve. The town offers a glimpse into rural Maharashtra life and serves as a perfect base for wildlife enthusiasts. Balaji Hotel & Restaurant provides clean, comfortable rooms for travelers exploring this region. Our restaurant serves authentic local cuisine along with North Indian, South Indian, and continental dishes. Whether you are here for a safari adventure or to explore the local culture, we ensure a memorable stay.',
            'image_path' => 'images/blog2.jpg'
        ],
        [
            'title' => 'Family-Friendly Stay in Chimur',
            'content' => 'Planning a family trip to Tadoba? Balaji Hotel & Lodge is the perfect choice for families. We offer spacious AC and Non-AC rooms that can accommodate families comfortably. Our restaurant serves fresh, homely meals that both adults and children will enjoy. We focus on cleanliness, comfort, and polite service to ensure every family member feels at home. Located close to Tadoba National Park and other local attractions, our hotel makes it convenient for families to explore the region while enjoying a comfortable stay.',
            'image_path' => 'images/blog3.jpg'
        ]
    ];
    
    foreach ($blogPosts as $post) {
        $stmt = $pdo->prepare('INSERT INTO blog_posts (title, content, image_path, status) VALUES (?,?,?,1)');
        $stmt->execute([$post['title'], $post['content'], $post['image_path']]);
    }

    // Seed settings for footer
    $settings = [
        ['address', 'Address'],
        ['phone', '+91 7350255026'],
        ['email', 'balajirestaurantandlodge@gmail.com'],
        ['upi_id', '7350255026@upi'],
        ['upi_name', 'Balaji Hotel And Lodge Chimur'],
    ];
    foreach ($settings as $s) {
        $stmt = $pdo->prepare('INSERT INTO site_settings (`key`, `value`) VALUES (?, ?) ON DUPLICATE KEY UPDATE `value` = VALUES(`value`)');
        $stmt->execute([$s[0], $s[1]]);
    }

    echo 'Install complete. Default admin: admin / admin123';
} catch (Throwable $e) {
    http_response_code(500);
    echo 'Install failed: ' . $e->getMessage();
}
?>


