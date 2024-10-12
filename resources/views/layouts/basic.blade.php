<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&family=Roboto:wght@400&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/basic.css') }}?v={{ time() }}">
    @yield('content_css') <!-- Inserimento dinamico del css associato al contenuto -->
    @yield('navbar_css') <!-- Inserimento dinamico del css associato alla navbar -->

    <title>NEX:Assistenza Tecnica</title>
</head>

<body>
    <div id="page">
        <header id="header">
            <div id="titolo">
                <a href="{{ route('home') }}">
                    <h2 id="titolo-home">NEX:Assistenza Tecnica</h2>
                </a>
            </div>
            @yield('navbar') <!-- Inserimento dinamico della navbar -->
        </header>
        <div id="contenuto">
        @yield('content') <!-- Inserimento dinamico del contentuto -->
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @yield('javascript')


</body>

</html>