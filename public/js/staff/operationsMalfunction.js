$(document).ready(function () {
    //variabili globali che salvano dati da usare in vari eventi
    var operation;
    var categories;
    var products;
    var productId;

    //evento per la scelta dell'operazione da effettuare
    $('#operation').on('click', '.operation-link', function (event) {
        event.preventDefault();
        $('#visualization-section').empty();

        operation = $(this).attr('id');
        ajaxSelections();

    });

    /*
    Evento sulla select del caso modifica. 
    Serve per filtrare i prodotti in base alla categoria scelta in modo avere una ricerca migliore
    */
    $(document).on('change', '#categorySelect', function (event) {
        event.preventDefault();
        var productsAssociated;
        var selectedCategory = $(this).val();
        if (selectedCategory === '') {
            $(`#${idSelect}`).empty();
            $(`#${idSelect}`).append(new Option("Seleziona un prodotto", ""));
            products.forEach(product => {
                $(`#${idSelect}`).append(new Option(product.name, product.id));
            });
        } else {
            var productsAssociated = products.filter(function (product) {
                return product.category === selectedCategory;
            });
            $(`#${idSelect}`).empty();
            $(`#${idSelect}`).append(new Option("Seleziona un prodotto", ""));
            productsAssociated.forEach(product => {
                $(`#${idSelect}`).append(new Option(product.name, product.id));
            });
        }
    });


    /*
    Evento sulla select del caso modifica. 
    ogni volta che si cambia il prodotto selezionato chiama il db per ottenere i dati del prodotto e visualizzare la form di modifica
    */
    $(document).on('change', '#productSelect', function (event) {
        productId = $(this).val();
        let url = '';
        $('<div>', {
            id: 'formView'
        }).appendTo('#visualization-section');

        switch (operation) {
            case 'insert':
                url = '/api/staff/insert/malfunction'
                break;
            case 'change':
                url = '/api/staff/change/malfunction'
                break;
            case 'remove':
                url = '/api/staff/remove/malfunction'
                break;

            default:
                break;
        }

        $.ajax({
            type: "GET",
            url: url,
            dataType: "html",
            success: function (response) {
                $('#formView').html(response);
            }
        });

    });







    //Funzione che ottiene con una richiesta ajax le categorie e i prodotti con solo nome,id e categoria
    function ajaxSelections() {
        $.ajax({
            type: "GET",
            url: '/api/staff/info',
            dataType: "JSON",
            success: function (response) {
                createSelections(response);
            },
            error: function (xhr) {
                alert('Errore durante l’inserimento dei dati');
                console.log(xhr);
            }
        });
    }

    //funzione che crea la select della categoria e dei prodotti. 
    function createSelections(datas) {
        categories = datas.categories;
        products = datas.products.map(product => {
            return {
                id: product.id,
                name: product.name,
                category: product.category
            };
        });
        var $categorySelect = $('<select>', { id: 'categorySelect' });
        $categorySelect.append(new Option("Seleziona una categoria", ""));
        categories.forEach(category => {
            $categorySelect.append(new Option(category, category));
        });

        var $productSelect = $('<select>', { id: 'productSelect' });
        $productSelect.append(new Option("Seleziona un prodotto", ""));
        products.forEach(product => {
            $productSelect.append(new Option(product.name, product.id));
        });

        $('<div>', {
            id: 'select-product'
        }).appendTo('#visualization-section');

        $('#select-product').append('<label for="categorySelect">Categoria:</label>', $categorySelect);
        $('#select-product').append('<br><label for="productSelect">Prodotto:</label>', $productSelect);



    }

});