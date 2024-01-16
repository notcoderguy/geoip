<!DOCTYPE html>
<html>

<head>
    {{-- <meta charset="utf-8" />
    <link rel="icon" href="%PUBLIC_URL%/favicon.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="#1e2124" />
    <link rel="apple-touch-icon" sizes="180x180" href="%PUBLIC_URL%/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="%PUBLIC_URL%/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="%PUBLIC_URL%/favicon-16x16.png">
    <link rel="mask-icon" href="%PUBLIC_URL%/safari-pinned-tab.svg" color="#1e2124">
    <meta name="apple-mobile-web-app-title" content="NotCoderGuy">
    <meta name="application-name" content="NotCoderGuy">
    <meta name="msapplication-TileColor" content="#1e2124">
    <meta name="msapplication-TileImage" content="%PUBLIC_URL%/mstile-144x144.png">
    <meta name="theme-color" content="#1e2124">

    <link rel="manifest" href="%PUBLIC_URL%/manifest.json" /> --}}

    <title>GeoIP</title>
    {{-- <meta name="title" content="GeoIP">
    <meta name="description" content="Explore the world with this GeoIP service. Discover detailed IP information, geolocation data, and more. Whether you're a developer or business owner, unlock valuable insights today."/>

    <meta property="og:type" content="website">
    <meta property="og:url" content="https://geoip.in/">
    <meta property="og:title" content="GeoIP">
<meta property="og:description" content="Explore the world with this GeoIP service. Discover detailed IP information, geolocation data, and more. Whether you're a developer or business owner, unlock valuable insights today." />
    <meta property="og:image" content="%PUBLIC_URL%/banner.png">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://metatags.io/">
    <meta property="twitter:title" content="NotCoderGuy">
    <meta property="twitter:description"
        content="Welcome to my website! Explore my portfolio showcasing my passion for developing logical applications and bringing static art to life in games. I specialize in C, C++, C#, Python, PHP, and JavaScript (with React). With a focus on game development and backend development, I create fun experiences for all users. This portfolio, built with Tailwind CSS, reflects my career path and technical interests. Visit my Linkedin profile for more information.">
    <meta property="twitter:image" content="%PUBLIC_URL%/banner.png"> --}}

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <!-- Page Container -->
    <div id="page-container" class="flex flex-col mx-auto w-full min-h-screen bg-background">
        <!-- Page Content -->
        <main id="page-content" class="flex flex-auto flex-col max-w-full">
            <!-- Hero -->
            <div class="bg-background overflow-hidden min-h-screen">
                <!-- Header -->
                <header id="page-header" class="flex flex-none items-center py-10">
                    <div
                        class="flex flex-col text-center md:flex-row md:items-center md:justify-between space-y-6 md:space-y-0 container xl:max-w-7xl mx-auto px-4 lg:px-8">
                        <div>
                            <a href="{{ route('home') }}"
                                class="inline-flex items-center space-x-2 font-bold text-lg tracking-wide text-text hover:opacity-75">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor"
                                    class="text-primary opacity-75 hi-outline inline-block w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12.75 3.03v.568c0 .334.148.65.405.864l1.068.89c.442.369.535 1.01.216 1.49l-.51.766a2.25 2.25 0 0 1-1.161.886l-.143.048a1.107 1.107 0 0 0-.57 1.664c.369.555.169 1.307-.427 1.605L9 13.125l.423 1.059a.956.956 0 0 1-1.652.928l-.679-.906a1.125 1.125 0 0 0-1.906.172L4.5 15.75l-.612.153M12.75 3.031a9 9 0 0 0-8.862 12.872M12.75 3.031a9 9 0 0 1 6.69 14.036m0 0-.177-.529A2.25 2.25 0 0 0 17.128 15H16.5l-.324-.324a1.453 1.453 0 0 0-2.328.377l-.036.073a1.586 1.586 0 0 1-.982.816l-.99.282c-.55.157-.894.702-.8 1.267l.073.438c.08.474.49.821.97.821.846 0 1.598.542 1.865 1.345l.215.643m5.276-3.67a9.012 9.012 0 0 1-5.276 3.67m0 0a9 9 0 0 1-10.275-4.835M15.75 9c0 .896-.393 1.7-1.016 2.25" />
                                </svg>
                                <span>GeoIP</span>
                            </a>
                        </div>
                        <div
                            class="flex flex-col text-center md:flex-row md:items-center md:justify-between space-y-6 md:space-y-0 md:space-x-10">
                            <nav class="space-x-4 md:space-x-6">
                                <a href="{{ route('home') }}#features"
                                    class="font-semibold text-text hover:text-primary">
                                    <span>Features</span>
                                </a>
                                <a href="{{ route('api') }}" class="font-semibold text-text hover:text-primary">
                                    <span>API</span>
                                </a>
                                <a href="{{ route('docs') }}" class="font-semibold text-text hover:text-primary">
                                    <span>Docs</span>
                                </a>
                            </nav>
                            <div class="flex items-center justify-center space-x-2">
                                <a href="https://github.com/notcoderguy/geoip"
                                    class="inline-flex justify-center items-center space-x-2 border font-semibold focus:outline-none px-3 py-2 leading-6 rounded border-text bg-background text-text hover:text-white hover:bg-secondary hover:border-primary focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-gray-200 active:border-gray-200">
                                    <span>Github</span>
                                    <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
                                        class="opacity-50 hi-solid hi-arrow-right inline-block w-5 h-5">
                                        <path fill-rule="evenodd"
                                            d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </header>
                <!-- END Header -->

                <!-- Hero Content -->
                <div class="container xl:max-w-7xl mx-auto px-4 py-16 lg:px-8 lg:py-32">
                    <div class="text-center">
                        <h2 class="text-7xl md:text-6xl font-extrabold mb-4 text-white">
                            <span class="text-text">GeoIP</span>
                        </h2>
                        <div
                            class="font-semibold inline-flex px-2 py-1 leading-4 mb-2 text-xl rounded-full text-primary bg-gray-200">
                            <a class="p-1" href="https://www.maxmind.com">
                                Powered by MaxMind's GeoIP2
                            </a>
                        </div>
                        <h3 class="text-4xl md:text-3xl md:leading-relaxed font-medium text-secondary lg:w-2/3 mx-auto">
                            Discover, Connect, Explore: Your Gateway to GeoIP Insights.
                        </h3>
                    </div>
                    <div
                        class="flex flex-col sm:flex-row sm:items-center sm:justify-center space-y-2 sm:space-y-0 sm:space-x-2 pt-10 pb-16">
                    </div>
                </div>
                <!-- END Hero Content -->
            </div>
            <!-- END Hero -->

            <!-- Features Section: Key Features List -->
            <div class="min-h-screen bg-background" id="features">
                <div class="space-y-16 container xl:max-w-7xl mx-auto px-4 py-16 lg:px-8 lg:py-32">
                    <!-- Heading -->
                    <div class="text-center flex flex-col gap-8 pb-10">
                        <div class="text-sm uppercase font-bold tracking-wider mb-1 text-primary">
                            Explore Our Features
                        </div>
                        <h2 class="text-3xl md:text-4xl font-extrabold mb-4 text-text">
                            Discover the Power of GeoIP Service
                        </h2>
                        <h3 class="text-lg md:text-xl md:leading-relaxed font-medium text-primary lg:w-2/3 mx-auto">
                            Unlock a world of geolocation insights and data with GeoIP service. Whether you're a
                            developer, business owner, or just curious, this service has something for you.
                        </h3>
                    </div>
                    <!-- END Heading -->

                    <!-- Features -->

                    <div class="flex flex-col md:flex-row gap-10 justify-center relative">
                        <div class="flex-1 flex-col gap-9 p-4 rounded-md shadow-md mx-20 md:mx-0 border border-black bg-white">
                            <div class="flex items-center space-x-3">
                                <div class="flex-none flex items-center justify-center">
                                    <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
                                        class="hi-solid hi-check-circle inline-block w-5 h-5 text-purple-300">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <h4 class="font-semibold">
                                    Comprehensive IP Information
                                </h4>
                            </div>
                            <div class="flex items-center space-x-3">
                                <div class="flex-none flex items-center justify-center">
                                    <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
                                        class="hi-solid hi-check-circle inline-block w-5 h-5 text-purple-300">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <h4 class="font-semibold">
                                    ASN and Network Details
                                </h4>
                            </div>
                        </div>

                        <!-- <div class="bg-black w-full h-full absolute rounded-full z-0"></div> -->

                        <div class="flex-1 flex-col gap-9 p-4 rounded-md shadow-md mx-20 md:mx-0 border border-black bg-white">
                            <div class="flex items-center space-x-3">
                                <div class="flex-none flex items-center justify-center">
                                    <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
                                        class="hi-solid hi-check-circle inline-block w-5 h-5 text-red-300">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <h4 class="font-semibold">
                                    Geolocation Insights
                                </h4>
                            </div>
                            <div class="flex items-center space-x-3">
                                <div class="flex-none flex items-center justify-center">
                                    <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
                                        class="hi-solid hi-check-circle inline-block w-5 h-5 text-red-300">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <h4 class="font-semibold">
                                    Developer-Friendly API
                                </h4>
                            </div>
                        </div>

                        <div class="flex-1  flex-col gap-9  p-4 rounded-md shadow-md mx-20 md:mx-0 border border-black bg-white">
                            <div class="flex items-center space-x-3">
                                <div class="flex-none flex items-center justify-center">
                                    <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
                                        class="hi-solid hi-check-circle inline-block w-5 h-5 text-emerald-300">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <h4 class="font-semibold">
                                    Regular Database Updates
                                </h4>
                            </div>
                            <div class="flex items-center space-x-3">
                                <div class="flex-none flex items-center justify-center">
                                    <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
                                        class="hi-solid hi-check-circle inline-block w-5 h-5 text-emerald-300">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <h4 class="font-semibold">
                                    Secure and Privacy-Focused
                                </h4>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-8">
                        <div class="flex items-center space-x-3">
                            <div class="flex-none flex items-center justify-center">
                                <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
                                    class="hi-solid hi-check-circle inline-block w-5 h-5 text-emerald-500">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <h4 class="font-semibold">
                                Comprehensive IP Information
                            </h4>
                        </div>
                        <div class="flex items-center space-x-3">
                            <div class="flex-none flex items-center justify-center">
                                <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
                                    class="hi-solid hi-check-circle inline-block w-5 h-5 text-emerald-500">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <h4 class="font-semibold">
                                ASN and Network Details
                            </h4>
                        </div>
                        <div class="flex items-center space-x-3">
                            <div class="flex-none flex items-center justify-center">
                                <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
                                    class="hi-solid hi-check-circle inline-block w-5 h-5 text-emerald-500">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <h4 class="font-semibold">
                                Geolocation Insights
                            </h4>
                        </div>
                        <div class="flex items-center space-x-3">
                            <div class="flex-none flex items-center justify-center">
                                <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
                                    class="hi-solid hi-check-circle inline-block w-5 h-5 text-emerald-500">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <h4 class="font-semibold">
                                Developer-Friendly API
                            </h4>
                        </div>
                        <div class="flex items-center space-x-3">
                            <div class="flex-none flex items-center justify-center">
                                <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
                                    class="hi-solid hi-check-circle inline-block w-5 h-5 text-emerald-500">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <h4 class="font-semibold">
                                Regular Database Updates
                            </h4>
                        </div>
                        <div class="flex items-center space-x-3">
                            <div class="flex-none flex items-center justify-center">
                                <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
                                    class="hi-solid hi-check-circle inline-block w-5 h-5 text-emerald-500">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <h4 class="font-semibold">
                                Secure and Privacy-Focused
                            </h4>
                        </div>
                    </div> -->
                    <!-- END Features -->
                </div>
            </div>
            <!-- END Features Section: Key Features List -->

            <!-- Section -->
            <div class="bg-secondary min-h-screen flex items-center">
                <div class="container xl:max-w-7xl mx-auto px-4 py-16 lg:px-8 lg:py-32">
                    @if (isset($Error))
                        <p class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
                            role="alert">
                            <strong class="font-bold">Error!</strong>
                            <span class="block sm:inline">{{ $Error }}</span>
                        </p>
                    @else
                        <!-- Card -->
                        <div class="flex flex-col rounded-lg shadow-sm overflow-hidden bg-primary">
                            <!-- Card Header -->
                            <div class="py-8 px-5 lg:px-6 w-full text-white text-3xl sm:text-5xl text-center">
                                <h3 class="font-medium">
                                    GeoIP Information
                                </h3>
                            </div>
                            <!-- END Card Header -->

                            <!-- Card Body -->
                            <div class="p-5 lg:p-6 grow w-full text-white">
                                @if (isset($ASN))
                                    @if (isset($ASN['ip_address']))
                                    <div class="bg-background text-tertiary py-3 px-5 m-3 rounded-lg sm:text-left text-center border border-secondary">
                                        <span class="font-bold text-xl tracking-wider">IP Address</span> <br> <span class="font-light tracking-wider text-sm">{{ $ASN['ip_address'] }}</span>
                                    </div>
                                    @endif
                                    @if (isset($ASN['autonomous_system_organization']))
                                    <div class="bg-background text-tertiary py-3 px-5 m-3 rounded-lg sm:text-left text-center border border-secondary">
                                        <span class="font-bold text-xl tracking-wider">ASN</span> <br> <span class="font-light tracking-wider text-sm">{{ $ASN['autonomous_system_number'] }}
                                        ({{ $ASN['autonomous_system_organization'] }})span>
                                    </div>
                                    @endif
                                @endif
                                @if (isset($City))
                                    @if (isset($City['city']))
                                        <div class="bg-background text-tertiary py-3 px-5 m-3 rounded-lg sm:text-left text-center border border-secondary">
                                            <span class="font-bold text-xl tracking-wider">City</span> <br> <span class="font-light tracking-wider text-sm">{{ $City['city']['names']['en'] }}</span>
                                        </div>
                                    @endif
                                    @if (isset($City['country']))
                                        <div class="bg-background text-tertiary py-3 px-5 m-3 rounded-lg sm:text-left text-center border border-secondary">
                                            <span class="font-bold text-xl tracking-wider">City</span> <br> <span class="font-light tracking-wider text-sm">{{ $City['country']['names']['en'] }}</span>
                                        </div>
                                    @else
                                        <div class="bg-background text-tertiary py-3 px-5 m-3 rounded-lg sm:text-left text-center border border-secondary">
                                            <span class="font-bold text-xl tracking-wider">Country</span> <br> <span class="font-light tracking-wider text-sm">{{ $City['registered_country']['names']['en'] }}
                                        (Registered)</span>
                                        </div>
                                    @endif
                                    @if (isset($City['continent']))
                                        <div class="bg-background text-tertiary py-3 px-5 m-3 rounded-lg sm:text-left text-center border border-secondary">
                                            <span class="font-bold text-xl tracking-wider">Continent</span> <br> <span class="font-light tracking-wider text-sm">{{ $City['continent']['names']['en'] }}</span>
                                        </div>
                                    @endif
                                    @if (isset($City['postal']))
                                        <div class="bg-background text-tertiary py-3 px-5 m-3 rounded-lg sm:text-left text-center border border-secondary">
                                            <span class="font-bold text-xl tracking-wider">Postal Code</span> <br> <span class="font-light tracking-wider text-sm">{{ $City['postal']['code'] }}</span>
                                        </div>
                                    @endif
                                    @if (isset($City['location']))
                                        <div class="bg-background text-tertiary py-3 px-5 m-3 rounded-lg sm:text-left text-center border border-secondary">
                                            <span class="font-bold text-xl tracking-wider">Latitude</span> <br> <span class="font-light tracking-wider text-sm">{{ $City['location']['latitude'] }}</span>
                                        </div>

                                        <div class="bg-background text-tertiary py-3 px-5 m-3 rounded-lg sm:text-left text-center border border-secondary">
                                            <span class="font-bold text-xl tracking-wider">Longitude</span> <br> <span class="font-light tracking-wider text-sm">{{ $City['location']['longitude'] }}</span>
                                        </div>
                                    @endif
                                @endif
                            </div>
                            <!-- END Card Body -->
                        </div>
                        <!-- END Card -->
                    @endif
                </div>
            </div>
            <!-- END Section -->

            <!-- Footer -->
            <footer id="page-footer" class="bg-gray-800">
                <div
                    class="container xl:max-w-7xl mx-auto px-4 py-16 lg:px-8 lg:py-8 flex flex-col md:flex-row md:justify-between text-sm">
                    <div class="text-gray-400 text-center md:text-left">
                        <span class="font-medium">Created with <span class="text-red-500">&hearts;</span> by <a
                                href="https://notcoderguy.com">NotCoderGuy</a></span>
                    </div>
                </div>
            </footer>
            <!-- END Footer -->

        </main>
        <!-- END Page Content -->
    </div>
    <!-- END Page Container -->
</body>

</html>
