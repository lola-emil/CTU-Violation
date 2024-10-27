<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Violation</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="warning-banner">
        <p>Warning: You have violated the terms and conditions.</p>
    </div>

    <div class="content">
        <h1 class="fade-in">Access Denied</h1>
        <p class="slide-in">Your access to this page has been restricted due to a policy violation.</p>
        
        <!-- Updated the Appeal button to a search form for Student ID -->
        <form id="search-student-form">
            <input type="text" id="student-id" placeholder="Enter Student ID" required>
            <button type="submit" class="button pulse" id="search-btn">Search Student ID</button>
        </form>

        <div class="button-group">
            <a href="#" class="button admin-button" id="admin-btn">Admin</a> <!-- Admin button -->
            <a href="#" class="button staff-button" id="staff-btn">Staff</a> <!-- Staff button -->
        </div>
    </div>

    <div class="glitch-text">VIOLATION</div>

    <div class="background-overlay"></div>

    <!-- Full Screen Warning Icon Overlay -->
    <div id="warning-overlay" class="warning-overlay">
        ⚠️
        <p>Redirecting...</p>
    </div>

    <!-- Admin Login Modal (unchanged) -->
    <div id="adminModal" class="modal">
        <div class="modal-content">
            <span class="close" id="closeAdmin">&times;</span>
            <img src="images/Logo.png" alt="School Logo" class="school-logo">
            <h2>E-Logbook</h2>
            <h3>Login Admin</h3>
            <form action="admin.php" method="post">
                <label for="username">Username</label>
                <input type="text" id="admin-username" name="username" placeholder="Admin" required>
                
                <label for="password">Password</label>
                <input type="password" id="admin-password" name="password" placeholder="Password" required>
                
                <button type="submit" class="login-btn">Login</button>
            </form>
        </div>
    </div>

    <!-- Staff Login Modal (unchanged) -->
    <div id="staffModal" class="modal">
        <div class="modal-content">
            <span class="close" id="closeStaff">&times;</span>
            <img src="images/Logo.png" alt="School Logo" class="school-logo">
            <h2>E-Logbook</h2>
            <h3>Login Staff</h3>
            <form action="staff.php" method="post">
                <label for="username">Username</label>
                <input type="text" id="staff-username" name="username" placeholder="Staff" required>
                
                <label for="password">Password</label>
                <input type="password" id="staff-password" name="password" placeholder="Password" required>
                
                <button type="submit" class="login-btn">Login</button>
            </form>
        </div>
    </div>
<!-- Violation Record Modal -->
<div id="violationModal" class="modal">
    <div class="modal-content">
        <span class="close" id="closeViolationModal">&times;</span>
        <div id="violation-details">
            <!-- Content populated by JavaScript -->
        </div>
    </div>
</div>

    <!-- JavaScript -->
    <script src="script.js"></script>
</body>
</html>
