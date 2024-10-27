// Add animation to specific cells when clicked
const tableRows = document.querySelectorAll("tr");

tableRows.forEach(row => {
  row.addEventListener("click", () => {
    row.classList.toggle("highlight");
  });
});
