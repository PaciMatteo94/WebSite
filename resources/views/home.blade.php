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


    <div id="titolo-categorie">
        <h1>Categorie prodotti</h1>
    </div>

    <div id="contenitone-categorie">
    @foreach($categories as $category)
        <div class="categorie">
            <header class="contenitore-immagine">
                <img src="{{ asset($category->image) }}?v={{ time() }}" alt="{{ $category->name }}" >
            </header>
            <footer class="nome-categoria">
                <a id="{{ $category->id }}" class="ancora-catalogo" href="javascript:void(0)">{{ $category->name }}</a>
            </footer>
        </div>
    @endforeach   
    </div>


@endsection

@section('javascript')
<script src="{{ asset('js/home.js') }}?v={{ time() }}"> </script>
@endsection