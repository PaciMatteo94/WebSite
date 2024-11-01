<form id="select-user-form">
    <label for="user-select">Seleziona Utente:</label>
    <select id="user-select" name="user_id" required>
        <option value="">-- Seleziona Utente --</option>
        @foreach($techMembers as $tech)
        <option value="{{ $tech->id }}">{{ $tech->name }} {{ $tech->surname }}</option>
        @endforeach
    </select>
    <button type="submit">Rimuovi utente</button>
</form>