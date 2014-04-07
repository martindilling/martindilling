<li class="">
    <a href="{{ route('home') }}">Portfolio</a>
</li>
<li class="">
    <a href="{{ route('posts.index') }}">Blog</a>
</li>
<li class="">
    <a href="{{ route('about') }}">About</a>
</li>
<li class="">
    <a href="{{ route('contact') }}">Contact</a>
</li>

@if (Auth::check())
<li class="">
    <a href="{{ route('logout') }}">Logout</a>
</li>
@endif
