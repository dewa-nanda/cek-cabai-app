@extends('components.index')

@section('content')
    <section class="bg-[radial-gradient(ellipse_at_center,_var(--tw-gradient-stops))] from-gray-700 via-gray-900 to-black">
        <div class="px-4 mx-auto max-w-screen-xl text-center py-24 lg:py-56">
            <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl">Selamat Datang di Cek Cabai App</h1>
            <p class="mb-8 text-lg font-normal text-gray-300 lg:text-xl sm:px-16 lg:px-48">Aplikasi Cek Cabai adalah aplikasi yang dapat digunakan untuk mendeteksi penyakit tanaman cabai berdasarkan gejala-gejala yang dialami cabai tersebut. Aplikasi ini dikembangkan oleh mahasiswa Universitas Ahmad Dahlan jurusan Informatika.</p>
            <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0">
                <a href="{{route("cekKesehatanView")}}" class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                    Coba aplikasi
                    <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                    </svg>
                </a>
                <a href="#detail" class="inline-flex justify-center hover:text-gray-900 items-center py-3 px-5 sm:ms-4 text-base font-medium text-center text-white rounded-lg border border-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-400">
                    Pelajari Lebih Lanjut
                </a>  
            </div>
        </div>
    </section>



    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16">
            <div class="bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-8 md:p-12 mb-8" id="detail">
                <a href="#" class="bg-blue-100 text-blue-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-blue-400 mb-2">
                    <svg class="w-2.5 h-2.5 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 14">
                        <path d="M11 0H2a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h9a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm8.585 1.189a.994.994 0 0 0-.9-.138l-2.965.983a1 1 0 0 0-.685.949v8a1 1 0 0 0 .675.946l2.965 1.02a1.013 1.013 0 0 0 1.032-.242A1 1 0 0 0 20 12V2a1 1 0 0 0-.415-.811Z"/>
                    </svg>
                    Application
                </a>
                <h1 class="text-gray-900 dark:text-white text-3xl md:text-5xl font-extrabold mb-2">Cek Kesehatan Tanaman Cabai</h1>
                <p class="text-lg font-normal text-gray-500 dark:text-gray-400 mb-6">Fitur identifikasi penyakit dan hama memungkinkan petani untuk mengetahui jenis penyakit atau hama yang menyerang tanaman cabai mereka. Petani dapat memberikan gejala gejala pada tanaman cabai mereka ke situs web, dan aplikasi akan menggunakan kecerdasan buatan untuk mengidentifikasi penyakit atau hama tersebut.</p>
                <a href="{{route("cekKesehatanView")}}" class="inline-flex justify-center items-center py-2.5 px-5 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                    Cek kesehatan
                    <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                    </svg>
                </a>
            </div>
            <div class="grid md:grid-cols-2 gap-8">
                <div class="bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-8 md:p-12">
                    <a href="#" class="bg-green-100 text-green-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-green-400 mb-2">
                        <svg class="w-2.5 h-2.5 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                            <path d="M17 11h-2.722L8 17.278a5.512 5.512 0 0 1-.9.722H17a1 1 0 0 0 1-1v-5a1 1 0 0 0-1-1ZM6 0H1a1 1 0 0 0-1 1v13.5a3.5 3.5 0 1 0 7 0V1a1 1 0 0 0-1-1ZM3.5 15.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2ZM16.132 4.9 12.6 1.368a1 1 0 0 0-1.414 0L9 3.55v9.9l7.132-7.132a1 1 0 0 0 0-1.418Z"/>
                        </svg>
                        Information
                    </a>
                    <h2 class="text-gray-900 dark:text-white text-3xl font-extrabold mb-2">Penyakit / Hama Tanaman Cabai</h2>
                    <p class="text-lg font-normal text-gray-500 dark:text-gray-400 mb-4">Menampilkan berbagai macam penyakit / hama tanaman cabai yang umum ditemui di UPT BP4 Wilayah VIII Prambanan</p>
                    <a href="#" class="text-blue-600 dark:text-blue-500 hover:underline font-medium text-lg inline-flex items-center">Read more
                        <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                    </svg>
                    </a>
                </div>
                <div class="bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-8 md:p-12">
                    <a href="#" class="bg-green-100 text-green-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-green-400 mb-2">
                        <svg class="w-2.5 h-2.5 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                            <path d="M17 11h-2.722L8 17.278a5.512 5.512 0 0 1-.9.722H17a1 1 0 0 0 1-1v-5a1 1 0 0 0-1-1ZM6 0H1a1 1 0 0 0-1 1v13.5a3.5 3.5 0 1 0 7 0V1a1 1 0 0 0-1-1ZM3.5 15.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2ZM16.132 4.9 12.6 1.368a1 1 0 0 0-1.414 0L9 3.55v9.9l7.132-7.132a1 1 0 0 0 0-1.418Z"/>
                        </svg>
                        Information
                    </a>
                    <h2 class="text-gray-900 dark:text-white text-3xl font-extrabold mb-2">Gejala Tanaman Cabai</h2>
                    <p class="text-lg font-normal text-gray-500 dark:text-gray-400 mb-4">Menampilkan berbagai macam gejala pada tanaman cabai yang umum ditemui di UPT BP4 Wilayah VIII Prambanan</p>
                    <a href="#" class="text-blue-600 dark:text-blue-500 hover:underline font-medium text-lg inline-flex items-center">Read more
                        <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>
        
    {{-- <div class="container mx-auto grid grid-cols-2 h-screen my-10">
        <section class="flex flex-col justify-center justify-self-center">
            <img src="{{asset('storage/WallpaperChili.jpeg')}}" width="450" class="border border-black"/>
        </section>

        <section class="flex flex-wrap flex-col gap-3 justify-center justify-self-center">
            <div class="font-bold">
                <h1 class="text-6xl">Selamat Datang di</h1>
                <h2 class="text-4xl">Cek Cabai App</h2>
            </div>

            <div>
                <p class="text-lg">Aplikasi Cek Cabai adalah aplikasi yang dapat digunakan untuk mendeteksi penyakit tanaman cabai berdasarkan gejala-gejala yang dialami cabai tersebut. <br>Aplikasi ini dikembangkan oleh mahasiswa Universitas Ahmad Dahlan jurusan Informatika.</p>
            </div>

            <div>
                <a class="border p-2 rounded-full bg-slate-600 hover:bg-slate-800 text-neutral-50" href="#tanamanCabai">Tentang tanaman cabai</a>
            </div>
        </section>
    </div>

    <div class="container mx-auto flex justify-center justify-items-center items-center h-screen my-10" id="tanamanCabai">
        <section class="flex flex-col gap-4 items-center">
            <div class="text-center">
                <h1 class="font-bold text-6xl mb-2">Tanaman Cabai</h1>
                <p class="text-lg">Cabai adalah tanaman perdu yang termasuk dalam suku terong-terongan (Solanaceae). Tanaman cabai berasal dari Amerika Tengah dan Amerika Selatan, dan telah menyebar ke seluruh dunia. Cabai merupakan salah satu tanaman pangan yang penting, dan merupakan sumber vitamin A, vitamin C, dan capsaicin.</p>
            </div>
            <div class="flex gap-2">
                <a class="border p-2 rounded-full bg-slate-600 hover:bg-slate-800 text-neutral-50" href="#listTanaman">List Tanaman Cabai</a>
                <a class="border p-2 rounded-full bg-slate-600 hover:bg-slate-800 text-neutral-50" href="#listPenyakit">List Penyakit/Hama Tanaman Cabai</a>
            </div>
        </section>
    </div>

    <div class="container mx-auto min-h-screen my-10" id="listTanaman">
        <div class="flex flex-col gap-20">
            <section class="grid grid-rows-2 border-b-4">
                <h1 class="text-3xl font-bold">Tanaman Cabai</h1>
                <p class="text-lg">List tanaman cabai ini hanya berdasarkan dengan yang umum ditanam di UPT BP4 Wilayah VIII Prambanan</p>
            </section>
    
            <section class="grid grid-cols-4 gap-5">
                <div class="grid gap-3 border-2 drop-shadow">
                    <img src="{{asset('storage/WallpaperChili.jpeg')}}" />
    
                    <div class="p-2">
                        <h1 class="text-xl font-bold border-b-2 mb-2">Tittle</h1>
                        <p class="text-base text-justify">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Amet nam autem recusandae praesentium, accusantium odio dolorum? Perferendis temporibus consectetur possimus blanditiis excepturi fugit placeat ex velit, similique magni? Vel, ipsum!</p>
                    </div>
                    <a class="border p-2 m-2 rounded-full bg-slate-600 hover:bg-slate-800 text-neutral-50 w-max" href="#tanamanCabai">Detail</a>
                </div>
                <div class="grid gap-3 border-2 drop-shadow">
                    <img src="{{asset('storage/WallpaperChili.jpeg')}}" />
    
                    <div class="p-2">
                        <h1 class="text-xl font-bold border-b-2 mb-2">Tittle</h1>
                        <p class="text-base text-justify">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Amet nam autem recusandae praesentium, accusantium odio dolorum? Perferendis temporibus consectetur possimus blanditiis excepturi fugit placeat ex velit, similique magni? Vel, ipsum!</p>
                    </div>
                    <a class="border p-2 m-2 rounded-full bg-slate-600 hover:bg-slate-800 text-neutral-50 w-max" href="#tanamanCabai">Detail</a>
                </div>
                <div class="grid gap-3 border-2 drop-shadow">
                    <img src="{{asset('storage/WallpaperChili.jpeg')}}" />
    
                    <div class="p-2">
                        <h1 class="text-xl font-bold border-b-2 mb-2">Tittle</h1>
                        <p class="text-base text-justify">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Amet nam autem recusandae praesentium, accusantium odio dolorum? Perferendis temporibus consectetur possimus blanditiis excepturi fugit placeat ex velit, similique magni? Vel, ipsum!</p>
                    </div>
                    <a class="border p-2 m-2 rounded-full bg-slate-600 hover:bg-slate-800 text-neutral-50 w-max" href="#tanamanCabai">Detail</a>
                </div>
                <div class="grid gap-3 border-2 drop-shadow">
                    <img src="{{asset('storage/WallpaperChili.jpeg')}}" />
    
                    <div class="p-2">
                        <h1 class="text-xl font-bold border-b-2 mb-2">Tittle</h1>
                        <p class="text-base text-justify">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Amet nam autem recusandae praesentium, accusantium odio dolorum? Perferendis temporibus consectetur possimus blanditiis excepturi fugit placeat ex velit, similique magni? Vel, ipsum!</p>
                    </div>
                    <a class="border p-2 m-2 rounded-full bg-slate-600 hover:bg-slate-800 text-neutral-50 w-max" href="#tanamanCabai">Detail</a>
                </div>
                <div class="grid gap-3 border-2 drop-shadow">
                    <img src="{{asset('storage/WallpaperChili.jpeg')}}" />
    
                    <div class="p-2">
                        <h1 class="text-xl font-bold border-b-2 mb-2">Tittle</h1>
                        <p class="text-base text-justify">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Amet nam autem recusandae praesentium, accusantium odio dolorum? Perferendis temporibus consectetur possimus blanditiis excepturi fugit placeat ex velit, similique magni? Vel, ipsum!</p>
                    </div>
                    <a class="border p-2 m-2 rounded-full bg-slate-600 hover:bg-slate-800 text-neutral-50 w-max" href="#tanamanCabai">Detail</a>
                </div>

            </section>
        </div>
    </div>

    <div class="container mx-auto min-h-screen my-10" id="listPenyakit">
        <div class="flex flex-col gap-20">
            <section class="grid grid-rows-2 border-b-4">
                <h1 class="text-3xl font-bold">Penyakit / Hama tanaman cabai</h1>
                <p class="text-lg">List penyakit / hama tanaman cabai ini hanya berdasarkan dengan yang umum ditanam di UPT BP4 Wilayah VIII Prambanan</p>
            </section>
    
            <section class="grid grid-cols-4 gap-5">
                <div class="grid gap-3 border-2 drop-shadow">
                    <img src="{{asset('storage/WallpaperChili.jpeg')}}" />
    
                    <div class="p-2">
                        <h1 class="text-xl font-bold border-b-2 mb-2">Tittle</h1>
                        <p class="text-base text-justify">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Amet nam autem recusandae praesentium, accusantium odio dolorum? Perferendis temporibus consectetur possimus blanditiis excepturi fugit placeat ex velit, similique magni? Vel, ipsum!</p>
                    </div>
                    <a class="border p-2 m-2 rounded-full bg-slate-600 hover:bg-slate-800 text-neutral-50 w-max" href="#tanamanCabai">Detail</a>
                </div>

                <div class="grid gap-3 border-2 drop-shadow">
                    <img src="{{asset('storage/WallpaperChili.jpeg')}}" />
    
                    <div class="p-2">
                        <h1 class="text-xl font-bold border-b-2 mb-2">Tittle</h1>
                        <p class="text-base text-justify">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Amet nam autem recusandae praesentium, accusantium odio dolorum? Perferendis temporibus consectetur possimus blanditiis excepturi fugit placeat ex velit, similique magni? Vel, ipsum!</p>
                    </div>
                    <a class="border p-2 m-2 rounded-full bg-slate-600 hover:bg-slate-800 text-neutral-50 w-max" href="#tanamanCabai">Detail</a>
                </div>

                <div class="grid gap-3 border-2 drop-shadow">
                    <img src="{{asset('storage/WallpaperChili.jpeg')}}" />
    
                    <div class="p-2">
                        <h1 class="text-xl font-bold border-b-2 mb-2">Tittle</h1>
                        <p class="text-base text-justify">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Amet nam autem recusandae praesentium, accusantium odio dolorum? Perferendis temporibus consectetur possimus blanditiis excepturi fugit placeat ex velit, similique magni? Vel, ipsum!</p>
                    </div>
                    <a class="border p-2 m-2 rounded-full bg-slate-600 hover:bg-slate-800 text-neutral-50 w-max" href="#tanamanCabai">Detail</a>
                </div>
                <div class="grid gap-3 border-2 drop-shadow">
                    <img src="{{asset('storage/WallpaperChili.jpeg')}}" />
    
                    <div class="p-2">
                        <h1 class="text-xl font-bold border-b-2 mb-2">Tittle</h1>
                        <p class="text-base text-justify">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Amet nam autem recusandae praesentium, accusantium odio dolorum? Perferendis temporibus consectetur possimus blanditiis excepturi fugit placeat ex velit, similique magni? Vel, ipsum!</p>
                    </div>
                    <a class="border p-2 m-2 rounded-full bg-slate-600 hover:bg-slate-800 text-neutral-50 w-max" href="#tanamanCabai">Detail</a>
                </div>
                <div class="grid gap-3 border-2 drop-shadow">
                    <img src="{{asset('storage/WallpaperChili.jpeg')}}" />
    
                    <div class="p-2">
                        <h1 class="text-xl font-bold border-b-2 mb-2">Tittle</h1>
                        <p class="text-base text-justify">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Amet nam autem recusandae praesentium, accusantium odio dolorum? Perferendis temporibus consectetur possimus blanditiis excepturi fugit placeat ex velit, similique magni? Vel, ipsum!</p>
                    </div>
                    <a class="border p-2 m-2 rounded-full bg-slate-600 hover:bg-slate-800 text-neutral-50 w-max" href="#tanamanCabai">Detail</a>
                </div>
            </section>
        </div>
    </div> --}}

@endsection