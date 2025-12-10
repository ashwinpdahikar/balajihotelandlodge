<?php
require_once __DIR__ . '/functions.php';
$pdo = get_pdo();

$menu_categories = [
    'veg' => 'Pure Vegetarian',
    'non-veg' => 'Non-Vegetarian',
    'south-indian' => 'South Indian',
    'beverages' => 'Beverages',
    'desserts' => 'Desserts'
];

function get_menu_by_category($pdo, $category) {
    try {
        $tableCheck = $pdo->query("SHOW TABLES LIKE 'restaurant_menu'")->fetch();
        if (!$tableCheck) return [];

        $stmt = $pdo->prepare('SELECT * FROM restaurant_menu WHERE category = ? AND status = 1 AND is_available = 1 ORDER BY name ASC');
        $stmt->execute([$category]);
        return $stmt->fetchAll();
    } catch(PDOException $e) {
        error_log('Menu fetch error: '.$e->getMessage());
        return [];
    }
}
?>

<div id="menu" style="scroll-margin-top:100px;"></div>

<?php foreach ($menu_categories as $cat_key => $cat_name): 
    $menu_items = get_menu_by_category($pdo, $cat_key);
    if (empty($menu_items)) continue;
?>
<div class="menu-category-section mb-5">
    <div class="category-header">
        <h3 class="category-title">
            <i class="fa 
                <?php echo $cat_key === 'veg' ? 'fa-leaf' :
                ($cat_key === 'non-veg' ? 'fa-cutlery' :
                ($cat_key === 'south-indian' ? 'fa-spoon' :
                ($cat_key === 'beverages' ? 'fa-glass' : 'fa-birthday-cake'))); ?>">
            </i>
            <?php echo h($cat_name); ?>
        </h3>
    </div>

    <div class="row">
        <?php foreach ($menu_items as $item): ?>
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="menu-item-card">

                <?php if (!empty($item['image_path'])): ?>
                <div class="menu-item-image">
                    <img src="<?php echo h($item['image_path']); ?>" alt="<?php echo h($item['name']); ?>" class="img-fluid">
                </div>
                <?php else: ?>
                <div class="menu-item-image placeholder">
                    <i class="fa fa-cutlery"></i>
                </div>
                <?php endif; ?>

                <div class="menu-item-content">
                    <h4 class="menu-item-name"><?php echo h($item['name']); ?></h4>

                    <?php if (!empty($item['description'])): ?>
                    <p class="menu-item-desc"><?php echo h($item['description']); ?></p>
                    <?php endif; ?>

                    <div class="menu-item-price">
                        <span class="price">₹<?php echo number_format((float)$item['price'], 2); ?></span>
                    </div>
                </div>

            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
<?php endforeach; ?>

<?php 
// No items in all categories
$has_items = array_filter(
    array_map(fn($cat) => get_menu_by_category($pdo, $cat), array_keys($menu_categories))
);
if (empty($has_items)): ?>
<div class="alert alert-info text-center">
  <p>Menu items will be available soon. Please contact us for more information.</p>
</div>
<?php endif; ?>
