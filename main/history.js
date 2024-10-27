document.addEventListener('DOMContentLoaded', function () {
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

    // Function to load the violation history in real-time
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
            
            if (data.length > 0) {
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
            } else {
                const row = document.createElement('tr');
                row.innerHTML = `<td colspan="4">No violation history found</td>`;
                historyBody.appendChild(row);
            }
        })
        .catch(error => console.error('Error loading violation history:', error));
    }

    // Handle clicking the edit button to load and show violation history
    document.querySelectorAll('.edit-btn').forEach(button => {
        button.addEventListener('click', (event) => {
            const row = event.target.closest('tr');
            const studentId = row.getAttribute('data-id');

            // Load the violation history for the student
            loadViolationHistory(studentId);

            // Open the modal
            openModal();
        });
    });

    // Close the modal when clicking close or outside the modal
    document.querySelector('.close').addEventListener('click', closeModal);
    window.onclick = function(event) {
        const modal = document.getElementById("profileModal");
        if (event.target === modal) {
            closeModal();
        }
    };
});

    // Function to filter the table based on search input
    document.getElementById('searchBtn').addEventListener('click', function () {
        const input = document.getElementById('search').value.toLowerCase();
        const rows = document.querySelectorAll('#history-table-body tr');
        
        rows.forEach(row => {
            const studentId = row.querySelector('td:first-child').textContent.toLowerCase();
            const lastName = row.querySelector('.lastname').textContent.toLowerCase();

            // Check if input matches ID or Last Name
            if (studentId.includes(input) || lastName.includes(input)) {
                row.style.display = ''; // Show row if match
            } else {
                row.style.display = 'none'; // Hide row if no match
            }
        });
    });

    // Function to reset the search and display all rows
    document.getElementById('cancelBtn').addEventListener('click', function () {
        const rows = document.querySelectorAll('#history-table-body tr');
        document.getElementById('search').value = ''; // Clear the search input
        rows.forEach(row => {
            row.style.display = ''; // Show all rows
        });
    });

// Cancel functionality
document.querySelector('.cancel').addEventListener('click', () => {
    closeModal(); // Assuming you have a closeModal function to hide the modal
});
function closeModal() {
    const modal = document.getElementById('yourModalId'); // Change this to your modal's ID
    modal.style.display = 'none'; // Hide the modal
}
// Function to close the modal
function closeModal() {
    const modal = document.getElementById('profileModal'); // Ensure this matches your modal ID
    modal.style.display = 'none'; // Hide the modal
}

// Event listener for the Cancel button
document.addEventListener("DOMContentLoaded", () => {
    // Other code...

    // Cancel Button functionality
    document.querySelector('.cancel').addEventListener('click', closeModal); // Close the modal when clicked
});