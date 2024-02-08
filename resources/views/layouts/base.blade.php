<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#1e2124">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#1e2124">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600&display=swap" rel="stylesheet">
  
    <!-- Analytics -->
    <script async src="https://umami.ncgcoolify.cloud/script.js" data-website-id="59f2878f-4a06-42bd-8211-76a07af84515"></script>

    @if (View::hasSection('title'))
        <title>GeoIP | @yield('title')</title>
    @else
        <title>GeoIP | Home</title>
    @endif
    <meta name="title" content="GeoIP">
    <meta name="description"
        content="Explore the world with this GeoIP service. Discover detailed IP information, geolocation data, and more. Whether you're a developer or business owner, unlock valuable insights today." />

    <meta property="og:type" content="website">
    <meta property="og:url" content="https://geoip.in/">
    <meta property="og:title" content="GeoIP">
    <meta property="og:description"
        content="Explore the world with this GeoIP service. Discover detailed IP information, geolocation data, and more. Whether you're a developer or business owner, unlock valuable insights today." />
    <meta property="og:image" content="/banner.png">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://geoip.in/">
    <meta property="twitter:title" content="NotCoderGuy">
    <meta property="twitter:description"
        content="Welcome to my website! Explore my portfolio showcasing my passion for developing logical applications and bringing static art to life in games. I specialize in C, C++, C#, Python, PHP, and JavaScript (with React). With a focus on game development and backend development, I create fun experiences for all users. This portfolio, built with Tailwind CSS, reflects my career path and technical interests. Visit my Linkedin profile for more information.">
    <meta property="twitter:image" content="/banner.png">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-poppins">
    <!-- Page Container -->
    <div id="page-container" class="flex flex-col mx-auto w-full min-h-screen bg-base">
        <!-- Page Content -->
        <main id="page-content" class="flex flex-auto flex-col max-w-full">
            <!-- Header -->
            @include('partials.header')

            <!-- Main Content -->
            <div class="flex flex-auto flex-col w-full">
                @yield('body')
            </div>

            <!-- Footer -->
            @include('partials.footer')
        </main>
    </div>
</body>

</html>
