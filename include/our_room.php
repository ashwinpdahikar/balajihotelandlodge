 <?php 
 require_once __DIR__ . '/functions.php'; 
 $pdo = get_pdo();
 // Fetch unique rooms fresh from database - Get first room of each title type
 $rooms = $pdo->query('SELECT r.* FROM rooms r 
                       INNER JOIN (SELECT title, MIN(id) as min_id FROM rooms WHERE status=1 GROUP BY title) as unique_rooms 
                       ON r.id = unique_rooms.min_id AND r.title = unique_rooms.title 
                       WHERE r.status=1 ORDER BY r.title LIMIT 6')->fetchAll();
 ?>
 <div class="our_room " id="rooms">
      <div class="container">
         <?php if (!isset($hide_section_title) || !$hide_section_title): ?>
         <div class="row">
            <div class="col-md-12">
               <div class="titlepage">
                  <h2>Our Rooms</h2>
                  <p>Explore our rooms and amenities</p>
               </div>
            </div>
         </div>
         <?php endif; ?>
         <div class="row">
            <?php foreach ($rooms as $r): ?>
            <?php
              // Check availability for each room - Count only approved bookings
              $roomId = (int)$r['id'];
              
              // Count approved bookings for this room - Fresh query each time, no caching
              try {
                  $approvedCount = $pdo->prepare('SELECT COUNT(*) FROM booking_inquiries WHERE room_id = ? AND status = ?');
                  $approvedCount->execute([$roomId, 'approved']);
                  $approvedBookings = (int)$approvedCount->fetchColumn();
              } catch (Exception $e) {
                  error_log("Error counting approved bookings for room {$roomId}: " . $e->getMessage());
                  $approvedBookings = 0;
              }
              
              // Get room quantity - Always fetch fresh from database to ensure accuracy
              try {
                  $qtyStmt = $pdo->prepare('SELECT quantity FROM rooms WHERE id = ?');
                  $qtyStmt->execute([$roomId]);
                  $qtyResult = $qtyStmt->fetch();
                  $quantity = ($qtyResult && isset($qtyResult['quantity']) && $qtyResult['quantity'] !== null && $qtyResult['quantity'] !== '') 
                      ? (int)$qtyResult['quantity'] 
                      : 1;
              } catch (Exception $e) {
                  error_log("Error fetching quantity for room {$roomId}: " . $e->getMessage());
                  $quantity = 1;
              }
              
              // Calculate available rooms
              $available = max(0, $quantity - $approvedBookings);
              $isSoldOut = ($available <= 0);
              
              // Ensure values are integers
              $approvedBookings = (int)$approvedBookings;
              $quantity = (int)$quantity;
              $available = (int)$available;
              
              // Force fresh calculation - no caching
              $available = max(0, $quantity - $approvedBookings);
              $isSoldOut = ($available <= 0);
            ?>
            <div class="col-md-4 col-sm-6">
               <div id="serv_hover" class="room <?php if ($isSoldOut): ?>room-sold-out<?php endif; ?>">
                  <div class="room_img">
                     <figure><img src="<?php echo h($r['image_path']); ?>" alt="#" /></figure>
                  </div>
                  <div class="bed_room">
                     <div class="room-header">
                        <h3><?php echo h($r['title']); ?></h3>
                        <?php 
                        // Debug output - Always show in HTML comment for verification
                        echo "<!-- DEBUG: Room ID=" . $roomId . " | Title=" . h($r['title']) . " | Qty=" . $quantity . " | Approved=" . $approvedBookings . " | Available=" . $available . " | SoldOut=" . ($isSoldOut ? 'YES' : 'NO') . " -->";
                        
                        // Visible debug if parameter set
                        if (isset($_GET['debug']) || isset($_GET['show_debug'])) {
                            echo "<div style='background:#fff3cd;padding:5px;margin:5px 0;font-size:11px;border:1px solid #ffc107;border-radius:4px;'>";
                            echo "<strong>Debug Info:</strong><br>";
                            echo "Room ID: " . $roomId . "<br>";
                            echo "Room Title: " . h($r['title']) . "<br>";
                            echo "Quantity: " . $quantity . "<br>";
                            echo "Approved Bookings: " . $approvedBookings . "<br>";
                            echo "Available: " . $available . "<br>";
                            echo "Sold Out: " . ($isSoldOut ? 'YES' : 'NO');
                            echo "</div>";
                        }
                        ?>
                        <?php if ($isSoldOut): ?>
                           <span class="room-badge room-badge-danger">
                              <i class="fa fa-times-circle"></i> Sold Out
                           </span>
                        <?php else: ?>
                           <span class="room-badge room-badge-success">
                              <i class="fa fa-check-circle"></i> Available (<?php echo $available; ?>)
                           </span>
                        <?php endif; ?>
                     </div>
                     <div class="room-features">
                        <?php 
                        $features = explode('\n', $r['description']);
                        foreach ($features as $feature):
                           $feature = trim($feature);
                           if (!empty($feature)):
                        ?>
                           <div class="room-feature-item">
                              <i class="fa fa-check-circle"></i>
                              <span><?php echo h($feature); ?></span>
                           </div>
                        <?php 
                           endif;
                        endforeach; 
                        ?>
                     </div>
                     <div class="room-details">
                        <div class="room-detail-row">
                           <span class="detail-label"><i class="fa fa-users"></i> Capacity:</span>
                           <span class="detail-value"><?php echo (int)($r['max_adults'] ?? 2); ?> Adults, <?php echo (int)($r['max_children'] ?? 2); ?> Children<?php if (isset($r['extra_guest_charge']) && $r['extra_guest_charge']!==null): ?><br><small>Extra 15+ guest: ₹<?php echo h(number_format((float)$r['extra_guest_charge'],2)); ?></small><?php endif; ?></span>
                        </div>
                        <?php if ($r['price'] !== null): ?>
                        <div class="room-detail-row">
                           <span class="detail-label"><i class="fa fa-rupee"></i> Rate:</span>
                           <span class="detail-value price-value">₹<?php echo h(number_format((float)$r['price'], 2)); ?><small>/night</small></span>
                        </div>
                        <?php endif; ?>
                     </div>
                     <div class="room-action">
                        <a href="#" class="btn-room-book" data-book-room data-room="<?php echo (int)$r['id']; ?>" <?php if ($isSoldOut): ?>aria-disabled="true" onclick="return false;"<?php endif; ?>>
                           <?php if ($isSoldOut): ?>
                              <i class="fa fa-ban"></i> Sold Out
                           <?php else: ?>
                              <i class="fa fa-calendar"></i> Book Now
                           <?php endif; ?>
                        </a>
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