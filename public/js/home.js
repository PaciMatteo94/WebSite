$(document).ready(function () {
    $('.ancora-catalogo').on('click', function (e) {
        e.preventDefault();
        var id = $(this).attr('id');
        localStorage.setItem('selectedId', id);
        window.location.href = "/catalog";
    })
});