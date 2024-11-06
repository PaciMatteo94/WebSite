$(document).ready(function () {
    var testo= '';
    const regex = /^[a-zA-Z0-9àèéìòùÀÈÉÌÒÙ*]+$/;
    var selectedCategories = [];



    //controllo se sono entrato in catalogo tramite la home e prendo l'id selezionato dalla home
    if (localStorage.length > 0) {
        $('input[type="checkbox"][value="' + localStorage.getItem('selectedId') + '"]').prop('checked', true);
        checkCategories();
        localStorage.clear();
        handleSearch();


    } else{
        $('input[type="checkbox"]').prop('checked', false);
        testo = '';
        $('#barra-ricerca').val('');
        checkCategories();
        handleSearch();
    }

    //
    $('#search-form').on('submit', function(event){
        event.preventDefault(); // Preveniamo il comportamento predefinito del form (ricaricare la pagina)
        // Raccogliamo i dati dal form
        const formData = new FormData(this);
        // Creiamo un oggetto con i dati
        testo = formData.get('barra').trim(); // otteniamo il testo di ricerca
        selectedCategories = formData.getAll('categories[]'); // otteniamo tutte le categorie selezionate
        handleSearch();
    });

    //listener sul link della paginazione
    $(document).on('click', '.pagination a', function (e) {
        e.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        fetchProducts(page);
    });
    //funzione per richiedere i prodotti e visualizzare la view restituita
    function fetchProducts(page = 1) {  
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
                console.log(xhr);
                
            }
        });
    }
    //controlla le categoria selezionate
    function checkCategories(){
        selectedCategories.length=0;
        $('.category-checkbox:checked').each(function () {
            selectedCategories.push($(this).val());
            
        });
    }
    
    //controlla se il testo inserito è valido
    function handleSearch(){
        if(testo === ''){
            fetchProducts();
        }else if(!regex.test(testo)){
            alert('Sono stati inseriti caratteri non validi o sono state inserite più parole')
        }else{
            fetchProducts();
        }
    }


});