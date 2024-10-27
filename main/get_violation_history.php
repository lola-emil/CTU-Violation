<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "violation_tracker";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['student_id'])) {
    $student_id = $_POST['student_id'];

    // Ensure you are using the correct table name and column names.
    $sql = "SELECT violation, offense, sanction, timestamp FROM violation_history WHERE student_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $student_id);
    $stmt->execute();
    $result = $stmt->get_result();

    $history = [];
    while ($row = $result->fetch_assoc()) {
        $history[] = $row;
    }

    echo json_encode($history);
} else {
    echo json_encode([]); // Return an empty array if no student_id is provided
}

$conn->close();
?>
