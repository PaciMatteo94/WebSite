$(document).ready(function () {
    var testo= '';
    const regex = /^[a-zA-Z0-9àèéìòùÀÈÉÌÒÙ*]+$/;
    var selectedCategories = [];

    //PARTE AJAX PER LA SELEZIONE DELLE CATEGORIE PRODOTTO

    //controllo se sono entrato in catalogo tramite la home e prendo l'id selezionato dalla home
    document.getElementById('search-form').addEventListener('submit', function(event) {
        event.preventDefault(); // Preveniamo il comportamento predefinito del form (ricaricare la pagina)
        // Raccogliamo i dati dal form
        const formData = new FormData(this);
        // Creiamo un oggetto con i dati
        testo = formData.get('barra').trim(); // otteniamo il testo di ricerca
        selectedCategories = formData.getAll('categories[]'); // otteniamo tutte le categorie selezionate
    
        // Verifica i dati (facoltativo)
        console.log('Ricerca:', testo);
        console.log('Categorie selezionate:', selectedCategories);
        handleSearch();

    
    });

 


    $(document).on('click', '.pagination a', function (e) {
        e.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        fetchProducts(page);
    });

    $(document).on('click', '.link-product', function(e) {
        e.preventDefault(); // Previene l'azione predefinita dell'ancora, se necessario
        const productId = $(this).attr('value'); // Estrae il valore dell'attributo "value"
        console.log(productId);
        
        $.ajax({
            type: "GET",
            url: '/api/staff/product/'+productId+'/info',
            dataType: "html",
            success: function (response) {
            $('#showInfo').html(response);
            },
            error: function (xhr, status, error) {
                console.error('Errore nella richiesta AJAX:', error);
                console.log(xhr);
                
            }
        });

    });





    function handleSearch(){
        console.log('funzione handle, catergorie:'+selectedCategories);
        if(testo === ''){
            fetchProducts();
        }else if(!regex.test(testo)){
            alert(' sono stati inseriti caratteri non validi')
        }else{
            fetchProducts();
        }
    }
    function fetchProducts(page = 1) { 

        console.log('arrivo');
        
        $.ajax({
            type: "GET",
            url: "/api/staff/info?page=" + page,
            data: {
                search: [testo], 
                categories: selectedCategories,
                user: 'staff'
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

});