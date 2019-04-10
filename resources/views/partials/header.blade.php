<header id="navbar" class="bg-white h-16 z-50 top-0 fixed w-full border-b border-gray-400">
    <div class="max-w-screen-xl mx-auto h-full flex flex-shrink-0 items-center justify-between">
        <div class="logo flex items-center justify-between pr-4 lg:w-1/4 xl:w-1/5">
            <a href="{{ url('/') }}" class="block h-full flex items-center ml-4">
                <img src="{{ asset(config('wisteria.ui.logo')) }}" alt="Logo" style="height: 30px"/>
            </a>
            <div class="hidden lg:block">
                <dark-mode-switcher class="ml-4"></dark-mode-switcher>
            </div>
        </div>
        @if(count(config('wisteria.ui.nav-links', [])) > 0)
            <div class="nav-links hidden lg:flex flex-1 items-center max-w-3xl lg:ml-0 lg:mr-auto xl:mx-0 xl:px-12 xl:w-3/4">
                @foreach(config('wisteria.ui.nav-links', []) as $link)
                    <a href="{{ url($link['url'] ?? '#') }}" class="mx-4" target="{{ $link['target'] ?? '_self' }}">{!!  $link['label'] !!}</a>
                @endforeach
            </div>
        @endif
        <div class="hidden lg:flex items-center justify-end pr-4">
            @if(config('wisteria.plugins.docsearch.api_key'))
                @include('wisteria::plugins.docsearch')
            @endif
            @if(config('wisteria.docs.repository.provider') === 'github')
                <github-link url="{{ config('wisteria.docs.repository.url')  }}" class="ml-4"></github-link>
            @endif
        </div>
        <div id="nav-open" class="px-6 text-gray-600 self-center lg:hidden">
            <svg role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="fill-current w-6 h-6">
                <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/>
            </svg>
        </div>
        <div id="nav-close" class="px-6 text-gray-600 self-center hidden lg:hidden">
            <svg role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="fill-current w-6 h-6">
                <path
                    d="M10 8.586L2.929 1.515 1.515 2.929 8.586 10l-7.071 7.071 1.414 1.414L10 11.414l7.071 7.071 1.414-1.414L11.414 10l7.071-7.071-1.414-1.414L10 8.586z"/>
            </svg>
        </div>
    </div>
</header>