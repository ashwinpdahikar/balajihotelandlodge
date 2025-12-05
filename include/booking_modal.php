<?php 
require_once __DIR__ . '/functions.php'; 
$pdo = get_pdo(); 
// Get unique rooms - Use subquery to get first room of each title type
$rooms = $pdo->query('SELECT r.* FROM rooms r 
                      INNER JOIN (SELECT title, MIN(id) as min_id FROM rooms WHERE status=1 GROUP BY title) as unique_rooms 
                      ON r.id = unique_rooms.min_id AND r.title = unique_rooms.title 
                      WHERE r.status=1 ORDER BY r.title')->fetchAll(); 
$upiId = get_setting('upi_id',''); 
$upiName = get_setting('upi_name',''); 
$phone = get_setting('phone', '+91 7350255026');
$email = get_setting('email', 'balajirestaurantandlodge@gmail.com');
?>
<style>
/* Booking Modal Styles */
#bookingModal .modal-dialog {
  max-width: 900px;
  margin: 30px auto;
}
#bookingModal .modal-content {
  border-radius: 20px;
  border: none;
  box-shadow: 0 20px 60px rgba(0,0,0,.3);
  overflow: hidden;
  margin: 65px 0;
}
#bookingModal .modal-header {
  background: linear-gradient(135deg, #d35400 0%, #ff6b35 100%);
  color: #fff;
  padding: 25px 30px;
  border-bottom: none;
  position: relative;
}
#bookingModal .modal-header::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  height: 4px;
  background: rgba(255,255,255,.2);
}
#bookingModal .modal-title {
  font-size: 1.8rem;
  font-weight: 700;
  margin: 0;
  display: flex;
  align-items: center;
  gap: 12px;
}
#bookingModal .modal-title i {
  font-size: 1.5rem;
}
#bookingModal .close {
  color: #fff;
  opacity: .9;
  font-size: 2rem;
  font-weight: 300;
  text-shadow: none;
  padding: 0;
  margin: 0;
  width: 40px;
  height: 40px;
  display: flex;
  align-items: center;
  justify-content: center;
  border-radius: 50%;
  transition: all .3s;
}
#bookingModal .close:hover {
  opacity: 1;
  background: rgba(255,255,255,.2);
  transform: rotate(90deg);
}
#bookingModal .modal-body {
  padding: 35px;
  background: #f8f9fa;
  max-height: calc(100vh - 200px);
  overflow-y: auto;
  height: 80% !important;
}
#bookingModal .form-section {
  background: #fff;
  padding: 25px;
  border-radius: 15px;
  margin-bottom: 20px;
  box-shadow: 0 4px 15px rgba(0,0,0,.05);
}
#bookingModal .section-title {
  font-size: 1.2rem;
  font-weight: 700;
  color: #2c3e50;
  margin-bottom: 20px;
  padding-bottom: 12px;
  border-bottom: 2px solid #d35400;
  display: flex;
  align-items: center;
  gap: 10px;
}
#bookingModal .section-title i {
  color: #d35400;
  font-size: 1.1rem;
}
#bookingModal .form-group {
  margin-bottom: 20px;
}
#bookingModal .form-group:last-child {
  margin-bottom: 0;
}
#bookingModal label {
  font-weight: 600;
  color: #333;
  margin-bottom: 8px;
  display: block;
  font-size: .95rem;
}
#bookingModal label .required {
  color: #e74c3c;
  margin-left: 3px;
}
#bookingModal .form-control {
  width: 100%;
  padding: 5px 15px;
  border: 2px solid #e0e0e0;
  border-radius: 10px;
  font-size: 1rem;
  transition: all .3s;
  background: #fff;
}
#bookingModal .form-control:focus {
  outline: none;
  border-color: #d35400;
  box-shadow: 0 0 0 3px rgba(211,84,0,.1);
}
#bookingModal .form-row {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 15px;
}
#bookingModal select.form-control {
  cursor: pointer;
  appearance: none;
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%23333' d='M6 9L1 4h10z'/%3E%3C/svg%3E");
  background-repeat: no-repeat;
  background-position: right 16px center;
  padding-right: 40px;
}
#bookingModal .guest-counter {
  display: flex;
  align-items: center;
  gap: 15px;
  background: #f8f9fa;
  padding: 12px 20px;
  border-radius: 10px;
  border: 2px solid #e0e0e0;
}
#bookingModal .counter-btn {
  width: 35px;
  height: 35px;
  border: 2px solid #d35400;
  background: #fff;
  color: #d35400;
  border-radius: 50%;
  cursor: pointer;
  font-weight: 700;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: all .3s;
  font-size: 1.1rem;
  line-height: 1;
}
#bookingModal .counter-btn:hover {
  background: #d35400;
  color: #fff;
  transform: scale(1.1);
}
#bookingModal .counter-value {
  font-size: 1.2rem;
  font-weight: 700;
  min-width: 50px;
  text-align: center;
  border: none;
  background: transparent;
}
#bookingModal .payment-box {
  background: linear-gradient(135deg, #fff5f0 0%, #ffe8d6 100%);
  border: 2px dashed #d35400;
  border-radius: 15px;
  padding: 25px;
  margin-top: 20px;
}
#bookingModal .payment-instructions {
  background: #fff;
  padding: 20px;
  border-radius: 10px;
  margin-bottom: 20px;
  border-left: 4px solid #d35400;
}
#bookingModal .payment-instructions h6 {
  color: #2c3e50;
  font-weight: 700;
  margin-bottom: 12px;
  display: flex;
  align-items: center;
  gap: 8px;
}
#bookingModal .payment-instructions ol {
  margin: 0;
  padding-left: 20px;
  color: #555;
}
#bookingModal .payment-instructions li {
  margin-bottom: 8px;
  line-height: 1.6;
}
#bookingModal .qr-wrapper {
  text-align: center;
  background: #fff;
  padding: 20px;
  border-radius: 10px;
  margin-bottom: 20px;
  border: 2px solid #d35400;
}
#bookingModal .qr-wrapper img {
  max-width: 200px;
  width: 100%;
  border: 3px solid #d35400;
  border-radius: 10px;
  padding: 10px;
  background: #fff;
  margin-bottom: 15px;
}
#bookingModal .upi-info {
  text-align: center;
}
#bookingModal .upi-info strong {
  display: block;
  font-size: 1.1rem;
  color: #d35400;
  margin-top: 10px;
  word-break: break-all;
}
#bookingModal .help-text {
  font-size: .85rem;
  color: #666;
  margin-top: 5px;
  font-style: italic;
}
#bookingModal .btn-submit {
  width: 100%;
  padding: 16px;
  background: linear-gradient(135deg, #d35400 0%, #ff6b35 100%);
  color: #fff;
  border: none;
  border-radius: 10px;
  font-size: 1.1rem;
  font-weight: 700;
  cursor: pointer;
  transition: all .3s;
  margin-top: 25px;
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 10px;
  box-shadow: 0 4px 15px rgba(211,84,0,.3);
}
#bookingModal .btn-submit:hover {
  transform: translateY(-2px);
  box-shadow: 0 6px 20px rgba(211,84,0,.4);
}
#bookingModal .btn-submit:active {
  transform: translateY(0);
}
#bookingModal .contact-help {
  background: #f8f9fa;
  padding: 20px;
  border-radius: 10px;
  margin-top: 20px;
  text-align: center;
  border: 2px solid #e0e0e0;
}
#bookingModal .contact-help h6 {
  color: #2c3e50;
  margin-bottom: 10px;
  font-weight: 700;
}
#bookingModal .contact-help a {
  color: #d35400;
  text-decoration: none;
  font-weight: 600;
  display: inline-block;
  margin: 5px 10px;
}
#bookingModal .contact-help a:hover {
  text-decoration: underline;
}
/* Responsive */
@media (max-width: 768px) {
  #bookingModal .modal-dialog {
    margin: 10px;
    max-width: calc(100% - 20px);
  }
  #bookingModal .modal-body {
    padding: 20px;
    max-height: calc(100vh - 100px);
  }
  #bookingModal .form-row {
    grid-template-columns: 1fr;
  }
  #bookingModal .modal-title {
    font-size: 1.2rem;
  }
  #bookingModal .section-title {
    font-size: 1.1rem;
  }
  #bookingModal .qr-wrapper img {
    max-width: 150px;
  }
}
@media (max-width: 480px) {
  #bookingModal .modal-header {
    padding: 20px;
  }
  #bookingModal .modal-body {
    padding: 15px;
  }
  #bookingModal .form-section {
    padding: 15px;
  }
  #bookingModal .payment-box {
    padding: 15px;
  }
}
</style>

<div class="modal fade" id="bookingModal" tabindex="-1" role="dialog" aria-labelledby="bookingModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="bookingModalLabel">
          <i class="fa fa-calendar-check-o"></i>
          Book Your Stay
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="bookingForm" method="post" action="book_room.php">
          <input type="hidden" name="csrf" value="<?php echo h(csrf_token()); ?>">
          <input type="hidden" name="website" style="display:none">

          <!-- Room Selection -->
          <div class="form-section">
            <div class="section-title">
              <i class="fa fa-bed"></i>
              <span>1. Select Your Room</span>
            </div>
            <div class="form-group">
              <label>Choose Room <span class="required">*</span></label>
              <select class="form-control" name="room_id" id="bm_room" required>
                <option value="">-- Select a room --</option>
                <?php 
                $processedRoomIds = []; // Track processed room IDs to avoid duplicates
                foreach($rooms as $r): 
                  $roomId = (int)$r['id'];
                  
                  // Skip if this room ID already processed
                  if (in_array($roomId, $processedRoomIds)) {
                      continue;
                  }
                  $processedRoomIds[] = $roomId;
                  
                  // Check availability for each room
                  $approvedCount = $pdo->prepare('SELECT COUNT(*) FROM booking_inquiries WHERE room_id = ? AND status = ?');
                  $approvedCount->execute([$roomId, 'approved']);
                  $approvedBookings = (int)$approvedCount->fetchColumn();
                  $quantity = array_key_exists('quantity', $r) && isset($r['quantity']) && $r['quantity'] !== null ? (int)$r['quantity'] : 1;
                  $available = max(0, $quantity - $approvedBookings);
                  $isSoldOut = $available <= 0;
                ?>
                  <option value="<?php echo $roomId; ?>" 
                          data-price="<?php echo (float)($r['price'] ?? 0); ?>"
                          data-adults="<?php echo (int)($r['max_adults'] ?? 2); ?>"
                          data-kids="<?php echo (int)($r['max_children'] ?? 2); ?>"
                          data-extra="<?php echo (float)($r['extra_guest_charge'] ?? 0); ?>"
                          <?php if ($isSoldOut): ?>disabled style="color: #dc3545;"<?php endif; ?>>
                    <?php echo h($r['title']); ?> 
                    <?php if ($r['price']): ?>- ₹<?php echo number_format((float)$r['price'], 0); ?>/night<?php endif; ?>
                    <?php if ($isSoldOut): ?> - SOLD OUT<?php elseif ($available < $quantity): ?> - Available (<?php echo $available; ?>)<?php endif; ?>
                  </option>
                <?php endforeach; ?>
              </select>
              <div class="help-text">Select the room type you want to book. Sold out rooms are disabled.</div>
            </div>
          </div>

          <!-- Guest Information -->
          <div class="form-section">
            <div class="section-title">
              <i class="fa fa-user"></i>
              <span>2. Guest Information</span>
            </div>
            <div class="form-row">
              <div class="form-group">
                <label>Full Name <span class="required">*</span></label>
                <input type="text" class="form-control" name="name" placeholder="Enter your full name" required>
              </div>
              <div class="form-group">
                <label>Phone Number <span class="required">*</span></label>
                <input type="tel" class="form-control" name="phone" placeholder="10-digit mobile number" 
                       pattern="[6-9][0-9]{9}" maxlength="10" required>
                <div class="help-text">We'll contact you on this number</div>
              </div>
            </div>
            <div class="form-group">
              <label>Email (Optional)</label>
              <input type="email" class="form-control" name="email" placeholder="your.email@example.com">
              <div class="help-text">For booking confirmation</div>
            </div>
          </div>

          <!-- Number of Guests -->
          <div class="form-section">
            <div class="section-title">
              <i class="fa fa-users"></i>
              <span>3. Number of Guests</span>
            </div>
            <div class="form-group">
              <label>Adults <span class="required">*</span></label>
              <div class="guest-counter">
                <button type="button" class="counter-btn" onclick="changeGuestCount('bm_adults', -1)">-</button>
                <input type="number" class="counter-value" name="adults" id="bm_adults" value="1" min="1" required readonly>
                <button type="button" class="counter-btn" onclick="changeGuestCount('bm_adults', 1)">+</button>
              </div>
            </div>
            <div class="form-group">
              <label>Children (0-14 years)</label>
              <div class="guest-counter">
                <button type="button" class="counter-btn" onclick="changeGuestCount('bm_kids', -1)">-</button>
                <input type="number" class="counter-value" name="children_under15" id="bm_kids" value="0" min="0" readonly>
                <button type="button" class="counter-btn" onclick="changeGuestCount('bm_kids', 1)">+</button>
              </div>
            </div>
            <div class="form-group">
              <label>Children (15+ years)</label>
              <div class="guest-counter">
                <button type="button" class="counter-btn" onclick="changeGuestCount('bm_kids15', -1)">-</button>
                <input type="number" class="counter-value" name="children_15plus" id="bm_kids15" value="0" min="0" readonly>
                <button type="button" class="counter-btn" onclick="changeGuestCount('bm_kids15', 1)">+</button>
              </div>
              <div class="help-text">Children 15+ are charged as extra guests</div>
            </div>
          </div>

          <!-- Additional Message -->
          <div class="form-section">
            <div class="form-group">
              <label>Special Requests / Message (Optional)</label>
              <textarea class="form-control" name="message" rows="3" placeholder="Any special requirements, early check-in, late checkout, etc."></textarea>
            </div>
          </div>

          <!-- Payment Section -->
          <div class="payment-box">
            <div class="section-title" style="border-bottom: none; margin-bottom: 15px;">
              <i class="fa fa-credit-card"></i>
              <span>4. Payment</span>
            </div>
            
            <div class="payment-instructions">
              <h6><i class="fa fa-info-circle"></i> How to Pay:</h6>
              <ol>
                <li>Enter advance amount (minimum ₹500)</li>
                <li>Scan the QR code below or use UPI ID to make payment</li>
                <li>After payment, enter the UPI Reference Number / Transaction ID</li>
                <li>Click "Confirm Booking" to complete</li>
              </ol>
            </div>

            <div class="form-group">
              <label>Advance Amount (₹) <span class="required">*</span></label>
              <input type="number" class="form-control" name="advance_amount" id="bm_amount" 
                     min="500" step="100" value="500" required>
              <div class="help-text">Minimum ₹500 required to confirm booking</div>
            </div>

            <?php if ($upiId): ?>
            <div class="qr-wrapper">
              <h6 style="margin-bottom: 15px; color: #2c3e50;">Scan to Pay via UPI</h6>
              <img id="bm_qr" src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=<?php echo urlencode('upi://pay?pa=' . $upiId . '&pn=' . urlencode($upiName) . '&am=500&cu=INR&tn=Advance%20payment'); ?>" alt="UPI QR Code">
              <div class="upi-info">
                <strong><?php echo h($upiId); ?></strong>
                <p style="margin: 5px 0 0; color: #666; font-size: .9rem;"><?php echo h($upiName); ?></p>
              </div>
            </div>
            <?php else: ?>
            <div class="qr-wrapper">
              <p class="text-muted">UPI details not configured. Please contact us directly.</p>
            </div>
            <?php endif; ?>

            <div class="form-group">
              <label>UPI Reference / Transaction ID <span class="required">*</span></label>
              <input type="text" class="form-control" name="payment_ref" id="bm_ref" 
                     placeholder="Enter UPI reference number after payment" required>
              <div class="help-text">This is the transaction ID you receive after payment</div>
            </div>
          </div>

          <button type="submit" class="btn-submit">
            <i class="fa fa-check-circle"></i>
            Confirm Booking
          </button>

          <div class="contact-help">
            <h6><i class="fa fa-phone"></i> Need Help?</h6>
            <p style="margin: 5px 0;">
              <a href="tel:<?php echo preg_replace('/[^0-9]/', '', $phone); ?>">
                <i class="fa fa-phone"></i> <?php echo h($phone); ?>
              </a>
            </p>
            <p style="margin: 5px 0;">
              <a href="mailto:<?php echo h($email); ?>">
                <i class="fa fa-envelope"></i> <?php echo h($email); ?>
              </a>
            </p>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script>
  (function(){
    // Guest counter function
    function changeGuestCount(id, delta) {
      var input = document.getElementById(id);
      if (!input) return;
      var current = parseInt(input.value) || 0;
      var min = id === 'bm_adults' ? 1 : 0;
      var newValue = Math.max(min, current + delta);
      input.value = newValue;
    }
    window.changeGuestCount = changeGuestCount;

    // Open modal function with room selection
    function openBookingModal(btn) {
      const roomId = btn.getAttribute("data-room-id");

      // Open modal using Bootstrap
      $('#bookingModal').modal('show');

      // When modal is fully shown, set the room dropdown
      $('#bookingModal').off('shown.bs.modal').on('shown.bs.modal', function () {
        const select = document.getElementById("bm_room");
        if (select && roomId) {
          select.value = roomId;       
          select.dispatchEvent(new Event("change")); 
        }
      });
    }
    window.openBookingModal = openBookingModal;

    // Close modal function
    function closeModal() {
      if (window.jQuery && typeof jQuery.fn.modal === 'function') {
        jQuery('#bookingModal').modal('hide');
      } else {
        var el = document.getElementById('bookingModal');
        if (el) {
          el.style.display = 'none';
          el.classList.remove('show');
          document.body.classList.remove('modal-open');
          var backdrop = document.getElementById('modalBackdrop');
          if (backdrop) backdrop.remove();
        }
      }
    }
    window.closeBookingModal = closeModal;

    // Handle clicks on data-book-room elements
    document.addEventListener('click', function(e) {
      var t = e.target.closest('[data-book-room]');
      if (t) {
        e.preventDefault();
        openBookingModal(t);
      }
    });

    // Close button handlers
    var closeBtn = document.querySelector('#bookingModal .close');
    if (closeBtn) {
      closeBtn.addEventListener('click', closeModal);
    }

    // Update QR code when amount changes
    var amount = document.getElementById('bm_amount');
    var qr = document.getElementById('bm_qr');
    if (amount && qr) {
      amount.addEventListener('input', function() {
        var v = parseFloat(this.value || '500');
        if (isNaN(v) || v < 500) v = 500;
        this.value = v;
        <?php if ($upiId): ?>
        try {
          var base = 'upi://pay?pa=<?php echo rawurlencode($upiId); ?>&pn=<?php echo rawurlencode($upiName); ?>&cu=INR&tn=Advance%20payment&am=';
          qr.src = 'https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=' + encodeURIComponent(base + v.toFixed(2));
        } catch(err) {
          console.error('QR update error:', err);
        }
        <?php endif; ?>
      });
    }

    // Form validation
    var form = document.getElementById('bookingForm');
    if (form) {
      form.addEventListener('submit', function(e) {
        var roomSelected = document.getElementById('bm_room').value;
        var paymentRef = document.getElementById('bm_ref').value;

        if (!roomSelected) {
          e.preventDefault();
          alert('कृपया एक कमरा चुनें (Please select a room)');
          return false;
        }

        if (!paymentRef || paymentRef.trim() === '') {
          e.preventDefault();
          alert('कृपया भुगतान संदर्भ संख्या दर्ज करें (Please enter payment reference number)');
          return false;
        }

        // Show loading state
        var submitBtn = form.querySelector('button[type="submit"]');
        if (submitBtn) {
          submitBtn.disabled = true;
          submitBtn.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Processing...';
        }
      });
    }

    // Close on Escape key
    document.addEventListener('keydown', function(e) {
      if (e.key === 'Escape') {
        var modal = document.getElementById('bookingModal');
        if (modal && modal.classList.contains('show')) {
          closeModal();
        }
      }
    });
  })();
</script>
