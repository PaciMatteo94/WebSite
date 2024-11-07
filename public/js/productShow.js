$(document).ready(function () {
    let elementId;

    //listener sul link dei titoli dei malfunzionamenti e soluzioni
    $(document).on('click', '.title-link', function (event) {
        event.preventDefault();
        const type = $(this).data('type')
        elementId = $(this).data('id');
        //se è un malfunzionamento ottiene la view che mostra il malfunzionamento
        if (type == 'malfunction') {
            if ($('#malfunction-view').css('display') == 'none') {
                $('#malfunction-view').show();
            }
            $.ajax({
                type: "GET",
                url: 'api/malfunction/' + elementId,
                dataType: "html",
                success: function (response) {
                    $('#malfunction-view').empty();
                    $('#malfunction-view').html(response);
                }, error: function (xhr, error) {
                    console.error('Errore nella richiesta AJAX:', error);
                    console.log(xhr);

                }
            });
        }

        //controlla il tipo per pulire il div e ricreare la lista delle soluzioni oppure visualizzare le informazioni della soluzione
        switch (type) {
            case 'malfunction':
                $('#solutions-list').empty();
                $('#solution-view').empty();
                createSolutionList();
                break;
            case 'solution':
                createSolutionView();
                break;

            default:
                break;
        }

    });

    //funzione che inserisce la view della lista dei malfunzionameti
    function createSolutionList() {

        $.ajax({
            type: "GET",
            url: "api/malfunction/" + elementId + "/solution",
            dataType: "html",
            success: function (response) {
                $('#solutions-list').empty();
                $('#solution-view').empty();
                $('#solutions-list').html(response);

            }
        });
    }
    //funzione che inserisce la view dove si vedono le info della soluzione
    function createSolutionView() {
        if ($('#solution-view').css('display') == 'none') {
            $('#solution-view').show();
        }
        $.ajax({
            type: "GET",
            url: "api/solution/" + elementId,
            dataType: "html",
            success: function (response) {
                $('#solution-view').empty();
                $('#solution-view').html(response);


            }
        });
    }
});