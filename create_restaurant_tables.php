<?php
// Run this script once to create restaurant tables
// Visit: http://localhost/balajihotelandlodge/create_restaurant_tables.php

require_once __DIR__ . '/include/functions.php';

try {
    $pdo = get_pdo();
    
    // Create restaurant_menu table
    $pdo->exec("CREATE TABLE IF NOT EXISTS restaurant_menu (
      id INT AUTO_INCREMENT PRIMARY KEY,
      name VARCHAR(150) NOT NULL,
      description TEXT NULL,
      category ENUM('veg','non-veg','south-indian','beverages','desserts') NOT NULL,
      price DECIMAL(10,2) NOT NULL,
      image_path VARCHAR(255) NULL,
      is_available TINYINT(1) DEFAULT 1,
      status TINYINT(1) DEFAULT 1,
      created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
      updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    ) ENGINE=InnoDB");
    
    echo "✓ restaurant_menu table created successfully<br>";
    
    // Create table_bookings table
    $pdo->exec("CREATE TABLE IF NOT EXISTS table_bookings (
      id INT AUTO_INCREMENT PRIMARY KEY,
      customer_name VARCHAR(120) NOT NULL,
      phone VARCHAR(30) NOT NULL,
      email VARCHAR(150) NULL,
      booking_date DATE NOT NULL,
      booking_time TIME NOT NULL,
      guests INT NOT NULL DEFAULT 2,
      special_requests TEXT NULL,
      status ENUM('pending','confirmed','cancelled','completed') DEFAULT 'pending',
      is_read TINYINT(1) DEFAULT 0,
      created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
      updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    ) ENGINE=InnoDB");
    
    echo "✓ table_bookings table created successfully<br>";
    
    // Insert some sample menu items
    $sample_items = [
        ['Dal Tadka', 'Delicious dal cooked with spices and tempered with ghee', 'veg', 120.00],
        ['Paneer Butter Masala', 'Creamy paneer curry with rich tomato gravy', 'veg', 180.00],
        ['Chicken Curry', 'Spicy and flavorful chicken curry', 'non-veg', 220.00],
        ['Dosa', 'Crispy South Indian dosa with sambar and chutney', 'south-indian', 80.00],
        ['Idli Sambar', 'Soft idlis served with hot sambar', 'south-indian', 70.00],
        ['Coca Cola', 'Cold soft drink', 'beverages', 30.00],
        ['Fresh Lime Soda', 'Refreshing lime soda', 'beverages', 40.00],
        ['Gulab Jamun', 'Sweet milk dumplings in sugar syrup', 'desserts', 60.00],
        ['Ice Cream', 'Vanilla ice cream', 'desserts', 50.00]
    ];
    
    $checkStmt = $pdo->query("SELECT COUNT(*) as count FROM restaurant_menu");
    $count = $checkStmt->fetch()['count'];
    
    if ($count == 0) {
        $insertStmt = $pdo->prepare("INSERT INTO restaurant_menu (name, description, category, price) VALUES (?, ?, ?, ?)");
        foreach ($sample_items as $item) {
            $insertStmt->execute($item);
        }
        echo "✓ Sample menu items inserted successfully<br>";
    } else {
        echo "ℹ Menu items already exist, skipping sample data<br>";
    }
    
    echo "<br><strong>All restaurant tables created successfully!</strong><br>";
    echo "<a href='restaurant.php'>Go to Restaurant Page</a>";
    
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

?>

