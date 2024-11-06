$(document).ready(function () {
    //serve per salvare nello storage del browser l'id della categoria seleziona per la ricerca
    $('.ancora-catalogo').on('click', function (e) {
        e.preventDefault();
        var id = $(this).attr('id');
        localStorage.setItem('selectedId', id);
        window.location.href = "/catalog";
    })
});