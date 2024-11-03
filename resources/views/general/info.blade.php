@extends('layouts.basic')

@section('content_css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/info.css') }}?v={{ time() }}">
@endsection

@section('navbar')
@include($navbarView) <!-- Include dinamico della navbar -->
@endsection

@section('navbar_css')
<link rel="stylesheet" href="{{ asset($cssFile) }}?v={{ time() }}"> <!-- Caricamento dinamico del CSS della navbar -->
@endsection



@section('content')


<div class="sezione sezione-1">
    <div class="contenitore-immagine">
        <img class="immagine" src="{{ asset('images/azienda.jpg') }}?v={{ time() }}" alt="Azienda">
    </div>



    <div class="descrizione descrizione-1">
        <h2>
            Chi siamo
        </h2>
        <p>
            NEX-Next-gen Electronics Xtreme è leader nella progettazione, produzione e distribuzione di componenti hardware di alta qualità per PC, rivolgendosi sia agli appassionati di tecnologia che ai professionisti del settore informatico. Con una forte attenzione all'innovazione e alla performance, NEX si distingue per l'offerta di soluzioni all'avanguardia, pensate per soddisfare le esigenze dei gamer, dei creatori di contenuti, degli sviluppatori e degli utenti aziendali. Fondata con l'obiettivo di ridefinire gli standard dell'elettronica di consumo, NEX è sinonimo di affidabilità e prestazioni estreme. Il nostro impegno costante è quello di offrire ai nostri clienti prodotti hardware di ultima generazione, costruiti con materiali di alta qualità e ingegneria di precisione.
        </p>
    </div>

</div>


<div class="sezione sezione-2">
    <div class="contenitore-immagine">
        <img class="immagine" src="{{ asset('images/assistence-net.jpg') }}?v={{ time() }}" alt="assistence-net">
    </div>

    <div class="descrizione descrizione-2">

        <h2>
            Centri di Assistenza
        </h2>
        <p>
            NEX vanta una rete capillare di centri di assistenza tecnica dislocati in tutto il territorio, concepiti per offrire un supporto tempestivo e qualificato ai nostri clienti. Nei centri di assistenza NEX, i tecnici specializzati sono a disposizione per effettuare diagnosi e riparazioni su tutti i prodotti del nostro catalogo, dai componenti principali come schede madri, schede video e processori, fino agli alimentatori, memorie RAM e dispositivi di storage. Ogni centro è attrezzato con le migliori tecnologie per garantire interventi rapidi e risolutivi, assicurando che ogni prodotto, anche dopo l'acquisto, continui a fornire le prestazioni elevate per cui è stato progettato.

            I nostri centri di assistenza non solo offrono riparazioni su malfunzionamenti tecnici, ma anche consigli utili per l’ottimizzazione e la manutenzione dei componenti, permettendo ai nostri clienti di prolungare la vita dei loro dispositivi. Siamo impegnati a fornire un'esperienza di post-vendita impeccabile, con l’obiettivo di garantire la piena soddisfazione e la fiducia dei nostri utenti nel tempo. Per scoprire dove si trova il centro di assistenza più vicino, consulta la pagina dedicata "[<a id="link-where" href="{{ route('where') }}">Dove Siamo</a>]".

        </p>
    </div>


</div>



<div class="sezione sezione-3">
    <div class="contenitore-immagine">
        <img class="immagine" src="{{ asset('images/info.png') }}?v={{ time() }}" alt="information">
    </div>

    <div class="descrizione descrizione-3">
        <h2>Informazioni Accessibili sul Sito</h2>
        <p>
        Le informazioni disponibili sul nostro sito variano in base al livello di accesso.
        <ul>
            <li>Utente non registrato: Può accedere alle informazioni generali sull'azienda, alla sezione "Dove Siamo" con la localizzazione dei centri di assistenza, e alle pagine prodotto, dove vengono fornite le descrizioni e le specifiche tecniche dei componenti hardware.</li>
            <li>Tecnico: Ha accesso a tutte le informazioni disponibili per l'utente non registrato, ma con una funzionalità aggiuntiva. Nelle pagine prodotto, oltre alle descrizioni e alle specifiche, il tecnico può visualizzare dettagli relativi ai malfunzionamenti segnalati e le soluzioni tecniche proposte per risolverli.</li>
            <li>Staff tecnico: Non ha accesso alle pagine visualizzate dagli utenti o dai tecnici. Invece, può accedere a un'area dedicata per la gestione dei prodotti, dove ha la possibilità di aggiungere, modificare o cancellare informazioni relative ai malfunzionamenti e alle soluzioni per i prodotti.</li>
            <li>Amministratore: L'amministratore, come lo staff tecnico, ha accesso esclusivamente ad aree riservate al proprio ruolo. In queste sezioni può gestire la creazione, modifica e cancellazione delle pagine prodotto e delle informazioni di base, ma non ha il compito di gestire i malfunzionamenti o le relative soluzioni tecniche. Inoltre, l'amministratore si occupa della gestione degli utenti registrati, potendo aggiungere, modificare o eliminare i membri dello staff tecnico e i tecnici dei centri di assistenza.</li>
        </ul>
        </p>

    </div>


</div>



<div class="sezione sezione-4">
    <div class="descrizione">
        <h2>
        Modalità di Accesso al Sito
        </h2>
        <p>
        L'accesso al sito avviene esclusivamente tramite la pagina di login. Non è presente una pagina di registrazione poiché il sito è dedicato principalmente al personale interno dell'azienda. La gestione degli utenti registrati è riservata all'amministratore, che si occupa di creare, modificare e cancellare gli account. Gli utenti non registrati possono comunque accedere alle informazioni di base relative all'azienda e ai suoi prodotti.
        </p>
    </div>




</div>
<hr>
<div class="sezione sezione-5">
    <div class="descrizione">
        <h2 id="titolo-contatti">Contatti</h2>
    </div>
    <p id="contatti">
        Email per supporto tecnico: <a href="mailto: NEX.Assistenza@outlook.it">NEX.Assistenza@outlook.it</a>
        <br>
        Numero di telefono: <span style="color: white;">800-123-456 - Dal lunedì al venerdì, dalle 9:00 alle 18:00</span> 
    </p>
</div>



@endsection