<?php
$page_title       = $page_title       ?? 'Balaji Hotel And Lodge Chimur';
$page_description = $page_description ?? 'Balaji Hotel And Lodge offers clean rooms, homely meals, and quick access to Tadoba-Andhari Tiger Reserve from Chimur.';
$page_keywords    = $page_keywords    ?? 'Balaji Hotel Chimur, Tadoba stay, budget lodge Chandrapur, hotels near Tadoba';
$canonical_url    = $canonical_url    ?? '';
$meta_robots      = $meta_robots      ?? 'index,follow';
$og_image         = $og_image         ?? 'images/banner1.jpg';
$structured_data  = $structured_data  ?? '';

$escape = static fn(string $value): string => htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
$absoluteOg = $og_image;
if (strpos($og_image, 'http') !== 0) {
    $scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https://' : 'http://';
    $host   = $_SERVER['HTTP_HOST'] ?? 'localhost';
    $pathPrefix = rtrim(dirname($_SERVER['SCRIPT_NAME'] ?? ''), '/\\');
    $absoluteOg = $scheme . $host . ($pathPrefix ? $pathPrefix . '/' : '/') . ltrim($og_image, '/');
}
?>
  <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    
      <meta name="keywords" content="<?php echo $escape($page_keywords); ?>">
      <meta name="description" content="<?php echo $escape($page_description); ?>">
      <meta name="robots" content="<?php echo $escape($meta_robots); ?>">
      <meta name="author" content="Balaji Hotel And Lodge Chimur">
      <?php if (!empty($canonical_url)): ?>
      <link rel="canonical" href="<?php echo $escape($canonical_url); ?>">
      <?php endif; ?>
      <meta property="og:title" content="<?php echo $escape($page_title); ?>">
      <meta property="og:description" content="<?php echo $escape($page_description); ?>">
      <meta property="og:type" content="website">
      <?php if (!empty($canonical_url)): ?>
      <meta property="og:url" content="<?php echo $escape($canonical_url); ?>">
      <?php endif; ?>
      <meta property="og:image" content="<?php echo $escape($absoluteOg); ?>">
      <meta name="twitter:card" content="summary_large_image">
      <meta name="twitter:title" content="<?php echo $escape($page_title); ?>">
      <meta name="twitter:description" content="<?php echo $escape($page_description); ?>">
      <meta name="twitter:image" content="<?php echo $escape($absoluteOg); ?>">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" href="css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- fevicon -->
      <?php if (file_exists(__DIR__ . '/../images/fevicon.png')): ?>
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <?php endif; ?>
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <?php if (!empty($structured_data)): ?>
      <script type="application/ld+json">
<?php echo $structured_data; ?>
      </script>
      <?php endif; ?>
      <!-- Loader disabled via inline style -->
      <style>.loader_bg{display:none !important}</style>