@extends('layouts.basic')

@section('navbar')
@include($navbarView) <!-- Include dinamico della navbar -->
@endsection

@section('navbar_css')
<link rel="stylesheet" href="{{ asset($cssFile) }}?v={{ time() }}"> <!-- Caricamento dinamico del CSS della navbar -->
@endsection

@section('content')
<div id="change">
    <form id="form-operation">
    <select name="" id="categorySelect">
        <option value="">Seleziona una categoria</option>
    </select>
    <select name="" id="productSelect">
        <option value="">Seleziona un prodotto</option>
    </select>

    <input type="submit">
    </form>


</div>

<div id="settore-modifiche">

</div>

<div id="detailsContainer">

</div>
</div>
@endsection

@section('javascript')
<script src="{{ asset('js/staff/change.js') }}?v={{ time() }}"> </script>
@endsection