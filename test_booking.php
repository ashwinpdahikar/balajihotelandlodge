<?php
// Temporary test file to check database insertion
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/include/functions.php';
start_session_secure();

echo "<h2>Booking Test Page</h2>";

// Test database connection
try {
    $pdo = get_pdo();
    echo "<p style='color:green;'>✓ Database connection successful</p>";
    
    // Check if rooms table exists and has data
    $rooms = $pdo->query("SELECT id, title FROM rooms WHERE status=1 LIMIT 5")->fetchAll();
    echo "<p>Rooms found: " . count($rooms) . "</p>";
    if (count($rooms) > 0) {
        echo "<ul>";
        foreach ($rooms as $r) {
            echo "<li>ID: {$r['id']}, Title: {$r['title']}</li>";
        }
        echo "</ul>";
    }
    
    // Test insert
    echo "<h3>Testing Database Insert:</h3>";
    $testData = [
        'room_id' => $rooms[0]['id'] ?? 1,
        'customer_name' => 'Test User',
        'phone' => '9876543210',
        'message' => 'Test booking from test_booking.php',
        'adults' => 2,
        'children_under15' => 0,
        'children_15plus' => 0,
        'extra_estimate' => null,
        'advance_amount' => null,
        'payment_ref' => null,
        'payment_status' => 'unpaid'
    ];
    
    $stmt = $pdo->prepare('INSERT INTO booking_inquiries (room_id, customer_name, phone, message, adults, children_under15, children_15plus, extra_estimate, advance_amount, payment_ref, payment_status) VALUES (?,?,?,?,?,?,?,?,?,?,?)');
    $result = $stmt->execute([
        $testData['room_id'],
        $testData['customer_name'],
        $testData['phone'],
        $testData['message'],
        $testData['adults'],
        $testData['children_under15'],
        $testData['children_15plus'],
        $testData['extra_estimate'],
        $testData['advance_amount'],
        $testData['payment_ref'],
        $testData['payment_status']
    ]);
    
    if ($result && $stmt->rowCount() > 0) {
        $lastId = $pdo->lastInsertId();
        echo "<p style='color:green;'>✓ Test booking inserted successfully! ID: $lastId</p>";
        
        // Verify it was saved
        $verify = $pdo->prepare("SELECT * FROM booking_inquiries WHERE id = ?");
        $verify->execute([$lastId]);
        $saved = $verify->fetch();
        if ($saved) {
            echo "<p style='color:green;'>✓ Verified: Booking found in database</p>";
            echo "<pre>" . print_r($saved, true) . "</pre>";
        }
    } else {
        $errorInfo = $stmt->errorInfo();
        echo "<p style='color:red;'>✗ Insert failed</p>";
        echo "<pre>" . print_r($errorInfo, true) . "</pre>";
    }
    
    // Check recent bookings
    echo "<h3>Recent Bookings (last 5):</h3>";
    $recent = $pdo->query("SELECT id, customer_name, phone, created_at FROM booking_inquiries ORDER BY id DESC LIMIT 5")->fetchAll();
    if (count($recent) > 0) {
        echo "<table border='1' cellpadding='5'>";
        echo "<tr><th>ID</th><th>Name</th><th>Phone</th><th>Created</th></tr>";
        foreach ($recent as $b) {
            echo "<tr><td>{$b['id']}</td><td>{$b['customer_name']}</td><td>{$b['phone']}</td><td>{$b['created_at']}</td></tr>";
        }
        echo "</table>";
    } else {
        echo "<p style='color:orange;'>No bookings found in database</p>";
    }
    
} catch (PDOException $e) {
    echo "<p style='color:red;'>✗ Database Error: " . $e->getMessage() . "</p>";
    echo "<pre>" . $e->getTraceAsString() . "</pre>";
} catch (Exception $e) {
    echo "<p style='color:red;'>✗ Error: " . $e->getMessage() . "</p>";
}

echo "<hr>";
echo "<h3>Form Submission Test:</h3>";
echo "<form method='post' action='book_room.php'>";
echo "<input type='hidden' name='csrf' value='" . h(csrf_token()) . "'>";
echo "<input type='hidden' name='website' value=''>";
echo "<p>Room ID: <input type='number' name='room_id' value='" . ($rooms[0]['id'] ?? 1) . "' required></p>";
echo "<p>Name: <input type='text' name='name' value='Test User' required></p>";
echo "<p>Phone: <input type='tel' name='phone' value='9876543210' required></p>";
echo "<p>Adults: <input type='number' name='adults' value='2' required></p>";
echo "<p>Children (0-14): <input type='number' name='children_under15' value='0'></p>";
echo "<p>Children (15+): <input type='number' name='children_15plus' value='0'></p>";
echo "<p><button type='submit'>Test Form Submission</button></p>";
echo "</form>";
?>

