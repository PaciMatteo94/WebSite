<div id="mostra-prodotti">
@forelse($products as $product) 
<a class="link-product" value="{{$product->id}}">
    <div class="product-item">
        <!-- Parte superiore: immagine del prodotto -->
        <div class="product-image">
            <img src="{{ asset('images/' . $product->category . '/'. 'Thumbnails' .'/'. $product->thumbnail) }}" alt="{{ $product->name }}">
        </div>
        <!-- Parte inferiore: nome del prodotto -->
        <div class="product-name">
            {{ $product->name }}
        </div>
    </div>
</a>
@empty
<p>Nessun prodotto trovato.</p>
@endforelse
</div>


@if($products->hasPages())
<div class="pagination">
    {{ $products->links() }}
</div>
@endif