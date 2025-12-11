<?php
require_once __DIR__ . '/../include/functions.php';
start_session_secure();

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php');
    exit;
}

$pdo = get_pdo();

// Handle delete
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_id'])) {
    $id = (int)$_POST['delete_id'];
    $stmt = $pdo->prepare('DELETE FROM restaurant_menu WHERE id = ?');
    $stmt->execute([$id]);
    header('Location: menu_items.php?deleted=1');
    exit;
}

// Handle status toggle
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['toggle_status'])) {
    $id = (int)$_POST['item_id'];
    $field = $_POST['field'] === 'status' ? 'status' : 'is_available';
    $stmt = $pdo->prepare("UPDATE restaurant_menu SET $field = NOT $field WHERE id = ?");
    $stmt->execute([$id]);
    header('Location: menu_items.php?updated=1');
    exit;
}

// Get filter
$filter_category = $_GET['category'] ?? 'all';
$where = '';
$params = [];
if ($filter_category !== 'all') {
    $where = "WHERE category = ?";
    $params[] = $filter_category;
}

// Get all menu items
$sql = "SELECT * FROM restaurant_menu $where ORDER BY category ASC, name ASC";
$stmt = $pdo->prepare($sql);
$stmt->execute($params);
$menu_items = $stmt->fetchAll();

// Get category counts
$categories = [
    'veg' => 'Pure Vegetarian',
    'non-veg' => 'Non-Vegetarian',
    'south-indian' => 'South Indian',
    'beverages' => 'Beverages',
    'desserts' => 'Desserts'
];

$category_counts = [];
foreach ($categories as $key => $name) {
    $countStmt = $pdo->prepare("SELECT COUNT(*) as count FROM restaurant_menu WHERE category = ?");
    $countStmt->execute([$key]);
    $category_counts[$key] = $countStmt->fetch()['count'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Items - Admin</title>
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
                <h1><i class="fa fa-list"></i> Menu Items</h1>
                <a href="menu_item_add.php" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Add New Item
                </a>
            </div>
            
            <?php if (isset($_GET['deleted'])): ?>
            <div class="alert alert-success">
                Menu item deleted successfully!
            </div>
            <?php endif; ?>
            
            <?php if (isset($_GET['updated'])): ?>
            <div class="alert alert-success">
                Status updated successfully!
            </div>
            <?php endif; ?>
            
            <!-- Filter Tabs -->
            <div class="content-section">
                <div style="display: flex; gap: 10px; margin-bottom: 20px; flex-wrap: wrap;">
                    <a href="?category=all" class="btn <?php echo $filter_category === 'all' ? 'btn-primary' : 'btn-secondary'; ?>">
                        All (<?php echo count($menu_items); ?>)
                    </a>
                    <?php foreach ($categories as $key => $name): ?>
                    <a href="?category=<?php echo $key; ?>" class="btn <?php echo $filter_category === $key ? 'btn-primary' : 'btn-secondary'; ?>">
                        <?php echo h($name); ?> (<?php echo $category_counts[$key]; ?>)
                    </a>
                    <?php endforeach; ?>
                </div>
                
                <div class="table-responsive">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Available</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($menu_items)): ?>
                            <tr>
                                <td colspan="9" class="text-center">
                                    <div class="empty-state">
                                        <i class="fa fa-inbox"></i>
                                        <p>No menu items found</p>
                                        <a href="menu_item_add.php" class="btn btn-primary mt-3">
                                            <i class="fa fa-plus"></i> Add First Item
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <?php else: ?>
                            <?php foreach ($menu_items as $item): ?>
                            <tr>
                                <td>#<?php echo $item['id']; ?></td>
                                <td>
                                    <?php if (!empty($item['image_path'])): ?>
                                    <img src="../<?php echo h($item['image_path']); ?>" alt="<?php echo h($item['name']); ?>" style="width: 60px; height: 60px; object-fit: cover; border-radius: 8px;">
                                    <?php else: ?>
                                    <div style="width: 60px; height: 60px; background: #f0f0f0; border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                                        <i class="fa fa-cutlery" style="color: #999;"></i>
                                    </div>
                                    <?php endif; ?>
                                </td>
                                <td><strong><?php echo h($item['name']); ?></strong></td>
                                <td>
                                    <span class="badge" style="background: <?php 
                                        echo $item['category'] === 'veg' ? '#28a745' : 
                                        ($item['category'] === 'non-veg' ? '#dc3545' : 
                                        ($item['category'] === 'south-indian' ? '#ffc107' : 
                                        ($item['category'] === 'beverages' ? '#17a2b8' : '#e83e8c'))); 
                                    ?>;">
                                        <?php echo h($categories[$item['category']] ?? $item['category']); ?>
                                    </span>
                                </td>
                                <td><?php echo h(substr($item['description'] ?? '', 0, 50)) . (strlen($item['description'] ?? '') > 50 ? '...' : ''); ?></td>
                                <td><strong>₹<?php echo number_format((float)$item['price'], 2); ?></strong></td>
                                <td>
                                    <form method="POST" style="display: inline-block;">
                                        <input type="hidden" name="item_id" value="<?php echo $item['id']; ?>">
                                        <input type="hidden" name="field" value="status">
                                        <button type="submit" name="toggle_status" class="btn btn-sm <?php echo $item['status'] == 1 ? 'btn-success' : 'btn-secondary'; ?>">
                                            <?php echo $item['status'] == 1 ? 'Active' : 'Inactive'; ?>
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    <form method="POST" style="display: inline-block;">
                                        <input type="hidden" name="item_id" value="<?php echo $item['id']; ?>">
                                        <input type="hidden" name="field" value="is_available">
                                        <button type="submit" name="toggle_status" class="btn btn-sm <?php echo $item['is_available'] == 1 ? 'btn-info' : 'btn-warning'; ?>">
                                            <?php echo $item['is_available'] == 1 ? 'Available' : 'Unavailable'; ?>
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    <a href="menu_item_edit.php?id=<?php echo $item['id']; ?>" class="btn-action">
                                        <i class="fa fa-edit"></i> Edit
                                    </a>
                                    <form method="POST" style="display: inline-block;" onsubmit="return confirm('Are you sure you want to delete this menu item?');">
                                        <input type="hidden" name="delete_id" value="<?php echo $item['id']; ?>">
                                        <button type="submit" class="btn-action btn-danger">
                                            <i class="fa fa-trash"></i> Delete
                                        </button>
                                    </form>
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

