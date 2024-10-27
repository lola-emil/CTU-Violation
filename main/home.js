// Get modal elements
var adminModal = document.getElementById("adminModal");
var staffModal = document.getElementById("staffModal");

// Get buttons to trigger modals
var adminBtn = document.getElementById("admin-btn");
var staffBtn = document.getElementById("staff-btn");

// Close buttons
var closeAdmin = document.getElementById("closeAdmin");
var closeStaff = document.getElementById("closeStaff");

// When the user clicks the Admin button, open the Admin modal
adminBtn.onclick = function() {
    adminModal.style.display = "flex";
}

// When the user clicks the Staff button, open the Staff modal
staffBtn.onclick = function() {
    staffModal.style.display = "flex";
}

// When the user clicks on (x), close the Admin modal
closeAdmin.onclick = function() {
    adminModal.style.display = "none";
}

// When the user clicks on (x), close the Staff modal
closeStaff.onclick = function() {
    staffModal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == adminModal) {
        adminModal.style.display = "none";
    }
    if (event.target == staffModal) {
        staffModal.style.display = "none";
    }
}
