<?

include 'db_connection.php'; // Add your connection file

if (isset($_POST['student_id'])) {
    $student_id = $_POST['student_id'];
    
    $sql = "SELECT * FROM violation_history WHERE student_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $student_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    $history = [];

    while ($row = $result->fetch_assoc()) {
        $history[] = $row;
    }

    echo json_encode(['success' => true, 'history' => $history]);
} else {
    echo json_encode(['error' => 'Invalid request']);
}
?>