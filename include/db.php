<?php
// Database connection using PDO
// Update these constants to match your local MySQL credentials if needed
const DB_HOST = '127.0.0.1';
const DB_NAME = 'balaji_hotel';
const DB_USER = 'root';
const DB_PASS = '';

function get_pdo(): PDO {
    static $pdo = null;
    if ($pdo instanceof PDO) {
        return $pdo;
    }
    $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4';
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];
    try {
        $pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
    } catch (Throwable $e) {
        http_response_code(500);
        echo 'Database connection error. Please create the database and run install.php';
        exit;
    }
    return $pdo;
}
?>


