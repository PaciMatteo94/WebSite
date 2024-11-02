
<ul class="list-group">
    @forelse($solutions as $solution)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <!-- ID e titolo del malfunzionamento -->
            <div >
                
                <li>
                <strong>ID:</strong> {{ $solution->id }} - 
                <a href="#" class="titleLink" data-id="{{ $solution->id }}" data-type="solution">{{ $solution->title }}</a>

                </li>

            </div>
        </li>
        @empty
        <li class="list-group-item text-center">Nessuna soluzione disponibile</li>
    @endforelse
</ul>