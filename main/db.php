<?php
// Securely connect to the database
$host = 'localhost';
$dbname = 'elogbook';
$user = 'root';  // replace with your database user
$pass = '';  // replace with your database password

// Create a secure connection
$db = new mysqli($host, $user, $pass, $dbname);

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
?>
