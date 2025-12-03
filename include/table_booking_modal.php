<?php
require_once __DIR__ . '/functions.php';
start_session_secure();
?>
<style>
  .table-booking-modal .modal-dialog {
    max-width: 820px;
    margin: 1.5rem auto;
  }
  .table-booking-modal .modal-content {
    border-radius: 24px;
    border: none;
    box-shadow: 0 25px 60px rgba(11,61,46,.25);
    overflow: hidden;
  }
  .table-booking-modal .modal-header {
    background: linear-gradient(135deg, var(--jungle-bg) 0%, var(--jungle-accent-2) 100%);
    color: #fff;
    padding: 28px 32px;
    border: none;
  }
  .table-booking-modal .modal-title {
    font-size: 1.6rem;
    font-weight: 700;
    display: flex;
    align-items: center;
    gap: 12px;
  }
  .table-booking-modal .modal-body {
    background: #f7faf9;
    padding: 32px;
  }
  .table-booking-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
    gap: 20px;
    margin-bottom: 20px;
  }
  .table-booking-card {
    background: var(--brand-light);
    border-radius: 18px;
    padding: 20px 22px;
    box-shadow: 0 10px 35px rgba(11,61,46,0.08);
    border: 1px solid rgba(23,165,137,0.08);
  }
  .table-booking-card h6 {
    font-size: 1rem;
    text-transform: uppercase;
    letter-spacing: 1px;
    color: var(--jungle-text);
    font-weight: 700;
    margin-bottom: 16px;
    display: flex;
    align-items: center;
    gap: 10px;
  }
  .table-booking-card h6 i {
    font-size: 1.1rem;
    color: var(--accent);
  }
  .table-booking-modal label {
    font-weight: 600;
    color: #1f1f1f;
    margin-bottom: 6px;
    font-size: 0.95rem;
  }
  .table-booking-modal .form-control,
  .table-booking-modal select {
    border: 2px solid #d8efe4;
    border-radius: 10px;
    padding: 10px 14px;
    transition: border .2s ease, box-shadow .2s ease;
  }
  .table-booking-modal .form-control:focus,
  .table-booking-modal select:focus {
    border-color: var(--jungle-accent);
    box-shadow: 0 0 0 3px rgba(23,165,137,.2);
    outline: none;
  }
  .table-booking-modal .modal-footer {
    border-top: 1px solid #e8f0ed;
    padding: 18px 32px 28px;
    background: #f7faf9;
  }
  .table-booking-modal .btn-primary {
    background: linear-gradient(135deg,var(--jungle-bg),var(--jungle-accent));
    border: none;
    padding: 12px 32px;
    border-radius: 50px;
    font-weight: 600;
    letter-spacing: 0.5px;
    box-shadow: 0 12px 20px rgba(11,61,46,.25);
  }
  .table-booking-modal .btn-primary:hover {
    transform: translateY(-1px);
  }
  .table-booking-modal .info-strip {
    text-align: center;
    background: #eefcf4;
    border: 1px solid rgba(23,165,137,0.3);
    border-radius: 12px;
    padding: 12px 20px;
    margin-top: 15px;
    font-size: 0.9rem;
    color: var(--jungle-bg);
  }
  @media (max-width: 575px) {
    .table-booking-modal .modal-body {
      padding: 22px 18px;
    }
    .table-booking-modal .modal-header {
      padding: 22px 20px;
    }
  }

  @media (max-width: 575px) {
  .table-booking-modal .btn-primary {
    background: rgb(165, 42, 42) !important;  /* Brown */
    color: #fff !important;
    box-shadow: none !important;
  }
}

</style>

<!-- Table Booking Modal -->
<div class="modal fade table-booking-modal" id="tableBookingModal" tabindex="-1" role="dialog" aria-labelledby="tableBookingModalLabel" aria-hidden="true">
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
          <div class="table-booking-grid">
            <div class="table-booking-card">
              <h6><i class="fa fa-user-circle"></i> Guest Details</h6>
              <div class="form-group">
                <label for="customer_name">Your Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="customer_name" name="customer_name" required minlength="2" placeholder="Enter your full name">
              </div>
              <div class="form-group">
                <label for="phone">Phone Number <span class="text-danger">*</span></label>
                <input type="tel" class="form-control" id="phone" name="phone" required pattern="[0-9]{10}" placeholder="10 digit mobile number">
              </div>
              <div class="form-group mb-0">
                <label for="email">Email (Optional)</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="your@email.com">
              </div>
            </div>
            <div class="table-booking-card">
              <h6><i class="fa fa-clock-o"></i> Reservation Details</h6>
              <div class="form-group">
                <label for="booking_date">Booking Date <span class="text-danger">*</span></label>
                <input type="date" class="form-control" id="booking_date" name="booking_date" required min="<?php echo date('Y-m-d'); ?>">
              </div>
              <div class="form-group">
                <label for="booking_time">Booking Time <span class="text-danger">*</span></label>
                <input type="time" class="form-control" id="booking_time" name="booking_time" required>
              </div>
              <div class="form-group mb-0">
                <label for="guests">Number of Guests <span class="text-danger">*</span></label>
                <select class="form-control" id="guests" name="guests" required>
                  <option value="">Select guests</option>
                  <?php for ($i = 1; $i <= 20; $i++): ?>
                  <option value="<?php echo $i; ?>"><?php echo $i; ?> <?php echo $i === 1 ? 'Guest' : 'Guests'; ?></option>
                  <?php endfor; ?>
                </select>
              </div>
            </div>
          </div>

          <div class="table-booking-card">
            <h6><i class="fa fa-edit"></i> Special Requests</h6>
            <div class="form-group mb-0">
              <label for="special_requests">Add a note (optional)</label>
              <textarea class="form-control" id="special_requests" name="special_requests" rows="3" placeholder="Any special requirements, seating preferences, birthdays, etc."></textarea>
            </div>
            <div class="info-strip">
              We’ll call or message you to confirm the booking within 15 minutes.
            </div>
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

