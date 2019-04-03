@extends('wisteria::layout')

@section('content')
    <div class="lg:flex items-stretch h-full">
        @include('wisteria::ads.before-sidebar')
        @include('wisteria::partials.sidebar')
        @include('wisteria::ads.before-sidebar')
        <div class="markdown-body mx-20 relative flex-1 flex">
            @include('wisteria::ads.before-content')
            <article id="content" class="h-full w-full pt-10 overflow-hidden absolute">
                @if(!!$title)
                <div class="flex justify-between border-b pb-6 mb-6 border-gray-300">
                    <div class="border-l-2 border-gray-600 pl-4">
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
            @include('wisteria::ads.after-content')
        </div>
        <div class="hidden pt-4 px-6 xl:flex flex-col xl:w-1/5 text-sm items-center lg:max-h-(screen-22) pin-22 lg:sticky">
            @include('wisteria::ads.before-right-bar')
            <div id="toc" class="w-full text-sm border-l pl-4">
                <div class="flex items-center text-gray-500 uppercase"><svg height="1em" width="1em" fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke="currentColor" class="icon-7f6730be--text-3f89f380"><g><line x1="21" y1="10" x2="7" y2="10"></line><line x1="21" y1="6" x2="3" y2="6"></line><line x1="21" y1="14" x2="3" y2="14"></line><line x1="21" y1="18" x2="7" y2="18"></line></g></svg><span class="ml-1">Contents</span></div>
                <div class="anchors mt-4"></div>
            </div>
            @include('wisteria::ads.after-right-bar')
        </div>
    </div>
@stop