<div id="mostra-prodotti">
    @forelse($products as $product)
    <a class="link-product" href="{{ route('product.show', ['id' => $product->id, 'name' =>urlencode($product->name)]) }}">
        <div class="product-item">
            <!-- Parte superiore: immagine del prodotto -->
            <div class="product-image">
                <img src="{{ asset($product->thumbnail) }}" alt="{{ $product->name }}">
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
<div class="space">

</div>

@if($products->hasPages())
<div class="pagination">
    {{ $products->links() }}
</div>
@endif