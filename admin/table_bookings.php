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
    $bookings = [];
    $stats = ['total' => 0, 'pending' => 0, 'confirmed' => 0, 'cancelled' => 0];
} else {
    // Handle status update
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_status'])) {
        $booking_id = (int)$_POST['booking_id'];
        $status = $_POST['status'];
        
        if (in_array($status, ['pending', 'confirmed', 'cancelled', 'completed'])) {
            $stmt = $pdo->prepare('UPDATE table_bookings SET status = ?, is_read = 1 WHERE id = ?');
            $stmt->execute([$status, $booking_id]);
            header('Location: table_bookings.php?updated=1');
            exit;
        }
    }

    // Filter
    $filter_status = $_GET['status'] ?? 'all';
    $where = '';
    if ($filter_status !== 'all') {
        $where = "WHERE status = " . $pdo->quote($filter_status);
    }

    // Get all table bookings
    $bookings = $pdo->query("
        SELECT * FROM table_bookings 
        $where
        ORDER BY created_at DESC
    ")->fetchAll();

    $stats = [
        'total' => $pdo->query("SELECT COUNT(*) as count FROM table_bookings")->fetch()['count'],
        'pending' => $pdo->query("SELECT COUNT(*) as count FROM table_bookings WHERE status = 'pending'")->fetch()['count'],
        'confirmed' => $pdo->query("SELECT COUNT(*) as count FROM table_bookings WHERE status = 'confirmed'")->fetch()['count'],
        'cancelled' => $pdo->query("SELECT COUNT(*) as count FROM table_bookings WHERE status = 'cancelled'")->fetch()['count'],
    ];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table Bookings - Admin</title>
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
                <h1><i class="fa fa-cutlery"></i> Table Bookings</h1>
                <p>Manage all restaurant table booking enquiries</p>
            </div>
            
            <?php if (isset($_GET['updated'])): ?>
            <div class="alert alert-success">
                Status updated successfully!
            </div>
            <?php endif; ?>
            
            <!-- Filter Tabs -->
            <div class="content-section">
                <div style="display: flex; gap: 10px; margin-bottom: 20px; flex-wrap: wrap;">
                    <a href="?status=all" class="btn <?php echo $filter_status === 'all' ? 'btn-primary' : 'btn-secondary'; ?>">
                        All (<?php echo $stats['total']; ?>)
                    </a>
                    <a href="?status=pending" class="btn <?php echo $filter_status === 'pending' ? 'btn-primary' : 'btn-secondary'; ?>">
                        Pending (<?php echo $stats['pending']; ?>)
                    </a>
                    <a href="?status=confirmed" class="btn <?php echo $filter_status === 'confirmed' ? 'btn-primary' : 'btn-secondary'; ?>">
                        Confirmed (<?php echo $stats['confirmed']; ?>)
                    </a>
                    <a href="?status=cancelled" class="btn <?php echo $filter_status === 'cancelled' ? 'btn-primary' : 'btn-secondary'; ?>">
                        Cancelled (<?php echo $stats['cancelled']; ?>)
                    </a>
                </div>
                
                <div class="table-responsive">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Customer</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Booking Date</th>
                                <th>Time</th>
                                <th>Guests</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($bookings)): ?>
                            <tr>
                                <td colspan="9" class="text-center">
                                    <div class="empty-state">
                                        <i class="fa fa-inbox"></i>
                                        <p>No table bookings found</p>
                                    </div>
                                </td>
                            </tr>
                            <?php else: ?>
                            <?php foreach ($bookings as $booking): ?>
                            <tr class="<?php echo $booking['is_read'] == 0 ? 'unread' : ''; ?>">
                                <td>#<?php echo $booking['id']; ?></td>
                                <td><?php echo h($booking['customer_name']); ?></td>
                                <td><?php echo h($booking['phone']); ?></td>
                                <td><?php echo h($booking['email'] ?? 'N/A'); ?></td>
                                <td><?php echo date('d M Y', strtotime($booking['booking_date'])); ?></td>
                                <td><?php echo date('h:i A', strtotime($booking['booking_time'])); ?></td>
                                <td><?php echo $booking['guests']; ?> Guests</td>
                                <td>
                                    <form method="POST" style="display: inline-block;">
                                        <input type="hidden" name="booking_id" value="<?php echo $booking['id']; ?>">
                                        <select name="status" onchange="this.form.submit()" style="padding: 4px 8px; border-radius: 4px; border: 1px solid #ddd;">
                                            <option value="pending" <?php echo $booking['status'] === 'pending' ? 'selected' : ''; ?>>Pending</option>
                                            <option value="confirmed" <?php echo $booking['status'] === 'confirmed' ? 'selected' : ''; ?>>Confirmed</option>
                                            <option value="cancelled" <?php echo $booking['status'] === 'cancelled' ? 'selected' : ''; ?>>Cancelled</option>
                                            <option value="completed" <?php echo $booking['status'] === 'completed' ? 'selected' : ''; ?>>Completed</option>
                                        </select>
                                        <input type="hidden" name="update_status" value="1">
                                    </form>
                                </td>
                                <td>
                                    <a href="table_booking_detail.php?id=<?php echo $booking['id']; ?>" class="btn-action">
                                        <i class="fa fa-eye"></i> View
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script>
    // Force table scrolling on mobile
    (function() {
        if (window.innerWidth <= 767) {
            var tables = document.querySelectorAll('.table-responsive');
            tables.forEach(function(table) {
                table.style.overflowX = 'scroll';
                table.style.webkitOverflowScrolling = 'touch';
                // Ensure touch events work
                table.addEventListener('touchstart', function(e) {
                    this.style.overflowX = 'scroll';
                }, {passive: true});
            });
        }
    })();
    </script>
</body>
</html>

