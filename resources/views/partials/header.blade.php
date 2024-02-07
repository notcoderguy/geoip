<!-- Header -->
<header x-data="{ isOpen: false }" class="flex flex-none md:items-center py-4 md:py-8">
    <div
        class="flex flex-col text-center md:flex-row md:items-center md:justify-between space-y-6 md:space-y-0 container xl:max-w-7xl mx-auto px-4 lg:px-8">
        <div class="flex justify-between w-full md:w-auto text-base-content hover:text-secondary">
            <a href="{{ route('home') }}" class="inline-flex items-center space-x-2 font-bold text-lg tracking-wide">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor"
                    class="text-base-content hover:text-secondary hi-outline inline-block w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12.75 3.03v.568c0 .334.148.65.405.864l1.068.89c.442.369.535 1.01.216 1.49l-.51.766a2.25 2.25 0 0 1-1.161.886l-.143.048a1.107 1.107 0 0 0-.57 1.664c.369.555.169 1.307-.427 1.605L9 13.125l.423 1.059a.956.956 0 0 1-1.652.928l-.679-.906a1.125 1.125 0 0 0-1.906.172L4.5 15.75l-.612.153M12.75 3.031a9 9 0 0 0-8.862 12.872M12.75 3.031a9 9 0 0 1 6.69 14.036m0 0-.177-.529A2.25 2.25 0 0 0 17.128 15H16.5l-.324-.324a1.453 1.453 0 0 0-2.328.377l-.036.073a1.586 1.586 0 0 1-.982.816l-.99.282c-.55.157-.894.702-.8 1.267l.073.438c.08.474.49.821.97.821.846 0 1.598.542 1.865 1.345l.215.643m5.276-3.67a9.012 9.012 0 0 1-5.276 3.67m0 0a9 9 0 0 1-10.275-4.835M15.75 9c0 .896-.393 1.7-1.016 2.25" />
                </svg>
                <span>GeoIP</span>
            </a>
            <button class="text-base-content hover:text-secondary md:hidden" @click="isOpen = !isOpen">
                <!-- Hamburger Icon -->
                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7">
                    </path>
                </svg>
            </button>
        </div>

        <div :class="{ 'block': isOpen, 'hidden': !isOpen }"
            class="relative w-full md:flex md:items-center md:w-auto md:space-x-6">
            <nav class="w-full space-x-0 md:space-x-6 md:flex md:justify-between">
                <a href="{{ route('home') }}"
                    class="block py-2 px-3 md:py-0 md:px-0 mt-4 md:inline-block bg-base-300 rounded md:mt-0 text-base-content md:bg-transparent hover:text-secondary">
                    Home
                </a>
                <a href="{{ route('home') }}#features"
                    class="block py-2 px-3 md:py-0 md:px-0 mt-4 md:inline-block bg-base-300 rounded md:mt-0 text-base-content md:bg-transparent hover:text-secondary">
                    Features
                </a>
                <a href="{{ route('api') }}"
                    class="block py-2 px-3 md:py-0 md:px-0 mt-4 md:inline-block bg-base-300 rounded md:mt-0 text-base-content md:bg-transparent hover:text-secondary">
                    API
                </a>
                <a href="{{ route('docs') }}"
                    class="block py-2 px-3 md:py-0 md:px-0 mt-4 md:inline-block bg-base-300 rounded md:mt-0 text-base-content md:bg-transparent hover:text-secondary">
                    Docs
                </a>
            </nav>

            <a href="https://github.com/notcoderguy/geoip" target="_blank" rel="noopener noreferrer"
                class="btn btn-outline btn-secondary w-full md:w-auto mt-4 md:mt-0">
                Github
            </a>
        </div>
    </div>
</header>
<!-- END Header -->
