<?php

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'dacsn-n12');

// Create a new connection
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Check connection
if ($conn->connect_error) {
    echo "Failed to connect to MySQL: " . $conn->connect_error;
    exit;
} else {
    echo "Connected to MySQL database successfully!";
    // Close the connection (optional)
    $conn->close();
}
