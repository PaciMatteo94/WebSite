<div>
    <div class="title-div">
        <div>
            <h1>Soluzioni</h1>
        </div>

        <div class="button-add">
            <button id="add" data-element="solution">Aggiungi</button>
        </div>
    </div>





    <ul class="list-group">
        @forelse($solutions as $solution)
        <li>
            <div class="option">
                <div>
                    {{ $solution->title }}
                </div>

                <div class="operation-div">
                    <a href="#" class="viewLink" data-id="{{ $solution->id }}" data-element="solution">👁️</a>
                    <a href="#" class="changeLink" data-id="{{ $solution->id }}" data-element="solution">✏️</a>
                    <a href="#" class="removeLink" data-id="{{ $solution->id }}" data-element="solution">❌</a>
                </div>

            </div>


        </li>

        @empty
        <li class="list-group-item text-center">Nessuna soluzione disponibile</li>
        @endforelse
    </ul>
</div>