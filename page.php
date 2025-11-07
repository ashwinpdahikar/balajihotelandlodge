<?php require_once __DIR__ . '/include/functions.php'; $slug = trim($_GET['slug'] ?? ''); $page = $slug ? get_page_by_slug($slug) : null; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include 'include/header-section.php'; ?>
    <title><?php echo h($page['title'] ?? 'Page'); ?> - Balaji Hotel And Lodge Chimur</title>
  </head>
  <body class="main-layout">
    <?php include 'include/loader.php'; ?>
    <?php include 'include/header.php'; ?>
    <div class="back_re">
      <div class="container"><div class="row"><div class="col-md-12"><div class="title"><h2><?php echo h($page['title'] ?? 'Page'); ?></h2></div></div></div></div>
    </div>
    <div class="about">
      <div class="container">
        <?php if (!empty($page['hero_path'])): ?>
        <div class="mb-3"><img src="<?php echo h($page['hero_path']); ?>" alt="" style="max-width:100%;border-radius:6px"></div>
        <?php endif; ?>
        <?php if (!empty($page['excerpt'])): ?><p class="mb-3"><?php echo h($page['excerpt']); ?></p><?php endif; ?>
        <div><?php echo nl2br(h($page['content'] ?? '')); ?></div>
        <div class="row mt-3">
          <?php $pdo = get_pdo(); $imgs = []; if ($page){ $st=$pdo->prepare('SELECT * FROM site_page_images WHERE page_id=? ORDER BY id DESC'); $st->execute([(int)$page['id']]); $imgs=$st->fetchAll(); } ?>
          <?php foreach ($imgs as $im): ?>
          <div class="col-md-4 col-sm-6 mb-3"><img src="<?php echo h($im['image_path']); ?>" alt="" style="width:100%;border-radius:6px"><div class="small text-muted"><?php echo h($im['caption']); ?></div></div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
    <?php include 'include/footer.php'; ?>
    <?php include 'include/footer-section.php'; ?>
  </body>
</html>