
document.getElementById("searchForm").addEventListener("submit", function(event) {
    event.preventDefault();
    var searchTerm = document.getElementById("searchInput").value;
    fetch("php/controller/suche.php?search=" + encodeURIComponent(searchTerm))
        .then(response => response.text())
        .then(data => {
            document.getElementById("searchResults").innerHTML = data;
        })
        .catch(error => {
            console.error('Error:', error);
        });
});