<?php
require_once __DIR__ . '/../include/functions.php';
start_session_secure();

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php');
    exit;
}

$pdo = get_pdo();
$errors = [];
$item_id = (int)($_GET['id'] ?? 0);

if ($item_id <= 0) {
    header('Location: menu_items.php');
    exit;
}

// Get existing item
$stmt = $pdo->prepare('SELECT * FROM restaurant_menu WHERE id = ?');
$stmt->execute([$item_id]);
$item = $stmt->fetch();

if (!$item) {
    header('Location: menu_items.php');
    exit;
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $description = trim($_POST['description'] ?? '');
    $category = $_POST['category'] ?? '';
    $price = $_POST['price'] ?? '';
    $is_available = isset($_POST['is_available']) ? 1 : 0;
    $status = isset($_POST['status']) ? 1 : 0;
    
    // Validation
    if (empty($name) || strlen($name) < 2) {
        $errors[] = 'Name is required (minimum 2 characters)';
    }
    
    if (empty($category) || !in_array($category, ['veg', 'non-veg', 'south-indian', 'beverages', 'desserts'])) {
        $errors[] = 'Please select a valid category';
    }
    
    if (empty($price) || !is_numeric($price) || $price < 0) {
        $errors[] = 'Please enter a valid price';
    }
    
    // Handle image upload
    $image_path = $item['image_path'];
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $upload_dir = '../images/menu/';
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0755, true);
        }
        
        $file_extension = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
        $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
        
        if (!in_array($file_extension, $allowed_extensions)) {
            $errors[] = 'Invalid image format. Allowed: JPG, PNG, GIF, WEBP';
        } else {
            // Delete old image if exists
            if (!empty($item['image_path']) && file_exists('../' . $item['image_path'])) {
                @unlink('../' . $item['image_path']);
            }
            
            $file_name = uniqid('menu_') . '.' . $file_extension;
            $file_path = $upload_dir . $file_name;
            
            if (move_uploaded_file($_FILES['image']['tmp_name'], $file_path)) {
                $image_path = 'images/menu/' . $file_name;
            } else {
                $errors[] = 'Failed to upload image';
            }
        }
    }
    
    // Handle image deletion
    if (isset($_POST['delete_image']) && !empty($item['image_path'])) {
        if (file_exists('../' . $item['image_path'])) {
            @unlink('../' . $item['image_path']);
        }
        $image_path = null;
    }
    
    // Update database
    if (empty($errors)) {
        try {
            $stmt = $pdo->prepare('UPDATE restaurant_menu SET name = ?, description = ?, category = ?, price = ?, image_path = ?, is_available = ?, status = ? WHERE id = ?');
            $stmt->execute([
                $name,
                !empty($description) ? $description : null,
                $category,
                $price,
                $image_path,
                $is_available,
                $status,
                $item_id
            ]);
            
            $_SESSION['menu_item_msg'] = 'Menu item updated successfully!';
            header('Location: menu_items.php?updated=1');
            exit;
        } catch (PDOException $e) {
            $errors[] = 'Database error: ' . $e->getMessage();
        }
    }
}

$categories = [
    'veg' => 'Pure Vegetarian',
    'non-veg' => 'Non-Vegetarian',
    'south-indian' => 'South Indian',
    'beverages' => 'Beverages',
    'desserts' => 'Desserts'
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Menu Item - Admin</title>
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
                <h1><i class="fa fa-edit"></i> Edit Menu Item</h1>
                <a href="menu_items.php" class="btn btn-secondary">
                    <i class="fa fa-arrow-left"></i> Back to Menu Items
                </a>
            </div>
            
            <?php if (!empty($errors)): ?>
            <div class="alert alert-danger">
                <ul style="margin-bottom: 0;">
                    <?php foreach ($errors as $error): ?>
                    <li><?php echo h($error); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <?php endif; ?>
            
            <div class="content-section">
                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Item Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="name" value="<?php echo h($_POST['name'] ?? $item['name']); ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Category <span class="text-danger">*</span></label>
                        <select class="form-control" name="category" required>
                            <option value="">-- Select Category --</option>
                            <?php foreach ($categories as $key => $name): ?>
                            <option value="<?php echo $key; ?>" <?php echo (($_POST['category'] ?? $item['category']) === $key) ? 'selected' : ''; ?>>
                                <?php echo h($name); ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" name="description" rows="3"><?php echo h($_POST['description'] ?? $item['description'] ?? ''); ?></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label>Price (₹) <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" name="price" step="0.01" min="0" value="<?php echo h($_POST['price'] ?? $item['price']); ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Current Image</label>
                        <?php if (!empty($item['image_path'])): ?>
                        <div style="margin-bottom: 10px;">
                            <img src="../<?php echo h($item['image_path']); ?>" alt="<?php echo h($item['name']); ?>" style="max-width: 200px; height: auto; border-radius: 8px;">
                            <div class="form-check mt-2">
                                <input class="form-check-input" type="checkbox" name="delete_image" id="delete_image">
                                <label class="form-check-label" for="delete_image">
                                    Delete current image
                                </label>
                            </div>
                        </div>
                        <?php else: ?>
                        <p class="text-muted">No image uploaded</p>
                        <?php endif; ?>
                        
                        <label>Upload New Image</label>
                        <input type="file" class="form-control-file" name="image" accept="image/*">
                        <small class="form-text text-muted">Leave empty to keep current image. Allowed formats: JPG, PNG, GIF, WEBP</small>
                    </div>
                    
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="is_available" id="is_available" value="1" <?php echo (($_POST['is_available'] ?? $item['is_available']) == 1) ? 'checked' : ''; ?>>
                            <label class="form-check-label" for="is_available">
                                Available
                            </label>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="status" id="status" value="1" <?php echo (($_POST['status'] ?? $item['status']) == 1) ? 'checked' : ''; ?>>
                            <label class="form-check-label" for="status">
                                Active
                            </label>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-save"></i> Update Menu Item
                        </button>
                        <a href="menu_items.php" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>

