<div class="container">
    <h1>Inserisci un Nuovo Prodotto</h1>
    <form id="form-insert">
        

        <!-- Categoria -->
        <div class="form-group">
            <label for="category">Categoria</label>
            <select name="category" id="category" class="form-control" required>
                <option value="" selected disabled>Seleziona una categoria</option>
                @foreach ($categories as $category)
                    <option value="{{ $category}}">{{ $category}}</option>
                @endforeach
            </select>
        </div>

        <!-- Nome del prodotto -->
        <div class="form-group">
            <label for="name">Nome del prodotto</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <!-- Info -->
        <div class="form-group">
            <label for="info">Informazioni</label>
            <textarea name="info" id="info" class="form-control" rows="3" required></textarea>
        </div>

        <!-- Tecniche di utilizzo -->
        <div class="form-group">
            <label for="usage_techniques">Tecniche di utilizzo</label>
            <textarea name="usage_techniques" id="usage_techniques" class="form-control" rows="3" required></textarea>
        </div>

        <!-- Modalità di installazione -->
        <div class="form-group">
            <label for="installation_mode">Modalità di installazione</label>
            <textarea name="installation_mode" id="installation_mode" class="form-control" rows="3" required></textarea>
        </div>

        <!-- Immagine principale (500x500) -->
        <div class="form-group">
            <label for="image">Immagine Principale (500x500)</label>
            <div class="image-upload-wrapper" style="width: 500px; height: 500px; border: 1px dashed #ccc; display: flex; align-items: center; justify-content: center;">
                <input type="file" name="image" id="image" class="form-control-file" accept="image/*">
            </div>
        </div>

        <!-- Thumbnail (185x185) -->
        <div class="form-group">
            <label for="thumbnail">Thumbnail (185x185)</label>
            <div class="thumbnail-upload-wrapper" style="width: 185px; height: 185px; border: 1px dashed #ccc; display: flex; align-items: center; justify-content: center;">
                <input type="file" name="thumbnail" id="thumbnail" class="form-control-file" accept="image/*">
            </div>
        </div>

        <!-- Submit -->
        <button type="submit" class="btn btn-primary">Salva Prodotto</button>
    </form>
</div>