<div class="container">
    <h2>Dettagli Elemento</h2>
    @if(isset($category))
    <div class="card">
        <strong>ID Categoria:</strong> {{ $category->id }} <br>
        <strong>Nome:</strong> {{ $category->name }} <br>
        <strong>Immagine:</strong> <img src="{{ asset($category->image) }}" alt="Immagine Categoria"> <br>


    </div>
    @elseif(isset($product))
    <div class="card">
        <strong>ID Product:</strong> {{ $product->id }} <br>
        <strong>Nome:</strong> {{ $product->name }} <br>
        <strong>Descrizione:</strong> {{ $product->info }} <br>
        <strong>Tecniche d'uso:</strong> {{ $product->usage_techniques }} <br>
        <strong>Modalità di installazione:</strong> {{ $product->installation_mode }} <br>
        <strong>Immagine:</strong> <img src="{{ asset($product->image) }}" alt="Immagine Categoria"> <br>
        <strong>thumbnail:</strong> <img src="{{ asset($product->thumbnail) }}" alt="Immagine Categoria"> <br>

    </div>
    @endif
</div>