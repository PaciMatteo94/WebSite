@extends('layouts.basic')

@section('navbar')
@include($navbarView) <!-- Include dinamico della navbar -->
@endsection

@section('navbar_css')
<link rel="stylesheet" href="{{ asset($cssFile) }}?v={{ time() }}"> <!-- Caricamento dinamico del CSS della navbar -->
@endsection

@section('content_css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/staff/removeProva.css') }}?v={{ time() }}">
@endsection

@section('content')
<div id="remove">
    <form id="form-operation">
        <select name="" id="categorySelect">
            <option value="">Seleziona una categoria</option>
        </select>
        <select name="" id="productSelect">
            <option value="">Seleziona un prodotto</option>
        </select>
        <select name="" id="operationSelect">
            <option value="">Seleziona una risorsa</option>
            <option value="malfunction">Malfunzionamento</option>
            <option value="solution">Soluzione</option>
        </select>

        <input type="submit">
    </form>


</div>

<div id="settore-modifiche">

</div>
@endsection

@section('javascript')
<script src="{{ asset('js/staff/remove.js') }}?v={{ time() }}"> </script>
@endsection