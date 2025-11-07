<?php
require_once __DIR__ . '/include/functions.php';
start_session_secure();

function redirect_with_msg(string $msg, bool $ok = true): void {
    $_SESSION['booking_msg'] = $msg;
    header('Location: ' . ($_SERVER['HTTP_REFERER'] ?? 'room.php'));
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit('Method Not Allowed');
}

if (!csrf_verify($_POST['csrf'] ?? '')) {
    redirect_with_msg('Invalid request, try again', false);
}

// Honeypot field to block bots
if (!empty($_POST['website'])) {
    redirect_with_msg('Blocked', false);
}

$roomId = (int)($_POST['room_id'] ?? 0);
$name = trim($_POST['name'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$message = trim($_POST['message'] ?? '');

if ($roomId <= 0 || $name === '' || $phone === '') {
    redirect_with_msg('Please fill required fields', false);
}

// Basic throttle: one request per 30s per IP
$pdo = get_pdo();
$ip = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
$recent = $pdo->prepare("SELECT COUNT(*) c FROM booking_inquiries WHERE created_at >= (NOW() - INTERVAL 30 SECOND) AND phone = ?");
$recent->execute([$phone]);
if ((int)$recent->fetch()['c'] > 0) {
    redirect_with_msg('Please wait a moment before trying again', false);
}

// Ensure room exists
$stmt = $pdo->prepare('SELECT id, quantity FROM rooms WHERE id = ? AND status = 1');
$stmt->execute([$roomId]);
$room = $stmt->fetch();
if (!$room) {
    redirect_with_msg('Room not found', false);
}

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
if ($advance < 500 || $paymentRef === '') {
    redirect_with_msg('Advance payment of at least ₹500 and payment reference is required', false);
}
$stmt = $pdo->prepare('INSERT INTO booking_inquiries (room_id, customer_name, phone, message, adults, children_under15, children_15plus, extra_estimate, advance_amount, payment_ref, payment_status) VALUES (?,?,?,?,?,?,?,?,?,?,?)');
$stmt->execute([$roomId, $name, $phone, $message, $adults, $kidsU15, $kids15, $estimate, $advance, $paymentRef, 'paid']);

redirect_with_msg('Thank you! We received your request. We will contact you soon.');
?>


