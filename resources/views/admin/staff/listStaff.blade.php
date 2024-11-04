<div>
    <div id="staff-section">
        <div class="title-div">
            <div class="title">
                <h2>Staff tecnico</h2>
            </div>
            <div>
                <button id="add" data-element="staff">Aggiungi</button>
            </div>


        </div>
        <ul>
            @forelse($staffUsers as $user)
            <li class="option-list">
                <div class="option">
                    <div>
                        {{ $user->name }} {{ $user->surname }}
                    </div>
                    <div class="operation-div">
                        <a href="#" class="viewLink" data-id="{{ $user->id }}" data-element="staff">👁️</a>
                        <a href="#" class="changeLink" data-id="{{ $user->id }}" data-element="staff">✏️</a>
                        <a href="#" class="removeLink" data-id="{{ $user->id }}" data-element="staff">❌</a>
                    </div>
                </div>


            </li>
            @empty
            <li>Nessuno staff tecnico disponibile</li>
            @endforelse
        </ul>
    </div>

    <div id="technician-section">
        <div class="title-div">
            <div class="title">
                <h2>Tecnici</h2>
            </div>
            <div>
                <button id="add" data-element="technician">Aggiungi</button>
            </div>

        </div>

        <ul>
            @forelse($technicianUsers as $user)
            <li class="option-list">
                <div class="option">
                    <div>
                        {{ $user->name }} {{ $user->surname }}
                    </div>
                    <div class="operation-div">
                        <a href="#" class="viewLink" data-id="{{ $user->id }}" data-element="technician">👁️</a>
                        <a href="#" class="changeLink" data-id="{{ $user->id }}" data-element="technician">✏️</a>
                        <a href="#" class="removeLink" data-id="{{ $user->id }}" data-element="technician">❌</a>
                    </div>
                </div>


            </li>
            @empty
            <li>Nessun tecnico disponibile</li>
            @endforelse
        </ul>
    </div>

</div>