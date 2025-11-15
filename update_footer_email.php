<?php
/**
 * Update Footer Email in Database
 * Run this file once to update the email address in database
 */

require_once __DIR__ . '/include/db.php';
require_once __DIR__ . '/include/functions.php';

try {
    $pdo = get_pdo();
    
    // Update email setting
    $stmt = $pdo->prepare('INSERT INTO site_settings (`key`, `value`) VALUES (?, ?) ON DUPLICATE KEY UPDATE `value` = VALUES(`value`)');
    $stmt->execute(['email', 'balajirestaurantandlodge@gmail.com']);
    
    // Update address setting
    $stmt->execute(['address', 'Chimur, Maharashtra, India']);
    
    // Update phone setting
    $stmt->execute(['phone', '+91 7350255026']);
    
    echo "✅ Footer email and contact details updated successfully!<br>";
    echo "Email: balajirestaurantandlodge@gmail.com<br>";
    echo "Phone: +91 7350255026<br>";
    echo "Address: Chimur, Maharashtra, India<br><br>";
    echo "You can now delete this file (update_footer_email.php) for security.";
    
} catch (Exception $e) {
    echo "❌ Error: " . htmlspecialchars($e->getMessage());
}
?>

