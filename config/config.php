<?php

// Define database constants (only define once)
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', ''); // Update with your actual password
define('DB_NAME', 'dacsn-n12');
define('DB_PASS', ''); // Thay thế bằng mật khẩu thực tế


// Create a new connection
$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

// Check connection and provide user feedback
if ($conn->connect_error) {
    echo "Failed to connect to MySQL: " . $conn->connect_error;
} else {
    echo "Connected to MySQL database successfully!";
}

// (Optional) You can add further actions here, like database queries
// Remember to close the connection if needed within your actions
// $conn->close(); // Uncomment this line if you wish to close the connection manually

?>
