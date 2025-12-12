<?php
require_once __DIR__ . '/functions.php';
$pdo = get_pdo();

$menu_categories = [
    'veg' => ['name' => 'Pure Vegetarian', 'icon' => 'fa-leaf', 'color' => '#28a745'],
    'non-veg' => ['name' => 'Non-Vegetarian', 'icon' => 'fa-cutlery', 'color' => '#dc3545'],
    'south-indian' => ['name' => 'South Indian', 'icon' => 'fa-spoon', 'color' => '#ffc107'],
    'beverages' => ['name' => 'Beverages', 'icon' => 'fa-glass', 'color' => '#17a2b8'],
    'desserts' => ['name' => 'Desserts', 'icon' => 'fa-birthday-cake', 'color' => '#e83e8c']
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

<!-- Menu Section Anchor -->
<div id="menu" style="scroll-margin-top: 100px;"></div>

<!-- Menu Categories Display -->
<?php 
$has_any_items = false;
foreach ($menu_categories as $cat_key => $cat_info): 
    $menu_items = get_menu_by_category($pdo, $cat_key);
    if (empty($menu_items)) continue;
    $has_any_items = true;
?>
<div class="menu-category-section mb-5">
    <div class="category-header">
        <h3 class="category-title">
            <i class="fa <?php echo h($cat_info['icon']); ?>" style="color: <?php echo h($cat_info['color']); ?>;"></i>
            <?php echo h($cat_info['name']); ?>
            <span class="badge badge-primary ml-2" style="background: <?php echo h($cat_info['color']); ?>;">
                <?php echo count($menu_items); ?> Items
            </span>
        </h3>
    </div>

    <div class="row">
        <?php foreach ($menu_items as $item): ?>
           <div class="col-12 mb-3">
                <div class="menu-item-list">

            <!-- IMAGE -->
                   <div class="menu-item-img">
                <?php if (!empty($item['image_path'])): ?>
                    <img src="<?php echo h($item['image_path']); ?>" alt="<?php echo h($item['name']); ?>" loading="lazy">
                <?php else: ?>
                    <div class="img-placeholder">
                        <i class="fa fa-cutlery"></i>
                    </div>
                <?php endif; ?>
            </div>

            <!-- CONTENT -->
            <div class="menu-item-details">
                
                <div class="menu-item-title-row">
                    <h4 class="menu-item-name"><?php echo h($item['name']); ?></h4>

                    <?php if ($item['category'] === 'veg'): ?>
                    <span class="veg-mark"></span>
                    <?php else: ?>
                    <span class="nonveg-mark"></span>
                    <?php endif; ?>
                </div>

                <?php if (!empty($item['description'])): ?>
                <p class="menu-item-desc"><?php echo h($item['description']); ?></p>
                <?php endif; ?>

                <div class="menu-item-price">
                    ₹<?php echo number_format((float)$item['price'], 2); ?>
                </div>

            </div>
        </div>
</div>

        <?php endforeach; ?>
    </div>
</div>
<?php endforeach; ?>

<!-- Empty State Message -->
<?php if (!$has_any_items): ?>
<div class="row">
    <div class="col-md-12">
        <div class="alert alert-info text-center" style="padding: 40px; border-radius: 12px; background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);">
            <i class="fa fa-info-circle" style="font-size: 48px; color: var(--warning); margin-bottom: 20px;"></i>
            <h4 style="color: var(--text-primary); margin-bottom: 10px;">Menu Coming Soon</h4>
            <p style="color: var(--text-secondary); font-size: 16px; margin-bottom: 0;">
                Our delicious menu items will be available soon. Please contact us for more information or visit us to see our full menu.
            </p>
            <div class="mt-3">
                <a href="tel:<?php echo preg_replace('/[^0-9]/', '', get_setting('phone', '+91 7350255026')); ?>" class="btn btn-primary">
                    <i class="fa fa-phone"></i> Call Us
                </a>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
<style>
   /* Main List Item Wrapper */
.menu-item-list {
    display: flex;
    align-items: flex-start;
    gap: 12px;
    padding: 12px 0;
    border-bottom: 1px solid #eee;
}

/* IMAGE */
.menu-item-img {
    width: 95px;
    height: 95px;
    border-radius: 10px;
    overflow: hidden;
    flex-shrink: 0;
}

.menu-item-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

/* Placeholder if no image */
.img-placeholder {
    width: 100%;
    height: 100%;
    background: #f5f5f5;
    display: flex;
    justify-content: center;
    align-items: center;
    color: #888;
    font-size: 22px;
}

/* CONTENT SECTION */
.menu-item-details {
    flex: 1;
}

/* Title Row */
.menu-item-title-row {
    display: flex;
    align-items: center;
    gap: 6px;
}

.menu-item-name {
    font-size: 16px;
    font-weight: 600;
    margin: 0;
}

/* Veg / Non-Veg DOT STYLE (Swiggy Style) */
.veg-mark, .nonveg-mark {
    width: 12px;
    height: 12px;
    border-radius: 2px;
    border: 1px solid;
    display: inline-block;
    position: relative;
}

.veg-mark {
    border-color: #008000;
}

.veg-mark::after {
    content: "";
    width: 6px;
    height: 6px;
    background: #008000;
    position: absolute;
    top: 2px;
    left: 2px;
    border-radius: 1px;
}

.nonveg-mark {
    border-color: #a10000;
}

.nonveg-mark::after {
    content: "";
    width: 6px;
    height: 6px;
    background: #a10000;
    position: absolute;
    top: 2px;
    left: 2px;
    border-radius: 1px;
}

/* Description */
.menu-item-desc {
    margin: 4px 0 6px;
    color: #555;
    font-size: 14px;
}

/* Price */
.menu-item-price {
    font-size: 16px;
    font-weight: 600;
    color: #000;
}

/* MOBILE RESPONSIVE */
@media(max-width: 600px) {
    .menu-item-list {
        padding: 10px 0;
        gap: 10px;
    }

    .menu-item-img {
        width: 85px;
        height: 85px;
    }

    .menu-item-name {
        font-size: 15px;
    }

    .menu-item-desc {
        font-size: 13px;
    }

    .menu-item-price {
        font-size: 15px;
    }
}


</style>