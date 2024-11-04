<div class="container">
    <h2>Dettagli Elemento</h2>
    @if(isset($malfunction))
    <div class="card">
        <div class="info-view">
            <strong>ID Malfunzionamento:</strong> {{ $malfunction->id }} 
        </div>
        <div class="info-view">
            <strong>Titolo:</strong> {{ $malfunction->title }} 
        </div>
        <div class="info-view">
            <strong>Descrizione:</strong> {{ $malfunction->description }} 
        </div>





    </div>
    @elseif(isset($solution))
    <div class="card">
        <div class="info-view">
            <strong>ID Soluzione:</strong> {{ $solution->id }} 
        </div>
        <div class="info-view">
            <strong>Titolo:</strong> {{ $solution->title }} 
        </div>
        <div class="info-view">
            <strong>Descrizione:</strong> {{ $solution->description }} 
        </div>





    </div>
    @endif
</div>