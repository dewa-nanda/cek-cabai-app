<!doctype html>

<html class="scroll-smooth">
    <head>
        <title>Cek Cabai App @yield('title')</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
        @vite('resources/css/app.css')
    </head>
    
    <body class="min-h-screen">
        <x-navbar />
 
        <main class="container min-h-screen min-w-full">
            @yield('content')
        </main>

        <x-footer />
    </body>
</html>