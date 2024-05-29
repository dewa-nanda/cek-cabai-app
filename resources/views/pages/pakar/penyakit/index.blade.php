@extends('components.index')

@section('content')
<div class="min-h-screen" style="background-color: #F3F8FF">

    <section class="bg-[radial-gradient(ellipse_at_center,_var(--tw-gradient-stops))] from-gray-700 via-gray-900 to-black p-2">   
        @if (session('success'))
            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-100 dark:bg-gray-800 dark:text-green-400" role="alert">
                <span class="font-medium">{{ session('success') }}</span>
            </div>
        @endif
        
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
        <div class="py-4">
            <a href="{{route('addPenyakitView')}}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-1.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Tambah Penyakit</a>
            <a href="{{route('addKasusView')}}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-1.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Tambah Kasus</a>
            
            <div class="my-4 relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Nama
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Gejala (Base Knowledge)
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
                                
                                <th class="px-6 py-4 text-left flex flex-wrap gap-2">
                                    @foreach ($item->GetListOfSymptoms() as $gejala)
                                        <a href="{{route('gejalaView')}}" class="bg-gray-200 dark:bg-gray-700 dark:text-gray-400 px-2 py-1 rounded-full text-xs">{{$gejala->getSymptom()->name}}</a>
                                    @endforeach
                                </th>
                                
                                <th class="px-6 py-4 text-left">
                                    <div class="flex gap-2">
                                        <button data-modal-target="large-modal-{{$item->id}}" data-modal-toggle="large-modal-{{$item->id}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline" type="button">
                                            <i class="fa-regular fa-eye text-2xl"></i>
                                        </button>
                                        
                                        <!-- Extra Large Modal -->
                                        <div id="large-modal-{{$item->id}}" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                            <div class="relative w-full max-w-7xl max-h-full">
                                                <!-- Modal content -->
                                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                    <!-- Modal header -->
                                                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                        <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                                                            Penyakit {{$item->name}}
                                                        </h3>
                                                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="large-modal-{{$item->id}}">
                                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                            </svg>
                                                            <span class="sr-only">Close modal</span>
                                                        </button>
                                                    </div>
                                                    <!-- Modal body -->
                                                    <div class="p-4 md:p-5 space-y-4">  
                                                        <div id="accordion-flush-{{$item->id}}" data-accordion="collapse" data-active-classes="bg-white dark:bg-gray-900 text-gray-900 dark:text-white" data-inactive-classes="text-gray-500 dark:text-gray-400">
                                                            <h2 id="accordion-flush-heading-desc-{{$item->id}}">
                                                              <button type="button" class="flex items-center justify-between w-full py-5 font-medium rtl:text-right text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400 gap-3" data-accordion-target="#accordion-flush-body-desc-{{$item->id}}" aria-expanded="true" aria-controls="accordion-flush-body-desc-{{$item->id}}">
                                                                <span>Deskripsi</span>
                                                                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                                                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                                                                </svg>
                                                              </button>
                                                            </h2>
                                                            <div id="accordion-flush-body-desc-{{$item->id}}" class="hidden" aria-labelledby="accordion-flush-heading-desc-{{$item->id}}">
                                                              <div class="py-5 border-b border-gray-200 dark:border-gray-700">
                                                                <p class="mb-2 text-gray-500 dark:text-gray-400">{{$item->description}}</p>
                                                              </div>
                                                            </div>

                                                            <h2 id="accordion-flush-heading-cp-{{$item->id}}">
                                                              <button type="button" class="flex items-center justify-between w-full py-5 font-medium rtl:text-right text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400 gap-3" data-accordion-target="#accordion-flush-body-cp-{{$item->id}}" aria-expanded="true" aria-controls="accordion-flush-body-cp-{{$item->id}}">
                                                                <span>Cara Penanganan</span>
                                                                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                                                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                                                                </svg>
                                                              </button>
                                                            </h2>
                                                            <div id="accordion-flush-body-cp-{{$item->id}}" class="hidden" aria-labelledby="accordion-flush-heading-cp-{{$item->id}}">
                                                              <div class="py-5 border-b border-gray-200 dark:border-gray-700">
                                                                <p class="mb-2 text-gray-500 dark:text-gray-400">{{$item->cara_penanganan}}</p>
                                                              </div>
                                                            </div>

                                                            <h2 id="accordion-flush-heading-kp-{{$item->id}}">
                                                              <button type="button" class="flex items-center justify-between w-full py-5 font-medium rtl:text-right text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400 gap-3" data-accordion-target="#accordion-flush-body-kp-{{$item->id}}" aria-expanded="true" aria-controls="accordion-flush-body-kp-{{$item->id}}">
                                                                <span>List kasus dari pakar</span>
                                                                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                                                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                                                                </svg>
                                                              </button>
                                                            </h2>

                                                            <div id="accordion-flush-body-kp-{{$item->id}}" class="hidden" aria-labelledby="accordion-flush-heading-kp-{{$item->id}}">
                                                              <div class="py-5 border-b border-gray-200 dark:border-gray-700">
                                                                <div style="max-height: 50%" class="relative overflow-auto shadow-md sm:rounded-lg">
                                                                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                                                            <tr>
                                                                                <th scope="col" class="px-6 py-3">
                                                                                    No
                                                                                </th>
                                                                                <th scope="col" class="px-6 py-3">
                                                                                    Gejala
                                                                                </th>
                                                                                <th scope="col" class="px-6 py-3">
                                                                                    Keterangan
                                                                                </th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @foreach ($item->GetListOfCase(1) as $key => $case)
                                                                                <tr>
                                                                                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                                                        {{$key+1}}
                                                                                    </td>

                                                                                    <td class="px-6 py-4 flex flex-wrap gap-3">
                                                                                        @foreach ($case->getAllRelatedSymptom() as $singleCase)
                                                                                            <a href="{{route('gejalaView')}}" class="bg-gray-200 dark:bg-gray-700 dark:text-gray-400 px-2 py-1 rounded-full text-xs">{{$singleCase->getSymptom()->name}}</a>
                                                                                        @endforeach
                                                                                    </td>
                                                                                    
                                                                                    <td class="px-6 py-4">
                                                                                        @if ($case->pakar == 1)
                                                                                            Base Knowledge
                                                                                        @else
                                                                                            Support Knowledge
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
                                                    </div>
                                                    <!-- Modal footer -->
                                                    <div class="flex items-center p-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                                                        <a href="{{route("editPenyakitView", $item->id)}}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Edit</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <a href="{{route('detailKasusView', $item->id)}}" class="font-medium text-red-600 dark:text-red-500 hover:underline"><i class="fa-solid fa-trash-can text-2xl"></i></a>
                                    </div>
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