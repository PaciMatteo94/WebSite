$(document).ready(function () {
    var testo= '';
    const regex = /^[a-zA-Z0-9àèéìòùÀÈÉÌÒÙ*]+$/;
    var selectedCategories = [];

    //PARTE AJAX PER LA SELEZIONE DELLE CATEGORIE PRODOTTO

    //controllo se sono entrato in catalogo tramite la home e prendo l'id selezionato dalla home
    if (localStorage.length > 0) {
        $('input[type="checkbox"][value="' + localStorage.getItem('selectedId') + '"]').prop('checked', true);
        checkCategories();
        localStorage.clear();
        handleSearch();
        console.log(localStorage.length);

    } else{
        checkCategories();
        handleSearch();
    }

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
        console.log('arrivo a fetche prodotti e richiesta ajax');
        console.log('categorie che vanno in ajax: ' + selectedCategories);
        console.log('Categorie selezionate:', selectedCategories);
        console.log('testo che va in ajax:' , testo);
        
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

        console.log('fetch categorie: '+ selectedCategories);
    }




});