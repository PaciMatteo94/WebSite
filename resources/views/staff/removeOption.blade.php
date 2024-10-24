<div class="selezione">
    <h1>seleziona un malfunzionamento</h1>
    <p>In questo caso tutte le soluzioni a tale malfunzionamento saranno eliminate</p>
    <form id="malfunction-form">
    <label for="malfunctionSelect">Malfunzionamento:</label>
        <select id="malfunctionSelect" name="malfunction">
            @foreach($malfunctions as $malfunction)
            <option value="{{ $malfunction['id'] }}">{{ $malfunction['title'] }}</option>
            @endforeach
        </select>

        <button type="submit">Invia</button>
    </form>
</div>

<div class="selezione">
    <h1>Seleziona una soluzione da eliminare</h1>
    <form id="solution-form" action="" method="">
    <label for="solutionSelect">Soluzione:</label>
        <select id="solutionSelect" name="solution">
            @if(count($malfunctions) > 0)
            @foreach($malfunctions[0]['solutions'] as $solution)
            <option value="{{ $solution['id'] }}">{{ $solution['title'] }}</option>
            @endforeach
            @endif
        </select>

        <button type="submit">Invia</button>

    </form>
</div>