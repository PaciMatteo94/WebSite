<div>
    <form id="edit-tech-form">
        <label for="user-select">Seleziona Utente:</label>
        <select id="user-select" name="user_id">
            <option value="">-- Seleziona Utente --</option>
            @foreach($user as $staff)
            <option value="{{ $staff->id }}">{{ $staff->name }} {{ $staff->surname }}</option>
            @endforeach
        </select>
        <div>
            <label for="name">Nome:</label>
            <input type="text" id="name" name="name">
        </div>

        <div>
            <label for="surname">Cognome:</label>
            <input type="text" id="surname" name="surname">
        </div>

        <div>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username">
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
            <input type="date" id="birth_date" name="birth_date">
        </div>

        <div>
            <label for="specialization">Specializzazione:</label>
            <input type="text" id="specialization" name="specialization">
        </div>

        <div>
            <label for="center_name">Nome del centro di assistenza:</label>
            <input type="text" id="center_name" name="center_name">
        </div>

        <div>
            <label for="center_address">Indirizzo del centro di assistenza:</label>
            <input type="text" id="center_address" name="center_address">
        </div>

        <button type="submit">Aggiorna Dati Tecnico</button>
    </form>


</div>