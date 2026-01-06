<?php
require_once __DIR__ . '/../include/functions.php';
start_session_secure();

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php');
    exit;
}

$pdo = get_pdo();

// Check if table exists
$table_exists = $pdo->query("SHOW TABLES LIKE 'table_bookings'")->fetch();
if (!$table_exists) {
    header('Location: table_bookings.php');
    exit;
}

$booking_id = (int)($_GET['id'] ?? 0);

if ($booking_id <= 0) {
    header('Location: table_bookings.php');
    exit;
}

// Mark as read
$pdo->prepare('UPDATE table_bookings SET is_read = 1 WHERE id = ?')->execute([$booking_id]);

// Get booking details
$stmt = $pdo->prepare("SELECT * FROM table_bookings WHERE id = ?");
$stmt->execute([$booking_id]);
$booking = $stmt->fetch();

if (!$booking) {
    header('Location: table_bookings.php');
    exit;
}

// Handle status update
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_status'])) {
    $status = $_POST['status'];
    if (in_array($status, ['pending', 'confirmed', 'cancelled', 'completed'])) {
        $pdo->prepare('UPDATE table_bookings SET status = ? WHERE id = ?')->execute([$status, $booking_id]);
        header('Location: table_booking_detail.php?id=' . $booking_id . '&updated=1');
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table Booking Details - Admin</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <?php include 'header.php'; ?>
    
    <div class="admin-container">
        <div class="sidebar">
            <?php include 'sidebar.php'; ?>
        </div>
        
        <div class="main-content">
            <div class="page-header">
                <h1><i class="fa fa-file-text"></i> Table Booking Details #<?php echo $booking['id']; ?></h1>
                <a href="table_bookings.php" class="btn btn-secondary">
                    <i class="fa fa-arrow-left"></i> Back to Table Bookings
                </a>
            </div>
            
            <?php if (isset($_GET['updated'])): ?>
            <div class="alert alert-success">
                Status updated successfully!
            </div>
            <?php endif; ?>
            
            <div class="detail-card">
                <h3 style="margin-bottom: 20px;">Customer Information</h3>
                <div class="detail-row">
                    <div class="detail-label">Name:</div>
                    <div class="detail-value"><?php echo h($booking['customer_name']); ?></div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Phone:</div>
                    <div class="detail-value">
                        <a href="tel:<?php echo h($booking['phone']); ?>"><?php echo h($booking['phone']); ?></a>
                    </div>
                </div>
                <?php if ($booking['email']): ?>
                <div class="detail-row">
                    <div class="detail-label">Email:</div>
                    <div class="detail-value">
                        <a href="mailto:<?php echo h($booking['email']); ?>"><?php echo h($booking['email']); ?></a>
                    </div>
                </div>
                <?php endif; ?>
            </div>
            
            <div class="detail-card">
                <h3 style="margin-bottom: 20px;">Booking Information</h3>
                <div class="detail-row">
                    <div class="detail-label">Booking Date:</div>
                    <div class="detail-value"><?php echo date('d M Y', strtotime($booking['booking_date'])); ?></div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Booking Time:</div>
                    <div class="detail-value"><?php echo date('h:i A', strtotime($booking['booking_time'])); ?></div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Number of Guests:</div>
                    <div class="detail-value"><?php echo $booking['guests']; ?> Guests</div>
                </div>
                <?php if ($booking['special_requests']): ?>
                <div class="detail-row">
                    <div class="detail-label">Special Requests:</div>
                    <div class="detail-value"><?php echo nl2br(h($booking['special_requests'])); ?></div>
                </div>
                <?php endif; ?>
            </div>
            
            <div class="detail-card">
                <h3 style="margin-bottom: 20px;">Booking Status</h3>
                <form method="POST">
                    <div class="form-group">
                        <label>Status:</label>
                        <select name="status" class="form-control" style="max-width: 200px; display: inline-block;">
                            <option value="pending" <?php echo $booking['status'] === 'pending' ? 'selected' : ''; ?>>Pending</option>
                            <option value="confirmed" <?php echo $booking['status'] === 'confirmed' ? 'selected' : ''; ?>>Confirmed</option>
                            <option value="cancelled" <?php echo $booking['status'] === 'cancelled' ? 'selected' : ''; ?>>Cancelled</option>
                            <option value="completed" <?php echo $booking['status'] === 'completed' ? 'selected' : ''; ?>>Completed</option>
                        </select>
                        <button type="submit" name="update_status" class="btn btn-primary" style="margin-left: 10px;">
                            Update Status
                        </button>
                    </div>
                </form>
            </div>
            
            <div class="detail-card">
                <div class="detail-row">
                    <div class="detail-label">Booking Request Date:</div>
                    <div class="detail-value"><?php echo date('d M Y, h:i A', strtotime($booking['created_at'])); ?></div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>

