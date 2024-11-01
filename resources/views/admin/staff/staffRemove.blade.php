<div id="container">
    <h1>Sezione rimozione staff</h1>
    <form id="select-user-form">
        <label for="user-select">Seleziona Utente:</label>
        <select id="user-select" name="user_id" required>
            <option value="">-- Seleziona Utente --</option>
            @foreach($staffMembers as $staff)
            <option value="{{ $staff->id }}">{{ $staff->name }} {{ $staff->surname }}</option>
            @endforeach
        </select>
        <button type="submit">Rimuovi utente</button>
    </form>

</div>