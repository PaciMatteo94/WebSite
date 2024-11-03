$(document).ready(function () {
    let categoryId;
    listCategoryAjax();









    $(document).on('click', '.titleLink', function (event) {
        event.preventDefault();;
        $('#sectionFormView').empty();
        categoryId = $(this).data('id');
        createProductList();
    });

    function createProductList() {
        $.ajax({
            type: "GET",
            url: "/api/admin/category/" + categoryId + "/product",
            dataType: "html",
            success: function (response) {
                if ($('#productsList').length) {
                    $('#productsList').empty();
                    $('#productsList').html(response);
                } else {
                    $('<div>', {
                        id: 'productsList'
                    }).appendTo('#results');
                    $('#productsList').html(response);
                }

            }
        });
    }
    $(document).on('click', '#add', function (event) {
        event.preventDefault();;
        const element = $(this).data('element');
        const method = 'GET';
        let url;
        switch (element) {
            case 'category':
                url = '/api/admin/category/insertView';
                break;
            case 'product':
                url = '/api/admin/product/insertView';
                break;
            default:
                break;
        }
        listOperationAjax(method, url);
    });

    //listener sui bottoni dell'occhio per visualizzare le info dell'elemento
    $(document).on('click', '.viewLink', function (event) {
        event.preventDefault();;
        const element = $(this).data('element');
        elementId = $(this).data('id'); // Ottiene l'ID
        console.log(elementId);

        let url;
        switch (element) {
            case 'category':
                url = '/api/admin/category/' + elementId + '/info';
                break;
            case 'product':
                url = '/api/admin/product/' + elementId + '/info';
                break;
            default:
                break;
        }
        const method = 'GET';
        listOperationAjax(method, url);
    });


    //listener sui bottoni matita per ottenere la form per il cambio degli elementi
    $(document).on('click', '.changeLink', function (event) {
        event.preventDefault();;
        const element = $(this).data('element');
        elementId = $(this).data('id'); // Ottiene l'ID
        let url;
        switch (element) {
            case 'category':
                url = '/api/admin/category/' + elementId + '/change';
                break;
            case 'product':
                url = '/api/admin/product/' + elementId + '/change';
                break;
            default:
                break;
        }
        const method = 'GET';
        listOperationAjax(method, url);

    });

    //listener sui bottoni della croce per inviare la richiesta di eliminazione del prodotto
    $(document).on('click', '.removeLink', function (event) {
        event.preventDefault();;
        const element = $(this).data('element');
        var result = confirm("Sei sicuro di voler rimuovere questo malfunzionamento?");
        if (result) {
            elementId = $(this).data('id'); // Ottiene l'ID
            let url;
            switch (element) {
                case 'category':
                    url = '/api/admin/category/' + elementId + '/remove';
                    break;
                case 'product':
                    url = '/api/admin/product/' + elementId + '/remove';
                    break;
                default:
                    break;
            }

            const method = 'DELETE';
            listOperationAjax(method, url, element);
        } else {
            alert("Operazione annullata.");
        }




    });





    //funzione che invia la richiesta ajax in base hai parametri passati
    function listOperationAjax(method, url, element = null) {
        console.log(url);

        $.ajax({
            type: method,
            url: url,
            dataType: "html",
            success: function (response) {
                if ($('#sectionFormView').length) {
                    $('#sectionFormView').empty();
                } else {
                    $('<div>', {
                        id: 'sectionFormView'
                    }).appendTo('#container-section');
                }

                $('#sectionFormView').html(response);
                if (method === 'DELETE') {
                    if (element == 'product') {
                        createProductList();
                    } else {
                        listCategoryAjax();
                    }

                }

            },
            error: function (xhr, error) {
                console.error('Errore nella richiesta AJAX:', error);
                console.log(xhr);

            }
        });



    }


    function listCategoryAjax() {
        $.ajax({
            type: "GET",
            url: '/api/admin/category',
            dataType: "html",
            success: function (response) {
                $('#productsList').empty();
                $('#list-div').empty();
                $('#list-div').html(response);
                console.log('eseguo la creazione tabella');

            },
            error: function (xhr, error) {
                console.error('Errore nella richiesta AJAX:', error);
                console.log(xhr);

            }
        });
    }







    //listener sulle form delle view di inserimento e cambio per estrarre i dati e chiamare la giusta rotta per l'operazione
    $(document).on('submit', '#form form', function (event) {
        event.preventDefault();;
        const formId = this.id;
        const formData = new FormData(this);
        const formElement = $(this).data('element');
        let url;
        let elementId
        switch (formId) {
            case 'changeFormCategory':
                elementId = $(this).data('id');
                url = '/api/admin/category/' + elementId + '/change';
                break;
            case 'insertFormCategory':
                url = '/api/admin/category/add';
                break;
            case 'insertFormProduct':
                url = '/api/admin/category/' + categoryId + '/product/add'
                break;
            case 'changeFormProduct':
                elementId = $(this).data('id');
                url = '/api/admin/product/' + elementId + '/change'
                break;
            default:
                break;
        }

        $.ajax({
            type: "POST",
            url: url,
            data: formData,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function (response) {
                $('#sectionFormView').empty();
                alert(response.message);
                switch (formElement) {
                    case 'category':
                        listCategoryAjax();
                        break;
                    case 'product':
                        createProductList();
                        break;
                    default:
                        break;
                }
            },
            error: function (xhr, error) {
                console.error('Errore nella richiesta AJAX:', error);
                console.log(xhr);

            }
        });


    });

});