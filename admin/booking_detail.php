<?php
require_once __DIR__ . '/../include/functions.php';
start_session_secure();

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php');
    exit;
}

$pdo = get_pdo();
$booking_id = (int)($_GET['id'] ?? 0);

if ($booking_id <= 0) {
    header('Location: bookings.php');
    exit;
}

// Mark as read
$pdo->prepare('UPDATE booking_inquiries SET is_read = 1 WHERE id = ?')->execute([$booking_id]);

// Get booking details
$stmt = $pdo->prepare("
    SELECT bi.*, r.title as room_title, r.price as room_price 
    FROM booking_inquiries bi 
    LEFT JOIN rooms r ON bi.room_id = r.id 
    WHERE bi.id = ?
");
$stmt->execute([$booking_id]);
$booking = $stmt->fetch();

if (!$booking) {
    header('Location: bookings.php');
    exit;
}

// Handle status update
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_status'])) {
    $status = $_POST['status'];
    if (in_array($status, ['pending', 'approved', 'rejected'])) {
        $pdo->prepare('UPDATE booking_inquiries SET status = ? WHERE id = ?')->execute([$status, $booking_id]);
        header('Location: booking_detail.php?id=' . $booking_id . '&updated=1');
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Details - Admin</title>
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
                <h1><i class="fa fa-file-text"></i> Booking Details #<?php echo $booking['id']; ?></h1>
                <a href="bookings.php" class="btn btn-secondary">
                    <i class="fa fa-arrow-left"></i> Back to Bookings
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
            </div>
            
            <div class="detail-card">
                <h3 style="margin-bottom: 20px;">Booking Information</h3>
                <div class="detail-row">
                    <div class="detail-label">Room:</div>
                    <div class="detail-value"><?php echo h($booking['room_title'] ?? 'N/A'); ?></div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Adults:</div>
                    <div class="detail-value"><?php echo $booking['adults']; ?></div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Children (0-14):</div>
                    <div class="detail-value"><?php echo $booking['children_under15']; ?></div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Children (15+):</div>
                    <div class="detail-value"><?php echo $booking['children_15plus']; ?></div>
                </div>
                <?php if ($booking['extra_estimate']): ?>
                <div class="detail-row">
                    <div class="detail-label">Extra Estimate:</div>
                    <div class="detail-value">₹<?php echo number_format($booking['extra_estimate'], 2); ?></div>
                </div>
                <?php endif; ?>
            </div>
            
            <div class="detail-card">
                <h3 style="margin-bottom: 20px;">Payment Information</h3>
                <div class="detail-row">
                    <div class="detail-label">Payment Status:</div>
                    <div class="detail-value">
                        <span class="badge badge-<?php echo $booking['payment_status'] === 'paid' ? 'success' : 'warning'; ?>">
                            <?php echo ucfirst($booking['payment_status']); ?>
                        </span>
                    </div>
                </div>
                <?php if ($booking['advance_amount']): ?>
                <div class="detail-row">
                    <div class="detail-label">Advance Amount:</div>
                    <div class="detail-value">₹<?php echo number_format($booking['advance_amount'], 2); ?></div>
                </div>
                <?php endif; ?>
                <?php if ($booking['payment_ref']): ?>
                <div class="detail-row">
                    <div class="detail-label">Payment Reference:</div>
                    <div class="detail-value"><?php echo h($booking['payment_ref']); ?></div>
                </div>
                <?php endif; ?>
            </div>
            
            <?php if ($booking['message']): ?>
            <div class="detail-card">
                <h3 style="margin-bottom: 20px;">Message</h3>
                <p><?php echo nl2br(h($booking['message'])); ?></p>
            </div>
            <?php endif; ?>
            
            <div class="detail-card">
                <h3 style="margin-bottom: 20px;">Booking Status</h3>
                <form method="POST">
                    <div class="form-group">
                        <label>Status:</label>
                        <select name="status" class="form-control" style="max-width: 200px; display: inline-block;">
                            <option value="pending" <?php echo $booking['status'] === 'pending' ? 'selected' : ''; ?>>Pending</option>
                            <option value="approved" <?php echo $booking['status'] === 'approved' ? 'selected' : ''; ?>>Approved</option>
                            <option value="rejected" <?php echo $booking['status'] === 'rejected' ? 'selected' : ''; ?>>Rejected</option>
                        </select>
                        <button type="submit" name="update_status" class="btn btn-primary" style="margin-left: 10px;">
                            Update Status
                        </button>
                    </div>
                </form>
            </div>
            
            <div class="detail-card">
                <div class="detail-row">
                    <div class="detail-label">Booking Date:</div>
                    <div class="detail-value"><?php echo date('d M Y, h:i A', strtotime($booking['created_at'])); ?></div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>

