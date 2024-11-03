

<div class="d-flex justify-content-end mb-3">
    <h1>Categorie</h1>
    <a href="#" id="add" data-element="category">Aggiungi</a>
</div>
@forelse($categories as $category)
<li class="categoryList">
    <div>
        <strong>ID:</strong> {{ $category->id }} -
        <a href="#" class="titleLink" data-id="{{ $category->id }}">{{ $category->name }}</a>
        <a href="#" class="viewLink" data-id="{{ $category->id }}" data-element="category">👁️</a>
        <a href="#" class="changeLink" data-id="{{ $category->id }}" data-element="category">✏️</a>
        <a href="#" class="removeLink" data-id="{{ $category->id }}" data-element="category">❌</a>
    </div>
</li>
@empty
<li class="list-group-item text-center">Nessuna categoria disponibile</li>
@endforelse
<div id="results">



</div>

