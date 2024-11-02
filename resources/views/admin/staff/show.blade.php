@if($roleType == 'staff')
<div id="container">
    <h1>Dettagli Staff</h1>
    <div>
        <strong>Nome:</strong> {{ $user->name }}
    </div>
    <div>
        <strong>Cognome:</strong> {{ $user->surname }}
    </div>
    <div>
        <strong>Username:</strong> {{ $user->username }}
    </div>
</div>

@elseif($roleType == 'technician')
<div id="container">
    <h1>Dettagli Tecnico</h1>
    <div>
        <strong>Nome:</strong> {{ $user->name }}
    </div>
    <div>
        <strong>Cognome:</strong> {{ $user->surname }}
    </div>
    <div>
        <strong>Username:</strong> {{ $user->username }}
    </div>

    <!-- Campi specifici per il ruolo tech -->
    <div>
        <strong>Data di nascita:</strong> {{ $user->birth_date }}
    </div>
    <div>
        <strong>Specializzazione:</strong> {{ $user->specialization }}
    </div>
    <div>
        <strong>Nome del centro di assistenza:</strong> {{ $user->center_name }}
    </div>
    <div>
        <strong>Indirizzo del centro di assistenza:</strong> {{ $user->center_address }}
    </div>
</div>
@endif
