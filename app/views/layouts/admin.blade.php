<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Martin Dilling-Hansen">
    <title>@yield('title', 'Martin Dilling-Hansen')</title>

    <!-- Styles -->
    {{ HTML::style('http://fonts.googleapis.com/css?family=Lato:100,300,400,700') }}
    {{ HTML::style('//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css') }}
    {{ HTML::style('assets/vendor/css/jasny-bootstrap.min.css') }}
    {{ HTML::style('assets/vendor/css/bootstrap-datetimepicker.min.css') }}
    {{ HTML::style('assets/css/main.css') }}
    {{ HTML::style('assets/css/admin-extra.css') }}
    {{-- HTML::style('assets/css/admin.css') --}}
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

<!-- Content -->
<div class="container">
    <div class="header">
        <div class="title">Martin Dilling-Hansen</div>
        <ul class="navigation site-nav" role="navigation">
            @include('app.navbar')
        </ul>
    </div>

    @include('app.messages')

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
