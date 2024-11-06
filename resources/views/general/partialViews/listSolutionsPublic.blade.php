<h1>Soluzioni relative al malfunzionamento: {{ $malfunction->title}}</h1>
<ul class="list-container">
    @forelse($solutions as $solution)
    <li class="list-item">
            <a href="#" class="title-link" data-id="{{ $solution->id }}" data-type="solution">{{ $solution->title }}</a>
    </li>
    @empty
    <li>Nessuna soluzione disponibile</li>
    @endforelse
</ul>