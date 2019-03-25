@extends('wisteria::layout')

@section('content')
    <div class="text-center markdown-body py-32 text-gray-darkest">
        <svg t="1551339945997" height="100" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="1617"
             xmlns:xlink="http://www.w3.org/1999/xlink">
            <path
                d="M867.2 288c-73.6-100.48-192-160-318.72-160-216.32 0-391.68 172.16-391.68 384 0 211.84 175.36 384 391.68 384 122.24 0 238.08-56.32 311.68-151.68L548.48 512 867.2 288zM608 224c28.16 0 51.2 23.04 51.2 51.2s-23.04 51.2-51.2 51.2-51.2-23.04-51.2-51.2S579.84 224 608 224z"
                p-id="1618" fill="currentColor"></path>
        </svg>
        <div class="text-3xl my-4">Page "{{ $page }}" not found.</div>
        <a href="{{ route('wisteria.docs.index') }}">
            <button class="bg-blue hover:bg-blue-dark text-white font-bold py-2 px-4 rounded">
                Back to Homepage
            </button>
        </a>
    </div>
@stop