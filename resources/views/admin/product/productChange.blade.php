<div class="container">
        <h2>Modifica prodotto</h2>
        
        <form id="changeProductForm">
            <!-- Nome del prodotto -->
            <div class="form-group">
                <label for="name">Nome del prodotto</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $product->name) }}" required>
            </div>
            
            <!-- Info del prodotto -->
            <div class="form-group">
                <label for="info">Informazioni</label>
                <textarea name="info" id="info" class="form-control" required>{{ old('info', $product->info) }}</textarea>
            </div>
            
            <!-- Tecniche di utilizzo -->
            <div class="form-group">
                <label for="usage_techniques">Tecniche di utilizzo</label>
                <textarea name="usage_techniques" id="usage_techniques" class="form-control" required>{{ old('usage_techniques', $product->usage_techniques) }}</textarea>
            </div>
            
            <!-- Modalità di installazione -->
            <div class="form-group">
                <label for="installation_mode">Modalità di installazione</label>
                <textarea name="installation_mode" id="installation_mode" class="form-control" required>{{ old('installation_mode', $product->installation_mode) }}</textarea>
            </div>
            
            <!-- Immagine principale -->
            <div class="form-group">
                <label for="image">Immagine principale</label>
                <input type="file" name="image" id="image" class="form-control-file">
                <!-- Anteprima dell'immagine esistente -->
                <div class="mt-3">
                    <p>Immagine attuale:</p>
                    <img src="{{ asset ($product->image) }}" alt="Immagine attuale" style="width: 200px; height: 200px; object-fit: cover;">
                </div>
            </div>
            
            <!-- Thumbnail -->
            <div class="form-group">
                <label for="thumbnail">Thumbnail</label>
                <input type="file" name="thumbnail" id="thumbnail" class="form-control-file">
                <!-- Anteprima della thumbnail esistente -->
                <div class="mt-3">
                    <p>Thumbnail attuale:</p>
                    <img src="{{ asset($product->thumbnail) }}" alt="Thumbnail attuale" style="width: 100px; height: 100px; object-fit: cover;">
                </div>
            </div>
            
            <!-- Bottone di salvataggio -->
            <button type="submit" class="btn btn-primary">Salva modifiche</button>
        </form>
    </div>