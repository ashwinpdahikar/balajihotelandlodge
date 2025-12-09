  <?php require_once __DIR__ . '/functions.php'; $galleryItems = list_gallery_images(8); ?>
  <div class="gallery">
      <div class="container">
         <?php if (!isset($hide_section_title) || !$hide_section_title): ?>
         <div class="row">
            <div class="col-md-12">
               <div class="titlepage">
                  <h2>gallery</h2>
               </div>
            </div>
         </div>
         <?php endif; ?>
         <div class="row">
            <?php foreach ($galleryItems as $g): ?>
            <div class="col-md-3 col-sm-6">
               <div class="gallery_img">
                  <figure><img src="<?php echo h($g['image_path']); ?>" alt="" /></figure>
               </div>
            </div>
            <?php endforeach; ?>
            <?php if (!$galleryItems): ?>
            <div class="col-12"><div class="text-muted">No images yet.</div></div>
            <?php endif; ?>
         </div>
      </div>
   </div>

   <style>
      .gallery_img {
		 margin-bottom: 20px;
		 overflow: hidden;
		 border-radius: 8px;
		 box-shadow: 0 4px 8px rgba(0,0,0,0.1);
		 transition: transform 0.3s ease;
	  }
	  .gallery_img:hover {
		 transform: scale(1.05);
	  }
	  .gallery_img figure {
		 margin: 0;
	  }
	  .gallery_img img {
		 width: 100%;	
		 height: 250px;
		 object-fit: cover;	
		 transition: transform 0.3s ease;
	  }	
   </style>