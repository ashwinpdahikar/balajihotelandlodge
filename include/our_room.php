<div class="our_room">
    
    <div class="container">
                <h1 style="text-align:center; margin-bottom:20px; font-size: 32px;
    font-weight: 700;
    color: #060606ff;">Our Rooms</h1> 

        <div class="row">
            

            <?php
            require_once __DIR__ . '/functions.php';
            $pdo = get_pdo();
            
            // Get unique rooms - Same query as booking modal
            $dbRooms = $pdo->query('SELECT r.* FROM rooms r 
                                  INNER JOIN (SELECT title, MIN(id) as min_id FROM rooms WHERE status=1 GROUP BY title) as unique_rooms 
                                  ON r.id = unique_rooms.min_id AND r.title = unique_rooms.title 
                                  WHERE r.status=1 ORDER BY r.title')->fetchAll();

            foreach ($dbRooms as $dbRoom) {
                $roomId = (int)$dbRoom['id'];
                
                // Check availability for each room based on approved bookings
                $approvedCount = $pdo->prepare('SELECT COUNT(*) FROM booking_inquiries WHERE room_id = ? AND status = ?');
                $approvedCount->execute([$roomId, 'approved']);
                $approvedBookings = (int)$approvedCount->fetchColumn();
                
                // Get room quantity (default to 1 if not set)
                $quantity = isset($dbRoom['quantity']) && $dbRoom['quantity'] !== null ? (int)$dbRoom['quantity'] : 1;
                $available = max(0, $quantity - $approvedBookings);
                
                // Determine status text and CSS class dynamically
                if ($available <= 0) {
                    $statusText = 'Not Available';
                    $statusClass = 'not_available';
                } elseif ($available < $quantity && $available <= 2) {
                    $statusText = 'Few Rooms Left';
                    $statusClass = 'few_rooms_left';
                } else {
                    $statusText = 'Available';
                    $statusClass = 'available';
                }
                
                // Determine price based on AC/Non-AC
                $roomTitle = strtolower($dbRoom['title']);
                if (strpos($roomTitle, 'non-ac') !== false || strpos($roomTitle, 'non ac') !== false) {
                    $roomPrice = '1200'; // Non-AC rooms: ₹1200
                } else {
                    $roomPrice = '1500'; // AC rooms: ₹1500
                }
                
                // Get room image, use default if not set
                $roomImage = !empty($dbRoom['image_path']) ? $dbRoom['image_path'] : 'images/room1.jpg';
                
                // Use simple description based on room type (original style)
                if (strpos($roomTitle, 'non-ac') !== false || strpos($roomTitle, 'non ac') !== false) {
                    $roomDesc = 'Affordable non-AC room with all basic amenities.';
                } elseif (strpos($roomTitle, 'family') !== false) {
                    $roomDesc = 'Perfect for families with spacious room and extra comfort.';
                } elseif (strpos($roomTitle, 'deluxe') !== false || strpos($roomTitle, 'premium') !== false) {
                    $roomDesc = 'A premium AC room with modern facilities.';
                } elseif (strpos($roomTitle, 'luxury') !== false) {
                    $roomDesc = 'Spacious luxury room with elegant interiors.';
                } else {
                    $roomDesc = 'Comfortable room with modern amenities.';
                }
                
                // Determine category from title
                if (strpos($roomTitle, 'non-ac') !== false || strpos($roomTitle, 'non ac') !== false) {
                    $roomCategory = 'Non-AC Room';
                } elseif (strpos($roomTitle, 'ac') !== false) {
                    $roomCategory = 'AC Room';
                } else {
                    $roomCategory = $dbRoom['title'];
                }
                
                // Format room data for card
                $room = [
                    'id' => $roomId,
                    'name' => $dbRoom['title'],
                    'price' => $roomPrice,
                    'image' => $roomImage,
                    'desc' => $roomDesc,
                    'category' => $roomCategory,
                    'available' => $statusText,
                    'statusClass' => $statusClass
                ];
            ?>

            <div class="col-md-4 col-sm-6 mb-4">
                <div class="room_card">
                    <img src="<?php echo $room['image']; ?>" class="img-fluid room_img" alt="">

                    <h3 class="room_title"><?php echo $room['name']; ?></h3>

                    <p class="room_desc"><?php echo $room['desc']; ?></p>

                    <div class="room_details">
                        <p><strong>Category:</strong> <?php echo $room['category']; ?></p>
                        <p>
                            <strong>Status:</strong> 
                            <span class="status <?php echo $room['statusClass']; ?>">
                                <?php echo $room['available']; ?>
                            </span>
                        </p>
                    </div>

                    <h4 class="room_price">₹<?php echo $room['price']; ?>/Night</h4>

                   <button 
    class="book_btn"
    data-room-id="<?php echo $room['id']; ?>"
    onclick="openBookingModal(this)"
>
    Book Now
</button>

                </div>
            </div>

            <?php } ?>

        </div>
    </div>
</div>

<style>
    .our_room .row {
        display: flex;
        flex-wrap: wrap;
    }
    .our_room .col-md-4,
    .our_room .col-sm-6 {
        display: flex;
        flex-direction: column;
    }
    .room_card{
        background:#fff;
        padding:15px;
        border-radius:10px;
        box-shadow:0 4px 10px rgba(0,0,0,0.1);
        text-align:center;
        display: flex;
        flex-direction: column;
        height: 100%;
    }
    .room_img{
        width:100%;
        height:230px;
        object-fit:cover;
        border-radius:10px;
    }
    .room_title{
        font-size:20px;
        margin-top:10px;
        font-weight:600;
    }
    .room_desc{
        font-size:14px;
        color:#555;
    }
    .room_details{
        flex-grow: 1;
    }
    .room_details p{
        margin:5px 0;
        font-size:14px;
        color:#444;
    }
    .room_price{
        font-size:18px;
        font-weight:bold;
        margin-top:5px;
    }

    .book_btn{
        padding:10px 18px;
        background:#8e3a02; 
        color:#fff;
        border:none;
        border-radius:5px;
        cursor:pointer;
        margin-top:10px;
        transition:0.3s;
        margin-top: auto;
    }
    .book_btn:hover{
        background:#8A5F45; 
    }

    /* Status Colors */
    .status.available { color: green; font-weight: bold; }
    .status.not_available { color: red; font-weight: bold; }
    .status.few_rooms_left { color: #d08800; font-weight: bold; }
</style>

<?php include 'booking_modal.php'; ?>

<!-- <script>
    function openBookingModal(btn) {
        const roomId = btn.getAttribute("data-room-id");

        // Bootstrap 4 modal open
        $('#bookingModal').modal('show');

        // Auto-select room after modal is fully shown
        $('#bookingModal').on('shown.bs.modal', function () {
            const select = document.getElementById("bm_room");
            if (select) {
                select.value = roomId;
                select.dispatchEvent(new Event("change"));
            }
        });
    }
    function closeBookingModal() {
        if (window.jQuery && typeof jQuery.fn.modal === "function") {
            jQuery("#bookingModal").modal("hide");
        } else {
            document.getElementById("bookingModal").style.display = "none";
        }
    }
</script> -->

