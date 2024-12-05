<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Database configuration
$db_host = 'localhost';
$db_user = 'root';  // Your database username
$db_pass = '';      // Your database password
$db_name = 'church_website';

// Connect to the specific database
$db_conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$db_conn) {
    die(json_encode([
        'success' => false,
        'error' => 'Connection failed: ' . mysqli_connect_error()
    ]));
}

// Set charset
if (!mysqli_set_charset($db_conn, "utf8mb4")) {
    die(json_encode([
        'success' => false,
        'error' => 'Error setting charset: ' . mysqli_error($db_conn)
    ]));
}

// Set timezone
mysqli_query($db_conn, "SET time_zone = '+00:00'");
?> 