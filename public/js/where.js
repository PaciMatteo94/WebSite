
$(document).ready(function () {
    //listener sui link delle vie
    $('.location-link').click(function (event) {
        event.preventDefault();
        const lat = parseFloat($(this).data('latitudine'));
        const lng = parseFloat($(this).data('longitudine'));
        flyToLocation(lat, lng);
    });
    //funzione che usa le funzionalità fornite dall'api per centrare la mappa sulla via cliccata
    function flyToLocation(lat, lng) {
        map.flyTo({
            center: [lng, lat],
            zoom: 12, // Imposta lo zoom desiderato
            essential: true // Questa opzione è necessaria per animare lo spostamento
        });
    }
});