document.addEventListener('DOMContentLoaded', function () {
    fetch('/api/products')  // Richiesta API per ottenere i dati
        .then(response => response.json())
        .then(data => {
            // Funzione per creare il select delle regioni
            createRegionSelect(data);
        })
        .catch(error => console.error('Errore:', error));
});

function createRegionSelect(prodotti) {
    const categoria = [...new Set(prodotti.map(item => item.category))]; // Crea un set di regioni uniche
    const selectElement = document.createElement('select');  // Crea l'elemento select

    // Aggiungi un'opzione vuota iniziale
    let defaultOption = document.createElement('option');
    defaultOption.text = 'Seleziona una categoria';
    defaultOption.value = '';
    selectElement.appendChild(defaultOption);

    // Cicla tutte le regioni e crea le opzioni
    categoria.forEach(categoria => {
        let option = document.createElement('option');
        option.value = categoria;
        option.text = categoria;
        selectElement.appendChild(option);
    });

    // Aggiungi un event listener per aggiornare la lista degli prodotti
    selectElement.addEventListener('change', function () {
        const categoriaSelezionata = this.value;
        displayStabilimenti(prodotti, categoriaSelezionata);
    });

    // Inserisci il select nella view (in un div con id="select-container")
    const selectContainer = document.getElementById('ricerca');
    selectContainer.appendChild(selectElement);
}

function displayStabilimenti(prodotti, categoriaSelezionata) {
    const filteredprodotti = prodotti.filter(item => item.category === categoriaSelezionata);  // Filtra per regione
    const listElement = document.getElementById('risultati');  // Elemento ul dove verranno inseriti

    listElement.innerHTML = '';  // Svuota la lista ogni volta che selezioni una nuova regione

    // Cicla gli prodotti filtrati e aggiungili alla lista
    filteredprodotti.forEach(prodotti => {
        let listItem = document.createElement('li');
        listItem.textContent = `${prodotti.name} - ${prodotti.info}`;
        listElement.appendChild(listItem);
    });
}