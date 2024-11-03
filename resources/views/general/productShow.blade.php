@extends('layouts.basic')

@section('content_css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/productShow.css') }}?v={{ time() }}">
@endsection

@section('navbar')
@include($navbarView)
@endsection

@section('navbar_css')
<link rel="stylesheet" href="{{ asset($cssFile) }}?v={{ time() }}">
@endsection

@section('content')
<div class="product-detail">
    <div class="product-image">
        <div id="image-div">
            <img src="{{ asset( $product->image) }}" alt="{{ $product->name }}">
        </div>
        <div id="image-space">

        </div>

    </div>
    <div class="product-info">
        <div id="general-info">
            <h1>{{ $product->name }}</h1>
            <p>{{ $product->info }}</p>

            <h1>Tecniche d'uso</h1>
            <p>{{ $product->usage_techniques }}</p>

            <h1>Modalità d'istallazione</h1>
            <p>{{ $product->installation_mode }}</p>
        </div>

        @if (auth()->check() && auth()->user()->role === 'technician')
        <div id="manlfunction-list">
            <h1>Malfunzionamenti del prodotto</h1>
            <ul class="list-container">
                @forelse($malfunctions as $malfunction)
                <li class="list-item">
                    <a href="#" class="title-link" data-id="{{ $malfunction->id }}" data-type="malfunction">{{ $malfunction->title }}</a>
                </li>
                @empty
                <li>Nessun malfunzionemento disponibile</li>
                @endforelse
            </ul>



        </div>
        <div id="malfunction-view">

        </div>
        <div id="solutions-list">

        </div>
        <div id="solution-view">

        </div>
        @endif



    </div>
</div>
</div>

@endsection

@section('javascript')
<script src="{{ asset('js/productShow.js') }}?v={{ time() }}"> </script>
@endsection