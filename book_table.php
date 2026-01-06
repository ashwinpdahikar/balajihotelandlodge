<?php
require_once __DIR__ . '/include/functions.php';
start_session_secure();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: restaurant.php');
    exit;
}

$errors = [];
$success = false;

// CSRF verification
if (!csrf_verify($_POST['csrf'] ?? '')) {
    $_SESSION['table_booking_msg'] = 'Security verification failed. Please try again.';
    $_SESSION['table_booking_msg_type'] = 'error';
    header('Location: restaurant.php');
    exit;
}

// Validate and sanitize inputs
$customer_name = trim($_POST['customer_name'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$email = trim($_POST['email'] ?? '');
$booking_date = $_POST['booking_date'] ?? '';
$booking_time = $_POST['booking_time'] ?? '';
$guests = (int)($_POST['guests'] ?? 0);
$special_requests = trim($_POST['special_requests'] ?? '');

// Validation
if (empty($customer_name) || strlen($customer_name) < 2) {
    $errors[] = 'Please enter a valid name (minimum 2 characters)';
}

if (empty($phone) || !preg_match('/^[6-9]\d{9}$/', $phone)) {
    $errors[] = 'Please enter a valid 10-digit phone number starting with 6-9';
}

if (empty($booking_date)) {
    $errors[] = 'Please select a booking date';
} else {
    $selected_date = strtotime($booking_date);
    $today = strtotime(date('Y-m-d'));
    if ($selected_date < $today) {
        $errors[] = 'Booking date cannot be in the past';
    }
}

if (empty($booking_time)) {
    $errors[] = 'Please select a booking time';
}

if ($guests < 1 || $guests > 20) {
    $errors[] = 'Number of guests must be between 1 and 20';
}

if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Please enter a valid email address';
}

// If no errors, save to database
if (empty($errors)) {
    try {
        $pdo = get_pdo();
        
        // Check if table exists, if not create it
        $tableCheck = $pdo->query("SHOW TABLES LIKE 'table_bookings'")->fetch();
        if (!$tableCheck) {
            // Create table if it doesn't exist
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
        }
        
        // Check for duplicate booking (same phone, date, and time within 1 hour)
        // Convert time to datetime for comparison
        $booking_datetime = $booking_date . ' ' . $booking_time;
        $checkStmt = $pdo->prepare('SELECT id FROM table_bookings WHERE phone = ? AND booking_date = ? AND ABS(TIMESTAMPDIFF(MINUTE, CONCAT(booking_date, " ", booking_time), ?)) <= 60 AND status != "cancelled" LIMIT 1');
        $checkStmt->execute([$phone, $booking_date, $booking_datetime]);
        if ($checkStmt->fetch()) {
            $errors[] = 'You already have a booking for this date and time. Please choose a different time.';
        } else {
            $stmt = $pdo->prepare('INSERT INTO table_bookings (customer_name, phone, email, booking_date, booking_time, guests, special_requests, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
            $result = $stmt->execute([
                $customer_name,
                $phone,
                !empty($email) ? $email : null,
                $booking_date,
                $booking_time,
                $guests,
                !empty($special_requests) ? $special_requests : null,
                'pending' // Default status
            ]);
            
            if ($result && $stmt->rowCount() > 0) {
                $success = true;
                $_SESSION['table_booking_msg'] = 'Thank you! Your table booking request has been submitted successfully. We will confirm shortly.';
                $_SESSION['table_booking_msg_type'] = 'success';
            } else {
                $errors[] = 'Failed to save booking. Please try again.';
            }
        }
    } catch (PDOException $e) {
        error_log('Table booking error: ' . $e->getMessage());
        $errors[] = 'An error occurred. Please try again later.';
    }
}

if (!empty($errors)) {
    $_SESSION['table_booking_msg'] = implode('<br>', $errors);
    $_SESSION['table_booking_msg_type'] = 'error';
}

header('Location: restaurant.php');
exit;

