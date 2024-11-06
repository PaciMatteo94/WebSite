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
        <form id="login-form" method="POST" action="{{ route('login') }}">
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

@section('javascript')
<script>
    $(document).ready(function() {
        // Quando viene inviato il form
        $('#login-form').submit(function(event) {
            var username = $('#username').val();
            const usernameRegex = /^[a-zA-Z0-9àèéìòùÀÈÉÌÒÙ]+$/; // Regex per caratteri validi
            
            // Se l'username non è valido, prevenire l'invio del form e mostrare un alert
            if (!usernameRegex.test(username)) {
                event.preventDefault();  // Prevenire l'invio del form
                alert('Il nome utente contiene caratteri non validi. Sono accettati solo numeri, lettere e lettere accentate.');
            }
        });
    });
</script>
@endsection