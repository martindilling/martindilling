<!DOCTYPE html>
<html lang="en" xmlns:og="http://ogp.me/ns#" xmlns:fb="https://www.facebook.com/2008/fbml">
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# website: http://ogp.me/ns/website# article: http://ogp.me/ns/article#">
    @section('title', 'Martin Dilling-Hansen')
    @section('description', 'I\'m Martin, a fulltime geek, and this is my website :p')
    @section('image', 'http://placehold.it/300x400')
    @section('fb_og_type', 'website')

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('description')">
    <meta name="author" content="Martin Dilling-Hansen, @dillinghansen">
    <link type="text/plain" rel="author" href="{{ asset('humans.txt') }}" />
    <title>@yield('title') | martindilling.com</title>

    <!-- Facebook Open Graph -->
    <meta property="fb:app_id" content="1496715557218382" />
    <meta property="og:type" content="@yield('fb_og_type')" />
    <meta property="og:site_name" content="martindilling.com" />
    <meta property="og:url" content="{{ URL::full() }}" />
    <meta property="og:title" content="@yield('title')" />
    <meta property="og:description" content="@yield('description')" />
    <meta property="og:image" content="@yield('image')" />

    <!-- Twitter -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:creator" content="@dillinghansen">
    <meta name="twitter:title" content="@yield('title')">
    <meta name="twitter:description" content="@yield('description')">
    <meta name="twitter:image" content="@yield('image')">
    

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

<!-- Content -->
<div class="container">
    <div class="header">
        <div class="title">Martin Dilling-Hansen</div>
        <ul class="navigation site-nav" role="navigation">
            @include('layouts.partials.navbar')
        </ul>
    </div>

    @include('layouts.partials.messages')

    <main role=”main”>
        @yield('content')
    </main>
</div>

<!-- Scripts -->
{{ HTML::script('build/vendor.js') }}
{{ HTML::script('build/app.js') }}
@yield('scripts')
</body>
</html>
