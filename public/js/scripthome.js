// selezione di tutti gli elementi all'interno di navbar
$('div.option a').click(function (e) { 
    e.preventDefault();

    const contentId = $(this).attr('data-content');

    showContent(contentId);
    
});


$('#titolo-home a').click(function(e){
    e.preventDefault();
    const contentId = $(this).attr('data-content');
    showContent(contentId);
});

function showContent(contentid){
    $('div.content-section').css('display', 'none');

    
    if(contentid=='login'){
        $('#campo').css('display','flex');
    }

    if(contentid=='home'){
        $('#home-page').css('display','flex');
    }else{
        $('#' + contentid).css('display','flex');

    }
}

// $('div.option a').click(function (e) { 
//     e.preventDefault();

//     const contentIdItem = $(this).attr('data-prodotti');

//     showProdotti();
    
// });

// function showProdotti(contentIdItem){
//     $('div.content-section').css('display', 'none');
//     // mettere le pagine che si vedono
// }