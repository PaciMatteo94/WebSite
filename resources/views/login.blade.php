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
    <form method="POST" action="{{ route('login') }}">
        @csrf <!-- Token CSRF per la sicurezza -->
        <fieldset id="campo">
            <label for="username">Nome Utente</label>
            <div class="input-location">
                <input type="text" name="username" id="username" required>
            </div>
            <label for="password">Password</label>
            <div class="input-location">
                <input type="password" name="password" id="password" required>
            </div>
        </fieldset>

        <button type="submit">Login</button>
    </form>
</div>


@endsection