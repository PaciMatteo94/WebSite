<div id="form">
@if(isset($malfunction))
    <h2>Modifica Malfunzionamento: {{ $malfunction->title }}</h2>
    
    <!-- Form per il cambiamento dei dati -->
    <form id="changeFormMalfunction" data-id="{{ $malfunction->id }}">


        <!-- Titolo -->
        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $malfunction->title }}" required>
        </div>

        <!-- Descrizione -->
        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea name="description" id="description" class="form-control" rows="4" required>{{ $malfunction->description }}</textarea>
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
            <input type="text" name="title" id="title" class="form-control" value="{{ $solution->title }}" required>
        </div>

        <!-- Descrizione -->
        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea name="description" id="description" class="form-control" rows="4" required>{{ $solution->description }}</textarea>
        </div>

        <!-- Pulsante di salvataggio -->
        <button type="submit" class="btn btn-primary">Salva Modifiche</button>
    </form>
    @endif
</div>