<div class="form">
    <h2>Dettagli Elemento</h2>
    @if(isset($category))
    <div class="card">
        <div class="info-view">
            <strong>ID Categoria:</strong> {{ $category->id }}
        </div>
        <div class="info-view">
            <strong>Nome:</strong> {{ $category->name }}
        </div>
        <div class="info-view-img">
        <strong>Immagine:</strong> <img src="{{ asset($category->image) }}" alt="Immagine Categoria">
        </div>





    </div>
    @elseif(isset($product))
    <div class="card">
        <div class="info-view">
        <strong>ID Product:</strong> {{ $product->id }} 
        </div>
        <div class="info-view">
        <strong>Nome:</strong> {{ $product->name }} 
        </div>
        <div class="info-view">
        <strong>Descrizione:</strong> {{ $product->info }} 
        </div>
        <div class="info-view">
        <strong>Tecniche d'uso:</strong> {{ $product->usage_techniques }} 
        </div>
        <div class="info-view">
        <strong>Modalità di installazione:</strong> {{ $product->installation_mode }}
        </div>
        <div class="info-view-img">
        <strong>Immagine:</strong> <img src="{{ asset($product->image) }}" alt="Immagine Categoria"> 
        </div>
        <div class="info-view-img-thumbnail">
        <strong>thumbnail:</strong> <img src="{{ asset($product->thumbnail) }}" alt="Immagine Categoria"> 
        </div>




         
        
        

    </div>
    @endif
</div>