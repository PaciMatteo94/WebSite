@if(!($datas->isEmpty()))
<div class="selezione">
    <h1>seleziona un elemento da rimuovere</h1>
    <form id="operation">
    <label for="select">Malfunzionamento:</label>
        <select id="select" name="malfunction">
            @foreach($datas as $object)
            <option value="{{ $object['id'] }}">{{ $object['title'] }}</option>
            @endforeach
        </select>

        <button type="submit">Invia</button>
    </form>
</div>
@else
<p>Non è stato trovato nessun elemento da poter rimuovere</p>
@endif

