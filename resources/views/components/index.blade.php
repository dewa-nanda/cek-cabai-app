<!doctype html>

<html class="scroll-smooth">
    <head>
        <title>Cek Cabai App @yield('title')</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://kit.fontawesome.com/64bcad5a74.js" crossorigin="anonymous"></script>
        {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
        @vite(['resources/css/app.css','resources/js/app.js'])
    </head>
    
    <body class="min-h-screen">
        <x-navbar />
 
        <main class="container min-h-screen min-w-full">
            <a class="hidden bottom-0 right-0 h-10 w-10 border-2 z-40 rounded border-black text-center m-2" href="#" id="up"><i class="fa-solid fa-arrow-up m-2.5"></i></a>
            @yield('content')
        </main>

        <x-footer />
    </body>

    <script>
        const body = document.querySelector('body');
        const div = document.querySelector('.container');

        document.addEventListener('scroll', () => {
        var buttonUp = document.getElementById("up");
        if (window.scrollY > 80) {
            
            buttonUp.classList.remove("hidden")
            buttonUp.classList.add("fixed")
        }else{
            buttonUp.classList.remove("fixed")
            buttonUp.classList.add('hidden')
        }
        })
    </script>
</html>