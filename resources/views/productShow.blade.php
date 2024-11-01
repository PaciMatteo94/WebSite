@extends('layouts.basic')

@section('content_css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/productShow.css') }}?v={{ time() }}">
@endsection

@section('navbar')
@include($navbarView) <!-- Include dinamico della navbar -->
@endsection

@section('navbar_css')
<link rel="stylesheet" href="{{ asset($cssFile) }}?v={{ time() }}"> <!-- Caricamento dinamico del CSS della navbar -->
@endsection

@section('content')
<div class="product-detail">
    <div class="product-image">
        <img src="{{ asset( $product->image) }}" alt="{{ $product->name }}">
    </div>
    <div class="product-info">
        <h1>{{ $product->name }}</h1>
        <!-- Aggiungi altre informazioni del prodotto -->
        <p>{{ $product->info }}</p>

        <h1>Tecniche d'uso</h1>
        <p>{{ $product->usage_techniques }}</p>

        <h1>Modalità d'istallazione</h1>
        <p>{{ $product->installation_mode }}</p>

        <!-- Mostra l'immagine del prodotto -->
             <!-- Se l'utente è loggato e ha il ruolo 'technician', mostra malfunctions e solutions -->
    @if (auth()->check() && auth()->user()->role === 'technician')
    <div class="product-malfunctions">
        <h2>Malfunctions</h2>
        <!-- Qui visualizza gli elementi malfunctions associati al prodotto -->
        <ul>
        @foreach ($malfunctions as $malfunction)
        <li>{{ $malfunction->description }}</li>
    @endforeach
        </ul>
    </div>

    <div class="product-solutions">
        <h2>Solutions</h2>
        <!-- Qui visualizza gli elementi solutions associati al prodotto -->


        <ul>

        @foreach ($solutions as $solution)
        <li>{{ $solution->description }}</li>
    @endforeach

        </ul>

    </div>
    @endif
    </div>




</div>
@endsection