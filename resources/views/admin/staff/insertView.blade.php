<div class="form">
    @if($roleType == 'staff')

    <h2>Inserisci un nuovo membro dello staff tecnico</h2>
    <form id="form-insert" data-element='staff' data-operation='store'>
        <div class="form-group">
            <label for="name">Nome:</label>
            <input type="text" id="name" name="name" required>
        </div>

        <div class="form-group">
            <label for="surname">Cognome:</label>
            <input type="text" id="surname" name="surname" required>
        </div>

        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
        </div>

        <div class="form-group">
            <label for="password">Password (lascia vuoto per non cambiare):</label>
            <input type="password" id="password" name="password" required>
        </div>

        <div class="form-group">
            <label for="password_confirmation">Conferma Password:</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required>
        </div>

        <button type="submit">Inserisci Utente</button>
    </form>

    @elseif($roleType == 'technician')
    <div class="title-tech">
        <h2>Inserisci un nuovo tecnico</h2>
    </div>

    <form id="create-tech-form" data-element='technician' data-operation='store'>
        <div class="form-tech">
            <div>
                <div class="form-group">
                    <label for="name">Nome:</label>
                    <input type="text" id="name" name="name" required>
                </div>

                <div class="form-group">
                    <label for="surname">Cognome:</label>
                    <input type="text" id="surname" name="surname" required>
                </div>

                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" required>
                </div>

                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Conferma Password:</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required>
                </div>
            </div>
            <div>
                <div class="form-group">
                    <label for="birth_date">Data di nascita:</label>
                    <input type="date" id="birth_date" name="birth_date" required>
                </div>

                <div class="form-group">
                    <label for="specialization">Specializzazione:</label>
                    <input type="text" id="specialization" name="specialization" required>
                </div>

                <div class="form-group">
                    <label for="center_name">Nome del centro di assistenza:</label>
                    <input type="text" id="center_name" name="center_name" required>
                </div>

                <div class="form-group">
                    <label for="center_address">Indirizzo del centro di assistenza:</label>
                    <input type="text" id="center_address" name="center_address" required>
                </div>
            </div>


        </div>


        <div class="button-add">
            <button type="submit">Aggiungi Tecnico</button>
        </div>

    </form>
    @endif
</div>