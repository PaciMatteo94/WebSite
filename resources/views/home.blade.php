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
<div id="contenuto">
    <div id="categorie">
        <div id="titolo-categorie">
            <h1>Categorie prodotti</h1>
        </div>


        <div class="categorie categorie-1">
            <header>
                <img src="{{ asset('images/scheda-madre.jpg') }}?v={{ time() }}" alt="Schede Madri" height="200" width="200">
            </header>
            <footer class="nome-categoria">
               <a class="ancora-catalogo" href="{{ route('Catalog') }}">Schede madri</a> 
            </footer>

        </div>
        <div class="categorie categorie-2">
            <header>
                <img src="{{ asset('images/scheda-video.jpg') }}?v={{ time() }}" alt="Schede Video" height="200" width="200">
            </header>
            <footer class="nome-categoria">
               <a class="ancora-catalogo" href="{{ route('Catalog') }}">Schede video</a> 
            </footer>

        </div>
        <div class="categorie categorie-3">
            <header>
                <img src="{{ asset('images/cpu.jpg') }}?v={{ time() }}" alt="Processori" height="200" width="200">
            </header>
            <footer class="nome-categoria">
                <a class="ancora-catalogo" href="{{ route('Catalog') }}">Processori</a>
            </footer>

        </div>
        <div class="categorie categorie-4">
            <header>
                <img src="{{ asset('images/ram.jpg') }}?v={{ time() }}" alt="Memoria" height="200" width="200">
            </header>
            <footer class="nome-categoria">
               <a class="ancora-catalogo" href="{{ route('Catalog') }}">Memoria</a> 
            </footer>

        </div>
        <div class="categorie categorie-5">
            <header>
                <img src="{{ asset('images/storage.jpg') }}?v={{ time() }}" alt="Storage" height="200" width="200">
            </header>
            <footer class="nome-categoria">
               <a class="ancora-catalogo" href="{{ route('Catalog') }}">Storage</a> 
            </footer>

        </div>
        <div class="categorie categorie-6">
            <header>
                <img src="{{ asset('images/psu.jpg') }}?v={{ time() }}" alt="Alimentatori" height="200" width="200">
            </header>
            <footer class="nome-categoria">
               <a class="ancora-catalogo" href="{{ route('Catalog') }}">Alimentatori</a> 
            </footer>

        </div>
        <div class="categorie categorie-7">
            <header>
                <img src="{{ asset('images/cooling.jpg') }}?v={{ time() }}" alt="Dissipatori" height="200" width="200">
            </header>
            <footer class="nome-categoria">
               <a class="ancora-catalogo" href="{{ route('Catalog') }}">Dissipatori</a> 
            </footer>

        </div>
        <div class="categorie categorie-8">
            <header>
                <img src="{{ asset('images/monitor.jpg') }}?v={{ time() }}" alt="Periferiche" height="200" width="200">
            </header>
            <footer class="nome-categoria">
               <a class="ancora-catalogo" href="{{ route('Catalog') }}">Monitor</a> 
            </footer>

        </div>
        <div class="categorie categorie-9">
            <header>
                <img src="{{ asset('images/ventole.jpg') }}?v={{ time() }}" alt="Ventole" height="200" width="200">
            </header>
            <footer class="nome-categoria">
               <a class="ancora-catalogo" href="{{ route('Catalog') }}">Ventole</a> 
            </footer>

        </div>

    </div>
</div>

@endsection