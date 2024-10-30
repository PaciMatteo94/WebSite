$(document).ready(function () {
    var operation;
    $('#operation').on('click', '.operation-link', function (event) {
        event.preventDefault();
        operation = $(this).attr('id');
        let url = '';
        switch (operation) {
            case 'insert':
                url = '/api/admin/tech/insert';
                break;

            case 'change':
                url = '/api/admin/tech/change';
                break;

            case 'remove':
                url = '/api/admin/tech/remove';
                break;

            default:
                $('#visualization-section').empty();
                $('#visualization-section').html('<p>Si è verificato un errore, perfavore segnlare il problema all\'assistenza</p>');
                break;
        }
        $.ajax({
            type: "GET",
            url: url,
            dataType: "HTML",
            success: function (response) {
                $('#visualization-section').html(response);

            },
            error: function (xhr) {
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
        let url='';
        let typeOperation = '';
        switch (operation) {
            case 'insert':
                console.log('entro');
                
                password = $('#password').val();
                passwordConfirmation = $('#password_confirmation').val();
                if (password !== passwordConfirmation) {
                    alert("Le password non combaciano.");
                    return;
                }
                formData = $('#create-tech-form').serialize() + '&role=technician';
                url = '/api/admin/tech/insertOp';
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
                url = `/api/admin/tech/change/` + userId;
                formData = $('#edit-tech-form').serialize();
                typeOperation = 'PUT';
                break;

            case 'remove':
                formData = null;
                userId = $('#user-select').val();
                url = '/api/admin/tech/deleteOp/' + userId;
                typeOperation = 'DELETE';

                break;
            default:
                $('#visualization-section').empty();
                $('#visualization-section').html('<p>Si è verificato un errore, perfavore segnlare il problema all\'assistenza</p>');
                break;
        }
        $.ajax({
            type: typeOperation,
            url: url,
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