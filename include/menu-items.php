<?php
require_once __DIR__ . '/functions.php';
$pdo = get_pdo();

$menu_categories = [
    'veg' => [
        'name' => 'Pure Vegetarian',
        'desc' => 'Fresh and healthy vegetarian delicacies prepared with love.',
        'icon' => 'fa-leaf',
        'images' => [
            'images/paneer angara.jpg',
            'images/dal-veg.jpg',
            'images/salad.jpg'
        ],
        'rating' => 4.8
    ],
	 'south-indian' => [
        'name' => 'South Indian',
        'desc' => 'Authentic dosa, idli & traditional South Indian taste.',
        'icon' => 'fa-bowl-rice',
        'images' => [
            'images/plain-dosa.jpg',
            'images/chhole-bhature.jpg',
            'images/idli.jpg'
        ],
        'rating' => 4.9
    ],
    'non-veg' => [
        'name' => 'Non-Vegetarian',
        'desc' => 'Rich flavours with perfectly cooked non-veg specials.',
        'icon' => 'fa-drumstick-bite',
        'images' => [
            'images/chicken-leg.jpg',
            'images/chicken-leg1.jpg',
            'images/chicken-biryani.jpg'
        ],
        'rating' => 4.7
    ],
   
];

function has_items($pdo, $category) {
    $stmt = $pdo->prepare("SELECT id FROM restaurant_menu WHERE category=? AND status=1 AND is_available=1");
    $stmt->execute([$category]);
    return $stmt->rowCount();
}

$index = 0;
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
.category-section { padding:20px; }

.category-image-box {
    position: relative;
    border-radius: 22px;
    overflow: hidden;
    box-shadow: 0 18px 40px rgba(0,0,0,0.18);
}

.category-image-box img {
    width:100%;
    height:340px;
    object-fit:cover;
    display:none;
}

.category-image-box img.active {
    display:block;
}

.category-section h2 { font-size:30px; }
.category-section p { font-size:16px; line-height:1.6; }

.rating {
    margin-top:12px;
    font-size:18px;
    color:#f4b400;
}

.rating span {
    margin-left:8px;
    font-size:14px;
    color:#555;
}

@media(max-width:768px){
    .category-image-box img{ height:240px; }
    .category-section h2{ font-size:24px; }
}
/* HOVER EFFECT */
.category-image-box::after {
    content: "";
    position: absolute;
    inset: 0;
    background: rgba(0,0,0,0.25);
    opacity: 0;
    transition: opacity 0.4s ease;
}

.category-image-box:hover::after {
    opacity: 1;
}

.category-image-box img {
    transition: transform 0.6s ease;
}

.category-image-box:hover img {
    transform: scale(1.12);
}

</style>

<div class="container my-5">
    <h1 class="text-center font-weight-bold mb-5">🍽 Our Food Categories</h1>

    <?php foreach ($menu_categories as $key => $cat): ?>
        <?php if (!has_items($pdo, $key)) continue; ?>
        <?php $index++; ?>

        <div class="row category-section align-items-center mb-5 <?= $index % 2 == 0 ? 'flex-row-reverse' : '' ?>">

            <!-- IMAGE SLIDER -->
            <div class="col-md-6 mb-3 mb-md-0">
                <div class="category-image-box slider">
                    <?php foreach ($cat['images'] as $i => $img): ?>
<img 
    src="<?= $img ?>" 
    class="<?= $i==0?'active':'' ?>"
    alt="<?= $cat['name']; ?> food at Balaji Restaurant Chimur">
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- TEXT -->
            <div class="col-md-6">
                <h2 class="font-weight-bold">
                    <i class="fa <?= $cat['icon']; ?> text-success mr-2"></i>
                    <?= $cat['name']; ?>
                </h2>

                <p class="text-muted mt-2"><?= $cat['desc']; ?></p>

                <div class="rating">
                    <?php
                        $full = floor($cat['rating']);
                        for ($i=1;$i<=5;$i++){
                            echo $i<=$full
                            ? '<i class="fa fa-star"></i>'
                            : '<i class="fa fa-star-o"></i>';
                        }
                    ?>
                    <span><?= $cat['rating']; ?>/5</span>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<script>
document.querySelectorAll('.slider').forEach(slider=>{
    let imgs = slider.querySelectorAll('img');
    let i = 0;
    setInterval(()=>{
        imgs[i].classList.remove('active');
        i = (i+1) % imgs.length;
        imgs[i].classList.add('active');
    },3000);
});
</script>
