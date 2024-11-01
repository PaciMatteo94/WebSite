<div id="container">
    <h1>Sezione inserimento staff</h1>
    <form id="form-insert" action="">
        <div>
            <label for="name">Nome:</label>
            <input type="text" id="name" name="name" required>
        </div>

        <div>
            <label for="surname">Cognome:</label>
            <input type="text" id="surname" name="surname" required>
        </div>

        <div>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username"required>
        </div>

        <div>
            <label for="password">Password (lascia vuoto per non cambiare):</label>
            <input type="password" id="password" name="password"required>
        </div>

        <div>
            <label for="password_confirmation">Conferma Password:</label>
            <input type="password" id="password_confirmation" name="password_confirmation"required>
        </div>

        <button type="submit">Inserisci Utente</button>
    </form>
</div>