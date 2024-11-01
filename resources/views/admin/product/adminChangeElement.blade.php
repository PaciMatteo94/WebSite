<div id="form">
@if(isset($category))
    <h2>Modifica Categoria: {{ $category->name }}</h2>
    <p>Se i campi vengono lasciati vuoti, si manterrano le informazioni correnti </p>
    
    <!-- Form per il cambiamento dei dati -->
    <form id="changeFormCategory" data-id="{{ $category->id }}" data-element="category">


        <!-- Titolo -->
        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" id="name" name="name" value="{{ old('name', $category->name) }}">
        </div>
        <label for="image">Immagine corrente:</label>
        <div>
            <img src="{{ asset($category->image) }}" alt="Product Image" style="width: 500px; height: 500px;">
        </div>

        <div class="form-group">
            <label for="image">Seleziona un'immagine:</label>
            <input type="file" name="image" id="image" accept="image/*">
        </div>

        <!-- Pulsante di salvataggio -->
        <button type="submit" class="btn btn-primary">Salva Modifiche</button>
    </form>
    @elseif(isset($product))
    <h2>Modifica Prodotto: {{ $product->name }}</h2>
    <p>Se i campi vengono lasciati vuoti, si manterrano le informazioni correnti </p>
    
    <!-- Form per il cambiamento dei dati -->
    <form id="changeFormProduct" data-id="{{ $product->id }}" data-element="product">
        <!-- Image Input -->
        <label for="image">Immagine corrente:</label>
        <div>
            <img src="{{ asset($product->image) }}" alt="Product Image" style="width: 500px; height: 500px;">
        </div>
        <label for="image">Cambia Immaggine (500x500):</label>
        <input type="file" id="image" name="image" accept="image/*">
        <br><br>

        <!-- Thumbnail Input -->
        <label for="thumbnail">Thumbnail corrente:</label>
        <div>
            <img src="{{ asset ($product->thumbnail) }}" alt="Product Thumbnail" style="width: 185px; height: 185px;">
        </div>
        <label for="thumbnail">Cambia Thumbnail (185x185):</label>
        <input type="file" id="thumbnail" name="thumbnail" accept="image/*">
        <br><br>

        <!-- Name Input -->
        <label for="name">Nome:</label>
        <input type="text" id="name" name="name" value="{{ ($product->name) }}" required>
        <br><br>

        <!-- Description Input -->
        <label for="description">Descrizione:</label>
        <textarea id="description" name="info" rows="4" required>{{ old('description', $product->info) }}</textarea>
        <br><br>

        <!-- Usage Techniques Input -->
        <label for="usage_techniques">Tecnico d'uso:</label>
        <textarea id="usage_techniques" name="usage_techniques" rows="3" required>{{ old('usage_techniques', $product->usage_techniques) }}</textarea>
        <br><br>

        <!-- Installation Mode Input -->
        <label for="installation_mode">Modalità di installazione:</label>
        <textarea id="installation_mode" name="installation_mode" rows="3" required>{{ old('installation_mode', $product->installation_mode) }}</textarea>
        <br><br>

        <!-- Submit Button -->
        <button type="submit">Aggiorna Prodotto</button>
    </form>
    @endif
</div>