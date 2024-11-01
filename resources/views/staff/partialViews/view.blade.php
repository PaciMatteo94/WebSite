<div class="container">
    <h2>Dettagli Elemento</h2>
    @if(isset($malfunction))
    <div class="card">
        <strong>ID Malfunzionamento:</strong> {{ $malfunction->id }} <br>
        <strong>Titolo:</strong> {{ $malfunction->title }} <br>
        <strong>Descrizione:</strong> {{ $malfunction->description }} <br>


    </div>
    @elseif(isset($solution))
    <div class="card">
        <strong>ID Soluzione:</strong> {{ $solution->id }} <br>
        <strong>Titolo:</strong> {{ $solution->title }} <br>
        <strong>Descrizione:</strong> {{ $solution->description }} <br>


    </div>
    @endif
</div>