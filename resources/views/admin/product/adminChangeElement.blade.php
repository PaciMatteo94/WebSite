<div class="form">
    @if(isset($category))
    <h2>Modifica Categoria: {{ $category->name }}</h2>
    <p>(Se i campi vengono lasciati vuoti, si manterrano le informazioni correnti)</p>

    <form id="change-form-category" data-id="{{ $category->id }}" data-element="category">


        <div class="form-group">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" id="name" name="name" value="{{ old('name', $category->name) }}">
        </div>

        <div class="info-view-img">
            <label for="image">Immagine corrente:</label>
            <img src="{{ asset($category->image) }}" alt="Product Image">
        </div>

        <div class="form-group">
            <label for="image">Seleziona un'immagine:</label>
            <input type="file" name="image" id="image" accept="image/*">
        </div>

        <button type="submit" class="btn btn-primary">Salva Modifiche</button>
    </form>
    @elseif(isset($product))
    <h2>Modifica Prodotto: {{ $product->name }}</h2>
    <p>( Se i campi vengono lasciati vuoti, si manterrano le informazioni correnti )</p>


    <form id="change-form-product" data-id="{{ $product->id }}" data-element="product">


        <div class="info-view-img">
            <label for="image">Immagine corrente:</label>
            <img src="{{ asset($product->image) }}" alt="Product Image">
        </div>
        <div class="form-group">
            <label for="image">Cambia Immaggine (500x500):</label>
            <input type="file" id="image" name="image" accept="image/*">
        </div>





        <div class="info-view-img-thumbnail">
            <label for="thumbnail">Thumbnail corrente:</label>
            <img src="{{ asset ($product->thumbnail) }}" alt="Product Thumbnail">
        </div>
        <div class="form-group">
            <label for="thumbnail">Cambia Thumbnail (185x185):</label>
            <input type="file" id="thumbnail" name="thumbnail" accept="image/*">
        </div>


        <div class="form-group">
            <label for="name">Nome:</label>
            <input type="text" id="name" name="name" value="{{ ($product->name) }}">
        </div>


        <div class="form-group">
            <label for="description">Descrizione:</label>
            <textarea id="description" name="info" rows="4">{{ old('description', $product->info) }}</textarea>
        </div>
        <div class="form-group">
            <label for="usage_techniques">Tecnico d'uso:</label>
            <textarea id="usage_techniques" name="usage_techniques" rows="3">{{ old('usage_techniques', $product->usage_techniques) }}</textarea>
        </div>


        <div class="form-group">
            <label for="installation_mode">Modalità di installazione:</label>
            <textarea id="installation_mode" name="installation_mode" rows="3" required>{{ old('installation_mode', $product->installation_mode) }}</textarea>
        </div>








        <!-- Submit Button -->
        <button type="submit">Aggiorna Prodotto</button>
    </form>
    @endif
</div>