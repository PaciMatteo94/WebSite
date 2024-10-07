@if(!empty($products) && $products->count() > 0)
@foreach($products as $product)
<div class="product-item">
        <p>{{ $product->name }}</p>
</div>
@endforeach
@else
<div>
        <p>{{$message}}</p>
</div>
@endif