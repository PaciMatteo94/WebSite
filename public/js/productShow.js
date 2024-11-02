$(document).ready(function () {
    var testo = '';
    const regex = /^[a-zA-Z0-9àèéìòùÀÈÉÌÒÙ*]+$/;
    var selectedCategories = [];
    let productId;
    let elementId;
    $(document).on('click', '.titleLink', function (event) {
        event.preventDefault();
        const type =$(this).data('type')
        elementId = $(this).data('id');
        switch (type) {
            case 'malfunction':
                $('#solutionsList').empty();
                $('#solutionView').empty();
                createSolutionList();
                break;
                case 'solution':
                    createSolutionView()
                    break;
        
            default:
                break;
        }

    });

    $(document).on('click', '.viewLink', function (event) {
        event.preventDefault();
        const element = $(this).data('element');
        elementId = $(this).data('id'); // Ottiene l'ID
        $.ajax({
            type: "GET",
            url: '/api/malfunction/' + elementId,
            dataType: "html",
            success: function (response) {
                $('#malfunctionView').empty();
                $('#malfunctionView').html(response);
            }, error: function (xhr, error) {
                console.error('Errore nella richiesta AJAX:', error);
                console.log(xhr);

            }
        });

    });

    function createSolutionList() {

        $.ajax({
            type: "GET",
            url: "/api/malfunction/" + elementId + "/solution",
            dataType: "html",
            success: function (response) {
                console.log('sono qua');
                $('#solutionsList').empty();
                $('#solutionView').empty();
                $('#solutionsList').html(response);


            }
        });
    }

    function createSolutionView() {

        $.ajax({
            type: "GET",
            url: "/api/solution/" + elementId,
            dataType: "html",
            success: function (response) {
                $('#solutionView').empty();
                $('#solutionView').html(response);


            }
        });
    }
});