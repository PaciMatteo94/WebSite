@extends('layouts.base')

@section('navbar')
@include($navbarView) <!-- Include dinamico della navbar -->
@endsection

@section('navbar_css')
<link rel="stylesheet" href="{{ asset($cssFile) }}?v={{ time() }}"> <!-- Caricamento dinamico del CSS della navbar -->
@endsection


@section('content_css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/posizionestyle.css') }}?v={{ time() }}">
@endsection



@section('content')
<div id="contenuto">
    <div id="iframe">
        <iframe id="mapIframe" src="https://www.google.com/maps/d/u/0/embed?mid=1iv7R0_xQ0hXPdcRlPKvxbXjWb2arw0o&ehbc=2E312F" width="640" height="480"></iframe>
    </div>
    <div id="select-container">
    </div>
        <div id="stabilimenti-list">

        </div>


    
</div>
@endsection



@section('javascript')
<script src="{{ asset('js/posizione.js') }}?v={{ time() }}"> </script>
@endsection