<div>
    <h1>Categorie</h1>
    <button id="add" data-element="category">Aggiungi</button>
</div>
@forelse($categories as $category)
<li class="categoryList">
    <div>
        <div>
            <a href="#" class="titleLink" data-id="{{ $category->id }}">{{ $category->name }}</a>
        </div>
        <div>
            <a href="#" class="viewLink" data-id="{{ $category->id }}" data-element="category">👁️</a>
            <a href="#" class="changeLink" data-id="{{ $category->id }}" data-element="category">✏️</a>
            <a href="#" class="removeLink" data-id="{{ $category->id }}" data-element="category">❌</a>
        </div>


    </div>
</li>
@empty
<li>Nessuna categoria disponibile</li>
@endforelse

<div id="results">
</div>