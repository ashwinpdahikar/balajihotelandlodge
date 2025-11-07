 <?php require_once __DIR__ . '/functions.php'; $rooms = list_rooms(6); $pdo = get_pdo(); ?>
 <div class="our_room" id="rooms">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="titlepage">
                  <h2>Our Room</h2>
                  <p>Explore our rooms and amenities</p>
               </div>
            </div>
         </div>
         <div class="row">
            <?php foreach ($rooms as $r): ?>
            <div class="col-md-4 col-sm-6">
               <div id="serv_hover" class="room">
                  <div class="room_img">
                     <figure><img src="<?php echo h($r['image_path']); ?>" alt="#" /></figure>
                  </div>
                  <div class="bed_room">
                     <?php
                       $bookedCount = $pdo->prepare('SELECT COUNT(*) c FROM booking_inquiries WHERE room_id = ? AND status IN (\'pending\', \'approved\')');
                       $bookedCount->execute([(int)$r['id']]);
                       $active = (int)$bookedCount->fetch()['c'];
                       $quantity = array_key_exists('quantity', $r) && $r['quantity'] !== null ? (int)$r['quantity'] : 1;
                       $available = max(0, $quantity - $active);
                     ?>
                     <h3><?php echo h($r['title']); ?><?php if ($available <= 0): ?> <span class="badge bg-danger">Booked</span><?php else: ?> <span class="badge bg-success">Available (<?php echo $available; ?>)</span><?php endif; ?></h3>
                     <p><?php echo h($r['description']); ?></p>
                     <div class="mb-2"><strong>Capacity:</strong> Adults <?php echo (int)($r['max_adults'] ?? 2); ?>, Children <?php echo (int)($r['max_children'] ?? 2); ?><?php if (isset($r['extra_guest_charge']) && $r['extra_guest_charge']!==null): ?>, Extra 15+ guest fee ₹<?php echo h(number_format((float)$r['extra_guest_charge'],2)); ?><?php endif; ?></div>
                     <?php if ($r['price'] !== null): ?><div class="mb-2"><strong>Rate:</strong> ₹<?php echo h(number_format((float)$r['price'], 2)); ?></div><?php endif; ?>
                     <form method="post" action="book_room.php" class="row g-2" style="margin-top:10px">
                        <input type="hidden" name="csrf" value="<?php echo h(csrf_token()); ?>">
                        <input type="hidden" name="room_id" value="<?php echo (int)$r['id']; ?>">
                        <input type="text" name="website" style="display:none">
                        <div class="col-12 col-sm-6"><input class="form-control" placeholder="Your Name" name="name" required></div>
                        <div class="col-12 col-sm-6"><input class="form-control" placeholder="Phone" name="phone" required></div>
                        <div class="col-12"><button class="btn btn-primary" data-book-room data-room="<?php echo (int)$r['id']; ?>" <?php if ($available<=0): ?>disabled<?php endif; ?>>Book Now</button></div>
                     </form>
                     <?php if (!empty($_SESSION['booking_msg'])): ?><div class="alert alert-info" style="margin-top:10px"><?php echo h($_SESSION['booking_msg']); unset($_SESSION['booking_msg']); ?></div><?php endif; ?>
                  </div>
               </div>
            </div>
            <?php endforeach; ?>
            <?php if (!$rooms): ?>
            <div class="col-12"><div class="text-muted">No rooms yet.</div></div>
            <?php endif; ?>
         </div>
      </div>
   </div>