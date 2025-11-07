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
                    <div class="d-grid" style="margin-top:10px">
                       <a href="#" class="btn btn-primary" data-book-room data-room="<?php echo (int)$r['id']; ?>" <?php if ($available<=0): ?>aria-disabled="true" style="pointer-events:none;opacity:.6"<?php endif; ?>>Book Now</a>
                    </div>
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