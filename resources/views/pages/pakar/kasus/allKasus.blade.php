@extends('components.index')

@section('content')
<div class="min-h-screen" style="background-color: #F3F8FF">

    <section class="bg-[radial-gradient(ellipse_at_center,_var(--tw-gradient-stops))] from-gray-700 via-gray-900 to-black p-2">   
        <div class="px-4 mx-auto max-w-screen-xl text-center py-24 lg:py-20">
    
            <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl">Kasus Tanaman Cabai</h1>
            <p class="mb-8 text-lg font-normal text-gray-300 lg:text-xl sm:px-16 lg:px-48">Berikut merupakan list dari kasus-kasus tanaman cabai yang perlu dilakukan revisi, karena memiliki hasil persentase yang kurang dari batas yang sudah ditentukan oleh sistem</p>
            <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0">
                <a href="#list" class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                    Lihat Kasus tanaman cabai yang sudah divalidasi
                    <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                    </svg>
                </a>
                <a href="{{route('kasusView')}}" class="inline-flex justify-center hover:text-gray-900 items-center py-3 px-5 sm:ms-4 text-base font-medium text-center text-white rounded-lg border border-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-400">
                    Lihat kasus yang belum divalidasi
                </a>  
            </div>
        </div>
    </section>
    
    <div class="flex justify-center py-5" id="list">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg basis-3/4">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700  dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Nama
                            </th>
                            {{-- <th scope="col" class="px-6 py-3">
                                Tanggal
                            </th> --}}
                            <th scope="col" class="px-6 py-3">
                                Gejala
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Diagnosis
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Type
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($validCase as $item)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    @if ($item->user_id == null)
                                        Case-{{$item->id}}
                                    @else
                                        {{$item->getUser()->username}}
                                    @endif
                                </th>
                                
                                {{-- <td class="px-6 py-4">
                                    {{date_format($item->created_at, "Y/m/d")}}
                                </td> --}}
                                
                                <td class="px-6 py-4 flex flex-wrap gap-2">
                                    @foreach($item->getAllRelatedSymptom() as $symptom)
                                        <a href="{{route('detailGejalaTanamanCabaiView', $symptom->symptom_id)}}" class="bg-blue-100 hover:bg-blue-200 text-blue-800 text-xs font-semibold me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400 inline-flex items-center justify-center">{{$symptom->getSymptom()->name}}</a>
                                    @endforeach
                                </td>
                                
                                <td class="px-6 py-4">
                                    {{$item->getDisease()->name}}
                                </td>

                                <td class="px-6 py-4">
                                    @if($item->pakar == 1)
                                        Base Knowladge
                                    @else
                                        Suppot Knowledge
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection