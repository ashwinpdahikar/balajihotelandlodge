<?php
$pdo = get_pdo();
$unread_bookings = $pdo->query("SELECT COUNT(*) as count FROM booking_inquiries WHERE is_read = 0")->fetch()['count'];
$table_exists = $pdo->query("SHOW TABLES LIKE 'table_bookings'")->fetch();
$unread_table_bookings = $table_exists ? $pdo->query("SELECT COUNT(*) as count FROM table_bookings WHERE is_read = 0")->fetch()['count'] : 0;
$current_page = basename($_SERVER['PHP_SELF']);
?>
<nav class="sidebar-nav">
    <ul>
        <li>
            <a href="index.php" class="<?php echo $current_page === 'index.php' ? 'active' : ''; ?>">
                <i class="fa fa-dashboard"></i> Dashboard
            </a>
        </li>
        <li>
            <a href="bookings.php" class="<?php echo $current_page === 'bookings.php' ? 'active' : ''; ?>">
                <i class="fa fa-bed"></i> Room Bookings
                <?php if ($unread_bookings > 0): ?>
                <span class="badge"><?php echo $unread_bookings; ?></span>
                <?php endif; ?>
            </a>
        </li>
        <li>
            <a href="table_bookings.php" class="<?php echo $current_page === 'table_bookings.php' ? 'active' : ''; ?>">
                <i class="fa fa-cutlery"></i> Table Bookings
                <?php if ($unread_table_bookings > 0): ?>
                <span class="badge"><?php echo $unread_table_bookings; ?></span>
                <?php endif; ?>
            </a>
        </li>
    </ul>
</nav>

