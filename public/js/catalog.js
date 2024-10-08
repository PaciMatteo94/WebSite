$(document).ready(function () {
    var testo;
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

    $('#bottone-ricerca').on('click', function () {
        testo =$('#barra-ricerca').val();
        fetchProducts(testo);      
    });


    $(document).on('click', '.pagination a', function(e) {
        e.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        fetchProducts(testo, page);
    });

    function fetchProducts(testo, page=1){
        $.ajax({
            type: "GET",
            url: "/api/list-products?page=" +page,
            data: { products: [testo] },
            dataType: "HTML",
            success: function (data) {
                $('#risultati').html(data);
            },
            error: function (xhr, status, error) {
                console.error('Errore nella richiesta AJAX:', error);
            }
        });
    }






});