<div class="d-flex justify-content-end mb-3">
    <h1>Prodotti</h1>
    <a href="#" id="add" data-element="product">Aggiungi</a>
</div>


<ul class="list-group">
    @forelse($products as $product)
        <li class="productList">
            <div >
                <li>
                <strong>ID:</strong> {{ $product->id }} - 
                {{ $product->name }}
                <a href="#" class="viewLink" data-id="{{ $product->id }}" data-element="product">👁️</a>
                <a href="#" class="changeLink" data-id="{{ $product->id }}" data-element="product">✏️</a>
                <a href="#" class="removeLink" data-id="{{ $product->id }}" data-element="product">❌</a>
                </li>

            </div>
        </li>
        @empty
        <li class="productList">Nessun prodotto disponibile</li>
    @endforelse
</ul>