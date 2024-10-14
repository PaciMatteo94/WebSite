$(document).ready(function () {
    var testo="";
    const regex = /^[a-zA-Z0-9]+$/;
    var selectedCategories = [];

    //PARTE AJAX PER LA SELEZIONE DELLE CATEGORIE PRODOTTO

    //controllo se sono entrato in catalogo tramite la home e prendo l'id selezionato dalla home
    if (localStorage.length > 0) {
        $('input[type="checkbox"][value="' + localStorage.getItem('selectedId') + '"]').prop('checked', true);
        checkCategories();
        localStorage.clear();
        handleSearch();

    } else{
        checkCategories();
        handleSearch();
    }



 
    //acquisisco quale categorie sono selezionate
    $('.category-checkbox').change(function () {
        checkCategories();
        handleSearch();
    });


    // PARTE AJAX PER LA BARRA DI RICERCA CON ANCHE NOME PARZIALE
    $('#bottone-ricerca').on('click', function () {
        testo = $('#barra-ricerca').val().trim();      
            handleSearch();
    });

    $(document).on('click', '.pagination a', function (e) {
        e.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        fetchProducts(page);
    });

    function handleSearch(){
        console.log('funzione handle, catergorie:'+selectedCategories);

        if(!(selectedCategories.length>0)){
            if(!regex.test(testo)){
                alert('Non ci sono ne categorie e il testo è nullo non valido');
            }else{
                fetchProducts();
            }
        }

        if(selectedCategories.length>0 ){
            if(testo===""|| regex.test(testo) ){
                fetchProducts();
            }else if(!regex.test(testo)){
                alert('Ci sono categorie ma il testo non è valido')
            }
        }
    }




    function fetchProducts(page = 1) {
        console.log('arrivo anche qua');
        console.log(selectedCategories);
        console.log(testo);
        
        $.ajax({
            type: "GET",
            url: "/api/products?page=" + page,
            data: {
                search: [testo], 
                categories: selectedCategories
            },
            dataType: "HTML",
            success: function (data) {
                $('#risultati').html(data);

            },
            error: function (xhr, status, error) {
                console.error('Errore nella richiesta AJAX:', error);
            }
        });
    }

    function checkCategories(){
        selectedCategories.length=0;
        
        $('.category-checkbox:checked').each(function () {
            selectedCategories.push($(this).val());
            
        });

        console.log('fetch categorie'+ selectedCategories);
    }




});