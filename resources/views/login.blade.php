@extends('layouts.basic')

@section('navbar')
@include($navbarView) <!-- Include dinamico della navbar -->
@endsection

@section('navbar_css')
<link rel="stylesheet" href="{{ asset($cssFile) }}?v={{ time() }}"> <!-- Caricamento dinamico del CSS della navbar -->
@endsection


@section('content_css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}?v={{ time() }}">

@endsection


@section('content')

<div id="login">
    <fieldset id="campo">
        <label for="Nome Utente">Nome Utente</label>
        <input type="text" name="Nome Utente">
        <label for="Password">Password</label>
        <input type="password" name="password">
    </fieldset>



</div>


@endsection