<div>

    <div class="title">
        <h2>Staff tecnico</h2>
        <a href="#" id="add" data-element="staff">Aggiungi</a>
    </div>
    <ul>
        @foreach($staffUsers as $user)
        <li>{{ $user->name }} {{ $user->surname }}
            <a href="#" class="viewLink" data-id="{{ $user->id }}" data-element="staff">👁️</a>
            <a href="#" class="changeLink" data-id="{{ $user->id }}" data-element="staff">✏️</a>
            <a href="#" class="removeLink" data-id="{{ $user->id }}" data-element="staff">❌</a>
        </li>
        @endforeach
    </ul>
    <div class="title">
        <h2>Tecnici</h2>
        <a href="#" id="add" data-element="technician">Aggiungi</a>
    </div>

    <ul>
        @foreach($technicianUsers as $user)
        <li>{{ $user->name }} {{ $user->surname }}
        <a href="#" class="viewLink" data-id="{{ $user->id }}" data-element="technician">👁️</a>
            <a href="#" class="changeLink" data-id="{{ $user->id }}" data-element="technician">✏️</a>
            <a href="#" class="removeLink" data-id="{{ $user->id }}" data-element="technician">❌</a>
        </li>
        @endforeach
    </ul>
</div>