<nav>
    <ul>
        <li class="{{setActive('home')}}"><a href="{{route('home')}}">@lang('Home')</a></li>
        <li class="{{setActive('about')}}"><a href="{{route('about')}}">@lang('About')</a></li>
        <li class="{{setActive('projects.*')}}"><a href="{{route('projects.index')}}">@lang('Projects')</a></li>
        <li class="{{setActive('contact')}}"><a href="{{route('contact')}}">@lang('Contacto')</a></li>
        @guest
            <li><a href="{{ route('login')}}">Login</a></li>
        @else
            <li><a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar
                    Sesión</a></li>
        @endguest
    </ul>
</nav>
<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>