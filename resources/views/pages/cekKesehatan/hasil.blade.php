@extends('components.index')

@section('content')
    <div class="mx-auto container grid grid-cols-2 content-center min-h-screen">
        <div class="flex flex-col justify-center justify-self-center">
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                    <li class="inline-flex items-center">
                        <a href="{{route("dashboard")}}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                        <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                        </svg>
                        Home
                        </a>
                    </li>
                    <li class="inline-flex items-center">
                        <div class="flex items-center">
                            <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                            </svg>
                            <a href="{{route('cekKesehatanView')}}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">Cek Kesehatan - penentuan gejala</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                            </svg>
                            <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Cek Kesehatan - Hasil Diagnosis</span>
                        </div>
                    </li>
                </ol>
            </nav>
            <img src="{{asset('storage/image/main/result_picture.png')}}" class="h-auto w-auto"/>
        </div>

        <div class="border-4 border-slate-200 rounded-lg flex flex-col gap-3 p-8 my-8 bg-slate-50">
            <div class="flex gap-3 mb-2">
                <h1 class="text-3xl font-bold">Penyakit {{$penyakit->name}}</h1>
                {{-- @if($case->valid == 'valid')
                    <span class="self-center bg-purple-100 text-purple-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-lg dark:bg-gray-700 dark:text-purple-400 border border-purple-400">Valid</span>
                @else
                    <span class="self-center bg-purple-100 text-purple-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-lg dark:bg-gray-700 dark:text-purple-400 border border-purple-400">Tidak Valid</span>
                @endif

                @if($case->repaired == 0)
                    <span class="self-center bg-purple-100 text-purple-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-lg dark:bg-gray-700 dark:text-purple-400 border border-purple-400">Belum diperbaiki !</span>
                @else
                    <span class="self-center bg-purple-100 text-purple-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-lg dark:bg-gray-700 dark:text-purple-400 border border-purple-400">Sudah diperbaiki !</span>
                @endif --}}
            </div>

            <div class="flex flex-wrap gap-3 pb-4 mb-1 border-b-4">
                @foreach ($gejala as $value => $item)
                    <span class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-lg dark:bg-blue-900 dark:text-blue-300">{{$item->getSymptom()->name}}</span>
                @endforeach
            </div>

            <div class="border-2 p-3 rounded-lg flex flex-col gap-2">
                <h2 class="font-bold text-xl">Description</h2>
                <p class="indent-6">{{$penyakit->description}}</p>
            </div>

            <div class="border-2 p-3 rounded-lg flex flex-col gap-1">
                <h2 class="font-bold text-xl">Cara Penanganan</h2>
                <p class="indent-6">{{$penyakit->cara_penanganan}}</p>
            </div>
            
            <div class="border-2 p-3 rounded-lg flex flex-col gap-1">
                <h2 class="font-bold text-xl">Konsultasi Lebih Lanjut</h2>
                <p>Dapat langsung datang ke upt bp4 wilayah 8 <span class="font-bold">atau</span> hubungi kontak dibawah ini</p>
                <div class="flex flex-warp gap-3 my-2">
                    <i class="fa-brands fa-whatsapp text-2xl"></i>
                    <i class="fa-brands fa-instagram text-2xl"></i>
                    <i class="fa-brands fa-x-twitter text-2xl"></i>
                </div>
            </div>
        </div>
    </div>
@endsection