@extends('wisteria::layout')

@section('content')
    <div class="lg:flex -mx-6">
        @include('wisteria::partials.sidebar')
        <div class="w-full lg:w-3/4 xl:w-3/5 pt-10 px-6 lg:px-12 min-h-(screen-16) markdown-body">
            <article id="content">
                {!! $content !!}
            </article>
        </div>
        <div class="hidden pt-4 px-6 xl:flex flex-col xl:w-1/5 text-sm items-center lg:max-h-(screen-22) pin-22 lg:sticky">
            @include('wisteria::partials.edit-btn')
        </div>
    </div>
@stop