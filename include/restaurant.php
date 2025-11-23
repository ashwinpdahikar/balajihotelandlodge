<?php 
require_once __DIR__ . '/functions.php';
$pdo = get_pdo();

// Get menu items by category
$menu_categories = [
    'veg' => 'Pure Vegetarian',
    'non-veg' => 'Non-Vegetarian',
    'south-indian' => 'South Indian',
    'beverages' => 'Beverages',
    'desserts' => 'Desserts'
];

function get_menu_by_category($pdo, $category) {
    try {
        // Check if table exists
        $tableCheck = $pdo->query("SHOW TABLES LIKE 'restaurant_menu'")->fetch();
        if (!$tableCheck) {
            return [];
        }
        $stmt = $pdo->prepare('SELECT * FROM restaurant_menu WHERE category = ? AND status = 1 AND is_available = 1 ORDER BY name ASC');
        $stmt->execute([$category]);
        return $stmt->fetchAll();
    } catch (PDOException $e) {
        error_log('Menu fetch error: ' . $e->getMessage());
        return [];
    }
}
?>

<div class="restaurant-section">
   <div class="container">
      <!-- Restaurant Intro -->
      <div class="row mb-5">
         <div class="col-md-12">
            <div class="restaurant-intro text-center">
               <h2>Welcome to Balaji Restaurant</h2>
               <p class="lead">We serve pure veg, non-veg, and South Indian dishes, prepared fresh with good quality and homely taste. Whether you are looking for a simple meal or a full family lunch/dinner, we have something for everyone.</p>
            </div>
         </div>
      </div>

      <!-- Table Booking Section -->
      <div class="row mb-5">
         <div class="col-md-12">
            <div class="table-booking-card">
               <div class="row align-items-center">
                  <div class="col-lg-8 col-md-7">
                     <h3><i class="fa fa-calendar"></i> Reserve Your Table</h3>
                     <p>Book a table in advance for a hassle-free dining experience. We accommodate groups of all sizes.</p>
                  </div>
                  <div class="col-lg-4 col-md-5 text-center">
                     <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#tableBookingModal">
                        <i class="fa fa-book"></i> Book Table Now
                     </button>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <!-- Menu Categories -->
      <?php foreach ($menu_categories as $cat_key => $cat_name): 
         $menu_items = get_menu_by_category($pdo, $cat_key);
         if (empty($menu_items)) continue;
      ?>
      <div class="menu-category-section mb-5">
         <div class="category-header">
            <h3 class="category-title">
               <i class="fa <?php 
                  echo $cat_key === 'veg' ? 'fa-leaf' : 
                     ($cat_key === 'non-veg' ? 'fa-cutlery' : 
                     ($cat_key === 'south-indian' ? 'fa-spoon' : 
                     ($cat_key === 'beverages' ? 'fa-glass' : 'fa-birthday-cake'))); 
               ?>"></i>
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
                        <span class="price">₹<?php echo h(number_format((float)$item['price'], 2)); ?></span>
                     </div>
                  </div>
               </div>
            </div>
            <?php endforeach; ?>
         </div>
      </div>
      <?php endforeach; ?>

      <?php if (empty(array_filter(array_map(function($cat) use ($pdo) { return get_menu_by_category($pdo, $cat); }, array_keys($menu_categories))))): ?>
      <div class="row">
         <div class="col-md-12">
            <div class="alert alert-info text-center">
               <p>Menu items will be available soon. Please contact us for more information.</p>
            </div>
         </div>
      </div>
      <?php endif; ?>
   </div>
</div>

<!-- Table Booking Modal -->
<div class="modal fade" id="tableBookingModal" tabindex="-1" role="dialog" aria-labelledby="tableBookingModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="tableBookingModalLabel">
               <i class="fa fa-calendar"></i> Book a Table
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form id="tableBookingForm" method="POST" action="book_table.php">
            <div class="modal-body">
               <?php if (!empty($_SESSION['table_booking_msg'])): ?>
               <div class="alert alert-<?php echo $_SESSION['table_booking_msg_type'] === 'success' ? 'success' : 'danger'; ?> alert-dismissible fade show">
                  <?php echo h($_SESSION['table_booking_msg']); ?>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <?php 
               unset($_SESSION['table_booking_msg']);
               unset($_SESSION['table_booking_msg_type']);
               endif; ?>
               
               <input type="hidden" name="csrf" value="<?php echo h(csrf_token()); ?>">
               
               <div class="form-group">
                  <label for="customer_name">Your Name <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="customer_name" name="customer_name" required minlength="2" placeholder="Enter your full name">
               </div>
               
               <div class="form-group">
                  <label for="phone">Phone Number <span class="text-danger">*</span></label>
                  <input type="tel" class="form-control" id="phone" name="phone" required pattern="[0-9]{10}" placeholder="10 digit mobile number">
               </div>
               
               <div class="form-group">
                  <label for="email">Email (Optional)</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="your@email.com">
               </div>
               
               <div class="row">
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="booking_date">Booking Date <span class="text-danger">*</span></label>
                        <input type="date" class="form-control" id="booking_date" name="booking_date" required min="<?php echo date('Y-m-d'); ?>">
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="booking_time">Booking Time <span class="text-danger">*</span></label>
                        <input type="time" class="form-control" id="booking_time" name="booking_time" required>
                     </div>
                  </div>
               </div>
               
               <div class="form-group">
                  <label for="guests">Number of Guests <span class="text-danger">*</span></label>
                  <select class="form-control" id="guests" name="guests" required>
                     <option value="">Select guests</option>
                     <?php for ($i = 1; $i <= 20; $i++): ?>
                     <option value="<?php echo $i; ?>"><?php echo $i; ?> <?php echo $i === 1 ? 'Guest' : 'Guests'; ?></option>
                     <?php endfor; ?>
                  </select>
               </div>
               
               <div class="form-group">
                  <label for="special_requests">Special Requests (Optional)</label>
                  <textarea class="form-control" id="special_requests" name="special_requests" rows="3" placeholder="Any special requirements or preferences..."></textarea>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
               <button type="submit" class="btn btn-primary">
                  <i class="fa fa-check"></i> Confirm Booking
               </button>
            </div>
         </form>
      </div>
   </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
   // Set minimum date to today
   const dateInput = document.getElementById('booking_date');
   if (dateInput) {
      dateInput.min = new Date().toISOString().split('T')[0];
   }
   
   // Form validation
   const form = document.getElementById('tableBookingForm');
   if (form) {
      form.addEventListener('submit', function(e) {
         const phone = document.getElementById('phone').value;
         if (phone && !/^[6-9]\d{9}$/.test(phone)) {
            e.preventDefault();
            alert('Please enter a valid 10-digit phone number starting with 6-9');
            return false;
         }
      });
   }
});
</script>

