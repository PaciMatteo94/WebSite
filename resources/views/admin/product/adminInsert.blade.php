<div id="form">
    <h2>Aggiungi un Nuovo Elemento</h2>
    @if($type === 'category')
    <form id="insertFormCategory" data-element="category">
        <div class="form-group">
            <label for="name">Nome della categoria:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="form-group">
            <label for="image">Seleziona un'immagine:</label>
            <input type="file" name="image" id="image" accept="image/*" required>
        </div>

        <button type="submit" class="btn btn-primary">Aggiungi</button>
    </form>
    @elseif($type === 'product')
    <form id="insertFormProduct" data-element="product">
        <div>
            <label for="image">Immagine (500x500):</label>
            <input type="file" name="image" id="image" accept="image/*" required>
        </div>

        <div>
            <label for="thumbnail">Thumbnail (185x185):</label>
            <input type="file" name="thumbnail" id="thumbnail" accept="image/*" required>
        </div>

        <div>
            <label for="name">Nome:</label>
            <input type="text" name="name" id="name" required>
        </div>

        <div>
            <label for="description">Descrizione:</label>
            <textarea name="info" id="description" rows="4" required></textarea>
        </div>

        <div>
            <label for="usage_techniques">Tecniche di Utilizzo:</label>
            <textarea name="usage_techniques" id="usage_techniques" rows="3" required></textarea>
        </div>

        <div>
            <label for="installation_mode">Modalità di Installazione:</label>
            <textarea name="installation_mode" id="installation_mode" rows="3" required></textarea>
        </div>

        <button type="submit">Carica prodotto</button>
    </form>
    @endif

</div>