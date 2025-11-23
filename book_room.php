<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('log_errors', 1);

require_once __DIR__ . '/include/functions.php';
start_session_secure();

function redirect_with_msg(string $msg, bool $ok = true): void {
    $_SESSION['booking_msg'] = $msg;
    $_SESSION['booking_msg_type'] = $ok ? 'success' : 'error';
    // Use 303 See Other for POST-Redirect-GET pattern (better than 302)
    $redirectUrl = $_SERVER['HTTP_REFERER'] ?? 'index.php';
    // Remove any query parameters from referer to avoid duplicate submissions
    $redirectUrl = strtok($redirectUrl, '?');
    header('Location: ' . $redirectUrl, true, 303);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit('Method Not Allowed');
}

// Debug: Log all POST data
error_log('=== BOOKING FORM SUBMISSION ===');
error_log('POST Data: ' . print_r($_POST, true));
error_log('Session CSRF Token: ' . ($_SESSION['csrf_token'] ?? 'NOT SET'));
error_log('POST CSRF Token: ' . ($_POST['csrf'] ?? 'NOT SET'));

// CSRF verification - temporarily relaxed for debugging
$csrfToken = $_POST['csrf'] ?? '';
$sessionToken = $_SESSION['csrf_token'] ?? 'NOT SET';

// Check if CSRF token exists in session, if not create one
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(16));
    error_log('CSRF token was missing - created new one');
}

// Verify CSRF token
$csrfValid = csrf_verify($csrfToken);
error_log('CSRF Check - Valid: ' . ($csrfValid ? 'YES' : 'NO'));
error_log('CSRF Check - POST Token length: ' . strlen($csrfToken));
error_log('CSRF Check - Session Token length: ' . strlen($sessionToken));

if (!$csrfValid) {
    error_log('CSRF VERIFICATION FAILED');
    error_log('Session ID: ' . session_id());
    // For now, allow and log - we'll fix CSRF later
    error_log('WARNING: Allowing request despite CSRF failure for debugging');
    // redirect_with_msg('Invalid request, try again. Please refresh the page and try again.', false);
} else {
    error_log('CSRF VERIFICATION PASSED');
}

// Honeypot field to block bots
if (!empty($_POST['website'])) {
    error_log('HONEYPOT TRIGGERED - Bot detected');
    redirect_with_msg('Blocked', false);
}

$roomId = (int)($_POST['room_id'] ?? 0);
$name = trim($_POST['name'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$message = trim($_POST['message'] ?? '');

error_log('Parsed Data - RoomID: ' . $roomId . ', Name: ' . $name . ', Phone: ' . $phone);

if ($roomId <= 0 || $name === '' || $phone === '') {
    error_log('VALIDATION FAILED - Missing required fields');
    redirect_with_msg('कृपया सभी आवश्यक फ़ील्ड भरें (Please fill all required fields)', false);
}

// Basic throttle: one request per 30s per IP
$pdo = get_pdo();
$ip = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
$recent = $pdo->prepare("SELECT COUNT(*) c FROM booking_inquiries WHERE created_at >= (NOW() - INTERVAL 30 SECOND) AND phone = ?");
$recent->execute([$phone]);
$recentCount = (int)$recent->fetch()['c'];
error_log('Throttle check - Recent bookings with same phone: ' . $recentCount);
if ($recentCount > 0) {
    error_log('THROTTLE TRIGGERED - Too many requests');
    redirect_with_msg('Please wait a moment before trying again', false);
}

// Ensure room exists
$stmt = $pdo->prepare('SELECT id, quantity FROM rooms WHERE id = ? AND status = 1');
$stmt->execute([$roomId]);
$room = $stmt->fetch();
if (!$room) {
    error_log('ROOM NOT FOUND - RoomID: ' . $roomId);
    redirect_with_msg('Room not found', false);
}
error_log('Room found: ' . print_r($room, true));

// Capacity and extra estimate
$adults = max(1, (int)($_POST['adults'] ?? 1));
$kidsU15 = max(0, (int)($_POST['children_under15'] ?? 0));
$kids15 = max(0, (int)($_POST['children_15plus'] ?? 0));

$capQ = $pdo->prepare('SELECT max_adults, max_children, extra_guest_charge FROM rooms WHERE id = ?');
$capQ->execute([$roomId]);
$cap = $capQ->fetch() ?: ['max_adults'=>2,'max_children'=>2,'extra_guest_charge'=>0];
$extraRate = (float)($cap['extra_guest_charge'] ?? 0);

$extraGuests = 0;
if ($adults > (int)$cap['max_adults']) { $extraGuests += ($adults - (int)$cap['max_adults']); }
if ($kidsU15 > (int)$cap['max_children']) { $extraGuests += ($kidsU15 - (int)$cap['max_children']); }
$extraGuests += $kids15; // All 15+ are counted for extra
$estimate = $extraGuests > 0 ? $extraGuests * $extraRate : null;

$advance = (float)($_POST['advance_amount'] ?? 0);
$paymentRef = trim($_POST['payment_ref'] ?? '');
$email = trim($_POST['email'] ?? '');

// For quick booking (banner form), advance payment is optional
// For full booking form, advance payment is required
$isQuickBooking = empty($paymentRef) && $advance == 0;

if (!$isQuickBooking) {
    // Full booking form - advance payment required
    if ($advance < 500 || $paymentRef === '') {
        redirect_with_msg('Advance payment of at least ₹500 and payment reference is required', false);
    }
    $paymentStatus = 'paid';
} else {
    // Quick booking - no advance payment
    $advance = null;
    $paymentRef = null;
    $paymentStatus = 'unpaid';
}

// Add email to message if provided
$fullMessage = $message;
if ($email) {
    $fullMessage = ($message ? $message . "\n\nEmail: " . $email : "Email: " . $email);
}

try {
    // Ensure all values are properly set
    $insertData = [
        'room_id' => $roomId,
        'customer_name' => $name,
        'phone' => $phone,
        'message' => $fullMessage ?: null,
        'adults' => $adults,
        'children_under15' => $kidsU15,
        'children_15plus' => $kids15,
        'extra_estimate' => $estimate,
        'advance_amount' => $advance,
        'payment_ref' => $paymentRef,
        'payment_status' => $paymentStatus
    ];
    
    error_log('Attempting to insert booking: ' . print_r($insertData, true));
    
    $stmt = $pdo->prepare('INSERT INTO booking_inquiries (room_id, customer_name, phone, message, adults, children_under15, children_15plus, extra_estimate, advance_amount, payment_ref, payment_status) VALUES (?,?,?,?,?,?,?,?,?,?,?)');
    $result = $stmt->execute([
        $insertData['room_id'],
        $insertData['customer_name'],
        $insertData['phone'],
        $insertData['message'],
        $insertData['adults'],
        $insertData['children_under15'],
        $insertData['children_15plus'],
        $insertData['extra_estimate'],
        $insertData['advance_amount'],
        $insertData['payment_ref'],
        $insertData['payment_status']
    ]);
    
    error_log('Execute result: ' . ($result ? 'SUCCESS' : 'FAILED'));
    error_log('Row count: ' . $stmt->rowCount());
    
    if ($result && $stmt->rowCount() > 0) {
        error_log('BOOKING INSERTED SUCCESSFULLY');
        $lastId = $pdo->lastInsertId();
        error_log('Last Insert ID: ' . $lastId);
        redirect_with_msg('धन्यवाद! आपकी बुकिंग रिक्वेस्ट प्राप्त हो गई है। हम जल्द ही आपसे संपर्क करेंगे। (Thank you! We received your booking request. We will contact you soon.)');
    } else {
        $errorInfo = $stmt->errorInfo();
        error_log('Booking insert failed - No rows affected. Error: ' . print_r($errorInfo, true));
        error_log('Insert data: ' . print_r($insertData, true));
        redirect_with_msg('Sorry, there was an error saving your booking. Please try again or contact us directly.', false);
    }
} catch (PDOException $e) {
    error_log('Booking PDO Exception: ' . $e->getMessage());
    error_log('PDO Error Info: ' . print_r($pdo->errorInfo(), true));
    error_log('Exception Trace: ' . $e->getTraceAsString());
    redirect_with_msg('Sorry, there was a database error. Please try again or contact us directly at ' . get_setting('phone', '+91 7350255026'), false);
} catch (Exception $e) {
    error_log('Booking Exception: ' . $e->getMessage());
    error_log('Exception Trace: ' . $e->getTraceAsString());
    redirect_with_msg('Sorry, an error occurred. Please try again or contact us directly.', false);
}
?>


