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
               <a id="MoBo" class="ancora-catalogo" href="javascript:void(0)">Schede madri</a> 
            </footer>

        </div>
        <div class="categorie categorie-2">
            <header>
                <img src="{{ asset('images/scheda-video.jpg') }}?v={{ time() }}" alt="Schede Video" height="200" width="200">
            </header>
            <footer class="nome-categoria">
               <a id="Gpu" class="ancora-catalogo" href="javascript:void(0)">Schede video</a> 
            </footer>

        </div>
        <div class="categorie categorie-3">
            <header>
                <img src="{{ asset('images/cpu.jpg') }}?v={{ time() }}" alt="Processori" height="200" width="200">
            </header>
            <footer class="nome-categoria">
                <a id="Cpu" class="ancora-catalogo" href="javascript:void(0)">Processori</a>
            </footer>

        </div>
        <div class="categorie categorie-4">
            <header>
                <img src="{{ asset('images/ram.jpg') }}?v={{ time() }}" alt="Memoria" height="200" width="200">
            </header>
            <footer class="nome-categoria">
               <a id="RAM" class="ancora-catalogo" href="javascript:void(0)">Memoria</a> 
            </footer>

        </div>
        <div class="categorie categorie-5">
            <header>
                <img src="{{ asset('images/storage.jpg') }}?v={{ time() }}" alt="Storage" height="200" width="200">
            </header>
            <footer class="nome-categoria">
               <a id="Storage" class="ancora-catalogo" href="javascript:void(0)">Storage</a> 
            </footer>

        </div>
        <div class="categorie categorie-6">
            <header>
                <img src="{{ asset('images/psu.jpg') }}?v={{ time() }}" alt="Alimentatori" height="200" width="200">
            </header>
            <footer class="nome-categoria">
               <a id="Psu" class="ancora-catalogo" href="javascript:void(0)">Alimentatori</a> 
            </footer>

        </div>
        <div class="categorie categorie-7">
            <header>
                <img src="{{ asset('images/cooling.jpg') }}?v={{ time() }}" alt="Dissipatori" height="200" width="200">
            </header>
            <footer class="nome-categoria">
               <a id="Cooling" class="ancora-catalogo" href="javascript:void(0)">Dissipatori</a> 
            </footer>

        </div>
        <div class="categorie categorie-8">
            <header>
                <img src="{{ asset('images/monitor.jpg') }}?v={{ time() }}" alt="Periferiche" height="200" width="200">
            </header>
            <footer class="nome-categoria">
               <a id="Monitor" class="ancora-catalogo" href="javascript:void(0)">Monitor</a> 
            </footer>

        </div>
        <div class="categorie categorie-9">
            <header>
                <img src="{{ asset('images/ventole.jpg') }}?v={{ time() }}" alt="Ventole" height="200" width="200">
            </header>
            <footer class="nome-categoria">
               <a id="Fan" class="ancora-catalogo" href="javascript:void(0)">Ventole</a> 
            </footer>

        </div>

    </div>
</div>

@endsection

@section('javascript')
<script src="{{ asset('js/home.js') }}?v={{ time() }}"> </script>
@endsection