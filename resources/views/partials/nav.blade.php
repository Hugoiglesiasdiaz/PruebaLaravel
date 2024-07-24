<nav>
    <ul>
        <li class="{{setActive('home')}}"><a href="{{route('home')}}">@lang('Home')</a></li>
        <li class="{{setActive('about')}}"><a href="{{route('about')}}">@lang('About')</a></li>
        <li class="{{setActive('projects.*')}}"><a href="{{route('projects.index')}}">@lang('Projects')</a></li>
        <li class="{{setActive('contact')}}"><a href="{{route('contact')}}">@lang('Contacto')</a></li>
    </ul>
</nav>