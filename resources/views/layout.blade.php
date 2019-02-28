<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>{{ $title }} | {{ config('app.name') }}</title>
    @include('wisteria::partials.meta')
</head>
<body>
<div id="app">
    @include('wisteria::partials.header')
    <div class="max-w-3xl mx-auto px-6 pt-4 min-h-full">
        @yield('content')
    </div>
    @include('wisteria::partials.footer')
</div>
<script src="{{ asset('vendor/wisteria/js/app.js') }}"></script>
</body>
</html>