<?php
// Connect to the database
$servername = "127.0.0.1";
$username = "aso";
$password = "masterADMIN.1234..";
$dbname = "violation_tracker";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die(json_encode(['error' => 'Database connection failed: ' . $conn->connect_error]));
}

// Check if all required fields are set
if (isset($_POST['student_id'], $_POST['lastname'], $_POST['firstname'], $_POST['violation'], $_POST['offense'], $_POST['sanction'])) {
    $student_id = $_POST['student_id'];
    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $violation = $_POST['violation'];
    $offense = $_POST['offense'];
    $sanction = $_POST['sanction'];

    // Update the student's record
    $stmt = $conn->prepare("UPDATE violations SET lastname = ?, firstname = ?, violation = ?, offense = ?, sanction = ? WHERE student_id = ?");
    $stmt->bind_param('ssssss', $lastname, $firstname, $violation, $offense, $sanction, $student_id);

    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['error' => 'Error updating record: ' . $conn->error]);
    }

    $stmt->close();
} else {
    echo json_encode(['error' => 'Incomplete form data']);
}

$conn->close();
?>
