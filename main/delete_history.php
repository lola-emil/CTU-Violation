<?php
include 'db/connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['student_id'])) {
    $student_id = $_POST['student_id'];

    // SQL query to delete the student record based on the student ID
    $sql = "DELETE FROM violation_history WHERE student_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $student_id); // Bind the student ID

    if ($stmt->execute()) {
        // Successful deletion
        echo json_encode(['success' => true]);
    } else {
        // Error deleting the record
        echo json_encode(['success' => false, 'error' => $stmt->error]);
    }

    $stmt->close();
    $conn->close();
} else {
    // Invalid request
    echo json_encode(['success' => false, 'error' => 'Invalid request']);
}
?>
