<div id="malfunction-section">
    <div class="title-div">
        <div>
            <h1>Malfunzionamenti</h1>
        </div>
        <div class="button-add">
            <button id="add" data-element="malfunction">Aggiungi</button>
        </div>
    </div>



    <ul class="list-group">
        @forelse($malfunctions as $malfunction)
        <li>

            <div class="option">
                <div>
                    <a href="#" class="titleLink" data-id="{{ $malfunction->id }}">{{ $malfunction->title }}</a>
                </div>
                <div class="operation-div">
                    <a href="#" class="viewLink" data-id="{{ $malfunction->id }}" data-element="malfunction">👁️</a>
                    <a href="#" class="changeLink" data-id="{{ $malfunction->id }}" data-element="malfunction">✏️</a>
                    <a href="#" class="removeLink" data-id="{{ $malfunction->id }}" data-element="malfunction">❌</a>
                </div>

            </div>
        </li>
        @empty
        <li>Nessun malfunzionemento disponibile</li>
        @endforelse
    </ul>
</div>