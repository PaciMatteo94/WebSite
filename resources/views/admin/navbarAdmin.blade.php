<div id="navbar">
    <div id="box-options">
        <div class="navbar option-1">
            <h2 class="option-nav"> <a href="{{ route('viewAdminProduct') }}">Prodotti</a></h2>
        </div>
        <div class="navbar option-2">
            <h2 class="option-nav "> <a href="{{ route('viewAdminStaff') }}">Staff</a></h2>
        </div>
        <div class="navbar option-3">
            <h2 class="option-nav "> <a href="{{ route('viewAdminTech') }}">Tecnici</a></h2>
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