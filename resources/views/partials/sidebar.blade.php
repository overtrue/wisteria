<nav id="sidebar" class="hidden absolute z-40 top-16 bg-white w-full border-b -mb-16 lg:-mb-0 lg:static lg:bg-transparent lg:border-b-0 lg:pt-0 lg:w-1/4 lg:block lg:border-0 xl:w-1/5">
    <div class="lg:block lg:relative lg:sticky lg:top-16 overflow-hidden">
        <nav class="overflow-y-auto text-base lg:text-sm sticky?lg:h-(screen-16)">
            <div class="flex -ml-1 mt-6 mb-4 px-4">
                @foreach($versions as $version)
                    @if($version === $currentVersion)
                        <div class="px-2 py-1 mx-1 bg-gray-300 text-sm text-gray-800 rounded border-2 border-gray-600">
                            {{ $version }}
                        </div>
                    @else
                        <a class="px-2 py-1 mx-1 bg-gray-200 text-sm text-gray-700 rounded border hover:border-gray-400 hover:text-gray-800"
                           href="{{ route('wisteria.docs.show', [$version, '/']) }}">
                            {{ $version }}
                        </a>
                    @endif
                @endforeach
            </div>
            <div class="docs-index w-full pl-4">
                <ul>{!! $index !!}</ul>
            </div>
        </nav>
    </div>
</nav>
