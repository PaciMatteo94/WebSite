<div id="container">
<form id="create-tech-form">   
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
        <input type="text" id="username" name="username" required>
    </div>

    <div>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
    </div>

    <div>
        <label for="password_confirmation">Conferma Password:</label>
        <input type="password" id="password_confirmation" name="password_confirmation" required>
    </div>

    <!-- Campi specifici per il ruolo tech -->
    <div>
        <label for="birth_date">Data di nascita:</label>
        <input type="date" id="birth_date" name="birth_date" required>
    </div>

    <div>
        <label for="specialization">Specializzazione:</label>
        <input type="text" id="specialization" name="specialization" required>
    </div>

    <div>
        <label for="center_name">Nome del centro di assistenza:</label>
        <input type="text" id="center_name" name="center_name" required>
    </div>

    <div>
        <label for="center_address">Indirizzo del centro di assistenza:</label>
        <input type="text" id="center_address" name="center_address" required>
    </div>

    <input type="hidden" name="role" value="tech">

    <button type="submit">Aggiungi Tecnico</button>
</form>

</div>