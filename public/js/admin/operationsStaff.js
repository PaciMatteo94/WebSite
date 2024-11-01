$(document).ready(function () {
    var operation;
    $('<link>', {
        id: 'dynamic-css',                    
        rel: 'stylesheet',
        href: '',                                     
        type: 'text/css'                      
    }).appendTo('head');

    $('#operation').on('click', '.operation-link', function (event) {
        event.preventDefault();
        operation = $(this).attr('id');
        let url = '';



        switch (operation) {
            case 'insert':
                url = '/api/admin/staff/insert';
                break;

            case 'change':
                url = '/api/admin/staff/change';
                break;

            case 'remove':
                url = '/api/admin/staff/remove';
                break;

            default:
                $('#visualization-section').empty();
                $('#visualization-section').html('<p>Si è verificato un errore, perfavore segnlare il problema all\'assistenza</p>');
                return;
        }
        $.ajax({
            type: "GET",
            url: url,
            dataType: "JSON",
            success: function (response) {
                $('#dynamic-css').attr('href', response.css);
                $('#visualization-section').html(response.html);

            }, error: function (xhr) {
                alert('Errore durante la richiesta dei dati');
                console.log(xhr);

            }
        });


    });

    $('#visualization-section').on('submit', function (event) {
        event.preventDefault();
        let password;
        let passwordConfirmation;
        let userId;
        let formData;
        let url = '';
        let typeOperation = '';
        switch (operation) {
            case 'insert':
                password = $('#password').val();
                passwordConfirmation = $('#password_confirmation').val();
                if (password !== passwordConfirmation) {
                    alert("Le password non combaciano.");
                    return;
                }
                formData = $('#form-insert').serialize() + '&role=staff';
                url = '/api/admin/staff/insertOp';
                typeOperation = 'POST';

                break;
            case 'change':
                userId = $('#user-select').val();
                password = $('#password').val();
                passwordConfirmation = $('#password_confirmation').val();
                if (password !== passwordConfirmation) {
                    alert("Le password non combaciano.");
                    return;
                }
                formData = $('#select-user-form').serialize();
                url = '/api/admin/staff/change/' + userId;
                typeOperation = 'PUT';
                break;
            case 'remove':
                FormData = null;
                userId = $('#user-select').val();
                url = '/api/admin/staff/deleteOp/' + userId;
                typeOperation = 'DELETE';

                break;

            default:
                $('#visualization-section').empty();
                $('#visualization-section').html('<p>Si è verificato un errore, perfavore segnlare il problema all\'assistenza</p>');
                break;



        }
        $.ajax({
            url: url,
            type: typeOperation,
            data: formData,
            success: function (response) {
                $('#visualization-section').empty();
                $('#visualization-section').html('<p>operazione eseguita con successo</p>');
            },
            error: function (xhr) {
                alert('Errore durante l’inserimento dei dati');
                console.log(xhr);

            }
        });

    });







});