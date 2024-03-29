<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="@yield('description')">
    <meta name="author" content="{{ config('app.name') }}">
    <link rel="icon" href="{{ asset('vendor/fontawesome-free/svgs/solid/laptop.svg') }}">

    <title>{{ config('app.name') }} - @yield('title')</title>

    {{-- Bootstrap core CSS --}}
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    {{-- Custom styles for this template --}}
    <link href="{{ asset('vendor/my-blog/css/blog.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/dashboard/css/scrollbar.css') }}" rel="stylesheet">
    {{-- fontawesome free --}}
    <script src="{{ asset('vendor/fontawesome-free/js/all.min.js') }}"></script>
    {{-- icon flag --}}
    <link rel="stylesheet" href="{{ asset('vendor/flag-icon-css/css/flag-icon.min.css') }}">
    {{-- css:external --}}
    @stack('css-external')
    {{-- css:internal --}}
    @stack('css-internal')
</head>

<body class="d-flex flex-column min-vh-100">

    <!-- Navigation:start -->
    @include('layouts._blog._navbar')
    <!-- Navigation:end -->

    @stack('hero')

    <!-- Page Content -->
    <div class="container">
        <!-- content:start -->
        @yield('content')
        <!-- content:end -->
    </div>
    <!-- /.container -->

    <!-- Footer:start -->
    @include('layouts._blog._footer')
    <!-- Footer:end -->

    {{-- Jquery --}}
    <script src="{{ asset('vendor/jquery/jquery-3.6.0.min.js') }}"></script>
    {{-- bootstrap --}}
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    {{-- javascript:external --}}
    @stack('js-external')
    {{-- javascript:internal --}}
    @stack('js-internal')
</body>

</html>
