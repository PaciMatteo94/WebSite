@if(!empty($products) && $products->count() > 0)
@foreach($products as $product)
<a class="link-product" href="{{ route('product.show', ['id' => $product->name]) }}">
    <div class="product-item">
        <!-- Parte superiore: immagine del prodotto -->
        <!-- <div class="product-image">
        <img src="{{ $product->image }}" alt="{{ $product->name }}">
    </div> -->
        <!-- Parte inferiore: nome del prodotto -->
        <div class="product-name">
            {{ $product->name }}
        </div>
    </div>
</a>
@endforeach
@else
<p>Nessun prodotto trovato.</p>
@endif

@if($products->hasPages())
<div class="pagination">
    {{ $products->links() }}
</div>
@endif