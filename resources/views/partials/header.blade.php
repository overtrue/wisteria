<header id="navbar" class="flex flex-shrink-0 items-stretch bg-white h-16 z-50 top-0 fixed w-full border-b border-gray-400">
    <div class="logo flex items-center justify-between pr-4">
        <a href="{{ url('/') }}" class="block h-full flex items-center ml-4">
            <img src="{{ asset(config('wisteria.ui.logo')) }}" alt="Logo" style="height: 30px" />
        </a>
        <dark-mode-switcher class="ml-4"></dark-mode-switcher>
    </div>
    @if(count(config('wisteria.ui.nav-links', [])) > 0)
        <div class="nav-links flex flex-1 items-center mx-20">
            @foreach(config('wisteria.ui.nav-links', []) as $link)
                <a href="{{ url($link['url'] ?? '#') }}" class="mx-4" target="{{ $link['target'] ?? '_self' }}">{!!  $link['label'] !!}</a>
            @endforeach
        </div>
    @endif
    <div class="flex items-center justify-end pr-4">
        @if(config('wisteria.plugins.docsearch.api_key'))
            @include('wisteria::plugins.docsearch')
        @endif
        @if(config('wisteria.docs.repository.provider') === 'github')
        <github-link url="{{ config('wisteria.docs.repository.url')  }}" class="ml-4"></github-link>
        @endif
    </div>
    <div id="nav-open" class="text-gray-dark lg:hidden">
        <svg role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="fill-current w-6 h-6">
            <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/>
        </svg>
    </div>
    <div id="nav-close" class="text-gray-dark hidden lg:hidden">
        <svg role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="fill-current w-6 h-6">
            <path d="M10 8.586L2.929 1.515 1.515 2.929 8.586 10l-7.071 7.071 1.414 1.414L10 11.414l7.071 7.071 1.414-1.414L11.414 10l7.071-7.071-1.414-1.414L10 8.586z"/>
        </svg>
    </div>
</header>