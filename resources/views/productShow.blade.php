@extends('layouts.basic')

@section('content_css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/home.css') }}?v={{ time() }}">
@endsection

@section('navbar')
    @include($navbarView) <!-- Include dinamico della navbar -->
@endsection

@section('navbar_css')
    <link rel="stylesheet" href="{{ asset($cssFile) }}?v={{ time() }}"> <!-- Caricamento dinamico del CSS della navbar -->
@endsection

@section('content')
<div class="product-detail">
    <h1>{{ $product->name }}</h1>
    <!-- Aggiungi altre informazioni del prodotto -->
    <p>{{ $product->info }}</p>

    <!-- Mostra l'immagine del prodotto -->
    <div class="product-image">
        <img src="{{ asset( $product->image) }}" alt="{{ $product->name }}">
    </div>
</div>
@endsection