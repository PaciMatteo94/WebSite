$(document).ready(function () {
    var testo = '';
    const regex = /^[a-zA-Z0-9àèéìòùÀÈÉÌÒÙ*]+$/;
    var selectedCategories = [];
    let productId;
    let malfunctionId;

    //PARTE AJAX PER LA SELEZIONE DELLE CATEGORIE PRODOTTO

    //controllo se sono entrato in catalogo tramite la home e prendo l'id selezionato dalla home
    document.getElementById('search-form').addEventListener('submit', function (event) {
        event.preventDefault(); // Preveniamo il comportamento predefinito del form (ricaricare la pagina)
        // Raccogliamo i dati dal form
        const formData = new FormData(this);
        // Creiamo un oggetto con i dati
        testo = formData.get('barra').trim(); // otteniamo il testo di ricerca
        selectedCategories = formData.getAll('categories[]'); // otteniamo tutte le categorie selezionate

        // Verifica i dati (facoltativo)
        console.log('Ricerca:', testo);
        console.log('Categorie selezionate:', selectedCategories);
        handleSearch();


    });

    $(document).on('click', '.pagination a', function (e) {
        e.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        fetchProducts(page);
    });

    $(document).on('click', '.link-product', function (e) {
        e.preventDefault(); // Previene l'azione predefinita dell'ancora, se necessario
        $('#section-form-view').empty();

        productId = $(this).attr('value'); // Estrae il valore dell'attributo "value"
        console.log(productId);
        creationTableAjax();


    });

    $(document).on('click', '.titleLink', function (e) {
        e.preventDefault();
        $('#section-form-view').empty();
        malfunctionId = $(this).data('id'); // Ottiene l'ID
        createSolutionsTable(malfunctionId);

    });

    $(document).on('click', '#add', function (e) {
        e.preventDefault();
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

    $(document).on('click', '.viewLink', function (e) {
        e.preventDefault();
        const element = $(this).data('element');
        elementId = $(this).data('id'); // Ottiene l'ID
        console.log(elementId);

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

    $(document).on('click', '.changeLink', function (e) {
        e.preventDefault();
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


    $(document).on('click', '.removeLink', function (e) {
        e.preventDefault();
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








    $(document).on('submit', '#form form', function (e) {
        e.preventDefault();
        const formId = this.id;
        const formData = new FormData(this);
        const formElement = $(this).data('element');
        let url;
        let elementId
        console.log(malfunctionId);

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
            contentType: false, // Disabilita la codifica predefinita
            processData: false, // Disabilita l'elaborazione dei dati
            dataType: "json",
            success: function (response) {
                $('#section-form-view').empty();
                $('#section-form-view').html('<h1>' + response.message + '</h1>');
                switch (formElement) {
                    case 'malfunction':
                        creationTableAjax();
                        break;
                        case 'solution':
                            createSolutionsTable();
                            break;
                    default:
                        break;
                }
               
            },
            error: function (xhr, status, error) {
                console.error('Errore nella richiesta AJAX:', error);
                console.log(xhr);

            }
        });


    });















    function handleSearch() {
        console.log('funzione handle, catergorie:' + selectedCategories);
        if (testo === '') {
            fetchProducts();
        } else if (!regex.test(testo)) {
            alert(' sono stati inseriti caratteri non validi')
        } else {
            fetchProducts();
        }
    }
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
            error: function (xhr, status, error) {
                console.error('Errore nella richiesta AJAX:', error);
                console.log(xhr);

            }
        });
    }



    function tableOperationAjax(method, url, element = null) {
        console.log('arrivo qua');

        $.ajax({
            type: method,
            url: url,
            dataType: "html",
            success: function (response) {
                if ($('#section-form-view').length) {
                    console.log('sono nell\'if per dire che esiste il div');
                    $('#section-form-view').empty();
                } else {
                    console.log('sono nell\'else per creare il div');
                    $('<div>', {
                        id: 'section-form-view'
                    }).appendTo('#showInfo');
                }

                $('#section-form-view').html(response);
                if (method === 'DELETE') {
                    if (element == 'solution') {
                        createSolutionsTable()
                    } else {
                        creationTableAjax();
                    }

                }

            },
            error: function (xhr, status, error) {
                console.error('Errore nella richiesta AJAX:', error);
                console.log(xhr);

            }
        });



    }


    function creationTableAjax() {
        $.ajax({
            type: "GET",
            url: '/api/staff/product/' + productId + '/malfunction',
            dataType: "html",
            success: function (response) {
                $('#list-div').html(response);
            },
            error: function (xhr, status, error) {
                console.error('Errore nella richiesta AJAX:', error);
                console.log(xhr);

            }
        });
    }

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