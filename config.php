<?php
// Database configuration
session_start();

define('DB_HOST', 'localhost');
define('DB_USER', 'root'); // Default XAMPP username
define('DB_PASS', ''); // Default XAMPP password is empty
define('DB_NAME', 'busmanagement'); // Changed to busmanagement

// Create connection
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Set timezone
date_default_timezone_set('Asia/Kolkata'); // Change as per your timezone

// Base URL (update this according to your project path)
define('BASE_URL', 'http://localhost/your-project-folder/');
?>