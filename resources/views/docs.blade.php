@extends('wisteria::layout')

@section('content')
<div class="lg:flex items-stretch h-full">
    @include('wisteria::ads.before-sidebar')
    @include('wisteria::partials.sidebar')
    @include('wisteria::ads.before-sidebar')
    <div class="markdown-body mx-20 relative flex-1">
        <div class="my-6">
            @include('wisteria::ads.before-content')
        </div>
        <article id="content" class="w-full">
            @include('wisteria::partials.content-header')

            {!! $content !!}

            <footer class="border-t py-4 mt-6">
                @include('wisteria::partials.footer')
            </footer>
        </article>
        <div class="my-6">
            @include('wisteria::ads.after-content')
        </div>
    </div>
    @include('wisteria::partials.toc')
</div>
@stop