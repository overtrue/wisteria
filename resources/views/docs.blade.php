@extends('wisteria::layout')

@section('content')
    <div class="lg:flex items-stretch h-full">
        @include('wisteria::ads.before-sidebar')
        @include('wisteria::partials.sidebar')
        @include('wisteria::ads.before-sidebar')
        <div id="docs-content" class="min-h-screen w-full lg:static lg:max-h-full lg:overflow-visible w-full lg:w-3/4 xl:w-4/5 flex">
            <div class="markdown-body mb-6 px-6 max-w-3xl mx-auto lg:ml-0 lg:mr-auto xl:mx-0 xl:px-12 w-full xl:w-3/4">
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
    </div>
@stop