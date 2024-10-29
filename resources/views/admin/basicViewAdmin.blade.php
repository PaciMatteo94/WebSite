@extends('layouts.basic')

@section('navbar')
@include($navbarView) <!-- Include dinamico della navbar -->
@endsection

@section('navbar_css')
<link rel="stylesheet" href="{{ asset($cssFile) }}?v={{ time() }}"> <!-- Caricamento dinamico del CSS della navbar -->
@endsection

@section('content')
<div id="section-operation">
    <aside>
        <ul id="operation">
            <li><a href="#" class="operation-link" id="insert">Inserimento</a></li>
            <li><a href="#" class="operation-link" id="change">Modifica</a></li>
            <li><a href="#" class="operation-link" id="remove">Rimozione</a></li>
        </ul>
    </aside>

    <div id="visualization-section">


    </div>


</div>
@endsection

@section('javascript')
<script src="{{ asset($javascript) }}?v={{ time() }}"> </script>
@endsection