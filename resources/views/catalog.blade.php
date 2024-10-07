@extends('layouts.basic')

@section('navbar')
@include($navbarView) <!-- Include dinamico della navbar -->
@endsection

@section('navbar_css')
<link rel="stylesheet" href="{{ asset($cssFile) }}?v={{ time() }}"> <!-- Caricamento dinamico del CSS della navbar -->
@endsection


@section('content_css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/catalog.css') }}?v={{ time() }}">
@endsection


@section('content')
<div id="contenuto">
    <aside id="ricerca">
        <div id="barra-ricerca">
            <input type="text" name="barra">
        </div>
        <div>
            @foreach($categories as $category)
            <div>
                <input type="checkbox" class="category-checkbox" value="{{$category['id']}}"><label>{{ $category['name'] }}</label>
            </div>

            @endforeach
        </div>


    </aside>
    <div id="risultati">



    </div>


</div>
@endsection

@section('javascript')
<script src="{{ asset('js/catalog.js') }}?v={{ time() }}"> </script>
@endsection