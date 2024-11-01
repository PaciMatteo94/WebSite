<div class="d-flex justify-content-end mb-3">
    <h1>Malfunzionamenti</h1>
    <a href="#" id="add" data-element="malfunction">Aggiungi</a>
</div>

<!-- Lista dei malfunzionamenti -->
<ul class="list-group">
    @forelse($malfunctions as $malfunction)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <!-- ID e titolo del malfunzionamento -->
            <div >
                <strong>ID:</strong> {{ $malfunction->id }} - 
                <a href="#" class="titleLink" data-id="{{ $malfunction->id }}">{{ $malfunction->title }}</a>
                <a href="#" class="viewLink" data-id="{{ $malfunction->id }}" data-element="malfunction">👁️</a>
                
                <!-- Link Modifica -->
                <a href="#" class="changeLink" data-id="{{ $malfunction->id }}" data-element="malfunction">✏️</a>

                <!-- Link Rimuovi -->
                <a href="#" class="removeLink" data-id="{{ $malfunction->id }}" data-element="malfunction">❌</a>
            </div>
        </li>
        @empty
        <li class="list-group-item text-center">Nessun malfunzionemento disponibile</li>
    @endforelse
</ul>
