@extends('components.index')

@section('content')


<section class="bg-[radial-gradient(ellipse_at_center,_var(--tw-gradient-stops))] from-gray-700 via-gray-900 to-black">
    <div class="px-4 mx-auto max-w-screen-xl text-center py-24 lg:py-56">
        <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl">Penyakit / Hama Tanaman Cabai</h1>
        <p class="mb-8 text-lg font-normal text-gray-300 lg:text-xl sm:px-16 lg:px-48">Ingin menghasilkan panen cabai yang optimal? Kenali terlebih dahulu berbagai macam penyakit/hama tanaman cabai beserta cara penanganannya.</p>
    </div>
</section>

<section class="my-2">
    <nav class="mx-auto max-w-screen-xl flex ps-6 w-4/5" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            <li class="inline-flex items-center">
                <a href="{{route("dashboard")}}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                </svg>
                Home
                </a>
            </li>

            <li aria-current="page">
                <div class="flex items-center">
                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400 ">List Penyakit</span>
                </div>
            </li>
        </ol>
    </nav>
    
    <div class="mx-auto max-w-screen-xl">
        <div class="grid justify-items-center xl:grid-cols-4 md:grid-cols-3 sm:grid-cols-1 gap-5 p-5">
            @foreach ($penyakit as $item)
                <x-card title="{{$item->name}}" routeName="detailPenyakitTanamanCabaiView" target="{{$item->id}}" desc="{{$item->description}}"/>
            @endforeach
        </div>
    </div>
</section>

@endsection