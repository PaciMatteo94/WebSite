$(document).ready(function () {
    var allProducts = [];
    var operationProduct = [];
    $.ajax({
        type: "GET",
        url: "/api/getInfo",
        dataType: "JSON",
        success: function (response) {
            allProducts = response;
            var categories = [...new Set(response.map(product => product.category))];
            var products = [...new Set(response.map(product => product.name))];
            $.each(categories, function (index, category) {
                $('#categorySelect').append('<option value="' + category + '">' + category + '</option>');
            });
            $.each(products, function (index, product) {
                $('#productSelect').append('<option value="' + product + '">' + product + '</option>');
            });
        },
        error: function(xhr) {
            // Gestisci gli errori
            alert("Si è verificato un errore: " + xhr.responseText);
        }
    });

    $('#categorySelect').on('change', function () {
        var selectedCategory = $(this).val();  // Ottieni la categoria selezionata

        // Pulisci la select dei prodotti
        $('#productSelect').empty();
        $('#productSelect').append('<option value="">Seleziona un prodotto</option>');

        // Filtra i prodotti in base alla categoria selezionata
        if (selectedCategory) {
            var filteredProducts = allProducts.filter(function (product) {
                return product.category === selectedCategory;
            });

            // Aggiungi i prodotti filtrati alla select dei prodotti
            $.each(filteredProducts, function (index, product) {
                $('#productSelect').append('<option value="' + product.name + '">' + product.name + '</option>');
            });
        }
    });

    $('#form-operation').on('submit', function (event) {
        event.preventDefault();
        var selectedOperation = $('#operationSelect').val();
        console.log(selectedOperation);
        
        var selectedProduct = $('#productSelect').val();

        if(!selectedOperation){
            alert('Devi selezionare un operazione da compiere');
            return;
        }

        if(!selectedProduct){
            alert('Devi selezionare un prodotto')
            return;
        }

        $.ajax({
            type: "GET",
            url: "/api/getProduct",
            data: {name: selectedProduct},
            dataType: "JSON",
            success: function (response) {
                operationProduct = response;
                console.log(operationProduct);
                
            },
            error: function(xhr) {
                // Gestisci gli errori
                alert("Si è verificato un errore: " + xhr.responseText);
            }
        });
        
    });

});