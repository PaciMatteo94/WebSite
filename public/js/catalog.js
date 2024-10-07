$(document).ready(function () {

    if (localStorage.length > 0) {
        $('input[type="checkbox"][value="' + localStorage.getItem('selectedId') + '"]').prop('checked', true);
        $.ajax({
            type: "GET",
            url: "/api/products",
            data: { categories: [localStorage.getItem('selectedId')] },
            dataType: "HTML",
            success: function (data) {
                $('#risultati').html(data);
            },
            error: function (xhr, status, error) {
                console.error('Errore nella richiesta AJAX:', error);
            }

        });
        localStorage.clear();

    } else {
        $('#risultati').html('<div><p>Non ci sono categorie selezionate</p></div>');
    }

    $('.category-checkbox').change(function () {
        var selectedCategory = [];
        $('.category-checkbox:checked').each(function () {
            selectedCategory.push($(this).val());
        });



        $.ajax({
            type: "GET",
            url: "/api/products",
            data: { categories: selectedCategory },
            dataType: "HTML",
            success: function (data) {
                $('#risultati').html(data);
            },
            error: function (xhr, status, error) {
                console.error('Errore nella richiesta AJAX:', error);

            }

        });

    });

});