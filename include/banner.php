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
    <?php require_once __DIR__ . '/functions.php'; $pdo = get_pdo(); $rooms = $pdo->query("SELECT id,title FROM rooms WHERE status=1 ORDER BY title ASC")->fetchAll(); ?>

    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
          <div class="book_room p-4 shadow-lg rounded" style="background:#ffffffd9; backdrop-filter:blur(5px);">
            <h1 class="text-center mb-3" style="font-size:28px;font-weight:700;color:#0b3d2e;">Quick Booking</h1>

            <form class="book_now" method="post" action="book_room.php">
              <input type="hidden" name="csrf" value="<?php echo h(csrf_token()); ?>">
              <input type="text" name="website" style="display:none">

              <div class="form-group mb-3">
                <label>Select Room</label>
                <select class="form-control" name="room_id" required>
                  <option value="">Choose a room</option>
                  <?php foreach ($rooms as $r): ?>
                    <option value="<?php echo (int)$r['id']; ?>"><?php echo h($r['title']); ?></option>
                  <?php endforeach; ?>
                </select>
              </div>

              <div class="row">
                <div class="col-md-6 mb-3">
                  <label>Your Name</label>
                  <input class="form-control" placeholder="Full name" name="name" required />
                </div>
                <div class="col-md-6 mb-3">
                  <label>Phone</label>
                  <input class="form-control" placeholder="Phone" name="phone" required />
                </div>
              </div>

              <div class="row mb-3">
                <div class="col-4"><input class="form-control" type="number" min="1" value="1" name="adults" placeholder="Adults" required></div>
                <div class="col-4"><input class="form-control" type="number" min="0" value="0" name="children_under15" placeholder="Child 0–14"></div>
                <div class="col-4"><input class="form-control" type="number" min="0" value="0" name="children_15plus" placeholder="Child 15+"></div>
              </div>

              <div class="text-center">
                <a class="btn btn-outline-success mr-2 mb-md-0 mb-2 d-md-inline d-block" href="#rooms">See All Rooms</a>
                <button type="submit" class="btn btn-success">Book Now</button>
              </div>
            </form>

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

  /* Mobile Adjustments */
  @media(max-width:768px){
    .banner_main img { height: 40vh; }
    .book_room { margin-top: 10px; padding: 20px; }
    .carousel-indicators { bottom: 10px; }
  }
</style>
