@if($roleType == 'staff')
<div id="container">
    <h1>Cambio informazioni dell'utente: {{ $user->name }}</h1>
    <form id="select-user-form" data-operation ='change'>
        <input type="hidden" name="user_id" id="user-id">

        <div>
            <label for="name">Nome:</label>
            <input type="text" id="name" name="name" value="{{ $user->name }}" required>
        </div>
        
        <div>
            <label for="surname">Cognome:</label>
            <input type="text" id="surname" name="surname" value="{{ $user->surname }}" required>
        </div>

        <div>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" value="{{ $user->username }}" required>
        </div>

        <div>
            <label for="password">Password (lascia vuoto per non cambiare):</label>
            <input type="password" id="password" name="password">
        </div>

        <div>
            <label for="password_confirmation">Conferma Password:</label>
            <input type="password" id="password_confirmation" name="password_confirmation">
        </div>

        <button type="submit">Aggiorna Dati</button>
    </form>

</div>
@elseif($roleType == 'technician')
<div id="container">
<h1>Cambio informazioni dell'utente: {{ $user->name }}</h1>
    <form id="edit-tech-form" data-operation ='change'>
    <div>
            <label for="name">Nome:</label>
            <input type="text" id="name" name="name" value="{{ $user->name }}" required>
        </div>
        
        <div>
            <label for="surname">Cognome:</label>
            <input type="text" id="surname" name="surname" value="{{ $user->surname }}" required>
        </div>

        <div>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" value="{{ $user->username }}" required>
        </div>
        <div>
            <label for="password">Password (lascia vuoto per non cambiare):</label>
            <input type="password" id="password" name="password">
        </div>

        <div>
            <label for="password_confirmation">Conferma Password:</label>
            <input type="password" id="password_confirmation" name="password_confirmation">
        </div>

        <!-- Campi specifici per il ruolo tech -->
        <div>
            <label for="birth_date">Data di nascita:</label>
            <input type="date" id="birth_date" name="birth_date" value="{{ $user->birth_date }}" required>
        </div>

        <div>
            <label for="specialization">Specializzazione:</label>
            <input type="text" id="specialization" name="specialization" value="{{ $user->specialization }}" required>
        </div>

        <div>
            <label for="center_name">Nome del centro di assistenza:</label>
            <input type="text" id="center_name" name="center_name" value="{{ $user->center_name }}" required>
        </div>

        <div>
            <label for="center_address">Indirizzo del centro di assistenza:</label>
            <input type="text" id="center_address" name="center_address" value="{{ $user->center_address }}" required>
        </div>

        <button type="submit">Aggiorna Dati</button>
    </form>


</div>
@endif