$(document).ready(function () {
    const regex = /^[a-zA-Z0-9àèéìòùÀÈÉÌÒÙ ]+$/;
    var responseObj = [];
    var products;
    var responseObjMalfSol;
    let selectedItem;
    let url = '';
    var type;
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
                $('#productSelect').append('<option value="' + product.id + '" >' + product.name + '</option>');
            });
        },
        error: function (xhr) {
            // Gestisci gli errori
            alert("Si è verificato un errore: " + xhr.responseText);
        }
    });

    //aggiorna la select dei prodotti in base alla categoria selezionata
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
                $('#productSelect').append('<option value="' + product.id + '" >' + product.name + '</option>');
            });
        }
    });

    //ottengo i malfunzionamenti e le soluzioni di un prodotto
    $('#form-operation').on('submit', function (event) {
        event.preventDefault();
        $('#detailsContainer').empty();
        var idProduct = $('#productSelect').val();

        if (!idProduct) {
            alert('Devi selezionare un prodotto')
            return;
        }

        $.ajax({
            type: "GET",
            url: "/api/getInfoProduct/" + idProduct,
            dataType: "JSON",
            success: function (data) {
                responseObjMalfSol = data;



                populateMalfunctionsAndSolutions();

            },
            error: function (xhr) {
                alert("Si è verificato un errore: " + xhr.responseText);
            }
        });
    });



    // Funzione che gestisce il click sugli elementi della tabella
    $('#change-table').on('click', '.malfunction-link, .solution-link', function (e) {


        e.preventDefault(); // Previeni l'azione di default del link

        // Ottieni l'ID dal link cliccato
        const id = $(this).attr('id');
        type = $(this).hasClass('malfunction-link') ? 'malfunction' : 'solution';

        // Cerca nei malfunzionamenti 
        if (type === 'malfunction') {
            selectedItem = responseObjMalfSol.find(malfunction => malfunction.id === Number(id));


        } else if (type === 'solution') {

            // Cerca nei malfunzionamenti la soluzione corrispondente
            responseObjMalfSol.forEach(malfunction => {
                const solutions = Array.isArray(malfunction.solutions) ? malfunction.solutions : Object.values(malfunction.solutions || []);
                const foundSolution = solutions.find(solution => solution.id === Number(id));
                if (foundSolution) {
                    selectedItem = foundSolution;
                    console.log(selectedItem);

                }
            });
        }

        // Se l'elemento è stato trovato, aggiorna il div dei dettagli
        if (selectedItem) {
            renderDetailsAndEditForm(selectedItem);
        }
    });




    $(document).on('submit', '#editForm', function (event) {
        event.preventDefault();
        // Sanifica i valori dei campi
        const sanitizedTitle = sanitizeInput($('#titleInput').val());
        const sanitizedDescription = sanitizeInput($('#descriptionInput').val());
        if (!regex.test(sanitizedTitle) || !regex.test(sanitizedDescription)) {
            alert('sono stati inseriti dei caratteri speciali non ammessi');
            return;
        }

        // Ottieni l'ID dell'elemento selezionato
        const id = selectedItem.id;

        // Verifica il tipo di elemento e imposta la rotta appropriata
        if (type === 'malfunction') {
            url = `/api/malfunctions/update/${id}`;  // Rotta per aggiornare i malfunzionamenti
        } else if (type === 'solution') {
            url = `/api/solutions/update/${id}`;     // Rotta per aggiornare le soluzioni
        }

        // Esegui la richiesta AJAX per aggiornare i dati
        $.ajax({
            url: url,
            type: 'PUT',
            dataType: "JSON",
            data: {
                title: sanitizedTitle,
                description: sanitizedDescription,
            },
            success: function (response) {
                $('#detailsContainer').empty();
                $('#change-table').empty();

                // Aggiorna l'interfaccia utente o esegui altre azioni post-aggiornamento qui
            },
            error: function (xhr) {
                console.error("Errore durante l'aggiornamento:", xhr.responseText);
                // Gestisci eventuali errori qui
            }
        });
    });

    function populateMalfunctionsAndSolutions() {
        // Trova il contenitore dove vuoi inserire la tabella, ad esempio un div con id="tableContainer"
        const tableContainer = $('#change-table');

        // Svuota il contenitore per assicurarti che non ci siano tabelle precedenti
        tableContainer.empty();


        // Crea la tabella dinamicamente
        const table = $('<table></table>').addClass('table table-bordered');
        const tableHead = `
        <thead>
            <tr>
                <th>Malfunzionamento</th>
                <th>Soluzioni</th>
            </tr>
        </thead>
    `;

        // Aggiungi l'intestazione della tabella
        table.append(tableHead);

        // Crea il corpo della tabella
        const tableBody = $('<tbody></tbody>');

        // Itera sui malfunzionamenti e crea una riga per ciascuno
        responseObjMalfSol.forEach(function (malfunction) {
            // Crea una cella per il malfunzionamento con un link
            const malfunctionLink = `<a href="#" class="malfunction-link" responseObjMalfSol-title="${malfunction.title}" id="${malfunction.id}">${malfunction.title}</a>`;
            const malfunctionCell = `<td>${malfunctionLink}</td>`;
            // Converte sempre solutions in un array, anche se è un oggetto
            const solutions = Array.isArray(malfunction.solutions) ? malfunction.solutions : Object.values(malfunction.solutions || []);
            // Crea una cella per le soluzioni collegate al malfunzionamento
            let solutionsList = '<ul>';


            solutions.forEach(function (solution) {
                const solutionLink = `<a href="#" class="solution-link" responseObjMalfSol-title="${solution.title}" id="${solution.id}">${solution.title}</a>`;
                solutionsList += `<li>${solutionLink}</li>`;
            });
            solutionsList += '</ul>';
            const solutionsCell = `<td>${solutionsList}</td>`;

            // Crea la riga e la aggiungi al corpo della tabella
            const row = `<tr>${malfunctionCell}${solutionsCell}</tr>`;
            tableBody.append(row);
        });

        // Aggiungi il corpo alla tabella
        table.append(tableBody);

        // Inserisci la tabella nel contenitore
        tableContainer.append(table);


    }


    function renderDetailsAndEditForm(selectedItem) {
        // Genera l'HTML per la visualizzazione delle informazioni e la form
        const htmlContent = `
            <form id="editForm">
                <label for="titleInput">Modifica Titolo:</label>
                <input type="text" id="titleInput" name="title" value="${selectedItem.title}" required />
                
                <label for="descriptionInput">Modifica Descrizione:</label>
                <textarea id="descriptionInput" name="description" required>${selectedItem.description}</textarea>
                
                <button type="submit">Salva Modifiche</button>
            </form>
        `;

        // Aggiunge l'HTML al contenitore
        $('#detailsContainer').html(htmlContent);
    }

    function sanitizeInput(input) {
        return input.trim() === '' ? '' : input.trim();
    }

});