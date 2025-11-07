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
    $about = "The passage experienced a surge in popularity during the 1960s when Letraset used it on their dry-transfer sheets, and again during the 90s as desktop publishers bundled the text with their software. Today it's seen all around the web; on templates, websites, and stock designs.";
    $stmt->execute(['about', 'About Us', $about]);

    // Ensure new columns exist (idempotent best-effort)
    try { $pdo->exec('ALTER TABLE rooms ADD COLUMN IF NOT EXISTS quantity INT NOT NULL DEFAULT 1'); } catch (Throwable $e) {}
    try { $pdo->exec('ALTER TABLE rooms ADD COLUMN IF NOT EXISTS max_adults INT NOT NULL DEFAULT 2'); } catch (Throwable $e) {}
    try { $pdo->exec('ALTER TABLE rooms ADD COLUMN IF NOT EXISTS max_children INT NOT NULL DEFAULT 2'); } catch (Throwable $e) {}
    try { $pdo->exec('ALTER TABLE rooms ADD COLUMN IF NOT EXISTS extra_guest_charge DECIMAL(10,2) NULL'); } catch (Throwable $e) {}

    // Seed rooms
    $rooms = [1,2,3,4,5,6];
    foreach ($rooms as $n) {
        $stmt = $pdo->prepare('INSERT INTO rooms (title, description, image_path, price, quantity, max_adults, max_children, extra_guest_charge, status) VALUES (?,?,?,?,1,2,2,0,1)');
        $stmt->execute([
            'Bed Room',
            'If you are going to use a passage of Lorem Ipsum, you need to be sure there',
            'images/room' . $n . '.jpg',
            null
        ]);
    }

    // Seed gallery
    $gallery = [1,2,3,4,5,6,7,8];
    foreach ($gallery as $n) {
        $stmt = $pdo->prepare('INSERT INTO gallery_images (title, image_path, status) VALUES (?,?,1)');
        $stmt->execute(['', 'images/gallery' . $n . '.jpg']);
    }

    // Seed blog
    for ($i = 1; $i <= 3; $i++) {
        $stmt = $pdo->prepare('INSERT INTO blog_posts (title, content, image_path, status) VALUES (?,?,?,1)');
        $stmt->execute([
            'Bed Room',
            "If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.",
            'images/blog' . $i . '.jpg'
        ]);
    }

    // Seed settings for footer
    $settings = [
        ['address', 'Address'],
        ['phone', '+91 7350255026'],
        ['email', 'demo@gmail.com'],
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


