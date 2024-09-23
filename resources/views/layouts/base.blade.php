<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/homestyle.css') }}?v={{ time() }}">
    <title>NEX:Assistenza Tecnica</title>
</head>
<body>
    <div id="page">
        <header id="header">
            <div id="titolo">
                <h2 id="titolo-home">NEX:Assistenza Tecnica</h2>
            </div>
            <div id="navbar">
                @include('layouts/navutente')
            </div>

        </header>
        <div id="contenuto">
            @include('layouts/catalogohome')
        </div>

    </div>
</body>
</html>