$(document).ready(function () {
    let elementId;

    $(document).on('click', '.title-link', function (event) {
        event.preventDefault();
        const type = $(this).data('type')
        elementId = $(this).data('id');
        if (type == 'malfunction') {
            if ($('#malfunction-view').css('display') == 'none') {
                $('#malfunction-view').show();
            }
            $.ajax({
                type: "GET",
                url: '/api/malfunction/' + elementId,
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

    function createSolutionList() {

        $.ajax({
            type: "GET",
            url: "/api/malfunction/" + elementId + "/solution",
            dataType: "html",
            success: function (response) {
                $('#solutions-list').empty();
                $('#solution-view').empty();
                $('#solutions-list').html(response);

            }
        });
    }

    function createSolutionView() {
        if ($('#solution-view').css('display') == 'none') {
            $('#solution-view').show();
        }
        $.ajax({
            type: "GET",
            url: "/api/solution/" + elementId,
            dataType: "html",
            success: function (response) {
                $('#solution-view').empty();
                $('#solution-view').html(response);


            }
        });
    }
});