@extends('wisteria::layout')

@section('content')
    <div class="lg:flex items-stretch h-full">
        @include('wisteria::ads.before-sidebar')
        @include('wisteria::partials.sidebar')
        @include('wisteria::ads.before-sidebar')
        <div class="markdown-body w-full mx-20 pt-10">
            @include('wisteria::ads.before-content')
            <article id="content">
                {!! $content !!}
            </article>
            @include('wisteria::ads.after-content')
        </div>
        <div class="hidden pt-4 px-6 xl:flex flex-col xl:w-1/5 text-sm items-center lg:max-h-(screen-22) pin-22 lg:sticky">
            @include('wisteria::ads.before-right-bar')
            @include('wisteria::partials.edit-btn')
            @include('wisteria::ads.after-right-bar')
        </div>
    </div>
@stop