<?php
// Start the session and generate the CSRF token if not already generated
session_start();
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Logbook</title>
    <link rel="stylesheet" href="home.css">
</head>
<body>
    <div class="container">
        <header>
            <nav>
                <div class="logo">E-Logbook</div>
                <ul>
                    <li><a href="#" class="active">Home</a></li>
                    <li><a href="/Beta/mannual/mannual.php">Student Manual</a></li>
                    <li><a href="#" id="admin-btn">Admin</a></li> <!-- Admin button -->
                </ul>
            </nav>
        </header>

        <div class="intro">
            <div class="intro-content">
                <h1>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h1>
                <button class="get-started" id="staff-btn">Get Started</button> <!-- Staff button -->
            </div>

            <div class="search-container">
                <div class="search-box">
                    <input type="text" placeholder="Search ID Number...">
                    <img src="images/search-icon.png" alt="search">
                </div>
            </div>
        </div>

        <!-- Bottom Wave -->
        <div class="wave"></div>

        <!-- Admin Login Modal -->
        <div id="adminModal" class="modal">
            <div class="modal-content">
                <span class="close" id="closeAdmin">&times;</span>
                <img src="images/Logo.png" alt="School Logo" class="school-logo">
                <h2>E-Logbook</h2>
                <h3>Login Admin</h3>
                <form action="admin.php" method="post">
                    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>"> <!-- CSRF Token -->
                    
                    <label for="admin-username">Username</label>
                    <input type="text" id="admin-username" name="admin-username" placeholder="Ex. Admin" required>
                    
                    <label for="admin-password">Password</label>
                    <input type="password" id="admin-password" name="admin-password" placeholder="Ex. admin12345" required>
                    
                    <button type="submit" class="login-btn">Login</button>
                </form>
            </div>
        </div>

        <!-- Staff Login Modal -->
        <div id="staffModal" class="modal">
            <div class="modal-content">
                <span class="close" id="closeStaff">&times;</span>
                <img src="images/Logo.png" alt="School Logo" class="school-logo">
                <h2>E-Logbook</h2>
                <h3>Login Staff</h3>
                <form action="staff.php" method="post">
                    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>"> <!-- CSRF Token -->
                    
                    <label for="staff-username">Username</label>
                    <input type="text" id="staff-username" name="staff-username" placeholder="Ex. Staff" required>
                    
                    <label for="staff-password">Password</label>
                    <input type="password" id="staff-password" name="staff-password" placeholder="Ex. staff12345" required>
                    
                    <button type="submit" class="login-btn">Login</button>
                </form>
            </div>
        </div>

        <!-- JavaScript to handle modal functionality -->
        <script src="home.js"></script>
    </div>
</body>
</html>
