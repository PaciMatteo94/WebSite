<div id="navbar">
<div id="titolo">
                <a href="{{ route('viewStaffHome') }}">
                    <h2 id="titolo-home">NEX:Assistenza Tecnica</h2>
                </a>
            </div>
    <div id="box-options">
        <div class="navbar option-1">
            <h2 class="option-nav"> <a href="{{ route('viewStaffCatalog') }}">Gestione Informazioni</a></h2>
        </div>
    </div>
    <div class="navbar option-3">
        @if(auth()->check())
        <h2 class="option-nav">
            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
        </h2>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        @else
        <h2 class="option-nav "> <a href="{{ route('login') }}">Login</a></h2>
        @endif
    </div>

</div>