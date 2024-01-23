@extends('components.index')

@section('content')
    <div class="grid grid-cols-2 h-screen">
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

    <div class="flex justify-center justify-items-center items-center h-screen" id="tanamanCabai">
        <section class="flex flex-col gap-4 items-center w-4/5">
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

    <div class="flex justify-center justify-items-center items-center h-screen" id="listTanaman">
    </div>

    <div class="flex justify-center justify-items-center items-center h-screen" id="listPenyakit">
    </div>
@endsection