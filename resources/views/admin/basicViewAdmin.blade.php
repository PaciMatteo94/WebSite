@extends('layouts.basic')

@section('navbar')
@include($navbarView) <!-- Include dinamico della navbar -->
@endsection


@section('navbar_css')
<link rel="stylesheet" href="{{ asset($cssFile) }}?v={{ time() }}"> <!-- Caricamento dinamico del CSS della navbar -->
@endsection

@section('content_css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/admin/basicViewAdmin.css') }}?v={{ time() }}">
@endsection

@section('content')
<div id="containerSection">
    <div id="listStaff">

    </div>



</div>
@endsection

@section('javascript')
<script src="{{ asset($javascript) }}?v={{ time() }}"> </script>
@endsection