<li class="">
    <a href="{{ route('home') }}">Home</a>
</li>
<li class="">
    <a href="{{ route('creations.index') }}">Creations</a>
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
@else
<li class="">
    <a href="{{ route('login') }}">Login</a>
</li>
@endif
