<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        @vite(['resources/css/app.css'])
    </head>
 <body class="antialiased selection:bg-primary selection:text-primary-content">
 <div class="relative flex items-top justify-center min-h-screen bg-foreground sm:items-center sm:pt-0">
 <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
 <div class="flex items-center pt-8 sm:justify-start sm:pt-0">
 <div class="px-4 text-lg text-background border-r border-muted tracking-wider">
 @yield('code')
 </div>

 <div class="ml-4 text-lg text-background uppercase tracking-wider">
 @yield('message')
 </div>
 </div>
 </div>
 </div>
 </body>
</html>
