<li class="">
    <a href="{{ route('home') }}">Home</a>
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
