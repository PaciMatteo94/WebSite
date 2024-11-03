@extends('layouts.basic')

@section('navbar')
@include($navbarView) <!-- Include dinamico della navbar -->
@endsection


@section('navbar_css')
<link rel="stylesheet" href="{{ asset($cssFile) }}?v={{ time() }}"> <!-- Caricamento dinamico del CSS della navbar -->
@endsection

@section('content_css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/admin/product/productSection.css') }}?v={{ time() }}">
@endsection

@section('content')
<div id="container-section">
    <div id="list-div">

    </div>


</div>





</div>
@endsection

@section('javascript')
<script src="{{ asset($javascript) }}?v={{ time() }}"> </script>
@endsection