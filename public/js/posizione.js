document.addEventListener('DOMContentLoaded', function () {
    fetch('/api/stabilimenti')  // Richiesta API per ottenere i dati
        .then(response => response.json())
        .then(data => {
            // Funzione per creare il select delle regioni
            createRegionSelect(data);
        })
        .catch(error => console.error('Errore:', error));
});

function createRegionSelect(stabilimenti) {
    const regioni = [...new Set(stabilimenti.map(item => item.regione))]; // Crea un set di regioni uniche
    const selectElement = document.createElement('select');  // Crea l'elemento select

    // Aggiungi un'opzione vuota iniziale
    let defaultOption = document.createElement('option');
    defaultOption.text = 'Seleziona una regione';
    defaultOption.value = '';
    selectElement.appendChild(defaultOption);

    // Cicla tutte le regioni e crea le opzioni
    regioni.forEach(regione => {
        let option = document.createElement('option');
        option.value = regione;
        option.text = regione;
        selectElement.appendChild(option);
    });

    // Aggiungi un event listener per aggiornare la lista degli stabilimenti
    selectElement.addEventListener('change', function () {
        const regioneSelezionata = this.value;
        displayStabilimenti(stabilimenti, regioneSelezionata);
    });

    // Inserisci il select nella view (in un div con id="select-container")
    const selectContainer = document.getElementById('select-container');
    selectContainer.appendChild(selectElement);
}

function displayStabilimenti(stabilimenti, regione) {
    const filteredStabilimenti = stabilimenti.filter(item => item.regione === regione);  // Filtra per regione
    const listElement = document.getElementById('stabilimenti-list');  // Elemento ul dove verranno inseriti

    listElement.innerHTML = '';  // Svuota la lista ogni volta che selezioni una nuova regione

    // Cicla gli stabilimenti filtrati e aggiungili alla lista
    filteredStabilimenti.forEach(stabilimento => {
        let listItem = document.createElement('li');
        listItem.textContent = `${stabilimento.nome_stabilimento} - ${stabilimento.via}`;
        listElement.appendChild(listItem);
    });
}
