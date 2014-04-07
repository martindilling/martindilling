<li{{ set_active(array('home', 'creations.*')) }}>
    {{ link_to_route( 'creations.index', 'Portfolio' ) }}
</li>
<li{{ set_active('posts.*') }}>
    {{ link_to_route( 'posts.index', 'Blog' ) }}
</li>
<li{{ set_active('about.*') }}>
    {{ link_to_route( 'about', 'About' ) }}
</li>
<li{{ set_active('contact.*') }}>
    {{ link_to_route( 'contact', 'Contact' ) }}
</li>

@if (Auth::check())
    <li>
        {{ link_to_route( 'logout', 'Logout' ) }}
    </li>
@endif
