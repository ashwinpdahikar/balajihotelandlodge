<!-- Responsive Banner + Booking Section (Bootstrap 4/5 Compatible) -->
<section class="banner_main">
  <div id="myCarousel" class="carousel slide banner" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="images/banner1.jpg" alt="Slide 1" />
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="images/talobaimage1.jpeg" alt="Slide 2" />
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="images/banner3.jpg" alt="Slide 3" />
      </div>
    </div>

    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

  <!-- Booking Box -->
  <div class="booking_ocline py-4">
    <?php 
    require_once __DIR__ . '/functions.php';
    start_session_secure(); // Ensure session is started for CSRF token
    $pdo = get_pdo(); 
    // Get unique rooms - Use MIN(id) to get first room of each title type
    $rooms = $pdo->query("SELECT MIN(id) as id, title FROM rooms WHERE status=1 GROUP BY title ORDER BY title ASC")->fetchAll(); 
    ?>

    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
          <div class="book_room p-4 shadow-lg rounded" style="background:#ffffffd9; backdrop-filter:blur(5px);">
            <h1 class="text-center mb-3" style="font-size:28px;font-weight:700;color:#0b3d2e;">Quick Booking</h1>

            <?php 
            start_session_secure();
            if (!empty($_SESSION['booking_msg'])): 
                $msgType = $_SESSION['booking_msg_type'] ?? 'info';
            ?>
            <div id="bookingAlert" class="alert alert-<?php echo $msgType === 'success' ? 'success' : ($msgType === 'error' ? 'danger' : 'info'); ?> alert-dismissible fade show" role="alert" style="margin-bottom:20px;transition:opacity 0.5s ease;">
              <strong><?php echo $msgType === 'success' ? '✓' : ($msgType === 'error' ? '✗' : 'ℹ'); ?></strong>
              <?php echo h($_SESSION['booking_msg']); ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="document.getElementById('bookingAlert').remove();">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <script>
            (function() {
              var alertDiv = document.getElementById('bookingAlert');
              if (alertDiv) {
                // Auto-hide after 8 seconds
                setTimeout(function() {
                  alertDiv.style.opacity = '0';
                  setTimeout(function() {
                    alertDiv.style.display = 'none';
                    alertDiv.remove();
                  }, 500); // Wait for fade transition
                }, 8000); // 8 seconds
              }
            })();
            </script>
            <?php 
            unset($_SESSION['booking_msg']);
            unset($_SESSION['booking_msg_type']);
            endif; 
            ?>

            <form class="book_now" method="post" action="book_room.php">
              <input type="hidden" name="csrf" value="<?php echo h(csrf_token()); ?>">
              <input type="text" name="website" style="display:none">

              <div class="form-group mb-3">
                <label>Select Room<span class="required-star">*</span></label>
                <select class="form-control" name="room_id" id="banner_room_id" required>
                  <option value="">Choose a room</option>
                  <?php 
                  $processedRoomIds = []; // Track processed room IDs to avoid duplicates
                  foreach ($rooms as $r): 
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
                    // Get room quantity (default to 1 if not set)
                    $roomQty = $pdo->prepare('SELECT quantity FROM rooms WHERE id = ?');
                    $roomQty->execute([$roomId]);
                    $qtyRow = $roomQty->fetch();
                    $quantity = ($qtyRow && isset($qtyRow['quantity']) && $qtyRow['quantity'] !== null) ? (int)$qtyRow['quantity'] : 1;
                    $available = max(0, $quantity - $approvedBookings);
                    $isSoldOut = $available <= 0;
                  ?>
                    <option value="<?php echo $roomId; ?>" <?php if ($isSoldOut): ?>disabled style="color: #dc3545;"<?php endif; ?>>
                      <?php echo h($r['title']); ?>
                      <?php if ($isSoldOut): ?>
                        - SOLD OUT
                      <?php elseif ($available < $quantity): ?>
                        - Available (<?php echo $available; ?>)
                      <?php endif; ?>
                    </option>
                  <?php endforeach; ?>
                </select>
                <div class="error-message" id="error_room" style="display:none;"></div>
              </div>

              <div class="row">
                <div class="col-md-6 mb-3">
                  <label>Your Name<span class="required-star">*</span></label>
                  <input class="form-control" type="text" placeholder="Enter your full name" name="name" id="banner_name" required minlength="2" maxlength="100" />
                  <div class="error-message" id="error_name" style="display:none;"></div>
                </div>
                <div class="col-md-6 mb-3">
                  <label>Phone Number<span class="required-star">*</span></label>
                  <input class="form-control" type="tel" placeholder="10-digit mobile number" name="phone" id="banner_phone" required pattern="[6-9][0-9]{9}" maxlength="10" />
                  <div class="error-message" id="error_phone" style="display:none;"></div>
                  <small class="help-text">We'll contact you on this number</small>
                </div>
              </div>

              <div class="row mb-3">
                <div class="col-4">
                  <label>Adults</label>
                  <input class="form-control" type="number" min="1" max="10" value="1" name="adults" id="banner_adults" placeholder="Adults" required>
                </div>
                <div class="col-4">
                  <label>Children (0-14)</label>
                  <input class="form-control" type="number" min="0" max="10" value="0" name="children_under15" id="banner_kids" placeholder="0-14 years">
                </div>
                <div class="col-4">
                  <label>Children (15+)</label>
                  <input class="form-control" type="number" min="0" max="10" value="0" name="children_15plus" id="banner_kids15" placeholder="15+ years">
                </div>
              </div>

              <div class="text-center">
                <a class="btn btn-outline-success mr-2 mb-md-0 mb-2 d-md-inline d-block" href="#rooms">See All Rooms</a>
                <button type="submit" class="btn btn-success" id="banner_submit_btn">Book Now</button>
              </div>
            </form>

            <script>
            (function() {
              var form = document.querySelector('.book_now');
              if (!form) return;

              // Phone validation
              var phoneInput = document.getElementById('banner_phone');
              var phoneError = document.getElementById('error_phone');
              
              if (phoneInput) {
                phoneInput.addEventListener('input', function() {
                  var value = this.value.replace(/\D/g, '');
                  this.value = value;
                  
                  if (value.length > 0 && !/^[6-9]/.test(value)) {
                    phoneError.textContent = 'Phone number must start with 6, 7, 8, or 9';
                    phoneError.style.display = 'block';
                    this.setCustomValidity('Invalid phone number');
                  } else if (value.length > 0 && value.length !== 10) {
                    phoneError.textContent = 'Phone number must be 10 digits';
                    phoneError.style.display = 'block';
                    this.setCustomValidity('Phone number must be 10 digits');
                  } else {
                    phoneError.style.display = 'none';
                    this.setCustomValidity('');
                  }
                });

                phoneInput.addEventListener('blur', function() {
                  if (this.value.length > 0 && this.value.length !== 10) {
                    phoneError.textContent = 'Phone number must be 10 digits';
                    phoneError.style.display = 'block';
                  }
                });
              }

              // Name validation
              var nameInput = document.getElementById('banner_name');
              var nameError = document.getElementById('error_name');
              
              if (nameInput) {
                nameInput.addEventListener('input', function() {
                  var value = this.value.trim();
                  if (value.length > 0 && value.length < 2) {
                    nameError.textContent = 'Name must be at least 2 characters';
                    nameError.style.display = 'block';
                  } else if (!/^[a-zA-Z\s]+$/.test(value) && value.length > 0) {
                    nameError.textContent = 'Name should contain only letters';
                    nameError.style.display = 'block';
                  } else {
                    nameError.style.display = 'none';
                  }
                });
              }

              // Form submission validation
              form.addEventListener('submit', function(e) {
                var isValid = true;
                var roomId = document.getElementById('banner_room_id');
                var name = document.getElementById('banner_name');
                var phone = document.getElementById('banner_phone');
                var roomError = document.getElementById('error_room');

                // Room validation
                if (!roomId || !roomId.value) {
                  if (roomError) {
                    roomError.textContent = 'Please select a room';
                    roomError.style.display = 'block';
                  }
                  isValid = false;
                } else {
                  if (roomError) roomError.style.display = 'none';
                }

                // Phone validation
                if (phone && phone.value) {
                  var phoneValue = phone.value.replace(/\D/g, '');
                  if (phoneValue.length !== 10 || !/^[6-9]/.test(phoneValue)) {
                    if (phoneError) {
                      phoneError.textContent = 'Please enter a valid 10-digit mobile number';
                      phoneError.style.display = 'block';
                    }
                    isValid = false;
                  }
                }

                if (!isValid) {
                  e.preventDefault();
                  // Scroll to first error
                  var firstError = form.querySelector('.error-message[style*="block"]');
                  if (firstError) {
                    firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                  }
                  return false;
                }

                // Show loading state
                var submitBtn = document.getElementById('banner_submit_btn');
                if (submitBtn) {
                  submitBtn.disabled = true;
                  submitBtn.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Processing...';
                }
              });
            })();
            </script>

          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Marquee -->
  <div style="background:#0b3d2e;color:#e8fff6;padding:6px 0">
    <marquee behavior="scroll" direction="left" scrollamount="6">
      Book your stay at Balaji Hotel And Lodge Chimur — Call +91 7350255026 or click Book Now.
    </marquee>
  </div>
</section>

<style>
  .banner_main img { object-fit: cover; height: 75vh; }
  @media(max-width:768px){
    .banner_main img { height: 45vh; }
    .book_room { margin-top: 20px; }
  }
  /* Carousel Indicators Styling */
  .carousel-indicators li {
    width: 12px;
    height: 12px;
    border-radius: 50%;
    background-color: #ffffff;
    opacity: 0.6;
  }
  .carousel-indicators .active {
    background-color: #0b3d2e;
    opacity: 1;
    width: 14px;
    height: 14px;
  }

  /* Better Slider Transition */
  .carousel-item {
    transition: transform 1.1s ease-in-out, opacity 1s ease-in-out;
  }

  /* Enhanced Booking Card */
  .book_room {
    border-radius: 18px;
    box-shadow: 0 8px 25px rgba(0,0,0,0.18);
    background: #ffffffcc;
  }

  .book_room h1 {
    letter-spacing: 0.5px;
  }

  /* Form Labels Styling */
  .book_room label {
    font-weight: 600;
    color: #333;
    margin-bottom: 6px;
    display: block;
    font-size: 0.95rem;
    white-space: nowrap;
    line-height: 1.4;
  }

  .book_room .required-star {
    color: #e74c3c;
    font-weight: 700;
    margin-left: 3px;
    display: inline-block;
  }

  .book_room .form-control {
    width: 100%;
    padding: 5px 15px;
    border: 2px solid #e0e0e0;
    border-radius: 8px;
    font-size: 0.95rem;
    transition: all 0.3s ease;
  }

  .book_room .form-control:focus {
    outline: none;
    border-color: #0b3d2e;
    box-shadow: 0 0 0 3px rgba(11, 61, 46, 0.1);
  }

  .book_room .form-control:invalid:not(:placeholder-shown) {
    border-color: #e74c3c;
  }

  .book_room .form-control:valid:not(:placeholder-shown) {
    border-color: #27ae60;
  }

  .book_room .error-message {
    color: #e74c3c;
    font-size: 0.85rem;
    margin-top: 5px;
    display: block;
  }

  .book_room .help-text {
    color: #666;
    font-size: 0.85rem;
    margin-top: 5px;
    display: block;
    font-style: italic;
  }

  /* Mobile Adjustments */
  @media(max-width:768px){
    .banner_main img { height: 40vh; }
    .book_room { margin-top: 10px; padding: 20px; }
    .carousel-indicators { bottom: 10px; }
    .book_room label {
      font-size: 0.9rem;
      margin-bottom: 5px;
    }
    .book_room .form-control {
      padding: 8px 12px;
      font-size: 0.9rem;
    }
    .book_room .row .col-4 {
      margin-bottom: 15px;
    }
    .book_room .error-message,
    .book_room .help-text {
      font-size: 0.8rem;
    }
  }
</style>
