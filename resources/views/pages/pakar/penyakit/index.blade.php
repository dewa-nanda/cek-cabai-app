@extends('components.index')

@section('content')
<div class="min-h-screen" style="background-color: #F3F8FF">

    <section class="bg-[radial-gradient(ellipse_at_center,_var(--tw-gradient-stops))] from-gray-700 via-gray-900 to-black p-2">   
        <div class="px-4 mx-auto max-w-screen-xl text-center py-24 lg:py-20">
    
            <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl">List Penyakit Tanaman Cabai</h1>
            <p class="mb-8 text-lg font-normal text-gray-300 lg:text-xl sm:px-16 lg:px-48">Berikut merupakan list dari penyakit tanaman cabai yang ada di UPT BP4 Wilayah VIII Prambanan</p>
            <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0">
                <a href="#list" class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                    Lihat Penyakit
                    <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                    </svg>
                </a>
            </div>
        </div>
    </section>
    
    <div class="container mx-auto my-5" id="list">
        <div class="">
            <a href="{{route('addPenyakitView')}}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-1.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Tambah Penyakit</a>
            
            <div class="my-4 relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Nama
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Desc
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Gejala
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Cara penanganan
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($listPenyakit as $item)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white max-w-24">
                                    {{$item->name}}
                                </th>

                                <th class="px-6 py-4 text-left max-w-80">
                                    <p class="line-clamp-3">{{$item->description}}</p>
                                </th>

                                <th class="px-6 py-4 flex flex-wrap gap-2">
                                    @foreach ($item->GetListOfSymptoms() as $gejala)
                                        <a href="{{route('gejalaView')}}" class="bg-gray-200 dark:bg-gray-700 dark:text-gray-400 px-2 py-1 rounded-full text-xs">{{$gejala->GetSymptoms()->name}}</a>
                                    @endforeach
                                </th>

                                <th class="px-6 py-4 text-left max-w-80">
                                    <p>{{$item->cara_penanganan}}</p>
                                </th>

                                <th class="px-6 py-4 text-left flex gap-3 ">
                                    <a href="{{route('detailKasusView', 1)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline"><i class="fa-regular fa-pen-to-square text-2xl"></i></a>
                                    <a href="{{route('detailKasusView', 1)}}" class="font-medium text-red-600 dark:text-red-500 hover:underline"><i class="fa-solid fa-trash-can text-2xl"></i></a>
                                </th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection