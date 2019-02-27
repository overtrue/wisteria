<nav id="nav" class="hidden overflow-hidden w-full h-full lg:block lg:w-1/4 xl:w-1/5 px-6 pt-4 lg:border-r z-40 lg:max-h-(screen-22) pin-22 lg:sticky">
    <div class="flex -mx-1 mt-2 mb-4">
        @foreach($versions as $version)
            @if($version === $currentVersion)
                <div class="px-2 py-1 mx-1 bg-grey-light text-sm text-grey-darker rounded border border-grey">
                    {{ $version }}
                </div>
            @else
                <a class="px-2 py-1 mx-1 bg-grey-lighter text-sm text-grey rounded border hover:border-grey hover:text-grey-darker"
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
