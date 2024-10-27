<?php
header('Content-Type: application/json');

// Database connection
$servername = "127.0.0.1";
$username = "Kenji";
$password = "JamesRyan";
$dbname = "violation_tracker";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    echo json_encode(['success' => false, 'error' => 'Database connection failed.']);
    exit();
}

$student_id = isset($_GET['student_id']) ? $_GET['student_id'] : '';

// Prepare the query to fetch student data
$sql = "SELECT * FROM violations WHERE student_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $student_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $student = $result->fetch_assoc();
    echo json_encode(['success' => true, 'student' => $student]);
} else {
    echo json_encode(['success' => false, 'message' => 'No records found']);
}

$stmt->close();
$conn->close();
?>
