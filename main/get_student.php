<?php
if (isset($_POST['student_id'])) {
    $student_id = $_POST['student_id'];

    // Connect to your database
    // Example: $conn = new mysqli('localhost', 'username', 'password', 'database');

    // Fetch student data
    $sql = "SELECT * FROM students WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $student_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo json_encode([
            'success' => true,
            'student_id' => $row['id'],
            'firstname' => $row['firstname'],
            'lastname' => $row['lastname'],
            'gender' => $row['gender'],
            'course' => $row['course'],
            'department' => $row['department'],
            'violation' => $row['violation'],
            'offense' => $row['offense'],
            'sanction' => $row['sanction'],
            'time' => $row['time']
        ]);
    } else {
        echo json_encode(['success' => false]);
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['success' => false]);
}
?>
