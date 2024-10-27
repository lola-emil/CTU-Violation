<?php
// delete_student.php

$servername = "127.0.0.1";
$username = "aso";
$password = "masterADMIN.1234..";
$dbname = "violation_tracker";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die(json_encode(['success' => false, 'error' => 'Database connection failed: ' . $conn->connect_error]));
}

if (isset($_POST['student_id'])) {
    $student_id = $_POST['student_id'];

    $conn->begin_transaction();

    try {
        // Fetch the violation record from violations table
        $sql = "SELECT * FROM violations WHERE student_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $student_id);
        $stmt->execute();
        $result = $stmt->get_result();

        // Fetch student data
        $student_sql = "SELECT lastname, firstname, profile_image FROM students WHERE student_id = ?";
        $student_stmt = $conn->prepare($student_sql);
        $student_stmt->bind_param("s", $student_id);
        $student_stmt->execute();
        $student_result = $student_stmt->get_result();
        $student_data = $student_result->fetch_assoc();

        if (!$student_data || empty($student_data['lastname']) || empty($student_data['firstname'])) {
            throw new Exception("Incomplete student data for ID: " . $student_id);
        }

        if ($row = $result->fetch_assoc()) {
            // Insert the violation record into violation_history
            $history_sql = "INSERT INTO violation_history (student_id, lastname, firstname, course, department, violation, offense, sanction, timestamp, image_url) 
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($history_sql);
            $stmt->bind_param("ssssssssss", 
                $row['student_id'], 
                $student_data['lastname'], 
                $student_data['firstname'], 
                $row['course'], 
                $row['department'], 
                $row['violation'], 
                $row['offense'], 
                $row['sanction'], 
                $row['timestamp'], 
                $student_data['profile_image']
            );

            if (!$stmt->execute()) {
                throw new Exception("Failed to insert into violation_history: " . $stmt->error);
            }

            // Delete the record from violations table
            $delete_sql = "DELETE FROM violations WHERE student_id = ?";
            $stmt = $conn->prepare($delete_sql);
            $stmt->bind_param("s", $student_id);

            if (!$stmt->execute()) {
                throw new Exception("Failed to delete from violations: " . $stmt->error);
            }
        } else {
            throw new Exception("No violation found for student ID: " . $student_id);
        }

        $conn->commit();
        echo json_encode(['success' => true]);

    } catch (Exception $e) {
        $conn->rollback();
        echo json_encode(['success' => false, 'error' => $e->getMessage()]);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'No student ID provided']);
}

$conn->close();
?>
