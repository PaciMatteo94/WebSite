$(document).ready(function () {
    const regex = /^[a-zA-Z0-9àèéìòùÀÈÉÌÒÙ\s]+$/;
    const usernameRegex = /^[a-zA-Z0-9àèéìòùÀÈÉÌÒÙ]+$/;
    let elementId;
    listStaffAjax();



    $(document).on('click', '#add', function (event) {
        event.preventDefault();
        const element = $(this).data('element');
        const method = 'GET';
        const url = '/api/admin/staff/insertView';

        operationsAjax(method, url, element);
    });

    $(document).on('click', '.viewLink', function (event) {
        event.preventDefault();
        const element = $(this).data('element');
        elementId = $(this).data('id'); 
        const url = '/api/admin/staff/show/' + elementId;
        const method = 'GET';
        operationsAjax(method, url, element);
    });


    $(document).on('click', '.changeLink', function (event) {
        event.preventDefault();
        const element = $(this).data('element');
        elementId = $(this).data('id'); 
        const url = '/api/admin/staff/change/' + elementId;
        const method = 'GET';
        operationsAjax(method, url, element);

    });

    $(document).on('click', '.removeLink', function (event) {
        event.preventDefault();
        const element = $(this).data('element');
        var result = confirm("Sei sicuro di voler rimuovere questo malfunzionamento?");
        if (result) {
            elementId = $(this).data('id');
            const url = '/api/admin/staff/remove/' + elementId;
            const method = 'DELETE';
            operationsAjax(method, url, element);



        } else {
            alert("Operazione annullata.");
        }




    });

    $(document).on('submit', '.form form', function (event) {
        event.preventDefault();
        const formData = new FormData(this);
        const formElement = $(this).data('element');
        const formOperation = $(this).data('operation');
        const password = formData.get('password'); 
        const passwordConfirmation = formData.get('password_confirmation'); 
        let isValid = true;

        // Controllo se le password corrispondono
        if (password !== passwordConfirmation) {
            alert("Le password non corrispondono. Per favore, controlla e riprova.");
            return;
        }
        for (let [key, value] of formData.entries()) {
            const inputElement = document.querySelector(`[name="${key}"]`);

            // Ignora i campi di tipo date
            if (inputElement && inputElement.type === 'date') {
                continue;
            }

            if (typeof value === 'string' && !(inputElement.name === 'password' || inputElement.name === 'password_confirmation')) {
                if (value === '') {
                    break;
                } else if (inputElement.name === 'username') {
                    if (!usernameRegex.test(value)) {
                        alert(`Il campo "${key}" contiene caratteri non validi. Sono accettati solo numeri, lettere e lettere accentate e nessuno spazio.`);
                        isValid = false;
                        break;
                    }

                } else if (!regex.test(value)) {
                    alert(`Il campo "${key}" contiene caratteri non validi. Sono accettati solo numeri, lettere e lettere accentate.`);
                    isValid = false;
                    break;
                }
            }
        }

        if (!isValid) return;

        switch (formOperation) {
            case 'store':
                formData.append('element', formElement);
                url = '/api/admin/staff/store';
                break;
            case 'change':
                url = '/api/admin/staff/' + elementId + '/change';
                break;
            default:
                break;
        }

        $.ajax({
            type: "POST",
            url: url,
            data: formData,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function (response) {
                $('.section-form-view').empty();
                if ($('.section-form-view').css('display') == 'block') {
                    $('.section-form-view').css('display', 'none');
                }
                alert(response.message);
                listStaffAjax()
            },
            error: function (xhr) {
                //visualizzazione dell'allert per i casi di errore
                if (xhr.status === 422) {
                    var errors = xhr.responseJSON.errors;
                    var errorMessage = '';
                    $.each(errors, function (key, messages) {
                        errorMessage += messages.join("\n") + "\n";
                    });
                    alert(errorMessage);  
                } else {
                    alert('Si è verificato un errore. Riprova.');
                }
                console.error('Errore nella richiesta AJAX:', error);
                console.log(xhr);
            }
        });


    });

    //funzione che riceve la view con lista del personale
    function listStaffAjax() {
        $.ajax({
            type: "GET",
            url: '/api/admin/staff',
            dataType: "html",
            success: function (response) {
                $('.list-div').empty();
                $('.list-div').html(response);
            },
            error: function (xhr, error) {
                console.error('Errore nella richiesta AJAX:', error);
                console.log(xhr);

            }
        });
    }

    //funzione che riceve le view in base a quale operazione si è richiesta
    function operationsAjax(method, url, element = null) {
        if (($('.section-form-view').css('display') == 'none') && (!(method === 'DELETE'))) {
            $('.section-form-view').show();
        }
        $.ajax({
            type: method,
            url: url,
            data: { role: element },
            dataType: "html",
            success: function (response) {
                if ($('.section-form-view').length) {
                    $('.section-form-view').empty();

                } else {
                    $('<div>', {
                        class: 'section-form-view'
                    }).appendTo('.container-section');
                }

                $('.section-form-view').html(response);
                if (method === 'DELETE') {
                    if ($('.section-form-view').css('display') == 'block') {
                        $('.section-form-view').css('display', 'none');
                    }
                    listStaffAjax();

                }

            },
            error: function (xhr, error) {
                console.error('Errore nella richiesta AJAX:', error);
                console.log(xhr);

            }
        });



    }



});