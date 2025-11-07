<?php require_once __DIR__ . '/functions.php'; $pdo = get_pdo(); $rooms = $pdo->query('SELECT id,title,price FROM rooms WHERE status=1 ORDER BY title')->fetchAll(); $upiId = get_setting('upi_id',''); $upiName = get_setting('upi_name',''); ?>
<div class="modal fade" id="bookingModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Book Room</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <form id="bookingForm" method="post" action="book_room.php">
          <input type="hidden" name="csrf" value="<?php echo h(csrf_token()); ?>">
          <input type="hidden" name="website">
          <div class="form-group">
            <label>Select Room</label>
            <select class="form-control" name="room_id" id="bm_room" required>
              <option value="">Choose</option>
              <?php foreach($rooms as $r): ?>
                <option value="<?php echo (int)$r['id']; ?>" data-price="<?php echo (float)$r['price']; ?>" data-adults="2" data-kids="2" data-extra="0"><?php echo h($r['title']); ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-row">
            <div class="form-group col-6"><label>Your Name</label><input class="form-control" name="name" required></div>
            <div class="form-group col-6"><label>Phone</label><input class="form-control" name="phone" required></div>
          </div>
          <div class="form-row">
            <div class="form-group col-4"><label>Adults</label><input class="form-control" type="number" min="1" value="1" name="adults" id="bm_adults" required></div>
            <div class="form-group col-4"><label>Children 0-14</label><input class="form-control" type="number" min="0" value="0" name="children_under15" id="bm_kids"></div>
            <div class="form-group col-4"><label>Children 15+</label><input class="form-control" type="number" min="0" value="0" name="children_15plus" id="bm_kids15"></div>
          </div>
          <div class="form-group"><label>Message (optional)</label><input class="form-control" name="message"></div>
          <div class="border rounded p-2 mb-2">
            <div class="small text-muted">Advance payment (min ₹500) is required to proceed.</div>
            <div class="form-row align-items-end">
              <div class="form-group col-6">
                <label>Advance Amount</label>
                <input class="form-control" type="number" step="0.01" min="500" value="500" name="advance_amount" id="bm_amount" required>
              </div>
              <div class="form-group col-6">
                <label>Payment Ref/UTR</label>
                <input class="form-control" name="payment_ref" id="bm_ref" placeholder="Enter UPI ref after payment" required>
              </div>
            </div>
            <div class="d-flex align-items-center gap-2">
              <?php $upiLink = $upiId ? ('upi://pay?pa='.urlencode($upiId).'&pn='.urlencode($upiName).'&am=500&cu=INR&tn=Advance%20payment') : ''; ?>
              <?php if ($upiLink): ?>
              <img id="bm_qr" src="https://api.qrserver.com/v1/create-qr-code/?size=170x170&data=<?php echo urlencode($upiLink); ?>" alt="QR">
              <div class="small">Scan to pay via UPI<br><strong><?php echo h($upiId); ?></strong></div>
              <?php else: ?>
              <div class="small text-muted">Set UPI ID in settings to show QR.</div>
              <?php endif; ?>
            </div>
          </div>
          <button class="btn btn-primary btn-block" type="submit">Confirm Booking</button>
        </form>
      </div>
    </div>
  </div>
</div>
<script>
  (function(){
    function openModalFor(roomId,title){
      var sel = document.getElementById('bm_room');
      if (roomId){ sel.value = String(roomId); }
      if (window.jQuery && typeof jQuery.fn.modal === 'function') {
        jQuery('#bookingModal').modal('show');
      } else {
        var el=document.getElementById('bookingModal'); if(el){ el.style.display='block'; el.classList.add('show'); }
      }
    }
    window.openBookingModal = openModalFor;
    document.addEventListener('click', function(e){
      var t = e.target.closest('[data-book-room]');
      if (t){ e.preventDefault(); openModalFor(t.getAttribute('data-room')); }
    });
    var amount = document.getElementById('bm_amount');
    var qr = document.getElementById('bm_qr');
    if (amount && qr){
      amount.addEventListener('input', function(){
        var v = parseFloat(amount.value||'500');
        if (isNaN(v) || v < 500) v = 500;
        try{
          var base = '<?php echo $upiId ? ('upi://pay?pa='.rawurlencode($upiId).'&pn='.rawurlencode($upiName).'&cu=INR&tn=Advance%20payment&am=') : ''; ?>';
          if (base){ qr.src = 'https://api.qrserver.com/v1/create-qr-code/?size=170x170&data=' + encodeURIComponent(base + v.toFixed(2)); }
        }catch(err){}
      });
    }
  })();
</script>


