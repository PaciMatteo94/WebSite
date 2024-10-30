$(document).ready(function () {
    var responseObj = [];
    var products;
    var selectedOption='';
    //ajax per ottenere solo i nomi dei prodotti e le loro categorie
    $.ajax({
        type: "GET",
        url: "/api/getInfo",
        dataType: "JSON",
        success: function (response) {
            responseObj = response;
            var categories = [...new Set(response.map(product => product.category))];
            products = response.map(product => {
                return {
                    id: product.id,
                    name: product.name
                };
            });

            //creazione delle opzioni per le select per categorie e prodotti
            $.each(categories, function (index, category) {
                $('#categorySelect').append('<option value="' + category + '">' + category + '</option>');
            });
            $.each(products, function (index, product) {
                $('#productSelect').append('<option value="' + product.id + '" >' + product.name + '</option>');
            });
        },
        error: function (xhr) {
            // Gestisci gli errori
            alert("Si è verificato un errore: " + xhr.responseText);
        }
    });




    //aggiorna la select dei prodotti in base alla categoria selezionata
    $('#categorySelect').on('change', function () {
        var selectedCategory = $(this).val();  // Ottieni la categoria selezionata

        // Pulisci la select dei prodotti
        $('#productSelect').empty();
        $('#productSelect').append('<option value="">Seleziona un prodotto</option>');

        // Filtra i prodotti in base alla categoria selezionata
        if (selectedCategory) {
            var filteredProducts = responseObj.filter(function (product) {
                return product.category === selectedCategory;
            });

            // Aggiungi i prodotti filtrati alla select dei prodotti
            $.each(filteredProducts, function (index, product) {
                $('#productSelect').append('<option value="' + product.id + '">' + product.name + '</option>');
            });
        } else if (selectedCategory === '') {
            //nel caso non è stata selezionata una categoria mostra tutti i prodotti nella select
            $('#productSelect').empty();
            $('#productSelect').append('<option value="">Seleziona un prodotto</option>');
            $.each(products, function (index, product) {
                $('#productSelect').append('<option value="' + product.id + '" >' + product.name + '</option>');
            });
        }
    });

    //richiesta ajax per ottenere una view con i malfunzionamenti e le soluzioni del prodotto selezionato
    $('#form-operation').on('submit', function (event) {
        event.preventDefault();
        var url='';
        var idProduct = $('#productSelect').val();
        selectedOption = $('#operationSelect').val();

        if (idProduct === '' || selectedOption === '') {
            alert('Bisogna selezionare un\'operazione e un prodotto su cui effettuare l\'operazine');
        }

        switch (selectedOption) {
            case 'malfunction':
                url = `/api/malfunctions/index/${idProduct}`;
                break;
            case 'solution':
                url = `/api/solutions/index/${idProduct}`;
                break;
            default:
                break;
        }



        $.ajax({
            type: "GET",
            url: url,
            dataType: "HTML",
            success: function (data) {
                $('#settore-modifiche').html(data);
            },
            error: function (xhr) {
                alert("Si è verificato un errore: " + xhr.responseText);
            }
        });


    });





    //importante capire perchè
    //richiesta ajax per l'eliminazione del malfunzionamento selezionato
    $(document).on('submit', '#operation', function (event) {
        event.preventDefault();
        var Id = $('#select').val();

        switch (selectedOption) {
            case 'malfunction':
                url = `/api/malfunctions/delete/${Id}`;
                break;
            case 'solution':
                url = `/api/solutions/delete/${Id}`;
                break;
            default:
                break;
        }



        $.ajax({
            type: "DELETE",
            url: url,
            success: function (response) {
                $('#settore-modifiche').empty();
                $('#settore-modifiche').html('<p>Operazione completata con successo!</p>');

            },
            error: function (xhr) {
                // Gestisci gli errori
                alert("Si è verificato un errore: " + xhr.responseText);
            }
        });

    });





});

