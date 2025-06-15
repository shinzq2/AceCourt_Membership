<?php
// db.php
// Database connection using MySQLi
$host = "localhost";
$user = "root";
$password = "123456"; 
$dbname = "acecourt_membership";

// Create connection
$conn = new mysqli($host, $user, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>