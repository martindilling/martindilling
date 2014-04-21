<!DOCTYPE html>
<html lang="en" xmlns:og="http://ogp.me/ns#" xmlns:fb="https://www.facebook.com/2008/fbml">
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# website: http://ogp.me/ns/website# article: http://ogp.me/ns/article#">
    @section('title',       Config::get('meta.default.title'))
    @section('description', Config::get('meta.default.description'))
    @section('image',       Config::get('meta.default.image'))
    @section('fb_og_type',  'website')

    @section('disqus_enabled',     false)
    @section('disqus_shortname',   Config::get('disqus.shortname'))
    @section('disqus_identifier',  '/'.Request::path())
    @section('disqus_title',       $__env->yieldContent('title'))
    @section('disqus_url',         Request::url())
    @section('disqus_category_id', Config::get('disqus.category.general'))

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('description')">
    <link rel="author" href="{{ Config::get('meta.rel_author') }}">
    <link type="text/plain" rel="author" href="{{ asset('humans.txt') }}">
    <title>@yield('title') | {{ Config::get('meta.title_suffix') }}</title>

    <!-- Facebook Open Graph -->
    <meta property="fb:app_id"      content="{{ Config::get('meta.fb.app_id') }}">
    <meta property="fb:admins"      content="{{ Config::get('meta.fb.admins') }}">
    <meta property="fb:profile_id"  content="{{ Config::get('meta.fb.profile_id') }}">
    <meta property="og:type"        content="@yield('fb_og_type')">
    <meta property="og:site_name"   content="{{ Config::get('meta.fb.site_name') }}">
    <meta property="og:url"         content="{{ URL::current() }}">
    <meta property="og:title"       content="@yield('title')">
    <meta property="og:description" content="@yield('description')">
    <meta property="og:image"       content="@yield('image')">
    @yield('meta_facebook')

    <!-- Twitter -->
    <meta name="twitter:card"        content="summary">
    <meta name="twitter:site"        content="{{ Config::get('meta.twitter.site') }}">
    <meta name="twitter:creator"     content="{{ Config::get('meta.twitter.creator') }}">
    <meta name="twitter:title"       content="@yield('title')">
    <meta name="twitter:description" content="@yield('description')">
    <meta name="twitter:image:src"   content="@yield('image')">
    <meta name="twitter:domain"      content="{{ Config::get('meta.twitter.domain') }}">

    <!-- Styles -->
    {{ HTML::style('http://fonts.googleapis.com/css?family=Lato:100,300,400,700') }}
    {{ HTML::style('//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css') }}
    {{ HTML::style('assets/vendor/css/jasny-bootstrap.min.css') }}
    {{ HTML::style('assets/vendor/css/bootstrap-datetimepicker.min.css') }}
    {{ HTML::style('assets/css/main.css') }}
    {{ HTML::style('assets/css/admin-extra.css') }}
    @yield('styles')

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="{{ url('assets/vendor/js/html5shiv.js') }}"></script>
    <script src="{{ url('assets/vendor/js/respond.min.js') }}"></script>
    <![endif]-->
</head>
<body>
<!-- Google Analytics -->
@include ('layouts.partials.analytics')
<!-- Facebook -->
@include ('layouts.partials.facebook')
@if ($__env->yieldContent('disqus_enabled') == true)
<!-- Disqus Settings -->
@include ('layouts.partials.disqussettings')
@endif

<!-- Content -->
<div class="container">
    <div class="header">
        <div class="title">Martin Dilling-Hansen</div>
        <ul class="navigation site-nav" role="navigation">
            @include('layouts.partials.navbar')
        </ul>
    </div>

    @include('layouts.partials.messages')

    <main role="main">
        @yield('content')
    </main>
</div>

<!-- Scripts -->
{{ HTML::script('build/vendor.js') }}
{{ HTML::script('build/app.js') }}
@yield('scripts')

{{--<script type="text/javascript">
    /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
    var disqus_shortname = '@yield('disqus_shortname')';

    /* * * DON'T EDIT BELOW THIS LINE * * */
    (function () {
        var s = document.createElement('script'); s.async = true;
        s.type = 'text/javascript';
        s.src = 'http://' + disqus_shortname + '.disqus.com/count.js';
        (document.getElementsByTagName('HEAD')[0] || document.getElementsByTagName('BODY')[0]).appendChild(s);
    }());
</script>--}}
</body>
</html>
