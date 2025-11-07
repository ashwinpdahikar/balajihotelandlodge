  <?php require_once __DIR__ . '/functions.php'; $galleryItems = list_gallery_images(8); ?>
  <div class="gallery">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="titlepage">
                  <h2>gallery</h2>
               </div>
            </div>
         </div>
         <div class="row">
            <?php foreach ($galleryItems as $g): ?>
            <div class="col-md-3 col-sm-6">
               <div class="gallery_img">
                  <figure><img src="<?php echo h($g['image_path']); ?>" alt="#" /></figure>
               </div>
            </div>
            <?php endforeach; ?>
            <?php if (!$galleryItems): ?>
            <div class="col-12"><div class="text-muted">No images yet.</div></div>
            <?php endif; ?>
         </div>
      </div>
   </div>