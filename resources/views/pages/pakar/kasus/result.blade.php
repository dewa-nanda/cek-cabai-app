@extends('components.index')

@section('content')
    <div style="color: #EEEEEE" class="container mx-auto flex flex-row items-center min-h-screen">
        <div class="mx-auto">
            <!-- Breadcrumb -->
            <nav class="ms-2 mb-2 flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                  <li class="inline-flex items-center">
                    <a href="{{route('kasusView')}}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                      <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                      </svg>
                      List Kasus
                    </a>
                  </li>
                  <li>
                    <div class="flex items-center">
                      <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                      </svg>
                      <a class="ms-1 text-sm font-medium text-gray-700 dark:text-gray-400 dark:hover:text-white">Input Tingkat Kepercayaan</a>
                    </div>
                  </li>
                  <li aria-current="page">
                    <div class="flex items-center">
                      <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                      </svg>
                      <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Hasil Tingkat Kepercayaan</span>
                    </div>
                  </li>
                </ol>
            </nav>
              
  
            <div style="background-color: #222831; min-width:50%" class="flex mx-auto rounded-xl min-h-96 gap-5">
                <section class="p-3 flex flex-col justify-evenly">
                    <div style="border-bottom: 2px solid #76ABAE" class="flex flex-col p-2 -mb-12 rounded-xl">
                        <h1 class="text-xl">Indikasi Penyakit</h1>
                        <p class="text-3xl text-end font-bold">{{$case->getDisease()->name}}</p>
                    </div>
                    
                    <div>
                        <div class="flex flex-col gap-2 pb-2">
                            <p class="text-xl">Gejala</p>
                            <div class="flex flex-wrap gap-1">
                                @foreach($case->getAllRelatedSymptom() as $symptom)
                                    <a href="#" class="bg-blue-100 hover:bg-blue-200 text-blue-800 text-sm font-semibold me-2 px-2.5 py-0.5 rounded-xl dark:bg-gray-700 dark:text-blue-400 border border-blue-400 inline-flex items-center justify-center">{{$symptom->getSymptom()->name}}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>



                </section>
        
                <section style="background-color: #31363F; border-left: 5px solid #76ABAE" class="rounded-xl p-3 flex flex-col justify-center gap-3">
                    <div style="border-bottom: 2px solid #76ABAE" class="flex flex-col gap-1 pb-1">
                        <h1 class="text-3xl">Hasil Tingkat Kepercayaan <span class="bg-purple-100 text-purple-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-xl dark:bg-gray-700 dark:text-purple-400 border border-purple-400">Valid</span></h1> 
                        <p>Berikut merupakan hasil tingkat kepercayaan yang dihitung menggunakan metode certainty factor!</p>
                    </div>

                    <div class="flex flex-col gap-4">
                        <div>
                            <p>Tingkat Kepercayaan <span class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-blue-900 dark:text-blue-300">Berdasarkan Pengetahuan Pakar</span> : {{$case->tingkat_kepercayaan}} %</p>
                        </div>
                        @if ($case->valid == 0)
                            <div>
                                <a href="{{route('detailKasusView', $case->id)}}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Lihat Cara Perhitungan <i class="fa-regular fa-circle-question"></i></a>
                                <button type="button" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">Edit <i class="fa-solid fa-pen-to-square"></i></button>
                            </div>
                        @else
                            <div>
                                <a href="{{route('detailKasusView', $case->id)}}"  class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">Edit <i class="fa-solid fa-pen-to-square"></i></a>
                            </div>
                        @endif
                    </div>
                </section>
            </div>  
        </div>
    </div>
@endsection