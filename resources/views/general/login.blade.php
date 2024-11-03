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
    <div id="login-operation">
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
                <div class="input-location">
                    <button type="submit">Login</button>
                </div>

            </fieldset>
            <!-- da convertire in input da bottone -->

        </form>
        @if ($errors->has('login'))
        <div class="error-message" style="color: red; margin-top: 10px;">
            {{ $errors->first('login') }}
        </div>
        @endif
    </div>

</div>


@endsection