@extends('layouts.basic')

@section('navbar')
@include($navbarView) <!-- Include dinamico della navbar -->
@endsection

@section('navbar_css')
<link rel="stylesheet" href="{{ asset($cssFile) }}?v={{ time() }}"> <!-- Caricamento dinamico del CSS della navbar -->
@endsection


@section('content_css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/where.css') }}?v={{ time() }}">
<link href="https://api.mapbox.com/mapbox-gl-js/v3.7.0/mapbox-gl.css" rel="stylesheet">
@endsection



@section('content')

<div id="contenuto-where">
    <div id="map"></div>
    <script src="https://api.mapbox.com/mapbox-gl-js/v3.7.0/mapbox-gl.js"></script>
    <script>
        mapboxgl.accessToken = 'pk.eyJ1Ijoic2lyd29sZjk0IiwiYSI6ImNtMjU0dWE1czBqNm8yanNhNWI5ZGR3YjEifQ.JlSpMfJsmFZq9zK-6v4owA';
        const map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/streets-v9',
            zoom: 5,
            center: [12.760942186658056, 42.79785528139599]
        });

        map.addControl(new mapboxgl.NavigationControl());

        const marker1 = new mapboxgl.Marker()
            .setLngLat([12.371230389130329, 42.071532259299914])
            .addTo(map);
    </script>
    <div id="prova-position">
        <div id="select-container">
            <p class="p">qui ci sarà la selezione</p>
        </div>

        <div id="stabilimenti-list">

            <p class="p">Qui ci sarà la lista</p>
        </div>

    </div>


</div>



@endsection



@section('javascript')
<script src="{{ asset('js/where.js') }}?v={{ time() }}"> </script>
@endsection