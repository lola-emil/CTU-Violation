<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Violation Tracking System</title>
    <link rel="stylesheet" href="Sstyles.css">
    <link rel="stylesheet" href="pstyles.css">
    <link rel="stylesheet" href="staff.css">

    <style>
        .timer {
            text-align: center;
        }
    </style>
</head>
<body>
    
    <div class="container">
        <aside class="sidebar">
            <h2>E-Logbook</h2>
            <ul>
            <a href="index.php" id="dashboardLink">Dashboard</a> <!-- Adjust this based on your actual link -->
            <li><a href="#" class="active">COT Pending Records</a></li>
            <li><a href="cot_history_records.php" class="active">COT History of Violation Records</a></li>
                <li><a href="#">COE Students Records</a></li>
            </ul>
        </aside>


        <main class="content">
            <h2>Student Records</h2>
            <input type="text" id="search" placeholder="Search by ID or Last Name..." class="search-bar" />
            <button id="searchBtn">Search</button>
            <button id="cancelBtn">Cancel</button>

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Last Name</th>
                        <th>First Name</th>
                        <th>Violation</th>
                        <th>Offense</th>
                        <th>Sanction</th>
                        <th>Date and Time</th>
                        <th>Course</th>
                        <th>Department</th>
                        <th>Image</th> <!-- Added Image Column -->
                        <th>Actions</th>
                        <th>Timer</th>
                    </tr>
                </thead>
                <tbody id="student-table-body">
    <?php
        include 'formatTime.php'; // Adjust the path if needed

        // Connect to the database
        $servername = "127.0.0.1";
        $username = "root";
        $password = "";
        $dbname = "violation_tracker";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Fetch all violations
        $sql = "SELECT * FROM violations";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<tr data-id='" . htmlspecialchars($row['student_id']) . "'>";
                echo "<td>" . htmlspecialchars($row['student_id']) . "</td>";
                echo "<td class='lastname'>" . htmlspecialchars($row['lastname']) . "</td>";
                echo "<td class='firstname'>" . htmlspecialchars($row['firstname']) . "</td>";

                // Check if 'violation' key exists in the array
                $violation = isset($row['violation']) ? htmlspecialchars($row['violation']) : 'N/A';
                echo "<td class='violation'>" . $violation . "</td>";

                // Fetch offense and sanction from the database
                echo "<td class='offense'>" . htmlspecialchars($row['offense'] ?? 'N/A') . "</td>";
                echo "<td class='sanction'>" . htmlspecialchars($row['sanction'] ?? 'N/A') . "</td>";

                echo "<td class='timestamp'>" . htmlspecialchars($row['timestamp']) . "</td>";
                echo "<td class='course'>" . htmlspecialchars($row['course'] ?? 'N/A') . "</td>";
                echo "<td class='department'>" . htmlspecialchars($row['department'] ?? 'N/A') . "</td>";

                // Handle image URL with fallback
                $imageUrl = !empty($row['image_url']) ? htmlspecialchars($row['image_url']) : 'ID/Students/default.jpg'; // Replace with your default image path
                echo "<td><img class='profile-image' src='" . $imageUrl . "' alt='Profile Image' width='50' /></td>";
                
                echo "<td>
                        <button class='edit-btn' data-id='" . htmlspecialchars($row['student_id']) . "'>Edit</button>
                        <button class='delete-btn' data-id='" . htmlspecialchars($row['student_id']) . "'>Delete</button>
                      </td>";
                echo "<td class='timer' data-id='".$row['id']."' data-time='".($row['end_time']).
                "' data-cycle='".$row['cycle']."'>" . 
                0 . 
                "</td>"; // Timer Cell
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='12'>No records found</td></tr>";
        }

        $conn->close();
    ?>
</tbody>
            </table>
        </main>
    </div>

    <script>
           // Function to reload the page when cancel button is clicked
           document.getElementById('cancelBtn').addEventListener('click', function() {
            window.location.reload();
        });

        // Function to open the modal
        function openModal() {
            const modal = document.getElementById("profileModal");
            modal.style.display = "block";
        }

        // Function to close the modal
        function closeModal() {
            const modal = document.getElementById("profileModal");
            modal.style.display = "none";
        }

        // Event listener for edit buttons and delete buttons
        document.addEventListener("DOMContentLoaded", () => {
            // Edit button functionality
            document.querySelectorAll('.edit-btn').forEach(button => {
                button.addEventListener('click', (event) => {
                    const row = event.target.closest('tr');
                    const studentId = row.getAttribute('data-id');

                    // Get student data from the row
                    const studentName = row.querySelector('.firstname').textContent + ' ' + row.querySelector('.lastname').textContent;
                    const violation = row.querySelector('.violation').textContent;
                    const offense = row.querySelector('.offense').textContent;
                    const sanction = row.querySelector('.sanction').textContent;
                    const timestamp = row.querySelector('.timestamp').textContent;
                    const imageUrl = row.querySelector('.profile-image').src; // Get image URL

                    // Populate modal with student data
                    document.getElementById('student-id').textContent = studentId;
                    document.getElementById('student-name').textContent = studentName;
                    document.getElementById('violation').textContent = violation;
                    document.getElementById('offense').textContent = offense;
                    document.getElementById('sanction').textContent = sanction;
                    document.getElementById('time').textContent = timestamp;

                    // Populate course and department
                    document.getElementById('student-course').textContent = row.querySelector('.course').textContent;
                    document.getElementById('student-department').textContent = row.querySelector('.department').textContent;

                    // Set the image in the modal
                    document.getElementById('student-image').src = imageUrl; // Update image in modal

                    // Open the modal
                    openModal();
                });
            });

            // Delete button functionality
            document.querySelectorAll('.delete-btn').forEach(button => {
                button.addEventListener('click', (event) => {
                    const studentId = event.target.getAttribute('data-id');

                    if (confirm('Are you sure you want to delete this record?')) {
                        fetch('delete_student.php', {
    method: 'POST',
    headers: {
        'Content-Type': 'application/x-www-form-urlencoded'
    },
    body: 'student_id=' + encodeURIComponent(studentId)
})
.then(response => response.json())
.then(data => {
    if (data.success) {
        alert('Student record deleted successfully');
        location.reload(); // Reload the page to reflect changes
    } else {
        alert('Error deleting record: ' + (data.error || 'Unknown error'));
    }
})
.catch(error => {
    console.error('Error:', error);
    alert('An error occurred while deleting the record: ' + error.message);
});

                    }
                });
            });

            // Close modal functionality
            document.querySelector('.close').addEventListener('click', closeModal);

            // Close the modal when clicking outside the content
            window.onclick = function(event) {
                const modal = document.getElementById("profileModal");
                if (event.target === modal) {
                    closeModal();
                }
            };
        });
    </script>
    
    <script>
document.addEventListener('DOMContentLoaded', function () {
    // Fetch the student's violation history and populate the modal
    function loadViolationHistory(studentId) {
        fetch('get_violation_history.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: 'student_id=' + encodeURIComponent(studentId)
        })
        .then(response => response.json())
        .then(data => {
            const historyBody = document.getElementById('violation-history-body');
            historyBody.innerHTML = ''; // Clear existing rows
            
            data.forEach(record => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${record.violation}</td>
                    <td>${record.offense}</td>
                    <td>${record.sanction}</td>
                    <td>${record.timestamp}</td>
                `;
                historyBody.appendChild(row);
            });
        });
    }

    // Call loadViolationHistory() inside your edit button event listener
    // document.querySelectorAll('.edit-btn').forEach(button => {
    //     button.addEventListener('click', (event) => {
    //         const studentId = event.target.closest('tr').getAttribute('data-id');
    //         loadViolationHistory(studentId); // Load violation history for this student
    //     });
    // });

    document.addEventListener("click", evt => {
        if (evt.target.matches("button[data-id]")) {
            const studentId = evt.target.getAttribute("data-id");
            console.log(studentId)
            loadViolationHistory(studentId); // Load violation history for this student
        }
    })
});
</script>

    <!-- Modal Structure -->
    <div id="profileModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <div class="profile-container">
                <div class="header">
                    <h1>Student Profile</h1>
                </div>
                <div class="profile-details">
                    <div class="profile-picture">
                        <img src="https://via.placeholder.com/100" alt="Profile Picture" id="student-image">
                    </div>
                    <div class="profile-info">
                        <p><strong>ID Number:</strong> <span id="student-id">1234567</span></p>
                        <p><strong>Name:</strong> <span id="student-name">Juan DeLa Cruz</span></p>
                        <p><strong>Course:</strong> <span id="student-course">Information Technology</span></p>
                        <p><strong>Department:</strong> <span id="student-department">Technology</span></p>
                    </div>
                </div>

                <div class="violation-section">
                    <table>
                        <tr>
                            <th>Violation</th>
                            <th>Offense</th>
                            <th>Sanction</th>
                            <th>Date and Time</th>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" id="violation" readonly> <!-- Change this to an input field for exact violation -->
                            </td>
                            <td><input type="text" id="offense" value="1st Offense" readonly></td>
                            <td><input type="text" id="sanction" value="Warning" readonly></td>
                            <td><input type="text" id="time" readonly></td> <!-- Keep this as readonly to show date/time -->
                        </tr>
                    </table>
                </div>
                <div class="violation-history">
    <h3>Violation History</h3>
    <table>
        <thead>
            <tr>
                <th>Violation</th>
                <th>Offense</th>
                <th>Sanction</th>
                <th>Date and Time</th>
            </tr>
        </thead>
        <tbody id="violation-history-body">
            <!-- Violation history rows will be appended here dynamically -->
        </tbody>
    </table>
</div>

                <div class="buttons">
                    <button class="print">Print</button>
                    <button class="cancel">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Add this code inside the body tag of students_record.php -->

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
        <?php if (!empty($error_message)): ?>
            <div class="error-message">
                <p><?php echo $error_message; ?></p>
            </div>
        <?php endif; ?>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    // Open the staff modal when dashboard is clicked
    const dashboardLink = document.querySelector('a[href="index.php"]');
    const staffModal = document.getElementById('staffModal');

    dashboardLink.addEventListener('click', (e) => {
        e.preventDefault(); // Prevent the default link behavior
        staffModal.style.display = 'block'; // Show the staff modal
    });

    // Close staff modal
    document.getElementById('closeStaff').onclick = function() {
        staffModal.style.display = 'none';
    }

    // Close modal when clicking outside of it
    window.onclick = function(event) {
        if (event.target == staffModal) {
            staffModal.style.display = 'none';
        }
    }
});
</script>
<?php
// Sample query to fetch student violation time

if (isset($_POST['student_id'])) {
    $student_id = $_POST['student_id']; // Assuming you pass the student ID via POST

// Query the database to get the student's violation data
$query = "SELECT firstname, lastname, violation_time FROM violation_history WHERE student_id = '$student_id'";
$result = mysqli_query($connection, $query);

if(mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    // Send the data back as JSON, including the time
    echo json_encode([
        'firstname' => $row['firstname'],
        'lastname' => $row['lastname'],
        'violation_time' => $row['violation_time'], // This could be a countdown or timestamp
    ]);
} else {
    echo json_encode(['error' => 'No record found']);
}
}

?>


    <script src="script.js"></script>

</body>
</html>
