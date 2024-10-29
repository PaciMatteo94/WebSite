$(document).ready(function () {
    var id;
    $('#operation').on('click', '.operation-link', function (event) {
        event.preventDefault();
        id = $(this).attr('id');
        console.log(id);
        var url = '';


        switch (id) {
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
                alert('Errore durante l’inserimento dei dati');
                console.log(xhr);
                
            }
        });


    });
    $('#visualization-section').on('submit', function (event) {
        event.preventDefault();


        switch (id) {
            case 'insert':
                const passwordInsert = $('#password').val();
                const passwordConfirmationInsert = $('#password_confirmation').val();
                if (passwordInsert !== passwordConfirmationInsert) {
                    alert("Le password non combaciano.");
                    return; // Esce dalla funzione senza inviare i dati
                }
                const formDataInsert = $('#create-tech-form').serialize() +'&role=technician';
                $.ajax({
                    url: '/api/admin/tech/insertOp',
                    type: 'POST',
                    data: formDataInsert,
                    success: function (response) {
                        $('#visualization-section').empty();
                        alert('Dati inseriti con successo!');
                    },
                    error: function (xhr) {
                        alert('Errore durante l’inserimento dei dati');
                        console.log(xhr);
                        
                    }
                });
                break;
                case 'change':
                    const userId = $('#user-select').val();
                    const password = $('#password').val();
                    const passwordConfirmation = $('#password_confirmation').val();
                    if (password !== passwordConfirmation) {
                        alert("Le password non combaciano.");
                        return; // Esce dalla funzione senza inviare i dati
                    }
    
                    if (!userId) {
                        alert('Seleziona un utente prima di inviare');
                        return;
                    }
                    const url = `/api/admin/tech/change/${userId}`;
                    const formData = $('#edit-tech-form').serialize();
                    console.log(formData);
                    $.ajax({
                        url: url,
                        type: 'PUT',
                        data: formData,
                        success: function (response) {
                            $('#visualization-section').empty();
                            alert('Dati aggiornati con successo!');
                        },
                        error: function (xhr) {
                            alert('Errore durante l’aggiornamento dei dati');
                        }
                    });
                
                break;
                case 'remove':
                    const userIdRemove = $('#user-select').val();
                    if (!userIdRemove) {
                        alert('Seleziona un utente da rimuovere');
                        return;
                    }
                    console.log(userIdRemove);
                    $.ajax({
                        url: '/api/admin/tech/deleteOp/'+userIdRemove,
                        type: 'DELETE',
                        success: function (response) {
                            $('#visualization-section').empty();
                            alert('utente eleiminato con successo!');
                        },
                        error: function (xhr) {
                            alert('Errore durante l’operazione dei dati');
                        }
                    });
                break;
            default:
                break;
        }
    });



});