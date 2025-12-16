<?php 
require_once __DIR__ . '/functions.php';
$pdo = get_pdo(); ?>

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

      <!-- Table Booking Message Display -->
      <?php 
      start_session_secure();
      if (!empty($_SESSION['table_booking_msg'])): 
          $msgType = $_SESSION['table_booking_msg_type'] ?? 'info';
      ?>
      <div class="row mb-4">
         <div class="col-md-12">
            <div id="tableBookingAlert" class="alert alert-<?php echo $msgType === 'success' ? 'success' : ($msgType === 'error' ? 'danger' : 'info'); ?> alert-dismissible fade show" role="alert" style="margin-bottom:20px;">
               <strong><?php echo $msgType === 'success' ? '✓' : ($msgType === 'error' ? '✗' : 'ℹ'); ?></strong>
               <?php echo h($_SESSION['table_booking_msg']); ?>
               <button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="document.getElementById('tableBookingAlert').remove();">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <script>
            (function() {
               var alertDiv = document.getElementById('tableBookingAlert');
               if (alertDiv) {
                  // Auto-hide after 8 seconds
                  setTimeout(function() {
                     alertDiv.style.opacity = '0';
                     setTimeout(function() {
                        alertDiv.style.display = 'none';
                        alertDiv.remove();
                     }, 500);
                  }, 8000);
                  
                  // Auto-open modal if error (so user can fix and resubmit)
                  <?php if ($msgType === 'error'): ?>
                  setTimeout(function() {
                     var modal = document.getElementById('tableBookingModal');
                     if (modal && typeof jQuery !== 'undefined' && jQuery.fn.modal) {
                        jQuery('#tableBookingModal').modal('show');
                     }
                  }, 500);
                  <?php endif; ?>
               }
            })();
            </script>
         </div>
      </div>
      <?php 
      unset($_SESSION['table_booking_msg']);
      unset($_SESSION['table_booking_msg_type']);
      endif; 
      ?>

      <!-- Table Booking Section -->
      <!-- <div class="row mb-5" id="table-booking" style="scroll-margin-top: 100px;">
         <div class="col-md-12">
            <div class="table-booking-card">
               <div class="row align-items-center">
                  <div class="col-lg-8 col-md-7">
                     <h3 class="title"><i class="fa fa-calendar"></i> Reserve Your Table</h3>
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
      </div> -->

      <!-- Menu Categories -->
      <?php include 'include/menu-items.php'?>
   </div>
</div>

<?php include __DIR__ . '/table_booking_modal.php'; ?>