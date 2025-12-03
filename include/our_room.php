<div class="our_room">
    
    <div class="container">
                <h1 style="text-align:center; margin-bottom:20px; font-size: 32px;
    font-weight: 700;
    color: #060606ff;">Our Rooms</h1> 

        <div class="row">
            

            <?php
            $rooms = [
                [
                    'id' => 1,
                    'name' => 'Deluxe AC Room',
                    'price' => '1200',
                    'image' => 'images/room1.jpg',
                    'desc' => 'A premium AC room with modern facilities.',
                    'category' => 'AC Room',
                    'available' => 'Available'
                ],
                [
                    'id' => 2,
                    'name' => 'Luxury Room',
                    'price' => '1800',
                    'image' => 'images/room2.jpg',
                    'desc' => 'Spacious luxury room with elegant interiors.',
                    'category' => 'Luxury AC Room',
                    'available' => 'Available'
                ],
                [
                    'id' => 3,
                    'name' => 'Non-AC Budget Room',
                    'price' => '700',
                    'image' => 'images/room3.jpg',
                    'desc' => 'Affordable non-AC room with all basic amenities.',
                    'category' => 'Non-AC Room',
                    'available' => 'Few Rooms Left'
                ],
                [
                    'id' => 4,
                    'name' => 'Family Suite',
                    'price' => '2500',
                    'image' => 'images/room4.jpg',
                    'desc' => 'Perfect for families with spacious room and extra comfort.',
                    'category' => 'Family Room',
                    'available' => 'Available'
                ],
                [
                    'id' => 5,
                    'name' => 'Premium AC Room',
                    'price' => '1500',
                    'image' => 'images/room5.jpg',
                    'desc' => 'A well-furnished premium AC room with king-size bed.',
                    'category' => 'Premium AC',
                    'available' => 'Not Available'
                ],
                [
                    'id' => 6,
                    'name' => 'Standard Room',
                    'price' => '900',
                    'image' => 'images/room6.jpg',
                    'desc' => 'A simple and comfortable room for budget-friendly stays.',
                    'category' => 'Standard Room',
                    'available' => 'Available'
                ],
            ];

            foreach ($rooms as $room) {
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
                            <span class="status <?php echo strtolower(str_replace(' ', '_', $room['available'])); ?>">
                                <?php echo $room['available']; ?>
                            </span>
                        </p>
                    </div>

                    <h4 class="room_price">₹<?php echo $room['price']; ?>/Night</h4>

                    <button 
                        class="book_btn"
                        data-room-id="<?php echo $room['id']; ?>"
                        data-room-name="<?php echo $room['name']; ?>"
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
.room_card{
    background:#fff;
    padding:15px;
    border-radius:10px;
    box-shadow:0 4px 10px rgba(0,0,0,0.1);
    text-align:center;
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

<script>
function openBookingModal(btn) {
    const id = btn.getAttribute("data-room-id");
    const name = btn.getAttribute("data-room-name");

    document.getElementById("room_id").value = id;
    document.getElementById("modalRoomTitle").innerText = name;

    document.getElementById("bookingModal").style.display = "flex";
}

function closeBookingModal() {
    document.getElementById("bookingModal").style.display = "none";
}
</script>
