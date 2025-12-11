<?php
require_once __DIR__ . '/../include/functions.php';
start_session_secure();

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php');
    exit;
}

$pdo = get_pdo();
$errors = [];
$success = false;

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
    $image_path = null;
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
            $file_name = uniqid('menu_') . '.' . $file_extension;
            $file_path = $upload_dir . $file_name;
            
            if (move_uploaded_file($_FILES['image']['tmp_name'], $file_path)) {
                $image_path = 'images/menu/' . $file_name;
            } else {
                $errors[] = 'Failed to upload image';
            }
        }
    }
    
    // Insert into database
    if (empty($errors)) {
        try {
            $stmt = $pdo->prepare('INSERT INTO restaurant_menu (name, description, category, price, image_path, is_available, status) VALUES (?, ?, ?, ?, ?, ?, ?)');
            $stmt->execute([
                $name,
                !empty($description) ? $description : null,
                $category,
                $price,
                $image_path,
                $is_available,
                $status
            ]);
            
            $success = true;
            $_SESSION['menu_item_msg'] = 'Menu item added successfully!';
            header('Location: menu_items.php?added=1');
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
    <title>Add Menu Item - Admin</title>
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
                <h1><i class="fa fa-plus"></i> Add Menu Item</h1>
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
                        <input type="text" class="form-control" name="name" value="<?php echo h($_POST['name'] ?? ''); ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Category <span class="text-danger">*</span></label>
                        <select class="form-control" name="category" required>
                            <option value="">-- Select Category --</option>
                            <?php foreach ($categories as $key => $name): ?>
                            <option value="<?php echo $key; ?>" <?php echo (isset($_POST['category']) && $_POST['category'] === $key) ? 'selected' : ''; ?>>
                                <?php echo h($name); ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" name="description" rows="3"><?php echo h($_POST['description'] ?? ''); ?></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label>Price (₹) <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" name="price" step="0.01" min="0" value="<?php echo h($_POST['price'] ?? ''); ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" class="form-control-file" name="image" accept="image/*">
                        <small class="form-text text-muted">Allowed formats: JPG, PNG, GIF, WEBP (Max size: 5MB)</small>
                    </div>
                    
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="is_available" id="is_available" value="1" <?php echo (isset($_POST['is_available']) || !isset($_POST['name'])) ? 'checked' : ''; ?>>
                            <label class="form-check-label" for="is_available">
                                Available
                            </label>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="status" id="status" value="1" <?php echo (isset($_POST['status']) || !isset($_POST['name'])) ? 'checked' : ''; ?>>
                            <label class="form-check-label" for="status">
                                Active
                            </label>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-save"></i> Add Menu Item
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

