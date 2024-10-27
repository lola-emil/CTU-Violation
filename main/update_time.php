<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "violation_tracker";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die(json_encode(['success' => false, 'error' => 'Database connection failed: ' . $conn->connect_error]));
}

$conn->begin_transaction();


$student_id = $_POST["student_id"];
$violation_id = $_POST["violation_id"];
$violation = $_POST["violation"];
$offense = $_POST["offense"];
$sanction = $_POST["sanction"];
$cycle = $_POST["cycle"];



// Validate ang violation


// Create a connection to the database

$responseData = [];

// Fetch student data
$student_sql = "SELECT * FROM students WHERE student_id = ?";
$student_stmt = $conn->prepare($student_sql);
$student_stmt->bind_param("s", $student_id);
$student_stmt->execute();
$student_result = $student_stmt->get_result();
$student_data = $student_result->fetch_assoc();

// Check if student exists
if (!$student_data) {
    echo json_encode(['success' => false, 'error' => 'Student not found']);
    $conn->rollback();
    exit;
}

// check nato if ni-exist ba ang violatin sa db
$matched_violation = "SELECT * FROM violations WHERE id = ?";
$matched_violation_stmt = $conn->prepare($matched_violation);
$matched_violation_stmt->bind_param("s", $violation_id);
$matched_violation_stmt->execute();
$matched_violation_result = $matched_violation_stmt->get_result();
$matched_violation_data = $matched_violation_result->fetch_assoc();


$previous_sanction;
$previous_sanction;
if ($matched_violation_data) {
    $previous_offense = $matched_violation_data["offense"];
    $previous_sanction = $matched_violation_data["sanction"];

    $current_time_end = new DateTime($matched_violation_data["end_time"]);
    $current_time_end->modify('+3 days');
    $new_end_time = $current_time_end->format('Y-m-d H:i:s');

    // Update the violation end time
    $update_sql = "UPDATE violations SET end_time = ?, lastname = ?, firstname = ?, course = ?, department = ?, offense = ?, sanction = ?, cycle = ? WHERE student_id = ?";
    $update_stmt = $conn->prepare($update_sql);
    $update_stmt->bind_param(
        "sssssssis",
        $new_end_time,
        $student_data["lastname"],
        $student_data["firstname"],
        $student_data["course"],
        $student_data["department"],
        $offense,
        $sanction,
        $cycle,
        $student_id
    );
    $update_stmt->execute();

    // Fetch the updated violation record
    $violation_sql = "SELECT * FROM violations WHERE student_id = ?";
    $violation_stmt = $conn->prepare($violation_sql);
    $violation_stmt->bind_param("s", $student_id);
    $violation_stmt->execute();
    $violation_result = $violation_stmt->get_result();
    $violation_data = $violation_result->fetch_assoc();

    $responseData["violation"] = $violation_data;

} else {
    echo json_encode(['success' => false, 'error' => 'No violation found for the given student ID']);
    $conn->rollback();
    exit;
}

// Insert into violation history
$history_sql = "INSERT INTO violation_history (student_id, lastname, firstname, course, department, violation, offense, sanction, image_url) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
$history_stmt = $conn->prepare($history_sql);
$history_stmt->bind_param(
    "sssssssss",
    $student_id,
    $student_data["lastname"],
    $student_data["firstname"], // Changed to firstname from lastname
    $student_data["course"],
    $student_data["department"],
    $violation,
    $previous_offense,
    $previous_sanction,
    $student_data["profile_image"],
);

$history_stmt->execute();

// Commit the transaction
$conn->commit();

$responseData["success"] = true;
echo json_encode($responseData);

// Close the connection
$conn->close();
