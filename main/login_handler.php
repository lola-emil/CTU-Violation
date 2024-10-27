<?php
session_start();
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "violation_tracker";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$error_message = "";
if (!isset($_SESSION['staff_login_attempts'])) {
    $_SESSION['staff_login_attempts'] = 0;
}

$max_attempts = 5;
$lockout_time = 30;

if ($_SESSION['staff_login_attempts'] >= $max_attempts) {
    if (time() - $_SESSION['last_staff_attempt_time'] < $lockout_time) {
        $error_message = "Too many failed attempts. Please try again later.";
    } else {
        $_SESSION['staff_login_attempts'] = 0; 
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($error_message)) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT password FROM users WHERE username = ? AND role = 'staff'");
    if ($stmt) {
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();
        
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($hashed_password);
            $stmt->fetch();

            if (password_verify($password, $hashed_password)) {
                $_SESSION['username'] = $username;
                $_SESSION['role'] = 'staff';
                header("Location: main/index.php");
                exit;
            }
        }

        $_SESSION['staff_login_attempts']++;
        $_SESSION['last_staff_attempt_time'] = time();
        $error_message = "Invalid username or password.";
    }
    $stmt->close();
}
$conn->close();

if (!empty($error_message)) {
    echo "<script>alert('$error_message'); window.location.href='index.php';</script>";
}
?>
