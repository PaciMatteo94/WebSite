$(document).ready(function () {
    //variabili globali che salvano dati da usare in vari eventi
    var operation;
    var categories;
    var products;
    var productId;
    var idSelect = '';

    //evento per la scelta dell'operazione da effettuare
    $('#operation').on('click', '.operation-link', function (event) {
        event.preventDefault();
        $('#visualization-section').empty();

        operation = $(this).attr('id');

        switch (operation) {
            case 'insert':
                $.ajax({
                    type: "GET",
                    url: '/api/admin/product/insert',
                    dataType: "HTML",
                    success: function (response) {
                        $('<div>', {
                            id: 'formView'
                        }).appendTo('#visualization-section');
                        $('#formView').html(response);
        
                    },
                    error: function (xhr) {
                        alert('Errore durante l’inserimento dei dati');
                        console.log(xhr);
        
                    }
                });
                break;

            case 'change':
                ajaxSelections();
                return;

            case 'remove':
                ajaxSelections();
                return;

            default:
                $('#visualization-section').empty();
                $('#visualization-section').html('<p>Si è verificato un errore, perfavore segnlare il problema all\'assistenza</p>');
                break;
        }




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
        $('<div>', {
            id: 'changeFormView'
        }).appendTo('#visualization-section');
        $.ajax({
            type: "GET",
            url: "/api/admin/product/change/product/" + productId,
            dataType: "HTML",
            success: function (response) {
                $('#changeFormView').empty();
                $('#changeFormView').html(response);

            },
            error: function (xhr) {
                alert('Errore durante l’inserimento dei dati');
                console.log(xhr);

            }
        });

    });


    /*
    Evento sulla select del caso modifica. 
    Si estraggono i dati dalla form e li si inviano per la modifica nel db
    */
    $(document).on('submit', '#changeProductForm', function (event) {
        event.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type: "PUT",
            url: "/api/admin/product/change2/product/" + productId,
            data: formData,
            contentType: false, // Imposta a false per inviare i dati correttamente
            processData: false,
            success: function (response) {
                $('#visualization-section').empty();
                $('#visualization-section').html('<p>operazione eseguita con successo</p>');
            },
            error: function (xhr) {
                alert('Errore durante l’inserimento dei dati');
                console.log(xhr);

            }
        });
    });

    /*
    Evento per il caso della remove. 
    Si estra l'id dalla form e si manda la richiesta di rimozione.
    */
    $(document).on('submit', '#form-product', function (event) {
        event.preventDefault();
        var productIdForm = $('#productFormSelect').val();
        console.log(productIdForm);
        
        $.ajax({
            type: "DELETE",
            url: "/api/admin/product/deleteOp/" + productIdForm,
            success: function (response) {
                $('#visualization-section').empty();
                $('#visualization-section').html('<p>operazione eseguita con successo</p>');
            },
            error: function (xhr) {
                alert('Errore durante l’inserimento dei dati');
                console.log(xhr);

            }
        });

    });

    /*
    Evento per il caso di insert. 
    Si estraggono i dati dalla form che vengono inviati per l'inserimento di un nuovo utente.
    */
    $(document).on('submit','#form-insert', function (event) {
        event.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type: "POST",
            url: "/api/admin/product/insertOp",
            data: formData,
            contentType: false, // Imposta a false per inviare i dati correttamente
            processData: false,
            success: function (response) {
                $('#visualization-section').empty();
                $('#visualization-section').html('<p>operazione eseguita con successo</p>');
            },
            error: function (xhr) {
                alert('Errore durante l’inserimento dei dati');
                console.log(xhr);

            }
        });
    });














    //Funzione che ottiene con una richiesta ajax le categorie e i prodotti con solo nome,id e categoria
    function ajaxSelections() {
        $.ajax({
            type: "GET",
            url: '/api/admin/product/change',
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
        switch (operation) {
            case 'change':
                idSelect = 'productSelect'

                break;
            case 'remove':
                idSelect = 'productFormSelect'
                break;

            default:
                $('#visualization-section').empty();
                $('#visualization-section').html('<p>Si è verificato un errore, perfavore segnlare il problema all\'assistenza</p>');
                return;
        }
        var $categorySelect = $('<select>', { id: 'categorySelect' });
        $categorySelect.append(new Option("Seleziona una categoria", ""));
        categories.forEach(category => {
            $categorySelect.append(new Option(category, category));
        });

        var $productSelect = $('<select>', { id: idSelect });
        $productSelect.append(new Option("Seleziona un prodotto", ""));
        products.forEach(product => {
            $productSelect.append(new Option(product.name, product.id));
        });

        switch (operation) {
            case 'change':
                $('<div>', {
                    id: 'select-product'
                }).appendTo('#visualization-section');

                $('#select-product').append('<label for="categorySelect">Categoria:</label>', $categorySelect);
                $('#select-product').append('<br><label for="productSelect">Prodotto:</label>', $productSelect);
                break;
            case 'remove':
                $('<form>', {
                    id: 'form-product'
                }).appendTo('#visualization-section');
                $('#form-product').append('<label for="categorySelect">Categoria:</label>', $categorySelect);
                $('#form-product').append('<br><label for="productSelect">Prodotto:</label>', $productSelect);
                $('<input>', {
                    type: 'submit',
                    id: 'form-product'
                }).appendTo('#form-product');
                break;
            default:
                $('#visualization-section').empty();
                $('#visualization-section').html('<p>Si è verificato un errore, perfavore segnlare il problema all\'assistenza</p>');
                return;
        }


    }

});