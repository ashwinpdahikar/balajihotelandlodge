<?php
// Run this once if you see undefined 'quantity' warnings.
require_once __DIR__ . '/include/functions.php';
$pdo = get_pdo();

try {
    // Check if 'quantity' column exists
    $q = $pdo->prepare('SELECT COUNT(*) c FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = ? AND TABLE_NAME = "rooms" AND COLUMN_NAME = "quantity"');
    $q->execute([DB_NAME]);
    $exists = (int)$q->fetch()['c'] > 0;
    if (!$exists) { $pdo->exec('ALTER TABLE rooms ADD COLUMN quantity INT NOT NULL DEFAULT 1'); }

    // Add capacity columns if missing
    $cols = [
        ['max_adults','INT NOT NULL DEFAULT 2'],
        ['max_children','INT NOT NULL DEFAULT 2'],
        ['extra_guest_charge','DECIMAL(10,2) NULL']
    ];
    foreach ($cols as $c) {
        $q = $pdo->prepare('SELECT COUNT(*) c FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = ? AND TABLE_NAME = "rooms" AND COLUMN_NAME = ?');
        $q->execute([DB_NAME, $c[0]]);
        if ((int)$q->fetch()['c'] === 0) {
            $pdo->exec('ALTER TABLE rooms ADD COLUMN ' . $c[0] . ' ' . $c[1]);
        }
    }

    // Extend booking_inquiries columns if missing
    $bcols = [
        ['adults','INT NOT NULL DEFAULT 1'],
        ['children_under15','INT NOT NULL DEFAULT 0'],
        ['children_15plus','INT NOT NULL DEFAULT 0'],
        ['extra_estimate','DECIMAL(10,2) NULL'],
        ['advance_amount','DECIMAL(10,2) NULL'],
        ['payment_ref','VARCHAR(64) NULL'],
        ['payment_status','ENUM(\'unpaid\',\'paid\') DEFAULT \"unpaid\"']
    ];
    foreach ($bcols as $c) {
        $q = $pdo->prepare('SELECT COUNT(*) c FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = ? AND TABLE_NAME = "booking_inquiries" AND COLUMN_NAME = ?');
        $q->execute([DB_NAME, $c[0]]);
        if ((int)$q->fetch()['c'] === 0) {
            $pdo->exec('ALTER TABLE booking_inquiries ADD COLUMN ' . $c[0] . ' ' . $c[1]);
        }
    }
    // Ensure no NULL quantities remain
    $pdo->exec('UPDATE rooms SET quantity = 1 WHERE quantity IS NULL');

    // site_pages columns hero/excerpt
    $pcols = [
        ['hero_path','VARCHAR(255) NULL'],
        ['excerpt','TEXT NULL']
    ];
    foreach ($pcols as $c) {
        $q = $pdo->prepare('SELECT COUNT(*) c FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = ? AND TABLE_NAME = "site_pages" AND COLUMN_NAME = ?');
        $q->execute([DB_NAME, $c[0]]);
        if ((int)$q->fetch()['c'] === 0) {
            $pdo->exec('ALTER TABLE site_pages ADD COLUMN ' . $c[0] . ' ' . $c[1]);
        }
    }

    // site_page_images table
    $pdo->exec('CREATE TABLE IF NOT EXISTS site_page_images (\n  id INT AUTO_INCREMENT PRIMARY KEY,\n  page_id INT NOT NULL,\n  image_path VARCHAR(255) NOT NULL,\n  caption VARCHAR(200) NULL,\n  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,\n  FOREIGN KEY (page_id) REFERENCES site_pages(id) ON DELETE CASCADE\n) ENGINE=InnoDB');
    
    // Restaurant menu table
    $pdo->exec('CREATE TABLE IF NOT EXISTS restaurant_menu (
      id INT AUTO_INCREMENT PRIMARY KEY,
      name VARCHAR(150) NOT NULL,
      description TEXT NULL,
      category ENUM(\'veg\',\'non-veg\',\'south-indian\',\'beverages\',\'desserts\') NOT NULL,
      price DECIMAL(10,2) NOT NULL,
      image_path VARCHAR(255) NULL,
      is_available TINYINT(1) DEFAULT 1,
      status TINYINT(1) DEFAULT 1,
      created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
      updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    ) ENGINE=InnoDB');
    
    // Table bookings table
    $pdo->exec('CREATE TABLE IF NOT EXISTS table_bookings (
      id INT AUTO_INCREMENT PRIMARY KEY,
      customer_name VARCHAR(120) NOT NULL,
      phone VARCHAR(30) NOT NULL,
      email VARCHAR(150) NULL,
      booking_date DATE NOT NULL,
      booking_time TIME NOT NULL,
      guests INT NOT NULL DEFAULT 2,
      special_requests TEXT NULL,
      status ENUM(\'pending\',\'confirmed\',\'cancelled\',\'completed\') DEFAULT \'pending\',
      is_read TINYINT(1) DEFAULT 0,
      created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
      updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    ) ENGINE=InnoDB');
    
    echo 'Migration complete.';
} catch (Throwable $e) {
    http_response_code(500);
    echo 'Migration failed: ' . $e->getMessage();
}
?>


