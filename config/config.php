<?php

// Define database constants (only define once)
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
// **Avoid storing password in plain text:**
define('DB_PASSWORD', '');  // Replace with actual password (Not recommended)
define('DB_NAME', 'dacsn-n12');
define('DB_PASS', 'your_database_password');

// **Optional: Consider using environment variables for password**
// Put your password in a `.env` file outside document root
//  and access it using:
// $db_password = getenv('DB_PASSWORD');

// Create a new connection
$conn = new mysqli(DB_HOST, DB_USER, getenv('DB_PASSWORD'), DB_NAME);

// Check connection and provide user feedback
if ($conn->connect_error) {
  echo "Failed to connect to MySQL: (" . $conn->connect_errno . ") " . $conn->connect_error;
} else {
  echo "Connected to MySQL database successfully!";
}

// (Optional) You can add further actions here, like database queries
// Remember to close the connection if needed within your actions
// $conn->close(); // Uncomment this line if you wish to close the connection manually

?>
