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

// Event listener for edit and delete buttons
document.addEventListener("DOMContentLoaded", () => {
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
            const imageUrl = row.querySelector('.profile-image').src;

            // Populate modal with student data
            document.getElementById('student-id').textContent = studentId;
            document.getElementById('student-name').textContent = studentName;
            document.getElementById('violation').value = violation;
            document.getElementById('offense').value = offense;
            document.getElementById('sanction').value = sanction;
            document.getElementById('time').value = timestamp;
            document.getElementById('student-image').src = imageUrl;

            // Fetch and display the violation history
            fetchViolationHistory(studentId);

            // Open the modal
            openModal();
        });
    });

    // Close modal functionality
    document.querySelector('.close').addEventListener('click', closeModal);
    window.onclick = function(event) {
        const modal = document.getElementById("profileModal");
        if (event.target === modal) {
            closeModal();
        }
    };

    // Delete functionality
    document.querySelectorAll('.delete-btn').forEach(button => {
        button.addEventListener('click', (event) => {
            const studentId = event.target.getAttribute('data-id');
            if (confirm('Are you sure you want to delete this record?')) {
                fetch('delete_violation.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: 'student_id=' + studentId,
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Record deleted successfully');
                        location.reload();
                    } else {
                        alert('Error deleting the record: ' + data.error);
                    }
                })
                .catch(error => console.error('Error:', error));
            }
        });
    });

    // Search functionality
    document.getElementById('search-btn').addEventListener('click', () => {
        const studentId = document.getElementById('search-input').value;
        if (studentId) {
            fetch('search_violation.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'student_id=' + studentId,
            })
            .then(response => response.text())
            .then(html => {
                document.getElementById('history-table-body').innerHTML = html;
            })
            .catch(error => console.error('Error:', error));
        }
    });

    // Cancel functionality
    document.getElementById('cancel-btn').addEventListener('click', () => {
        location.reload();
    });
});

// Fetch violation history for the student
function fetchViolationHistory(studentId) {
    fetch('get_violation_history.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: 'student_id=' + encodeURIComponent(studentId)
    })
    .then(response => response.json())
    .then(data => {
        if (data.error) {
            console.error('Error fetching violation history:', data.error);
        } else {
            const historyBody = document.getElementById('violation-history');
            historyBody.innerHTML = ''; // Clear existing history
            data.forEach(record => {
                const row = `<tr>
                    <td>${record.violation}</td>
                    <td>${record.offense}</td>
                    <td>${record.sanction}</td>
                    <td>${record.timestamp}</td>
                </tr>`;
                historyBody.innerHTML += row;
            });
        }
    })
    .catch(error => console.error('Fetch error:', error));
}
