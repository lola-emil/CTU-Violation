<?php
// Connect to the database
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "violation_tracker";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch current timer end time
$sql = "SELECT end_time FROM timer WHERE id = 1"; // Assuming a single row with id = 1
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of the row
    $row = $result->fetch_assoc();
    echo json_encode(['end_time' => $row['end_time']]);
} else {
    // Initialize the end time if not set
    $end_time = date("Y-m-d H:i:s", strtotime("+3 days"));
    $sql = "INSERT INTO timer (id, end_time) VALUES (1, '$end_time') ON DUPLICATE KEY UPDATE end_time='$end_time'";
    if ($conn->query($sql) === TRUE) {
        echo json_encode(['end_time' => $end_time]);
    } else {
        echo json_encode(['error' => 'Error initializing timer']);
    }
}

$conn->close();
?>
