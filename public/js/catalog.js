$(document).ready(function () {
    var testo;
    const regex = /^[a-zA-Z0-9]+$/;

//PARTE AJAX PER LA SELEZIONE DELLE CATEGORIE PRODOTTO



//controllo se sono entrato in catalogo tramite la home e prendo l'id selezionato dalla home
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


//acquisisco quale categorie sono selezionate
    $('.category-checkbox').change(function () {
        var selectedCategory = [];
        $('.category-checkbox:checked').each(function () {
            selectedCategory.push($(this).val());
            console.log(selectedCategory);
            
        });
        if(selectedCategory.length >0){
           // fetchProductsByCategories(selectedCategory);
        }else{
            $('#risultati').html('<div><p>Non ci sono categorie selezionate</p></div>');
        }
    });

function fetchProductsByCategories(data, page = 1){
    $.ajax({
        type: "GET",
        url: "/api/products",
        data: {'categories': selectedCategory},
        dataType: "HTML",
        success: function (response) {
            $('#risultati').html(data);
        },
        error: function (xhr, status, error) {
            console.error('Errore nella richiesta AJAX:', error);
        }
    });
}

// PARTE AJAX PER LA BARRA DI RICERCA CON ANCHE NOME PARZIALE
    $('#bottone-ricerca').on('click', function () {
        testo = $('#barra-ricerca').val().trim();
        if (testo === "" || !regex.test(testo)) {
            alert('Inserisci un termine di ricerca valido.');
        } else {
            fetchProducts(testo);
        }

    });


    $(document).on('click', '.pagination a', function (e) {
        e.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        fetchProducts(testo, page);
    });

    function fetchProducts(testo, page = 1) {
        $.ajax({
            type: "GET",
            url: "/api/list-products?page=" + page,
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