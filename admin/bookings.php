<?php
require_once __DIR__ . '/../include/functions.php';
start_session_secure();

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php');
    exit;
}

$pdo = get_pdo();

// Handle status update
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_status'])) {
    $booking_id = (int)$_POST['booking_id'];
    $status = $_POST['status'];
    
    if (in_array($status, ['pending', 'approved', 'rejected'])) {
        $stmt = $pdo->prepare('UPDATE booking_inquiries SET status = ?, is_read = 1 WHERE id = ?');
        $stmt->execute([$status, $booking_id]);
        header('Location: bookings.php?updated=1');
        exit;
    }
}

// Filter
$filter_status = $_GET['status'] ?? 'all';
$where = '';
if ($filter_status !== 'all') {
    $where = "WHERE bi.status = " . $pdo->quote($filter_status);
}

// Get all bookings
$bookings = $pdo->query("
    SELECT bi.*, r.title as room_title 
    FROM booking_inquiries bi 
    LEFT JOIN rooms r ON bi.room_id = r.id 
    $where
    ORDER BY bi.created_at DESC
")->fetchAll();

$stats = [
    'total' => $pdo->query("SELECT COUNT(*) as count FROM booking_inquiries")->fetch()['count'],
    'pending' => $pdo->query("SELECT COUNT(*) as count FROM booking_inquiries WHERE status = 'pending'")->fetch()['count'],
    'approved' => $pdo->query("SELECT COUNT(*) as count FROM booking_inquiries WHERE status = 'approved'")->fetch()['count'],
    'rejected' => $pdo->query("SELECT COUNT(*) as count FROM booking_inquiries WHERE status = 'rejected'")->fetch()['count'],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Bookings - Admin</title>
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
                <h1><i class="fa fa-bed"></i> Room Bookings</h1>
                <p>Manage all room booking enquiries</p>
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
                    <a href="?status=approved" class="btn <?php echo $filter_status === 'approved' ? 'btn-primary' : 'btn-secondary'; ?>">
                        Approved (<?php echo $stats['approved']; ?>)
                    </a>
                    <a href="?status=rejected" class="btn <?php echo $filter_status === 'rejected' ? 'btn-primary' : 'btn-secondary'; ?>">
                        Rejected (<?php echo $stats['rejected']; ?>)
                    </a>
                </div>
                
                <div class="table-responsive">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Customer</th>
                                <th>Phone</th>
                                <th>Room</th>
                                <th>Guests</th>
                                <th>Payment</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($bookings)): ?>
                            <tr>
                                <td colspan="9" class="text-center">
                                    <div class="empty-state">
                                        <i class="fa fa-inbox"></i>
                                        <p>No bookings found</p>
                                    </div>
                                </td>
                            </tr>
                            <?php else: ?>
                            <?php foreach ($bookings as $booking): ?>
                            <tr class="<?php echo $booking['is_read'] == 0 ? 'unread' : ''; ?>">
                                <td>#<?php echo $booking['id']; ?></td>
                                <td><?php echo h($booking['customer_name']); ?></td>
                                <td><?php echo h($booking['phone']); ?></td>
                                <td><?php echo h($booking['room_title'] ?? 'N/A'); ?></td>
                                <td>
                                    <?php echo $booking['adults']; ?> Adults
                                    <?php if ($booking['children_under15'] > 0 || $booking['children_15plus'] > 0): ?>
                                    <br><small>
                                        <?php if ($booking['children_under15'] > 0): ?>
                                        <?php echo $booking['children_under15']; ?> Kids (0-14)
                                        <?php endif; ?>
                                        <?php if ($booking['children_15plus'] > 0): ?>
                                        <?php echo $booking['children_15plus']; ?> Kids (15+)
                                        <?php endif; ?>
                                    </small>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if ($booking['payment_status'] === 'paid'): ?>
                                    <span class="badge badge-success">Paid</span>
                                    <?php if ($booking['advance_amount']): ?>
                                    <br><small>₹<?php echo number_format($booking['advance_amount'], 2); ?></small>
                                    <?php endif; ?>
                                    <?php else: ?>
                                    <span class="badge badge-warning">Unpaid</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <form method="POST" style="display: inline-block;">
                                        <input type="hidden" name="booking_id" value="<?php echo $booking['id']; ?>">
                                        <select name="status" onchange="this.form.submit()" style="padding: 4px 8px; border-radius: 4px; border: 1px solid #ddd;">
                                            <option value="pending" <?php echo $booking['status'] === 'pending' ? 'selected' : ''; ?>>Pending</option>
                                            <option value="approved" <?php echo $booking['status'] === 'approved' ? 'selected' : ''; ?>>Approved</option>
                                            <option value="rejected" <?php echo $booking['status'] === 'rejected' ? 'selected' : ''; ?>>Rejected</option>
                                        </select>
                                        <input type="hidden" name="update_status" value="1">
                                    </form>
                                </td>
                                <td><?php echo date('d M Y', strtotime($booking['created_at'])); ?><br>
                                    <small><?php echo date('h:i A', strtotime($booking['created_at'])); ?></small>
                                </td>
                                <td>
                                    <a href="booking_detail.php?id=<?php echo $booking['id']; ?>" class="btn-action">
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
</body>
</html>

