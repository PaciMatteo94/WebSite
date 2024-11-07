$(document).ready(function () {
    var testo = '';
    const regex = /^[a-zA-Z0-9àèéìòùÀÈÉÌÒÙ*]+$/;
    const regexText = /^[a-zA-Z0-9àèéìòùÀÈÉÌÒÙ\s\-\_\.\,\;\:]+$/;
    var selectedCategories = [];
    let productId;
    let malfunctionId;

    firstSearchClean();

    //listener per la form di ricerca: ottiene i dati e invia la richiesta 
    $('#search-form').on('submit', function(event) {
        event.preventDefault();
        const formData = new FormData(this);
        testo = formData.get('barra').trim();
        selectedCategories = formData.getAll('categories[]');
        if (($('.list-div').css('display') == 'block') || ($('.section-form-view').css('display') == 'block')) {
            $('.section-form-view').css('display', 'none');
            $('.list-div').css('display', 'none');
        }
        if (testo === '') {
            fetchProducts();
        } else if (!regex.test(testo)) {
            alert('Sono stati inseriti caratteri non validi o sono state inserite più parole')
        } else {
            fetchProducts();
        }
    });

    //listener per l'elemento di paginazione che reinvia la richiesta per nuovi elementi
    $(document).on('click', '.pagination a', function (event) {
        event.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        fetchProducts(page);
    });



    //listener per l'ancora sui prodotti
    $(document).on('click', '.link-product', function (event) {
        event.preventDefault();
        if ($('.list-div').css('display') == 'none') {
            $('.list-div').show();
        }
        if ($('.section-form-view').css('display') == 'block') {
            $('.section-form-view').css('display', 'none');
        }

        $('.section-form-view').empty();
        productId = $(this).attr('value');
        createMalfunctionList();
    });

    //listener sui titoli della tabella malfunzionamenti per ottenere le soluzioni correlate
    $(document).on('click', '.titleLink', function (event) {
        event.preventDefault();
        $('.section-form-view').empty();
        if ($('.section-form-view').css('display') == 'block') {
            $('.section-form-view').css('display', 'none');
        }
        malfunctionId = $(this).data('id');
        createSolutionList();
    });

    //listener sui bottoni aggiungi delle due tabelle, lo switch gestisce i casi su quale tabella avviene l'evento
    $(document).on('click', '#add', function (event) {
        event.preventDefault();
        const element = $(this).data('element');
        const method = 'GET';
        let url;
        switch (element) {
            case 'malfunction':
                url = 'api/staff/malfunction/insertView';
                break;
            case 'solution':
                url = 'api/staff/solution/insertView';
                break;
            default:
                break;
        }
        operationAjax(method, url);
    });

    //listener sui bottoni dell'occhio per visualizzare le info dell'elemento
    $(document).on('click', '.viewLink', function (event) {
        event.preventDefault();
        const element = $(this).data('element');
        elementId = $(this).data('id'); // Ottiene l'ID
        let url;
        switch (element) {
            case 'malfunction':
                url = 'api/staff/malfunction/' + elementId;
                break;
            case 'solution':
                url = 'api/staff/solution/' + elementId;
                break;
            default:
                break;
        }
        const method = 'GET';
        operationAjax(method, url);
    });

    //listener sui bottoni matita per ottenere la form per il cambio dei prodotti
    $(document).on('click', '.changeLink', function (event) {
        event.preventDefault();
        const element = $(this).data('element');
        elementId = $(this).data('id'); // Ottiene l'ID
        let url;
        switch (element) {
            case 'malfunction':
                url = 'api/staff/malfunction/' + elementId + '/change';
                break;
            case 'solution':
                url = 'api/staff/solution/' + elementId + '/change';
                break;
            default:
                break;
        }
        const method = 'GET';
        operationAjax(method, url);

    });

    //listener sui bottoni della croce per inviare la richiesta di eliminazione del prodotto
    $(document).on('click', '.removeLink', function (event) {
        event.preventDefault();
        const element = $(this).data('element');
        var result = confirm("Sei sicuro di voler rimuovere questo malfunzionamento?");
        if (result) {
            elementId = $(this).data('id'); // Ottiene l'ID
            let url;
            switch (element) {
                case 'malfunction':
                    url = 'api/staff/malfunction/' + elementId + '/delete';;
                    break;
                case 'solution':
                    url = 'api/staff/solution/' + elementId + '/delete';;
                    break;
                default:
                    break;
            }

            const method = 'DELETE';
            operationAjax(method, url, element);
        } else {
            alert("Operazione annullata.");
        }




    });


    //listener sulle form delle view di inserimento e cambio per estrarre i dati e chiamare la giusta rotta per l'operazione
    $(document).on('submit', '.form form', function (event) {
        event.preventDefault();
        const formId = this.id;
        const formData = new FormData(this);
        const formElement = $(this).data('element');
        let url;
        let elementId;
        let isValid = true;
        for (let [key, value] of formData.entries()) {
            if (typeof value === 'string') {
                if (value === '') {
                    break;
                }else if (!regexText.test(value)) {
                    alert(`Il campo "${key}" contiene caratteri non validi. Sono accettati solo numeri, lettere e lettere accentate.`);
                    isValid = false;
                    break;
                }
            }
        }
        
        if (!isValid) return;
        switch (formId) {
            case 'changeFormMalfunction':
                elementId = $(this).data('id');
                url = 'api/staff/malfunction/' + elementId + '/change'
                break;
            case 'insertFormMalfunction':
                url = 'api/staff/product/' + productId + '/malfunction/store'
                break;
            case 'insertFormSolution':
                url = 'api/staff/malfunction/' + malfunctionId + '/solution/store'
                break;
            case 'changeFormSolution':
                elementId = $(this).data('id');
                url = 'api/staff/solution/' + elementId + '/change'
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
                alert(response.message);
                if ($('.section-form-view').css('display') == 'block') {
                    $('.section-form-view').css('display', 'none');
                }
                switch (formElement) {
                    case 'malfunction':
                        createMalfunctionList();
                        break;
                    case 'solution':
                        createSolutionList();
                        break;
                    default:
                        break;
                }
            },
            error: function (xhr, error) {
                //visualizzazione dell'allert per i casi di errore
                if (xhr.status === 422) {
                    var errors = xhr.responseJSON.errors;
                    var errorMessage = '';
                    $.each(errors, function (key, messages) {
                        errorMessage += messages.join("\n") + "\n";
                    });
                    alert(errorMessage);  
                } else {
                    alert('Si è verificato un errore. Riprova.');
                    console.error('Errore nella richiesta AJAX:', error);
                    console.log(xhr);
                }

            }
        });


    });

    //funzione per la richiesta dei prodotti in base alla pagina
    function fetchProducts(page = 1) {
        console.log('arrivo');
        $.ajax({
            type: "GET",
            url: "api/staff/info?page=" + page,
            data: {
                search: [testo],
                categories: selectedCategories,
                user: 'staff'
            },
            dataType: "HTML",
            success: function (data) {
                $('#risultati').html(data);

            },
            error: function (xhr, error) {
                console.error('Errore nella richiesta AJAX:', error);
                console.log(xhr);

            }
        });
    }

    //funzione che invia la richiesta ajax in base hai parametri passati
    function operationAjax(method, url, element = null) {
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
                    }).appendTo('#show-info');
                    $('.section-form-view').show();
                }

                $('.section-form-view').html(response);
                if (method === 'DELETE') {
                    if ($('.section-form-view').css('display') == 'block') {
                        $('.section-form-view').css('display', 'none');
                    }
                    if (element == 'solution') {
                        createSolutionList()
                    } else {
                        createMalfunctionList();
                    }

                }

            },
            error: function (xhr, error) {
                console.error('Errore nella richiesta AJAX:', error);
                console.log(xhr);

            }
        });

    }

    //funzione che invia la richiesta ajax e inserisce la tabella dei malfunzionamenti
    function createMalfunctionList() {
        $.ajax({
            type: "GET",
            url: 'api/staff/product/' + productId + '/malfunction',
            dataType: "html",
            success: function (response) {
                $('.list-div').empty();
                $('.list-div').html(response);

            },
            error: function (xhr, error) {
                console.error('Errore nella richiesta AJAX:', error);
                console.log(xhr);

            }
        });
    }
    //funzione che invia la richiesta ajax e inserisce la tabella delle soluzioni
    function createSolutionList() {
        $.ajax({
            type: "GET",
            url: "api/staff/malfunction/" + malfunctionId + "/solution",
            dataType: "html",
            success: function (response) {
                if ($('#solutions-list').length) {
                    $('#solutions-list').empty();
                    $('#solutions-list').html(response);
                } else {
                    $('<div>', {
                        id: 'solutions-list'
                    }).appendTo('.list-div');
                    $('#solutions-list').html(response);
                }

            }
        });
    }

    //funzione per la prima ricerca quando si accede alla pagina e quando si aggiorna la pagina
    function firstSearchClean() {
        selectedCategories.length = 0;
        testo = '';
        $('#barra-ricerca').val('');
        $('.category-checkbox:checked').each(function () {
            selectedCategories.push($(this).val());

        });
        fetchProducts();
    }

});