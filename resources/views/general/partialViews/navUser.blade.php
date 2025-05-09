<div id="navbar">
    <div id="titolo">
        <a href="{{ route('home') }}">
            <h2 id="titolo-home">NEX:Assistenza Tecnica</h2>
        </a>
    </div>
    <div id="box-options">
        <div class="navbar option-1">
            <h2 class="option-nav"> <a href="{{ route('info') }}">Info</a></h2>
        </div>
        <div class="navbar option-2">
            <h2 class="option-nav "> <a href="{{ route('where') }}">Dove Siamo</a></h2>
        </div>
        <div class="navbar option-3">
            <h2 class="option-nav "> <a href="https://drive.google.com/file/d/1X8pv1qd5tmA4ZzbvmilQddleuAMboidZ/view?usp=sharing">Documentazione</a></h2>
        </div>
    </div>
    <div class="navbar option-4">
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