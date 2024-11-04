@extends('layouts.basic')

@section('navbar')
@include($navbarView) <!-- Include dinamico della navbar -->
@endsection

@section('navbar_css')
<link rel="stylesheet" href="{{ asset($cssFile) }}?v={{ time() }}"> <!-- Caricamento dinamico del CSS della navbar -->
@endsection

@section('content_css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/staff/catalogStaff.css') }}?v={{ time() }}">
@endsection

@section('content')
<div id="catalogo">
    <aside id="sezione-ricerca">
        <form id="search-form">
            <div id="ricerca">
                <input id="barra-ricerca" type="text" name="barra">

            </div>
            <div class="categorie-ricerca">
                @foreach($categories as $category)
                <div class="categoria">
                    <input type="checkbox" class="category-checkbox" value="{{$category->id}}" name="categories[]"><label>{{ $category['name'] }}</label>
                </div>
                @endforeach
            </div>
            
            <button id="bottone-ricerca" type="submit">cerca</button>

        </form>
        <div class="space">

</div>
    </aside>


    <div id="risultati">



    </div>




</div>

<div id="show-info">
    <div class="list-div">

    </div>
</div>
@endsection

@section('javascript')
<script src="{{ asset('js/staff/catalogStaff.js') }}?v={{ time() }}"> </script>
@endsection