<?php
// Start session to access the CSRF token and manage session variables
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the CSRF token from the form matches the one in the session
    if (isset($_POST['csrf_token']) && $_POST['csrf_token'] === $_SESSION['csrf_token']) {
        // Proceed with the login logic if CSRF validation passes
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Secure login logic here...
        // e.g., check credentials against database
        // Assuming you have a users array or database:
        
        $users = [
            'admin' => 'admin12345', // Example for Admin credentials
            'staff' => 'staffpassword' // Example for Staff credentials
        ];

        if (isset($users[$username]) && $users[$username] === $password) {
            // Successful login
            $_SESSION['user'] = $username;
            header("Location: dashboard.php"); // Redirect to dashboard
            exit();
        } else {
            // Invalid login credentials
            die('Invalid username or password.');
        }

    } else {
        // Invalid CSRF token
        die('CSRF token validation failed.');
    }
}
?>
