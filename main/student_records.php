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

            const studentName = row.querySelector('.firstname').textContent + ' ' + row.querySelector('.lastname').textContent;
            const violation = row.querySelector('.violation').textContent;
            const offense = row.querySelector('.offense').textContent;
            const sanction = row.querySelector('.sanction').textContent;
            const timestamp = row.querySelector('.timestamp').textContent;
            const imageUrl = row.querySelector('.profile-image').src;

            document.getElementById('student-id').textContent = studentId;
            document.getElementById('student-name').textContent = studentName;
            document.getElementById('violation').textContent = violation;
            document.getElementById('offense').textContent = offense;
            document.getElementById('sanction').textContent = sanction;
            document.getElementById('time').textContent = timestamp;

            document.getElementById('student-course').textContent = row.querySelector('.course').textContent;
            document.getElementById('student-department').textContent = row.querySelector('.department').textContent;

            document.getElementById('student-image').src = imageUrl;

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
                        location.reload();
                    } else {
                        alert('Error deleting record: ' + data.error);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while deleting the record.');
                });
            }
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
});
