$(document).ready(function () {
    var testo = '';
    const regex = /^[a-zA-Z0-9àèéìòùÀÈÉÌÒÙ*]+$/;
    var selectedCategories = [];
    let productId;
    let malfunctionId;

    //PARTE AJAX PER LA SELEZIONE DELLE CATEGORIE PRODOTTO

    //listener per la form di ricerca: ottiene i dati e invia la richiesta 
    document.getElementById('search-form').addEventListener('submit', function (event) {
        event.preventDefault();
        const formData = new FormData(this);
        testo = formData.get('barra').trim();
        selectedCategories = formData.getAll('categories[]');
        if (testo === '') {
            fetchProducts();
        } else if (!regex.test(testo)) {
            alert(' sono stati inseriti caratteri non validi')
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
        event.preventDefault();;
        $('#section-form-view').empty();
        productId = $(this).attr('value');
        creationMalfunctionTable();
    });

    //listener sui titoli della tabella malfunzionamenti per ottenere le soluzioni correlate
    $(document).on('click', '.titleLink', function (event) {
        event.preventDefault();;
        $('#section-form-view').empty();
        malfunctionId = $(this).data('id');
        createSolutionsTable();
    });

    //listener sui bottoni aggiungi delle due tabelle, lo switch gestisce i casi su quale tabella avviene l'evento
    $(document).on('click', '#add', function (event) {
        event.preventDefault();;
        const element = $(this).data('element');
        const method = 'GET';
        let url;
        switch (element) {
            case 'malfunction':
                url = '/api/staff/malfunction/insertView';
                break;
            case 'solution':
                url = '/api/staff/solution/insertView';
                break;
            default:
                break;
        }
        tableOperationAjax(method, url);
    });

    //listener sui bottoni dell'occhio per visualizzare le info del prodotto
    $(document).on('click', '.viewLink', function (event) {
        event.preventDefault();;
        const element = $(this).data('element');
        elementId = $(this).data('id'); // Ottiene l'ID
        let url;
        switch (element) {
            case 'malfunction':
                url = '/api/staff/malfunction/' + elementId;
                break;
            case 'solution':
                url = '/api/staff/solution/' + elementId;
                break;
            default:
                break;
        }
        const method = 'GET';
        tableOperationAjax(method, url);
    });

    //listener sui bottoni matita per ottenere la form per il cambio dei prodotti
    $(document).on('click', '.changeLink', function (event) {
        event.preventDefault();;
        const element = $(this).data('element');
        elementId = $(this).data('id'); // Ottiene l'ID
        let url;
        switch (element) {
            case 'malfunction':
                url = '/api/staff/malfunction/' + elementId + '/change';
                break;
            case 'solution':
                url = '/api/staff/solution/' + elementId + '/change';
                break;
            default:
                break;
        }
        const method = 'GET';
        tableOperationAjax(method, url);

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
                case 'malfunction':
                    url = '/api/staff/malfunction/' + elementId + '/delete';;
                    break;
                case 'solution':
                    url = '/api/staff/solution/' + elementId + '/delete';;
                    break;
                default:
                    break;
            }

            const method = 'DELETE';
            tableOperationAjax(method, url, element);
        } else {
            alert("Operazione annullata.");
        }




    });


    //listener sulle form delle view di inserimento e cambio per estrarre i dati e chiamare la giusta rotta per l'operazione
    $(document).on('submit', '#form form', function (event) {
        event.preventDefault();;
        const formId = this.id;
        const formData = new FormData(this);
        const formElement = $(this).data('element');
        let url;
        let elementId
        switch (formId) {
            case 'changeFormMalfunction':
                elementId = $(this).data('id');
                url = '/api/staff/malfunction/' + elementId + '/change'
                break;
            case 'insertFormMalfunction':
                url = '/api/staff/product/' + productId + '/malfunction/store'
                break;
            case 'insertFormSolution':
                url = '/api/staff/malfunction/' + malfunctionId + '/solution/store'
                break;
            case 'changeFormSolution':
                elementId = $(this).data('id');
                url = '/api/staff/solution/' + elementId + '/change'
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
                $('#section-form-view').empty();
                alert(response.message);
                switch (formElement) {
                    case 'malfunction':
                        creationMalfunctionTable();
                        break;
                    case 'solution':
                        createSolutionsTable();
                        break;
                    default:
                        break;
                }
            },
            error: function (xhr, error) {
                if (xhr.status === 404) {
                    console.error('Soluzione non trovata');
                    alert('Errore: soluzione non trovata.');
                } else if (xhr.status === 500) {
                    console.error('Errore del server durante l\'aggiornamento della soluzione');
                    alert('Errore del server durante l\'aggiornamento. Riprova più tardi.');
                } else {
                    console.error('Errore nella richiesta AJAX:', error);
                    alert('Errore imprevisto. Contatta il supporto se il problema persiste.');
                }
            }
        });


    });

    //funzione per la richiesta dei prodotti in base alla pagina
    function fetchProducts(page = 1) {
        console.log('arrivo');
        $.ajax({
            type: "GET",
            url: "/api/staff/info?page=" + page,
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
    function tableOperationAjax(method, url, element = null) {
        $.ajax({
            type: method,
            url: url,
            dataType: "html",
            success: function (response) {
                if ($('#section-form-view').length) {
                    $('#section-form-view').empty();
                } else {
                    $('<div>', {
                        id: 'section-form-view'
                    }).appendTo('#showInfo');
                }

                $('#section-form-view').html(response);
                if (method === 'DELETE') {
                    if (element == 'solution') {
                        createSolutionsTable()
                    } else {
                        creationMalfunctionTable();
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
    function creationMalfunctionTable() {
        $.ajax({
            type: "GET",
            url: '/api/staff/product/' + productId + '/malfunction',
            dataType: "html",
            success: function (response) {
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
    //funzione che invia la richiesta ajax e inserisce la tabella delle soluzioni
    function createSolutionsTable() {
        $.ajax({
            type: "GET",
            url: "/api/staff/malfunction/" + malfunctionId + "/solution",
            dataType: "html",
            success: function (response) {
                $('<div>', {
                    id: 'solutionsTable'
                }).appendTo('#list-div');
                $('#solutionsTable').html(response);
            }
        });
    }

});