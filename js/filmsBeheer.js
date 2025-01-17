let filmNaam = document.getElementById('filmName');

let deleteButton = document.getElementById('delete');

filmNaam.addEventListener('change', function () {
    window.location.href = 'http://localhost:3000/pages/editReserveringEnInfo.php?type=add&filmName=' + filmNaam.value;
    window.location.refresh();
});

deleteButton.addEventListener('click', function (e) {
    e.preventDefault();
    if (confirm('Weet je zeker dat je deze film wilt verwijderen?')) {
        window.location.href = 'http://localhost:3000/pages/editReserveringEnInfo.php?type=delete&filmName=' + filmNaam.value;
        window.location.refresh();
    }
});