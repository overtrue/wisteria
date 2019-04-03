<nav id="sidebar" class="bg-gray-100 sticky top-0 h-full flex flex-col items-stretch border-r z-40">
    <div class="sidebar-inner relative p-4 pr-0 w-full h-full">
        <div class="flex -mx-1 mt-6 mb-4">
            @foreach($versions as $version)
            @if($version === $currentVersion)
            <div class="px-2 py-1 mx-1 bg-gray-300 text-sm text-gray-800 rounded border-2 border-gray-600">
                {{ $version }}
            </div>
            @else
            <a class="px-2 py-1 mx-1 bg-gray-200 text-sm text-gray-700 rounded border hover:border-gray-400 hover:text-gray-800"
               href="{{ route('wisteria.docs.show', [$version, $page]) }}">
                {{ $version }}
            </a>
            @endif
            @endforeach
        </div>
        <div class="docs-index absolute overflow-hidden ">
            <ul>{!! $index !!}</ul>
        </div>
        <div class="absolute bottom-0 inset-x-0 h-20 border-gray-400 bg-gray-300 text-gray-800 p-16 rounded m-4 -ml-4">
            @include('wisteria::partials.footer')
        </div>
    </div>
</nav>
