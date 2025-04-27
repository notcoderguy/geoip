<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" @class(['dark'=> ($appearance ?? 'system') == 'dark'])>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/svg+xml" href="/logo.svg">
    <meta name="msapplication-TileImage" content="/logo.svg">

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

    {{-- Inline script to detect system dark mode preference and apply it immediately --}}
    <script>
        (function() {
            const appearance = '{{ $appearance ?? "system" }}';

            if (appearance === 'system') {
                const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;

                if (prefersDark) {
                    document.documentElement.classList.add('dark');
                }
            }
        })();
    </script>

    {{-- Inline style to set the HTML background color based on our theme in app.css --}}
    <style>
        html {
            background-color: oklch(1 0 0);
        }

        html.dark {
            background-color: oklch(0.145 0 0);
        }
    </style>

    <title inertia>{{ config('app.name', 'GeoIP') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    @routes
    @viteReactRefresh
    @vite(['resources/js/app.tsx', "resources/js/pages/{$page['component']}.tsx"])
    @inertiaHead
</head>

<body class="font-sans antialiased selection:bg-primary selection:text-black bg-foreground text-background">
    @inertia
</body>

</html>