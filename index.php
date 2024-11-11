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

    <!-- Admin Login Modal (with Forgot Password) -->
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
        <a href="#" id="forgotAdminPassword">Forgot Password?</a>
    </div>
</div>

<!-- Staff Login Modal (with Forgot Password) -->
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
        <a href="#" id="forgotStaffPassword">Forgot Password?</a>
    </div>
</div>

<!-- Forgot Password Modal -->
<div id="forgotPasswordModal" class="modal">
    <div class="modal-content">
        <span class="close" id="closeForgotPasswordModal">&times;</span>
        <h3>Forgot Password</h3>
        <form id="forgotPasswordForm" action="forgot_password.php" method="post">
            <label for="email">Enter your Email</label>
            <input type="email" id="forgot-password-email" name="email" placeholder="Email" required>
            <button type="submit" class="login-btn">Send Verification Code</button>
        </form>
    </div>
</div>

<!-- Reset Password Modal -->
<div id="resetPasswordModal" class="modal">
    <div class="modal-content">
        <span class="close" id="closeResetPasswordModal">&times;</span>
        <h3>Reset Password</h3>
        <form id="resetPasswordForm" action="reset_password.php" method="post">
            <input type="hidden" name="email" id="reset-email">
            <label for="verification-code">Verification Code</label>
            <input type="text" id="verification-code" name="verification_code" placeholder="Enter Code" required>

            <label for="new-password">New Password</label>
            <input type="password" id="new-password" name="new_password" placeholder="New Password" required>

            <label for="confirm-password">Confirm Password</label>
            <input type="password" id="confirm-password" name="confirm_password" placeholder="Confirm Password" required>

            <button type="submit" class="login-btn">Reset Password</button>
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