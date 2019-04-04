@extends('wisteria::layout')

@section('content')
<div class="lg:flex items-stretch h-full">
    @include('wisteria::ads.before-sidebar')
    @include('wisteria::partials.sidebar')
    @include('wisteria::ads.before-sidebar')
    <div class="markdown-body mx-20 relative flex-1">
        <div class="mb-6">
            @include('wisteria::ads.before-content')
        </div>
        <article id="content" class="w-full pt-10">
            @if(!!$title)
            <div class="flex justify-between border-b pb-6 mb-6 border-gray-300">
                <div class="border-l-4 border-gray-600 pl-4">
                    <h1>{{ $title }}</h1>
                    <time class="text-sm text-gray-500">Last updated at {{ $updatedAt }}</time>
                </div>
                <div>
                    <div class="py-1 px-4">
                        @include('wisteria::partials.edit-btn')
                    </div>
                </div>
            </div>
            @endif
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