@extends('layouts.base')

@section('content')
<div id="informazioni">
    <div id="sezione-1">
        <img class="immagine immagine-1" src="{{ asset('images/azienda.jpg') }}?v={{ time() }}" alt="Azienda">
        <h1>
            Chi siamo
        </h1>
        <p>
            NEX-Next-gen Electronics Xtreme è leader nella progettazione, produzione e distribuzione di componenti hardware di alta qualità per PC, rivolgendosi sia agli appassionati di tecnologia che ai professionisti del settore informatico. Con una forte attenzione all'innovazione e alla performance, NEX si distingue per l'offerta di soluzioni all'avanguardia, pensate per soddisfare le esigenze dei gamer, dei creatori di contenuti, degli sviluppatori e degli utenti aziendali.

            Fondata con l'obiettivo di ridefinire gli standard dell'elettronica di consumo, NEX è sinonimo di affidabilità e prestazioni estreme. Il nostro impegno costante è quello di offrire ai nostri clienti prodotti hardware di ultima generazione, costruiti con materiali di alta qualità e ingegneria di precisione.
        </p>
    </div>
    <hr>
    <div>
        <img class="immagine immagine-2" src="{{ asset('images/hardware.jpg') }}?v={{ time() }}" alt="Hardware">
        <h2>
            Cosa facciamo
        </h2>
        <p>
            In NEX, produciamo una vasta gamma di componenti hardware per personal computer, focalizzandoci su prodotti che garantiscono la massima stabilità, potenza e durata. I nostri reparti di ricerca e sviluppo lavorano continuamente per progettare soluzioni tecnologiche avanzate che anticipano le esigenze del mercato, mantenendo sempre un occhio di riguardo all’efficienza energetica e alla sostenibilità.

            Il nostro catalogo prodotti comprende:
        <ul>
            <li>Schede madri: Progettate per massimizzare le prestazioni di tutti i componenti, con un focus su stabilità, espandibilità e velocità di elaborazione dati.</li>
            <li>Schede video: Potenza grafica senza compromessi, ideali per gaming ad alte prestazioni, editing video professionale e rendering 3D avanzato.</li>
            <li>Processori: Soluzioni ad alta efficienza, ottimizzate per supportare i carichi di lavoro più intensivi, dalla simulazione all'intelligenza artificiale.</li>
            <li>Alimentatori: Progettati per fornire alimentazione stabile e sicura, garantendo prestazioni ottimali a tutti i componenti del PC.</li>
            <li>Memorie RAM: Elevate velocità e bassa latenza per garantire multitasking fluido e prestazioni superiori anche nei carichi di lavoro più complessi.</li>
            <li>Storage (SSD e HDD): Dispositivi di archiviazione all'avanguardia per trasferimenti di dati ultra rapidi e capacità di storage espandibili.</li>
            <li>Periferiche: Tastiere, mouse, monitor e altre soluzioni ergonomiche, perfette per migliorare la produttività e l’esperienza utente.</li>
            <li>Dissipatori e ventole: Soluzioni di raffreddamento innovative per mantenere le temperature sotto controllo, essenziali per sistemi ad alte prestazioni e overclocking.</li>

        </ul>

        </p>
    </div>
    <hr>
    <div>
    <img class="immagine immagine-3" src="{{ asset('images/Improving.jpg') }}?v={{ time() }}" alt="Improving">
        <h2>La nostra missione</h2>
        <p>
            La missione di NEX è quella di rendere la tecnologia di alta qualità accessibile a tutti, con un'attenzione particolare all'innovazione, alla sostenibilità e all'esperienza cliente. Siamo impegnati a sviluppare prodotti che non solo soddisfino gli standard del settore, ma li superino, per offrire ai nostri clienti una performance su cui possono contare in ogni situazione.

            Con un forte spirito di collaborazione, lavoriamo a stretto contatto con i nostri partner commerciali e distributori per garantire che ogni prodotto NEX arrivi nelle mani degli utenti finali con il massimo del supporto e della garanzia di qualità.
        </p>
    </div>
    <hr>
    <h2>
        Perché scegliere NEX?
    </h2>
    <p>
    <ul>
        <li>Qualità senza compromessi: Ogni componente è progettato con precisione, costruito con materiali di prima scelta e sottoposto a rigorosi test di qualità.</li>
        <li>Innovazione continua: Siamo costantemente alla ricerca di nuove tecnologie per portare sul mercato prodotti sempre più performanti e sostenibili.</li>
        <li>Supporto tecnico dedicato: Il nostro team di esperti è sempre pronto a fornire assistenza personalizzata e consigli per ottimizzare le prestazioni del tuo sistema.</li>
        <li>Affidabilità e sicurezza: Ogni prodotto è garantito per offrire prestazioni durature, senza interruzioni o malfunzionamenti, proteggendo i tuoi dati e il tuo investimento.</li>
    </ul>
    </p>
    <hr>
    <p>
        Scegliere NEX – Next-gen Electronics Xtreme significa affidarsi a un partner che comprende l'importanza di un hardware di alta qualità per costruire sistemi performanti, capaci di rispondere alle sfide del futuro.
    </p>

<div>
    <h1>Contatti</h1>
</div>
</div>
@endsection