  <?php require_once __DIR__ . '/functions.php'; $posts = list_blog_posts(3); ?>
  <div class="blog">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="titlepage">
                  <h2>Blog</h2>
                  <p>Latest updates from our blog</p>
               </div>
            </div>
         </div>
         <div class="row"> 
            <?php foreach ($posts as $p): ?>
            <div class="col-md-4">
               <div class="blog_box">
                  <div class="blog_img">
                     <?php if (!empty($p['image_path'])): ?><figure><img src="<?php echo h($p['image_path']); ?>" alt="#" /></figure><?php endif; ?>
                  </div>
                  <div class="blog_room">
                     <h3><?php echo h($p['title']); ?></h3>
                     <span><?php echo h(date('M d, Y', strtotime($p['created_at']))); ?></span>
                     <p><?php echo h(mb_substr(strip_tags($p['content']), 0, 140)) . '...'; ?></p>
                  </div>
               </div>
            </div>
            <?php endforeach; ?>
            <?php if (!$posts): ?><div class="col-12"><div class="text-muted">No posts yet.</div></div><?php endif; ?>
         </div>
      </div>
   </div>