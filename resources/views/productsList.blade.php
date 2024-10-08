@if(!empty($products) && $products->count() > 0)

<div class="product-item">
<ul>
        @foreach ($products as $product)
            <li>{{ $product->name }}</li>
        @endforeach
    </ul>
</div>

<div class="pagination">
{{ $products->links() }}
</div>

@else
<div>
        <p>{{$message}}</p>
</div>
@endif