<?php 
require_once __DIR__ . '/functions.php'; 
$upiId = get_setting('upi_id',''); 
$upiName = get_setting('upi_name',''); 
$phone = get_setting('phone', '+91 7350255026');
$email = get_setting('email', 'balajirestaurantandlodge@gmail.com');
?>
<style>
/* Booking Modal Styles */
#tableBookingModal .modal-dialog {
  max-width: 900px;
  margin: 30px auto;
}
#tableBookingModal .modal-content {
  border-radius: 20px;
  border: none;
  box-shadow: 0 20px 60px rgba(0,0,0,.3);
  overflow: hidden;
  margin: 65px 0;
}
#tableBookingModal .modal-header {
  background: linear-gradient(135deg, #d35400 0%, #ff6b35 100%);
  color: #fff;
  padding: 25px 30px;
  border-bottom: none;
  position: relative;
}
#tableBookingModal .modal-header::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  height: 4px;
  background: rgba(255,255,255,.2);
}
#tableBookingModal .modal-title {
  font-size: 1.8rem;
  font-weight: 700;
  margin: 0;
  display: flex;
  align-items: center;
  gap: 12px;
}
#tableBookingModal .modal-title i {
  font-size: 1.5rem;
}
#tableBookingModal .close {
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
#tableBookingModal .close:hover {
  opacity: 1;
  background: rgba(255,255,255,.2);
  transform: rotate(90deg);
}
#tableBookingModal .modal-body {
  padding: 35px;
  background: #f8f9fa;
  max-height: calc(100vh - 200px);
  overflow-y: auto;
  height: 80% !important;
}
#tableBookingModal .form-section {
  background: #fff;
  padding: 25px;
  border-radius: 15px;
  box-shadow: 0 4px 15px rgba(0,0,0,.05);
}
#tableBookingModal .section-title {
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
#tableBookingModal .section-title i {
  color: #d35400;
  font-size: 1.1rem;
}
#tableBookingModal .form-group {
  margin-bottom: 20px;
}
#tableBookingModal .form-group:last-child {
  margin-bottom: 0;
}
#tableBookingModal label {
  font-weight: 600;
  color: #333;
  margin-bottom: 8px;
  display: block;
  font-size: .95rem;
}
#tableBookingModal label .required {
  color: #e74c3c;
  margin-left: 3px;
}
#tableBookingModal .form-control {
  width: 100%;
  padding: 5px 15px;
  border: 2px solid #e0e0e0;
  border-radius: 10px;
  font-size: 1rem;
  transition: all .3s;
  background: #fff;
}
#tableBookingModal .form-control:focus {
  outline: none;
  border-color: #d35400;
  box-shadow: 0 0 0 3px rgba(211,84,0,.1);
}
#tableBookingModal .form-row {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 15px;
}
#tableBookingModal select.form-control {
  cursor: pointer;
  appearance: none;
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%23333' d='M6 9L1 4h10z'/%3E%3C/svg%3E");
  background-repeat: no-repeat;
  background-position: right 16px center;
  padding-right: 40px;
}
#tableBookingModal .guest-counter {
  display: flex;
  align-items: center;
  gap: 15px;
  background: #f8f9fa;
  padding: 12px 20px;
  border-radius: 10px;
  border: 2px solid #e0e0e0;
}
#tableBookingModal .counter-btn {
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
#tableBookingModal .counter-btn:hover {
  background: #d35400;
  color: #fff;
  transform: scale(1.1);
}
#tableBookingModal .counter-value {
  font-size: 1.2rem;
  font-weight: 700;
  min-width: 50px;
  text-align: center;
  border: none;
  background: transparent;
}
#tableBookingModal .payment-box {
  background: linear-gradient(135deg, #fff5f0 0%, #ffe8d6 100%);
  border: 2px dashed #d35400;
  border-radius: 15px;
  padding: 25px;
  margin-top: 20px;
}
#tableBookingModal .payment-instructions {
  background: #fff;
  padding: 20px;
  border-radius: 10px;
  margin-bottom: 20px;
  border-left: 4px solid #d35400;
}
#tableBookingModal .payment-instructions h6 {
  color: #2c3e50;
  font-weight: 700;
  margin-bottom: 12px;
  display: flex;
  align-items: center;
  gap: 8px;
}
#tableBookingModal .payment-instructions ol {
  margin: 0;
  padding-left: 20px;
  color: #555;
}
#tableBookingModal .payment-instructions li {
  margin-bottom: 8px;
  line-height: 1.6;
}
#tableBookingModal .qr-wrapper {
  text-align: center;
  background: #fff;
  padding: 20px;
  border-radius: 10px;
  margin-bottom: 20px;
  border: 2px solid #d35400;
}
#tableBookingModal .qr-wrapper img {
  max-width: 200px;
  width: 100%;
  border: 3px solid #d35400;
  border-radius: 10px;
  padding: 10px;
  background: #fff;
  margin-bottom: 15px;
}
#tableBookingModal .upi-info {
  text-align: center;
}
#tableBookingModal .upi-info strong {
  display: block;
  font-size: 1.1rem;
  color: #d35400;
  margin-top: 10px;
  word-break: break-all;
}
#tableBookingModal .help-text {
  font-size: .85rem;
  color: #666;
  margin-top: 5px;
  font-style: italic;
}
#tableBookingModal .btn-submit {
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
#tableBookingModal .btn-submit:hover {
  transform: translateY(-2px);
  box-shadow: 0 6px 20px rgba(211,84,0,.4);
}
#tableBookingModal .btn-submit:active {
  transform: translateY(0);
}
#tableBookingModal .contact-help {
  background: #f8f9fa;
  padding: 20px;
  border-radius: 10px;
  margin-top: 20px;
  text-align: center;
  border: 2px solid #e0e0e0;
}
#tableBookingModal .contact-help h6 {
  color: #2c3e50;
  margin-bottom: 10px;
  font-weight: 700;
}
#tableBookingModal .contact-help a {
  color: #d35400;
  text-decoration: none;
  font-weight: 600;
  display: inline-block;
  margin: 5px 10px;
}
#tableBookingModal .contact-help a:hover {
  text-decoration: underline;
}
/* Responsive */
@media (max-width: 768px) {
  #tableBookingModal .modal-dialog {
    margin: 10px;
    max-width: calc(100% - 20px);
  }
  #tableBookingModal .modal-body {
    padding: 20px;
    max-height: calc(100vh - 100px);
  }
  #tableBookingModal .form-row {
    grid-template-columns: 1fr;
  }
  #tableBookingModal .modal-title {
    font-size: 1.2rem;
  }
  #tableBookingModal .section-title {
    font-size: 1.1rem;
  }
  #tableBookingModal .qr-wrapper img {
    max-width: 150px;
  }
}
@media (max-width: 480px) {
  #tableBookingModal .modal-header {
    padding: 20px;
  }
  #tableBookingModal .modal-body {
    padding: 15px;
  }
  #tableBookingModal .form-section {
    padding: 15px;
  }
  #tableBookingModal .payment-box {
    padding: 15px;
  }
}
</style>

<div class="modal fade" id="tableBookingModal" tabindex="-1" role="dialog" aria-labelledby="tableBookingModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tableBookingModalLabel">
          <i class="fa fa-calendar-check-o"></i>
          Book Table Now
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="tableBookingForm" method="post" action="book_table.php">
          <input type="hidden" name="csrf" value="<?php echo h(csrf_token()); ?>">
          <input type="hidden" name="website" style="display:none">

          <!-- Guest Information -->
          <div class="form-section">
            <div class="section-title">
              <i class="fa fa-user"></i>
              <span>Guest Information</span>
            </div>
            <div class="form-row">
              <div class="form-group">
                <label>Full Name <span class="required">*</span></label>
                <input type="text" class="form-control" name="customer_name" placeholder="Enter your full name" required>
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

          <!-- Reservation Details -->
          <div class="form-section">
            <div class="section-title">
              <i class="fa fa-clock-o"></i>
              <span>Reservation Details</span>
            </div>
            <div class="form-row">
              <div class="form-group">
                <label>Booking Date <span class="required">*</span></label>
                <input type="date" class="form-control" name="booking_date" required min="<?php echo date('Y-m-d'); ?>">
              </div>
              <div class="form-group">
                <label>Booking Time <span class="required">*</span></label>
                <input type="time" class="form-control" name="booking_time" required>
              </div>
            </div>
            <div class="form-group">
              <label for="guests">Number of Guests <span class="required">*</span></label>
              <input type="number" class="form-control" name="guests" id="guests" min="1" max="20" required placeholder="Enter number of guests">
            </div>
          </div>

          <!-- Special Requests -->
          <div class="form-section">
            <div class="form-group">
                <label>Special Requests / Message (Optional)</label>
                <textarea class="form-control" name="special_requests" rows="3" placeholder="Any special requirements, seating preferences, birthdays, etc."></textarea>
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

    // Open modal function (no room selection)
    function opentableBookingModal(btn) {
      $('#tableBookingModal').modal('show');
    }
    window.opentableBookingModal = opentableBookingModal;

    // Close modal function
    function closeModal() {
      if (window.jQuery && typeof jQuery.fn.modal === 'function') {
        jQuery('#tableBookingModal').modal('hide');
      } else {
        var el = document.getElementById('tableBookingModal');
        if (el) {
          el.style.display = 'none';
          el.classList.remove('show');
          document.body.classList.remove('modal-open');
          var backdrop = document.getElementById('modalBackdrop');
          if (backdrop) backdrop.remove();
        }
      }
    }
    window.closetableBookingModal = closeModal;

    // Handle clicks on data-book-table elements
    document.addEventListener('click', function(e) {
      var t = e.target.closest('[data-book-table]');
      if (t) {
        e.preventDefault();
        opentableBookingModal(t);
      }
    });

    // Close button handlers
    var closeBtn = document.querySelector('#tableBookingModal .close');
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

    // Form validation and submission - Only for table booking form
    var form = document.getElementById('tableBookingForm');
    if (form) {
      form.addEventListener('submit', function(e) {
        // Make sure this is the table booking form, not room booking form
        if (!form || form.id !== 'tableBookingForm') {
          return; // Don't interfere with other forms
        }
        
        // Validate all required fields - scoped to this form only
        var customerName = form.querySelector('input[name="customer_name"]');
        var phoneInput = form.querySelector('input[name="phone"]');
        var bookingDate = form.querySelector('input[name="booking_date"]');
        var bookingTime = form.querySelector('input[name="booking_time"]');
        var guests = form.querySelector('input[name="guests"]');
        
        var isValid = true;
        var phoneValue = phoneInput ? phoneInput.value.trim() : '';
        var phonePattern = /^[6-9][0-9]{9}$/;
        var errorMsg = document.getElementById('phone-error-msg');

        // Validate customer name
        if (!customerName || !customerName.value.trim() || customerName.value.trim().length < 2) {
          isValid = false;
          alert('Please enter a valid name (minimum 2 characters)');
          if (customerName) customerName.focus();
          e.preventDefault();
          return false;
        }

        // Validate phone number
        if (!phonePattern.test(phoneValue)) {
          e.preventDefault();
          isValid = false;
          if (errorMsg && errorMsg.textContent) {
            phoneInput.focus();
            return false;
          }
          alert('सिर्फ सही 10-digit मोबाइल नंबर डालें (Only valid 10-digit mobile number starting with 6-9 is allowed)');
          if (phoneInput) phoneInput.focus();
          return false;
        }

        // Validate booking date
        if (!bookingDate || !bookingDate.value) {
          isValid = false;
          alert('Please select a booking date');
          if (bookingDate) bookingDate.focus();
          e.preventDefault();
          return false;
        }

        // Validate booking time
        if (!bookingTime || !bookingTime.value) {
          isValid = false;
          alert('Please select a booking time');
          if (bookingTime) bookingTime.focus();
          e.preventDefault();
          return false;
        }

        // Validate guests
        var guestsValue = parseInt(guests ? guests.value : 0);
        if (!guests || !guests.value || guestsValue < 1 || guestsValue > 20) {
          isValid = false;
          alert('Number of guests must be between 1 and 20');
          if (guests) guests.focus();
          e.preventDefault();
          return false;
        }

        if (!isValid) {
          e.preventDefault();
          return false;
        }

        // Show loading state
        var submitBtn = form.querySelector('button[type="submit"]');
        if (submitBtn) {
          submitBtn.disabled = true;
          submitBtn.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Processing...';
        }

        // Form will submit normally - backend will handle response
      });
    }

    // Prevent non-digit input in phone field - scoped to table booking form only
    var form = document.getElementById('tableBookingForm');
    var phoneInput = form ? form.querySelector('input[name="phone"]') : null;
    if (phoneInput) {
      // Only create error message element if not already present
      var errorMsg = document.getElementById('phone-error-msg');
      if (!errorMsg) {
        errorMsg = document.createElement('div');
        errorMsg.style.color = 'red';
        errorMsg.style.fontSize = '0.95em';
        errorMsg.style.marginTop = '4px';
        errorMsg.id = 'phone-error-msg';
        phoneInput.parentNode.appendChild(errorMsg);
      }

      phoneInput.addEventListener('input', function(e) {
        var cleaned = this.value.replace(/[^0-9]/g, '');
        if (this.value !== cleaned) {
          this.value = cleaned;
        }
        var val = this.value;
        if (val.length > 0 && !/^[6-9]/.test(val)) {
          errorMsg.textContent = 'Phone number should start from 6, 7, 8, or 9 only';
        } else if (val.length === 10 && !/^[6-9][0-9]{9}$/.test(val)) {
          errorMsg.textContent = 'Enter a valid 10-digit mobile number starting with 6-9';
        } else {
          errorMsg.textContent = '';
        }
      });
    }

    // Close on Escape key
    document.addEventListener('keydown', function(e) {
      if (e.key === 'Escape') {
        var modal = document.getElementById('tableBookingModal');
        if (modal && modal.classList.contains('show')) {
          closeModal();
        }
      }
    });
  })();
</script>
