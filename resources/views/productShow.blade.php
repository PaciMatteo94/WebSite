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
        @forelse($malfunctions as $malfunction)
        <li>
            <!-- ID e titolo del malfunzionamento -->
            <div>
                <strong>ID:</strong> {{ $malfunction->id }} -
                <a href="#" class="titleLink" data-id="{{ $malfunction->id }}" data-type="malfunction">{{ $malfunction->title }}</a>
                <a href="#" class="viewLink" data-id="{{ $malfunction->id }}">👁️</a>
            </div>
        </li>
        @empty
        <li>Nessun malfunzionemento disponibile</li>
        @endforelse
        @endif

        <div id="malfunctionView">

        </div>
        <div id="solutionsList">

        </div>
        <div id="solutionView">

        </div>


    </div>
</div>
</div>

@endsection

@section('javascript')
<script src="{{ asset('js/productShow.js') }}?v={{ time() }}"> </script>
@endsection