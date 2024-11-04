<div class="form">
    <h2>Aggiungi un Nuovo Elemento</h2>
    @if($type === 'malfunction')
    <form id="insertFormMalfunction" data-element="malfunction">
        <div class="form-group">
            <label for="title">Titolo malfunzionamento:</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>

        <div class="form-group">
            <label for="description">Descrizione malfunzionemento:</label>
            <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Aggiungi</button>
    </form>
    @elseif($type === 'solution')
    <form id="insertFormSolution" data-element="solution">
        <div class="form-group">
            <label for="title">Titolo soluzione:</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>

        <div class="form-group">
            <label for="description">Descrizione soluzione:</label>
            <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Aggiungi</button>
    </form>
    @endif

</div>