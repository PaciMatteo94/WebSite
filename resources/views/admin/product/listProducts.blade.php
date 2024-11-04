<div id="products-section">
    <div class="title-div">
        <h1>Prodotti</h1>
        <button id="add" data-element="product">Aggiungi</button>
    </div>


    <ul>
        @forelse($products as $product)
        <li class="option-list">
            <div class="option">
                <div>
                    {{ $product->name }}
                </div>
                <div class="operation-div">
                    <a href="#" class="viewLink" data-id="{{ $product->id }}" data-element="product">👁️</a>
                    <a href="#" class="changeLink" data-id="{{ $product->id }}" data-element="product">✏️</a>
                    <a href="#" class="removeLink" data-id="{{ $product->id }}" data-element="product">❌</a>
                </div>
            </div>


        </li>
        @empty
        <li class="productList">Nessun prodotto disponibile</li>
        @endforelse
    </ul>
</div>