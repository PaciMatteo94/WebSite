@extends('layouts.basic')

@section('navbar')
@include($navbarView) <!-- Include dinamico della navbar -->
@endsection

@section('navbar_css')
<link rel="stylesheet" href="{{ asset($cssFile) }}?v={{ time() }}"> <!-- Caricamento dinamico del CSS della navbar -->
@endsection

@section('content')

<div class="container-welcome">
<div class="space"></div>
    <div id="welcome">

        <div>
            <h1>Benvenuto: {{ $user->name }} {{ $user->surname }}</h1>
        </div>


    </div>
    <div class="space"></div>

</div>

@endsection