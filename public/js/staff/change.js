$(document).ready(function () {
    var responseObj = [];
    var products;
    var responseObjMalfSol;
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
                console.log(product.id);
                $('#productSelect').append('<option value="' + product.id + '" >' + product.name + '</option>');
            });
        },
        error: function (xhr) {
            // Gestisci gli errori
            alert("Si è verificato un errore: " + xhr.responseText);
        }
    });

    // mettere il caso di default delle categorie che rida la lista di tutti i prodotti

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
                console.log(product.id);
                $('#productSelect').append('<option value="' + product.id + '" >' + product.name + '</option>');
            });
        }
    });

    $('#form-operation').on('submit', function (event) {
        event.preventDefault();
        var idProduct = $('#productSelect').val();
        console.log(idProduct);

        if (!idProduct) {
            alert('Devi selezionare un prodotto')
            return;
        }

        $.ajax({
            type: "GET",
            url: "/api/getInfoProduct/" + idProduct,
            data: { case: 'change' },
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

    function populateMalfunctionsAndSolutions() {
        // Trova il contenitore dove vuoi inserire la tabella, ad esempio un div con id="tableContainer"
        const tableContainer = $('#settore-modifiche');

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

            // Crea una cella per le soluzioni collegate al malfunzionamento
            let solutionsList = '<ul>';
            malfunction.solutions.forEach(function (solution) {
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

    // Funzione che gestisce il click sugli elementi della tabella
    $('#settore-modifiche').on('click', '.malfunction-link, .solution-link', function (e) {
        console.log('arrivo qua');
        
        e.preventDefault(); // Previeni l'azione di default del link

        // Ottieni l'ID dal link cliccato
        const id = $(this).attr('id');
        const type = $(this).hasClass('malfunction-link') ? 'malfunction' : 'solution';
console.log(id);
console.log(type);
console.log(responseObjMalfSol);



        let selectedItem;

        // Cerca nei malfunzionamenti
        if (type === 'malfunction') {
            console.log('entro malfunction');
            
            selectedItem = responseObjMalfSol.find(malfunction => malfunction.id === id);
            console.log(selectedItem);
            
        } else if (type === 'solution') {
            console.log('entro solution');
            // Cerca nei malfunzionamenti la soluzione corrispondente
            responseObjMalfSol.forEach(malfunction => {
                const foundSolution = malfunction.solutions.find(solution => solution.id === id);
                if (foundSolution) {
                    selectedItem = foundSolution;
                    console.log(selectedItem);
                    
                }
            });
        }

        // Se l'elemento è stato trovato, aggiorna il div dei dettagli
        if (selectedItem) {
            $('#detailsContainer').html(`<h3>${selectedItem.title}</h3><p>${selectedItem.description}</p>`);
        }
    });

});