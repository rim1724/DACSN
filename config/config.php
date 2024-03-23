<?php

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');  
define('DB_NAME', 'dacsn-n12');
define('DB_PASS', '');
define('DB_USERNAME', 'root');
$conn = new mysqli(DB_HOST, DB_USER, getenv('DB_PASSWORD'), DB_NAME);
if ($conn->connect_error) {
  echo "Failed to connect to MySQL: (" . $conn->connect_errno . ") " . $conn->connect_error;
} else {
  
}
?>
