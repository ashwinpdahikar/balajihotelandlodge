<?php
require_once __DIR__ . '/../include/functions.php';
start_session_secure();

// Check if admin is logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php');
    exit;
}

$pdo = get_pdo();

// Check if table_bookings exists
$table_exists = $pdo->query("SHOW TABLES LIKE 'table_bookings'")->fetch();

// Get statistics
$stats = [
    'total_bookings' => $pdo->query("SELECT COUNT(*) as count FROM booking_inquiries")->fetch()['count'],
    'pending_bookings' => $pdo->query("SELECT COUNT(*) as count FROM booking_inquiries WHERE status = 'pending'")->fetch()['count'],
    'approved_bookings' => $pdo->query("SELECT COUNT(*) as count FROM booking_inquiries WHERE status = 'approved'")->fetch()['count'],
    'total_table_bookings' => $table_exists ? $pdo->query("SELECT COUNT(*) as count FROM table_bookings")->fetch()['count'] : 0,
    'pending_table_bookings' => $table_exists ? $pdo->query("SELECT COUNT(*) as count FROM table_bookings WHERE status = 'pending'")->fetch()['count'] : 0,
    'unread_bookings' => $pdo->query("SELECT COUNT(*) as count FROM booking_inquiries WHERE is_read = 0")->fetch()['count'],
    'unread_table_bookings' => $table_exists ? $pdo->query("SELECT COUNT(*) as count FROM table_bookings WHERE is_read = 0")->fetch()['count'] : 0,
];

// Get recent bookings
$recent_bookings = $pdo->query("
    SELECT bi.*, r.title as room_title 
    FROM booking_inquiries bi 
    LEFT JOIN rooms r ON bi.room_id = r.id 
    ORDER BY bi.created_at DESC 
    LIMIT 5
")->fetchAll();

// Get recent table bookings
$recent_table_bookings = $table_exists ? $pdo->query("
    SELECT * FROM table_bookings 
    ORDER BY created_at DESC 
    LIMIT 5
")->fetchAll() : [];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Balaji Hotel</title>
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
                <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
                <p>Welcome back, <?php echo h($_SESSION['admin_username']); ?>!</p>
            </div>
            
            <!-- Statistics Cards -->
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-icon" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                        <i class="fa fa-bed"></i>
                    </div>
                    <div class="stat-content">
                        <h3><?php echo $stats['total_bookings']; ?></h3>
                        <p>Total Room Bookings</p>
                    </div>
                </div>
                
                <div class="stat-card">
                    <div class="stat-icon" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                        <i class="fa fa-clock-o"></i>
                    </div>
                    <div class="stat-content">
                        <h3><?php echo $stats['pending_bookings']; ?></h3>
                        <p>Pending Bookings</p>
                    </div>
                </div>
                
                <div class="stat-card">
                    <div class="stat-icon" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
                        <i class="fa fa-check-circle"></i>
                    </div>
                    <div class="stat-content">
                        <h3><?php echo $stats['approved_bookings']; ?></h3>
                        <p>Approved Bookings</p>
                    </div>
                </div>
                
                <div class="stat-card">
                    <div class="stat-icon" style="background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);">
                        <i class="fa fa-cutlery"></i>
                    </div>
                    <div class="stat-content">
                        <h3><?php echo $stats['total_table_bookings']; ?></h3>
                        <p>Table Bookings</p>
                    </div>
                </div>
                
                <div class="stat-card">
                    <div class="stat-icon" style="background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);">
                        <i class="fa fa-bell"></i>
                    </div>
                    <div class="stat-content">
                        <h3><?php echo $stats['unread_bookings'] + $stats['unread_table_bookings']; ?></h3>
                        <p>Unread Enquiries</p>
                    </div>
                </div>
            </div>
            
            <!-- Recent Bookings -->
            <div class="content-section">
                <div class="section-header">
                    <h2><i class="fa fa-list"></i> Recent Room Bookings</h2>
                    <a href="bookings.php" class="btn-view-all">View All</a>
                </div>
                <div class="table-responsive">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Customer</th>
                                <th>Phone</th>
                                <th>Room</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($recent_bookings)): ?>
                            <tr>
                                <td colspan="7" class="text-center">
                                    <div class="empty-state" style="padding: 20px;">
                                        <i class="fa fa-inbox"></i>
                                        <p>No bookings yet</p>
                                    </div>
                                </td>
                            </tr>
                            <?php else: ?>
                            <?php foreach ($recent_bookings as $booking): ?>
                            <tr class="<?php echo $booking['is_read'] == 0 ? 'unread' : ''; ?>">
                                <td>#<?php echo $booking['id']; ?></td>
                                <td><?php echo h($booking['customer_name']); ?></td>
                                <td><?php echo h($booking['phone']); ?></td>
                                <td><?php echo h($booking['room_title'] ?? 'N/A'); ?></td>
                                <td>
                                    <span class="badge badge-<?php 
                                        echo $booking['status'] === 'approved' ? 'success' : 
                                            ($booking['status'] === 'rejected' ? 'danger' : 'warning'); 
                                    ?>">
                                        <?php echo ucfirst($booking['status']); ?>
                                    </span>
                                </td>
                                <td><?php echo date('d M Y, h:i A', strtotime($booking['created_at'])); ?></td>
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
            
            <!-- Recent Table Bookings -->
            <div class="content-section">
                <div class="section-header">
                    <h2><i class="fa fa-calendar"></i> Recent Table Bookings</h2>
                    <a href="table_bookings.php" class="btn-view-all">View All</a>
                </div>
                <div class="table-responsive">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Customer</th>
                                <th>Phone</th>
                                <th>Date & Time</th>
                                <th>Guests</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($recent_table_bookings)): ?>
                            <tr>
                                <td colspan="7" class="text-center">
                                    <div class="empty-state" style="padding: 20px;">
                                        <i class="fa fa-inbox"></i>
                                        <p>No table bookings yet</p>
                                    </div>
                                </td>
                            </tr>
                            <?php else: ?>
                            <?php foreach ($recent_table_bookings as $booking): ?>
                            <tr class="<?php echo $booking['is_read'] == 0 ? 'unread' : ''; ?>">
                                <td>#<?php echo $booking['id']; ?></td>
                                <td><?php echo h($booking['customer_name']); ?></td>
                                <td><?php echo h($booking['phone']); ?></td>
                                <td>
                                    <?php echo date('d M Y', strtotime($booking['booking_date'])); ?><br>
                                    <small><?php echo date('h:i A', strtotime($booking['booking_time'])); ?></small>
                                </td>
                                <td><?php echo $booking['guests']; ?> Guests</td>
                                <td>
                                    <span class="badge badge-<?php 
                                        echo $booking['status'] === 'confirmed' ? 'success' : 
                                            ($booking['status'] === 'cancelled' ? 'danger' : 'warning'); 
                                    ?>">
                                        <?php echo ucfirst($booking['status']); ?>
                                    </span>
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
</body>
</html>

