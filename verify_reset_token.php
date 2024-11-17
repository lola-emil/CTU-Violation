<?php
session_start();
$servername = "127.0.0.1";
$username = "Kenji";
$password = "JamesRyan";

$conn = mysqli_connect($servername, $username, $password, "violation_tracker");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$token = $_GET["token"];
$user = $_GET["user"];

$token = mysqli_real_escape_string($conn, $token);

$sql = "SELECT * FROM reset_code WHERE code = '$token'";

$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $matched_token = mysqli_fetch_assoc($result);

    $expirationTimestamp = strtotime($matched_token["expiry"]);
    $currentTime = time();

    // echo "Expiry: " . $matched_token["expiry"] . "<br>";
    // echo "Current Time: " . date("Y-m-d H:i:s", $currentTime) . "<br>";
    // echo "Expiration Timestamp: " . date("Y-m-d H:i:s", $expirationTimestamp) . "<br>";

    if ($currentTime > $expirationTimestamp || $matched_token["is_used"]) {
        echo "Verification code expired. <br> <a href='/CTU-Violation/'>Go to Home</a>";
    } else {
        $updateQuery = "UPDATE reset_code SET is_verified = 1 WHERE code = '$token'";

        $reset_url = $user == 'staff' ? '/CTU-Violation/reset_staff_password.php?code=' . $token :
        '/CTU-Violation/reset_admin_password.php?code=' . $token;

        if (mysqli_query($conn, $updateQuery)) {
            echo "Redirecting... /CTU-Violation/".$user == 'staff' ? "reset_staff_password.php" : "reset_admin_password.php" ."?code=$token";

            // $_SESSION["error_message"] = "Create New Password";
            header("Location: $reset_url");
        }
    }
} else {
    echo "Invalid token or no matching record found.";
}

mysqli_close($conn);
