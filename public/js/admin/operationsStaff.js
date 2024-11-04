$(document).ready(function () {
    const regex = /^[a-zA-Z0-9àèéìòùÀÈÉÌÒÙ*]+$/;
let elementId;
    listStaffAjax();

    function listStaffAjax(){
        $.ajax({
            type: "GET",
            url: '/api/admin/staff',
            dataType: "html",
            success: function (response) {
    
                $('.list-div').empty();
                $('.list-div').html(response);
                console.log('eseguo la creazione tabella');

            },
            error: function (xhr, error) {
                console.error('Errore nella richiesta AJAX:', error);
                console.log(xhr);

            }
        });
    }

    $(document).on('click', '#add', function (event) {
        event.preventDefault();;
        const element = $(this).data('element');
        const method = 'GET';
        const url = '/api/admin/staff/insertView';

        operationsAjax(method, url , element);
    });

    $(document).on('click', '.viewLink', function (event) {
        event.preventDefault();;
        const element = $(this).data('element');
        elementId = $(this).data('id'); // Ottiene l'ID
        const url = '/api/admin/staff/show/'+ elementId;
        const method = 'GET';
        operationsAjax(method, url, element);
    });


    $(document).on('click', '.changeLink', function (event) {
        event.preventDefault();;
        const element = $(this).data('element');
        elementId = $(this).data('id'); // Ottiene l'ID
        const url = '/api/admin/staff/change/'+ elementId;
        const method = 'GET';
        operationsAjax(method, url, element);

    });

    $(document).on('click', '.removeLink', function (event) {
        event.preventDefault();;
        const element = $(this).data('element');
        var result = confirm("Sei sicuro di voler rimuovere questo malfunzionamento?");
        if (result) {
            elementId = $(this).data('id'); // Ottiene l'ID
            const url = '/api/admin/staff/remove/'+ elementId;
            const method = 'DELETE';
            operationsAjax(method, url, element);
            


        } else {
            alert("Operazione annullata.");
        }




    });

    $(document).on('submit', '.form form', function (event) {
        event.preventDefault();;
        const formData = new FormData(this);
        const formElement = $(this).data('element');
        const formOperation = $(this).data('operation');
        switch (formOperation) {
            case 'store':
                formData.append('element', formElement);
                url = '/api/admin/staff/store';
                break;
            case 'change':
                console.log(elementId);
                url = '/api/admin/staff/'+elementId+'/change';
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
                alert(response.message);
                listStaffAjax()
            },
            error: function (xhr, error) {
                console.error('Errore nella richiesta AJAX:', error);
                console.log(xhr);

            }
        });


    });



    function operationsAjax(method, url, element = null) {
        $.ajax({
            type: method,
            url: url,
            data: {role: element},
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