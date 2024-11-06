$(document).ready(function () {
    let categoryId;
    const regex = /^[a-zA-Z0-9àèéìòùÀÈÉÌÒÙ\s]+$/;
    listCategoryAjax();









    $(document).on('click', '.titleLink', function (event) {
        event.preventDefault();;
        $('.section-form-view').empty();
        if ($('.section-form-view').css('display') == 'block') {
            $('.section-form-view').css('display', 'none');
        }
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
                    }).appendTo('.list-div');
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
        if (($('.section-form-view').css('display') == 'none') && (!(method === 'DELETE'))) {
            $('.section-form-view').show();
        }

        $.ajax({
            type: method,
            url: url,
            dataType: "html",
            success: function (response) {
                if ($('.section-form-view').length) {
                    $('.section-form-view').empty();
                } else {
                    $('<div>', {
                        class: 'section-form-view'
                    }).appendTo('.container-section');
                }

                $('.section-form-view').html(response);
                if (method === 'DELETE') {
                    if ($('.section-form-view').css('display') == 'block') {
                        $('.section-form-view').css('display', 'none');
                    }
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
                $('.list-div').empty();
                $('.list-div').html(response);
                console.log('eseguo la creazione tabella');

            },
            error: function (xhr, error) {
                console.error('Errore nella richiesta AJAX:', error);
                console.log(xhr);

            }
        });
    }







    //listener sulle form delle view di inserimento e cambio per estrarre i dati e chiamare la giusta rotta per l'operazione
    $(document).on('submit', '.form form', function (event) {
        event.preventDefault();;
        const formId = this.id;
        const formData = new FormData(this);
        const formElement = $(this).data('element');
        let url;
        let elementId
        let isValid = true;
        const file = formData.get('image');
        for (let [key, value] of formData.entries()) {
            if (typeof value === 'string') {
                if (value === '') {
                    break;
                } else if (!regex.test(value)) {
                    alert(`Il campo "${key}" contiene caratteri non validi. Si accetano solo numeri, lettere e lettere accentate`);
                    isValid = false;
                    break;
                }

            }
        }
        if (!isValid) return;

        switch (formId) {
            case 'change-form-category':
                elementId = $(this).data('id');
                url = '/api/admin/category/' + elementId + '/change';
                break;
            case 'insert-form-category':
                url = '/api/admin/category/add';
                break;
            case 'insert-form-product':
                url = '/api/admin/category/' + categoryId + '/product/add'
                break;
            case 'change-form-product':
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
                $('.section-form-view').empty();
                if ($('.section-form-view').css('display') == 'block') {
                    $('.section-form-view').css('display', 'none');
                }
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
                if (xhr.status === 422) {
                    let errors = xhr.responseJSON.errors;
                    let errorMessage = '';
        
                    for (let key in errors) {
                        if (errors.hasOwnProperty(key)) {
                            errorMessage += errors[key][0] + "\n"; // Messaggio di errore per ogni campo
                        }
                    }
        
                    if (errorMessage) {
                        alert(errorMessage.trim()); // Mostra tutti i messaggi di errore in un alert
                    }
                } else if (xhr.status === 400) {
                    alert(xhr.responseJSON.message); // Mostra il messaggio di errore personalizzato
                } else {
                    alert("Si è verificato un errore imprevisto."); // Messaggio per errori generali
                }
        
                console.error('Errore nella richiesta AJAX:', xhr); // Log degli errori nella console
            }

            });


    });

});