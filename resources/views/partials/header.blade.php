<header class="flex items-center bg-white h-16 z-50 pin-t sticky border-t-4 border-b">
    <div class="container mx-auto">
        <div class="flex items-center justify-between px-6 lg:px-16">
            <a href="{{ url('/') }}">
                <img src="{{ asset('vendor/wisteria/img/logo.svg') }}" alt="Logo" style="height: 30px" />
            </a>
            <div id="nav-open" class="text-grey-dark lg:hidden">
                <svg role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="fill-current w-6 h-6">
                    <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/>
                </svg>
            </div>
            <div id="nav-close" class="text-grey-dark hidden lg:hidden">
                <svg role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="fill-current w-6 h-6">
                    <path d="M10 8.586L2.929 1.515 1.515 2.929 8.586 10l-7.071 7.071 1.414 1.414L10 11.414l7.071 7.071 1.414-1.414L11.414 10l7.071-7.071-1.414-1.414L10 8.586z"/>
                </svg>
            </div>
        </div>
    </div>
</header>