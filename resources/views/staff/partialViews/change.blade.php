<div id="form">
@if(isset($malfunction))
    <h2>Modifica Malfunzionamento: {{ $malfunction->title }}</h2>
    <p>Se i campi vengono lasciati vuoti, si manterrano le informazioni correnti </p>
    
    <!-- Form per il cambiamento dei dati -->
    <form id="changeFormMalfunction" data-id="{{ $malfunction->id }}" data-element="malfunction">


        <!-- Titolo -->
        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $malfunction->title }}">
        </div>

        <!-- Descrizione -->
        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea name="description" id="description" class="form-control" rows="4">{{ $malfunction->description }}</textarea>
        </div>

        <!-- Pulsante di salvataggio -->
        <button type="submit" class="btn btn-primary">Salva Modifiche</button>
    </form>
    @elseif(isset($solution))
    <h2>Modifica Soluzione: {{ $solution->title }}</h2>
    
    <!-- Form per il cambiamento dei dati -->
    <form id="changeFormSolution" data-id="{{ $solution->id }}" data-element="solution">


        <!-- Titolo -->
        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $solution->title }}">
        </div>

        <!-- Descrizione -->
        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea name="description" id="description" class="form-control" rows="4">{{ $solution->description }}</textarea>
        </div>

        <!-- Pulsante di salvataggio -->
        <button type="submit" class="btn btn-primary">Salva Modifiche</button>
    </form>
    @endif
</div>