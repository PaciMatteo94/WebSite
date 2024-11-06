<div class="form">
    @if($roleType == 'staff')

    <h2>Cambio informazioni dell'utente: {{ $user->name }} {{ $user->surname }}</h2>
    <form id="select-user-form" data-operation='change'>
        <div class="form-group">
            <label for="name">Nome:</label>
            <input type="text" id="name" name="name" value="{{ $user->name }}">
        </div>

        <div class="form-group">
            <label for="surname">Cognome:</label>
            <input type="text" id="surname" name="surname" value="{{ $user->surname }}">
        </div>

        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" value="{{ $user->username }}">
        </div>

        <div class="form-group">
            <label for="password">Password (lascia vuoto per non cambiare):</label>
            <input type="password" id="password" name="password">
        </div>

        <div class="form-group">
            <label for="password_confirmation">Conferma Password:</label>
            <input type="password" id="password_confirmation" name="password_confirmation">
        </div>

        <button type="submit">Aggiorna Dati</button>
    </form>
    @elseif($roleType == 'technician')
    <div class="title-tech">
        <h2>Cambio informazioni dell'utente: {{ $user->name }} {{ $user->surname }}</h2>
    </div>

    <form id="edit-tech-form" data-operation='change'>
        <div class="form-tech">
            <div>
                <div class="form-group">
                    <label for="name">Nome:</label>
                    <input type="text" id="name" name="name" value="{{ $user->name }}">
                </div>

                <div class="form-group">
                    <label for="surname">Cognome:</label>
                    <input type="text" id="surname" name="surname" value="{{ $user->surname }}">
                </div>

                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" value="{{ $user->username }}">
                </div>
                <div class="form-group">
                    <label for="password">Password (lascia vuoto per non cambiare):</label>
                    <input type="password" id="password" name="password">
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Conferma Password:</label>
                    <input type="password" id="password_confirmation" name="password_confirmation">
                </div>
            </div>
            <div>
                <div class="form-group">
                    <label for="birth_date">Data di nascita:</label>
                    <input type="date" id="birth_date" name="birth_date" value="{{ $user->birth_date }}">
                </div>

                <div class="form-group">
                    <label for="specialization">Specializzazione:</label>
                    <input type="text" id="specialization" name="specialization" value="{{ $user->specialization }}">
                </div>

                <div class="form-group">
                    <label for="center_name">Nome del centro di assistenza:</label>
                    <input type="text" id="center_name" name="center_name" value="{{ $user->center_name }}">
                </div>

                <div class="form-group">
                    <label for="center_address">Indirizzo del centro di assistenza:</label>
                    <input type="text" id="center_address" name="center_address" value="{{ $user->center_address }}">
                </div>
            </div>

        </div>



        <div class="button-add">
            <button type="submit">Aggiorna Dati</button>
        </div>

    </form>


    @endif
</div>