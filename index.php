<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Violation</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
    <div class="warning-banner">
        <img src="images/ourlogo.png" class="nav-logo">
        <a href="#" class="admin-button" id="admin-btn"><img src="images/admin-icon.png" class="admin-icon"> </a>
    </div>

    <div class="content">
         <div class="logo-name">
            <div class="upper-text"><h1>VIOLATI<img src="images/timer.png" class="timer">N</h1></div>
            <div class="lower-text">TRACKER</div>
        </div>

        <!-- Updated the Appeal button to a search form for Student ID -->
        <form id="search-student-form">
            <input type="text" id="student-id" placeholder="Enter Student ID" required>
            <button type="submit" class="button pulse" id="search-btn">Search ID</button>
        </form>

        <div class="button-group">
           
            <a href="#" class="button staff-button" id="staff-btn">Report Violation</a> <!-- Staff button -->
        </div>
    </div>

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
            <img src="images/ourlogo.png" alt="Logo" class="logo">
            <h3>Login Admin</h3>
            <form action="admin.php" method="post">
                <label for="username">Username</label>
                <input type="text" id="admin-username" name="username" placeholder="Admin" required>
                
                <label for="password">Password</label>
                <input type="password" id="admin-password" name="password" placeholder="Password" required>
                
                <button type="submit" class="login-btn" id="modal-btn">Login</button>
            </form>
        </div>
    </div>

    <!-- Staff Login Modal (unchanged) -->
    <div id="staffModal" class="modal">
        <div class="modal-content">
            <span class="close" id="closeStaff">&times;</span>
            <img src="images/ourlogo.png" alt="School Logo" class="logo">
            <h3>Login Staff</h3>
            <form action="staff.php" method="post">
                <label for="username">Username</label>
                <input type="text" id="staff-username" name="username" placeholder="Staff" required>
                
                <label for="password">Password</label>
                <input type="password" id="staff-password" name="password" placeholder="Password" required>
                
                <button type="submit" class="login-btn" id="modal-btn">Login</button>
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