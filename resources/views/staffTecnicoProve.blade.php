@extends('layouts.basic')

@section('content_css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/staffprova.css') }}?v={{ time() }}">
@endsection

@section('content')
<div id="modifiche">
    <form id="form-operation">
        <div id="select-option">
            <select name="operation" id="operationSelect">
                <option value="">Seleziona un'operazione da svolgere</option>
                <option value="remove">Rimozione di un malfunzionamento o di una soluzione</option>
                <option value="change">Cambio di un malfunzionamento o di una soluzione</option>
                <option value="insert">Inserimento di un malfunzionamento o di una soluzione</option>


            </select>
        </div>
        <div id="select-category">
            <select id="categorySelect">
                <option value="">Seleziona una categoria</option>
            </select>
        </div>

        <div id="select-product">
            <select id="productSelect">
                <option value="">Seleziona un prodotto</option>
            </select>

        </div>
<div>
    <input type="submit" name="ottieni" value="Ottieni">
</div>



    </form>





    </select>

</div>

@endsection


@section('javascript')
<script src="{{ asset('js/staffprova.js') }}?v={{ time() }}"> </script>
@endsection