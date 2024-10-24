$(document).ready(function () {
    var responseObj = [];
    var products;
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
                console.log(product.id);
                $('#productSelect').append('<option value="' + product.id + '" >' + product.name + '</option>');
            });
        },
        error: function (xhr) {
            // Gestisci gli errori
            alert("Si è verificato un errore: " + xhr.responseText);
        }
    });



    // mettere il caso di default delle categorie che rida la lista di tutti i prodotti

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
                console.log(product.id);
                $('#productSelect').append('<option value="' + product.id + '" >' + product.name + '</option>');
            });
        }
    });

    //richiesta ajax per ottenere una view con i malfunzionamenti e le soluzioni del prodotto selezionato
    $('#form-operation').on('submit', function (event) {
        event.preventDefault();
        var idProduct = $('#productSelect').val();
        console.log(idProduct);

        if (!idProduct) {
            alert('Devi selezionare un prodotto')
            return;
        }

        $.ajax({
            type: "GET",
            url: "/api/getInfoProduct/" + idProduct,
            data:{case: 'remove'},
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
    $(document).on('submit', '#malfunction-form', function (event) {
        event.preventDefault();
        var malfunctionId = $('#malfunctionSelect').val();
        $.ajax({
            type: "DELETE",
            url: "/api/delete.malfunction/" + malfunctionId,
            success: function (response) {
                $('#settore-modifiche').html('<p>Operazione completata con successo!</p>');

            },
            error: function (xhr) {
                // Gestisci gli errori
                alert("Si è verificato un errore: " + xhr.responseText);
            }
        });

    });


    //richiesta ajax per l'eliminazione della soluzione selezionata
    $(document).on('submit', '#solution-form', function (event) {
        event.preventDefault();
        var solutionId = $('#solutionSelect').val();
        $.ajax({
            type: "DELETE",
            url: "/api/delete.solution/" + solutionId,
            success: function (response) {
                $('#settore-modifiche').html('<p>Operazione completata con successo!</p>');

            },
            error: function (xhr) {
                // Gestisci gli errori
                alert("Si è verificato un errore: " + xhr.responseText);
            }
        });

    });



});

