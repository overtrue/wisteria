<nav id="nav" class="hidden overflow-hidden w-full h-full lg:block lg:w-1/4 xl:w-1/5 px-6 pt-4 lg:border-r z-40 lg:max-h-(screen-22) pin-22 lg:sticky">
    <div class="flex -mx-1 mt-2 mb-4">
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
    <div class="docs-index">
        <ul>{!! $index !!}</ul>
    </div>
</nav>
