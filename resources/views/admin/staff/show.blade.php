<div class="form">
    @if($roleType == 'staff')
    <div class="card">
        <h2>Dettagli Staff</h2>
        <div class="info-view">
            <strong>Nome:</strong> {{ $user->name }}
        </div>
        <div class="info-view">
            <strong>Cognome:</strong> {{ $user->surname }}
        </div>
        <div class="info-view">
            <strong>Username:</strong> {{ $user->username }}
        </div>
    </div>

    @elseif($roleType == 'technician')
    <div class="card">
        <h2>Dettagli Tecnico</h2>
        <div class="info-view">
            <strong>Nome:</strong> {{ $user->name }}
        </div>
        <div class="info-view">
            <strong>Cognome:</strong> {{ $user->surname }}
        </div>
        <div class="info-view">
            <strong>Username:</strong> {{ $user->username }}
        </div>
        <div class="info-view">
            <strong>Data di nascita:</strong> {{ $user->birth_date }}
        </div>
        <div class="info-view">
            <strong>Specializzazione:</strong> {{ $user->specialization }}
        </div>
        <div class="info-view">
            <strong>Nome del centro di assistenza:</strong> {{ $user->center_name }}
        </div>
        <div class="info-view">
            <strong>Indirizzo del centro di assistenza:</strong> {{ $user->center_address }}
        </div>
    </div>
    @endif
</div>