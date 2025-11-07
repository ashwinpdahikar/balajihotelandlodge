<?php
require_once __DIR__ . '/db.php';

function ensure_upload_dir(string $subdir): string {
    $base = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'uploads';
    $dir = $base . DIRECTORY_SEPARATOR . $subdir;
    if (!is_dir($dir)) {
        @mkdir($dir, 0775, true);
    }
    return $dir;
}

function get_setting(string $key, ?string $default = null): ?string {
    $pdo = get_pdo();
    $stmt = $pdo->prepare('SELECT value FROM site_settings WHERE `key` = ? LIMIT 1');
    $stmt->execute([$key]);
    $row = $stmt->fetch();
    return $row ? (string)$row['value'] : $default;
}

function get_page_by_slug(string $slug): ?array {
    $pdo = get_pdo();
    $stmt = $pdo->prepare('SELECT * FROM site_pages WHERE slug = ? LIMIT 1');
    $stmt->execute([$slug]);
    $row = $stmt->fetch();
    return $row ?: null;
}

function list_gallery_images(int $limit = 0): array {
    $pdo = get_pdo();
    $sql = 'SELECT * FROM gallery_images WHERE status = 1 ORDER BY created_at DESC';
    if ($limit > 0) { $sql .= ' LIMIT ' . (int)$limit; }
    return $pdo->query($sql)->fetchAll();
}

function list_rooms(int $limit = 0): array {
    $pdo = get_pdo();
    $sql = 'SELECT * FROM rooms WHERE status = 1 ORDER BY created_at DESC';
    if ($limit > 0) { $sql .= ' LIMIT ' . (int)$limit; }
    return $pdo->query($sql)->fetchAll();
}

function list_blog_posts(int $limit = 0): array {
    $pdo = get_pdo();
    $sql = 'SELECT * FROM blog_posts WHERE status = 1 ORDER BY created_at DESC';
    if ($limit > 0) { $sql .= ' LIMIT ' . (int)$limit; }
    return $pdo->query($sql)->fetchAll();
}

function h(string $s): string { return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }

function upload_image(string $fieldName, string $subdir): ?string {
    if (!isset($_FILES[$fieldName]) || $_FILES[$fieldName]['error'] !== UPLOAD_ERR_OK) {
        return null;
    }
    $tmp = $_FILES[$fieldName]['tmp_name'];
    $original = $_FILES[$fieldName]['name'];
    $size = (int)$_FILES[$fieldName]['size'];

    if ($size > 2 * 1024 * 1024) {
        throw new RuntimeException('File too large (max 2MB)');
    }

    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $mime = $finfo->file($tmp);
    $allowed = [
        'jpg' => 'image/jpeg',
        'jpeg' => 'image/jpeg',
        'png' => 'image/png',
        'gif' => 'image/gif',
        'webp' => 'image/webp',
    ];
    $ext = array_search($mime, $allowed, true);
    if ($ext === false) {
        throw new RuntimeException('Invalid file type');
    }

    $dir = ensure_upload_dir($subdir);
    $safeName = bin2hex(random_bytes(8)) . '.' . $ext;
    $dest = $dir . DIRECTORY_SEPARATOR . $safeName;
    if (!move_uploaded_file($tmp, $dest)) {
        throw new RuntimeException('Failed to move uploaded file');
    }
    // Return web path relative to practice
    return 'uploads/' . $subdir . '/' . $safeName;
}

function start_session_secure(): void {
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }
}

function csrf_token(): string {
    start_session_secure();
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(16));
    }
    return $_SESSION['csrf_token'];
}

function csrf_verify(string $token): bool {
    start_session_secure();
    return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}
?>


