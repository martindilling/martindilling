<li{{ set_active(array('home', 'creations.*')) }}>
    {{ link_to_route('home', 'Portfolio') }}
    @if ($userData->loggedIn)
        <a href="{{ route('creations.create') }}" class="admin-create"><span class="glyphicon glyphicon-plus"></span></a>
    @endif
</li>
<li{{ set_active('posts.*') }}>
    {{ link_to_route('posts.index', 'Blog') }}
    @if ($userData->loggedIn)
        <a href="{{ route('posts.create') }}" class="admin-create"><span class="glyphicon glyphicon-plus"></span></a>
    @endif
</li>
<li{{ set_active('about.*') }}>
    {{ link_to_route('about.show', 'About') }}
</li>
<li{{ set_active('contact.*') }}>
    {{ link_to_route('contact.show', 'Contact') }}
</li>

@if ($userData->loggedIn)
    <li>
        {{ link_to_route('logout', 'Logout', null, ['class' => 'admin-logout']) }}
    </li>
@endif
