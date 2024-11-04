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

<div id="where">
    <div id="map">
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
                .setLngLat([9.1897, 45.4642]) // Milano
                .addTo(map);
            const marker2 = new mapboxgl.Marker()
                .setLngLat([12.4964, 41.9028]) // Roma
                .addTo(map);
            const marker3 = new mapboxgl.Marker()
                .setLngLat([14.2681, 40.8522]) // Napoli
                .addTo(map);
            const marker4 = new mapboxgl.Marker()
                .setLngLat([15.0830, 37.5079]) // Catania
                .addTo(map);
                const marker5 = new mapboxgl.Marker()
                .setLngLat([9.1216, 39.2239]) // Catania
                .addTo(map);
        </script>
    </div>

    <div id="prova-position">
        <div id="description-section">
            <h2>Dove Siamo</h2>
            <p>Benvenuti nella sezione "Dove Siamo" di NEX - Next-gen Electronics Xtreme! Siamo orgogliosi di fornire assistenza tecnica e supporto specializzato su tutto il territorio nazionale, con centri di assistenza presenti in varie regioni d'Italia. I nostri tecnici certificati sono a disposizione per risolvere qualsiasi problema legato ai vostri dispositivi hardware, garantendo sempre la massima professionalità e tempi di risposta rapidi. Scegli il centro di assistenza più vicino a te e contattaci per qualunque necessità.</p>
        </div>

        <div id="stabilimenti-list">
            <div class="centro-assistenza">
                <h3>Centro di Assistenza NEX - Milano</h3>
                <a href="#" class="location-link" data-latitudine="45.4642" data-longitudine="9.1897"> Via Torino, 58, 20123 Milano MI</a>
            </div>

            <div class="centro-assistenza">
                <h3>Centro di Assistenza NEX - Roma</h3>
                <a href="#" class="location-link" data-latitudine="41.9028" data-longitudine="12.4964">Via del Corso, 500, 00186 Roma RM</a>

            </div>

            <div class="centro-assistenza">
                <h3>Centro di Assistenza NEX - Napoli</h3>
                <a href="#" class="location-link" data-latitudine="40.8522" data-longitudine="14.2681">Via Toledo, 100, 80134 Napoli NA</a>

            </div>

            <div class="centro-assistenza">
                <h3>Centro di Assistenza NEX - Catania</h3>
                <a href="#" class="location-link" data-latitudine="37.5079" data-longitudine="15.0830">Via Etnea, 150, 95131 Catania CT</a>

            </div>

            <div class="centro-assistenza">
<h3>Centro di Assistenza NEX- Sardegna</h3>
<a href="#" class="location-link" data-latitudine="39.2239" data-longitudine="9.1216">Via Roma, 45, 09124 Cagliari</a>
            </div>


        </div>

    </div>


</div>



@endsection



@section('javascript')
<script src="{{ asset('js/where.js') }}?v={{ time() }}"> </script>
@endsection