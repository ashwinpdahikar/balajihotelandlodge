<?php
// Test script to check room availability
require_once __DIR__ . '/include/functions.php';
$pdo = get_pdo();

echo "<h2>Room Availability Test</h2>";

// Get all rooms
$rooms = $pdo->query('SELECT id, title, quantity FROM rooms WHERE status = 1')->fetchAll();

echo "<table border='1' cellpadding='10'>";
echo "<tr><th>Room ID</th><th>Room Title</th><th>Quantity</th><th>Approved Bookings</th><th>Available</th><th>Status</th></tr>";

foreach ($rooms as $room) {
    $roomId = (int)$room['id'];
    $quantity = isset($room['quantity']) && $room['quantity'] !== null ? (int)$room['quantity'] : 1;
    
    // Count approved bookings
    $approvedCount = $pdo->prepare('SELECT COUNT(*) FROM booking_inquiries WHERE room_id = ? AND status = ?');
    $approvedCount->execute([$roomId, 'approved']);
    $approvedBookings = (int)$approvedCount->fetchColumn();
    
    $available = max(0, $quantity - $approvedBookings);
    $isSoldOut = $available <= 0;
    
    echo "<tr>";
    echo "<td>{$roomId}</td>";
    echo "<td>" . htmlspecialchars($room['title']) . "</td>";
    echo "<td>{$quantity}</td>";
    echo "<td>{$approvedBookings}</td>";
    echo "<td>{$available}</td>";
    echo "<td>" . ($isSoldOut ? '<span style="color:red">SOLD OUT</span>' : '<span style="color:green">AVAILABLE</span>') . "</td>";
    echo "</tr>";
}

echo "</table>";

// Show all bookings
echo "<h3>All Bookings:</h3>";
$bookings = $pdo->query('SELECT id, room_id, customer_name, status, created_at FROM booking_inquiries ORDER BY created_at DESC')->fetchAll();
echo "<table border='1' cellpadding='10'>";
echo "<tr><th>ID</th><th>Room ID</th><th>Customer</th><th>Status</th><th>Created</th></tr>";
foreach ($bookings as $booking) {
    echo "<tr>";
    echo "<td>{$booking['id']}</td>";
    echo "<td>{$booking['room_id']}</td>";
    echo "<td>" . htmlspecialchars($booking['customer_name']) . "</td>";
    echo "<td><strong>{$booking['status']}</strong></td>";
    echo "<td>{$booking['created_at']}</td>";
    echo "</tr>";
}
echo "</table>";
?>

