<div>
    <form id="form-insert" action="">
        <div>
            <label for="name">Nome:</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}">
        </div>

        <div>
            <label for="surname">Cognome:</label>
            <input type="text" id="surname" name="surname" value="{{ old('surname') }}">
        </div>

        <div>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" value="{{ old('username') }}">
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