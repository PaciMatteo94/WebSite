$(document).ready(function () {
    const regex = /^[a-zA-Z0-9àèéìòùÀÈÉÌÒÙ ]+$/;
    var responseObj = [];
    var products;
    var productId;
    var malfunctionSelect = $('<select id="malfunction-select"></select>');
    var selectedOption;


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
            $.each(categories, function (_, category) {
                $('#categorySelect').append('<option value="' + category + '">' + category + '</option>');
            });
            $.each(products, function (_, product) {
                $('#productSelect').append('<option value="' + product.id + '" >' + product.name + '</option>');
            });
        },
        error: function (xhr) {
            // Gestisci gli errori
            alert("Si è verificato un errore: " + xhr.responseText);
        }
    });

    //funzione per visualizzare i prodotti in base alla categoria
    $('#categorySelect').on('change', function () {
        var selectedCategory = $(this).val();  // Ottieni la categoria selezionata


        $('#productSelect').empty();// Pulisci la select dei prodotti
        $('#productSelect').append('<option value="">Seleziona un prodotto</option>');//crea l'opzione di deafult

        // Filtra i prodotti in base alla categoria selezionata
        if (selectedCategory) {
            var filteredProducts = responseObj.filter(function (product) {
                return product.category === selectedCategory;
            });

            // Aggiungi i prodotti filtrati alla select dei prodotti
            $.each(filteredProducts, function (_, product) {
                $('#productSelect').append('<option value="' + product.id + '">' + product.name + '</option>');
            });

        } else if (selectedCategory === '') {
            //nel caso non è stata selezionata una categoria mostra tutti i prodotti nella select
            $('#productSelect').empty();
            $('#productSelect').append('<option value="">Seleziona un prodotto</option>');
            $.each(products, function (_, product) {
                $('#productSelect').append('<option value="' + product.id + '" >' + product.name + '</option>');
            });
        }
    });


    $('#form-operation').on('submit', function (event) {
        event.preventDefault(); // Evita il comportamento predefinito del form
        productId = $('#productSelect').val();
        selectedOption= $('#operationSelect').val();

        
        if(productId === '' || selectedOption=== ''){
            alert('Bisogna selezionare un\'operazione e un prodotto su cui effettuare l\'operazine');
            return;
        }

        
        createForm(selectedOption);

    });

    function createForm(selection) {
        $('#insert').empty();

        // Crea il titolo e l'area di testo per la descrizione
        var divInsert =$('<div id="insert-content"></div>')
        var title= $('<h1>Fornisci il titolo e la descrizione dell\'elemento</h1>');
        var form = $('<form id="invio-insert"></form>')
        var titleInput = $('<input class="input-form" id="titleInput" type="text" placeholder="Titolo" />');
        var descriptionArea = $('<textarea class="input-form" id="descriptionInput" placeholder="Descrizione"></textarea>');
        var botton = $('<input class="input-form" type="submit">')
        form.append(titleInput, descriptionArea, botton);
        


        switch (selection) {
            case 'malfunction':
                divInsert.append(title,form)
                $('#insert').append(divInsert);

                break;

            case 'solution':
                $.ajax({
                    type: "GET",
                    url: "/api/malfunctions/index/" + productId,  //devo cambiare questa roba perchè restituisce una view
                    dataType: "JSON",
                    success: function (response) {
                        populateMalfunctionSelect(response);
                    }
                });
                divInsert.append(title,malfunctionSelect,form)
                $('#insert').append(divInsert);

                break;

            default:
                $('#insert').empty();
                break;
        }

    }

    function populateMalfunctionSelect(data) {

        // Svuota la select prima di popolarla
        malfunctionSelect.empty();

        // Aggiungi un'opzione predefinita
        malfunctionSelect.append('<option value="">Seleziona un malfunzionamento</option>');

        // Itera sui malfunzionamenti ricevuti e crea le opzioni
        data.forEach(function (malfunction) {
            console.log(malfunction);
            
            var option = $('<option></option>')
                .val(malfunction.id) // Usa l'ID del malfunzionamento come valore
                .text(malfunction.title); // Usa il titolo come testo visibile
            malfunctionSelect.append(option);
        });
    }


    $(document).on('submit', '#invio-insert', function (event) {
        event.preventDefault();
        var title = sanitizeInput($('#titleInput').val());
        var description = sanitizeInput($('#descriptionInput').val());

        if(!regex.test(title) ||!regex.test(description) ){
            alert('sono stati inseriti dei caratteri speciali non ammessi');
            return;
        }

        if (title === '' || description === '') {
            alert('Inserire una descrizione o un titolo validi');


        } else {

            if (selectedOption === 'malfunction') {
                url = `/api/malfunctions/insert/${productId}`;  // Rotta per aggiornare i malfunzionamenti
            } else if (selectedOption === 'solution') {
                var malfunctionID = $('#malfunction-select').val();
                if (malfunctionID === '') {
                    alert('Devi inserire un malfunzionamento a cui associare la soluzione');
                    return;
                }

                url = `/api/solutions/insert/${malfunctionID}`;     // Rotta per aggiornare le soluzioni
            }

            $.ajax({
                type: "POST",
                url: url,
                data: {
                    title: title,
                    description: description
                },
                success: function (response) {
                    $('#insert').html('<p>Operazione completata con successo!</p>');

                },
                error: function (xhr) {
                    // Gestisci gli errori
                    alert("Si è verificato un errore: " + xhr.responseText);
                }

            });



        }






    });

    function sanitizeInput(input) {
        return input.trim() === '' ? '' : input.trim();
    }

});

