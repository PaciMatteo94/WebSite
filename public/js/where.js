
$(document).ready(function () {
    $('.location-link').click(function (event) {
        event.preventDefault();
        const lat = parseFloat($(this).data('latitudine'));
        const lng = parseFloat($(this).data('longitudine'));
        flyToLocation(lat, lng);
    });
    function flyToLocation(lat, lng) {
        map.flyTo({
            center: [lng, lat],
            zoom: 12, // Imposta lo zoom desiderato
            essential: true // Questa opzione è necessaria per animare lo spostamento
        });
    }
});