<!doctype html>

<html>
    <head>
        <title>Cek Cabai App @yield('title')</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @vite('resources/css/app.css')
    </head>
    
    <body class="min-h-screen">
        <x-navbar />
 
        <div class="container min-h-screen min-w-full">
            @yield('content')
        </div>

        <x-footer />
    </body>
</html>