<?php
// Include PHPMailer files manually
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
require 'phpmailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


$servername = "127.0.0.1";
$username = "Kenji";
$password = "JamesRyan";

$conn = mysqli_connect($servername, $username, $password, "violation_tracker");


$mail = new PHPMailer(true);

$uniqueId = uniqid();

// Get the full URL
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
$host = $_SERVER['HTTP_HOST'];  // Get the domain name or IP address
$requestUri = $_SERVER['REQUEST_URI'];  // Get the URI of the request

// Combine them to form the full URL
$fullUrl = $protocol . '://' . $host;

try {
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'cololot.johnlloyd@gmail.com';
    $mail->Password = 'jpbe swjt juen hjsl';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->setFrom('cololot.johnlloyd@gmail.com', 'Programmer');
    $mail->addAddress('staffvtracker@gmail.com', 'Admin');
    $mail->addReplyTo('cololot.johnlloyd@gmail.com', 'Programmer');

    $mail->isHTML(true); // Email format kay HTML
    $mail->Subject = 'Test Email from PHPMailer';
    $mail->Body = '<b>Here\'s the <a href="' . $fullUrl . "/CTU-Violation/verify_reset_token.php?token=" . $uniqueId . "&user=" . $_GET["user"] . '">link</a> for resetting your new password.</b>';
    $mail->AltBody = 'This is a plain-text version of the email.';

    $mail->send();


    // diri i save ang katong code sa database
    $sql = "INSERT INTO reset_code (code, type) VALUES ('" . $uniqueId . "', 'staff' )";

    mysqli_query($conn, $sql);

    echo 'Ang url para reset sa imong password kay na send na sa asa man galing. Please check sa email nga gi set for verification. Thank you ✌. <a href="/CTU-Violation">Back to home page</a>';
} catch (Exception $e) {
    echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Montserrat', sans-serif;
        }

        body {

            min-height: 100vh;
            background-color: #ededed;

            display: flex;
            justify-content: center;
            align-items: center;

            flex-direction: column;

            /* color: #f8f8f8; */
        }

        .input {
            width: 320px;
            padding: 10px 15px;
            margin: 10px 0;
            background-color: #ffffff;
            color: #000000;
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 20px;
            font-size: 20px;
            outline: none;
            transition: border 0.3s ease;
            filter: drop-shadow(0px 4px 20px rgba(0, 0, 0, 0.25));
        }
    </style>
</head>

<body>

</body>

</html>