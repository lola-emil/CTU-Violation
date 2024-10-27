<?php
$servername = "127.0.0.1"; // Change if your database server is different
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password (usually empty for XAMPP)
$dbname = "violation_tracker"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
