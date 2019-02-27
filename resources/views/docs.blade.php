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
    <div class="max-w-3xl mx-auto px-6">
        <div class="lg:flex -mx-6">
            @include('wisteria::partials.sidebar')
            <article id="content" class="w-full lg:w-3/4 xl:w-3/5 pt-10 px-6 lg:px-12 min-h-(screen-16) markdown-body">
                {!! $content !!}
                @include('wisteria::partials.footer')
            </article>
            <div class="hidden pt-4 px-6 xl:flex flex-col xl:w-1/5 text-sm items-center lg:max-h-(screen-22) pin-22 lg:sticky">
                @include('wisteria::partials.edit-btn')
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('vendor/wisteria/js/app.js') }}"></script>
</body>
</html>