<section class="banner_main">
         <div id="myCarousel" class="carousel slide banner" data-ride="carousel">
            <ol class="carousel-indicators">
               <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
               <li data-target="#myCarousel" data-slide-to="1"></li>
               <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
               <div class="carousel-item active">
                  <img class="first-slide" src="images/banner1.jpg" alt="First slide">
                  <div class="container">
                  </div>
               </div>
               <div class="carousel-item">
                  <img class="second-slide" src="images/banner2.jpg" alt="Second slide">
               </div>
               <div class="carousel-item">
                  <img class="third-slide" src="images/banner3.jpg" alt="Third slide">
               </div>
            </div>
            <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
            </a>
         </div>
         <div class="booking_ocline">
            <?php require_once __DIR__ . '/functions.php'; $pdo = get_pdo(); $rooms = $pdo->query("SELECT id,title,quantity FROM rooms WHERE status=1 ORDER BY title ASC")->fetchAll(); ?>
            <div class="container">
               <div class="row">
                  <div class="col-md-6">
                     <div class="book_room">
                        <h1>Quick Booking</h1>
                        <form class="book_now" method="post" action="book_room.php">
                           <input type="hidden" name="csrf" value="<?php echo h(csrf_token()); ?>">
                           <input type="text" name="website" style="display:none">
                           <div class="row">
                              <div class="col-md-12">
                                 <span>Select Room</span>
                                 <select class="online_book" name="room_id" required>
                                    <option value="">Choose a room</option>
                                    <?php foreach ($rooms as $r): ?>
                                      <option value="<?php echo (int)$r['id']; ?>"><?php echo h($r['title']); ?></option>
                                    <?php endforeach; ?>
                                 </select>
                              </div>
                              <div class="col-md-6">
                                 <span>Your Name</span>
                                 <input class="online_book" placeholder="Full name" name="name" required>
                              </div>
                              <div class="col-md-6">
                                 <span>Phone</span>
                                 <input class="online_book" placeholder="Phone" name="phone" required>
                              </div>
                              <div class="col-md-12">
                                 <div class="row">
                                   <div class="col-4"><input class="online_book" type="number" min="1" value="1" name="adults" placeholder="Adults" required></div>
                                   <div class="col-4"><input class="online_book" type="number" min="0" value="0" name="children_under15" placeholder="Children 0-14"></div>
                                   <div class="col-4"><input class="online_book" type="number" min="0" value="0" name="children_15plus" placeholder="Children 15+"></div>
                                 </div>
                              </div>
                              <div class="col-md-12">
                                 <a class="book_btn" href="#rooms" style="margin-right:10px;display:inline-block">See All Rooms</a>
                                 <a class="book_btn" href="#" data-book-room>Book Now</a>
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div style="background:#0b3d2e;color:#e8fff6;padding:6px 0">
            <marquee behavior="scroll" direction="left" scrollamount="6">
               Book your stay at Balaji Hotel And Lodge Chimur — Call +91 7350255026 or click Book Now.
            </marquee>
         </div>
      </section>