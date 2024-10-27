<?php
include('../db/connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $student_id = $_GET['student_id'];
    
    // Delete only from cot_pending_records
    $query = "DELETE FROM cot_pending_records WHERE student_id = '$student_id'";
    if (mysqli_query($connection, $query)) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false]);
    }
}
?>
