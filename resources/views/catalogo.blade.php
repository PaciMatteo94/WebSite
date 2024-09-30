@extends('layouts.base')

@section('navbar')
@include($navbarView) <!-- Include dinamico della navbar -->
@endsection

@section('navbar_css')
<link rel="stylesheet" href="{{ asset($cssFile) }}?v={{ time() }}"> <!-- Caricamento dinamico del CSS della navbar -->
@endsection


@section('content_css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/catalogo.css') }}?v={{ time() }}">
@endsection


@section('content')
<div id="contenuto">
    <aside id="ricerca">
        
    </aside>
    <div id="risultati">
        
    </div>


</div>
@endsection

@section('javascript')
<script src="{{ asset('js/catalogo.js') }}?v={{ time() }}"> </script>
@endsection