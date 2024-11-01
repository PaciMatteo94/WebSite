<div class="d-flex justify-content-end mb-3">
    <h1>Soluzioni</h1>
    <a href="#" id="add" data-element="solution">Aggiungi</a>
</div>

<!-- Lista dei malfunzionamenti -->
<ul class="list-group">
    @forelse($solutions as $solution)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <!-- ID e titolo del malfunzionamento -->
            <div >
                
                <li>
                <strong>ID:</strong> {{ $solution->id }} - 
                {{ $solution->title }}
                <a href="#" class="viewLink" data-id="{{ $solution->id }}" data-element="solution">👁️</a>
                
                <!-- Link Modifica -->
                <a href="#" class="changeLink" data-id="{{ $solution->id }}" data-element="solution">✏️</a>

                <!-- Link Rimuovi -->
                <a href="#" class="removeLink" data-id="{{ $solution->id }}" data-element="solution">❌</a>
                </li>

            </div>
        </li>
        @empty
        <li class="list-group-item text-center">Nessuna soluzione disponibile</li>
    @endforelse
</ul>