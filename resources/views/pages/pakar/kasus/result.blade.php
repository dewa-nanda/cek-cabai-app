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
                <section class="p-3 flex flex-col justify-evenly" style="width: 40%">
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
        
                <section style="background-color: #31363F; border-left: 5px solid #76ABAE; width:60%" class="rounded-xl p-3 flex flex-col justify-center gap-3">
                    <div style="border-bottom: 2px solid #76ABAE" class="flex flex-col gap-1 pb-1">
                        <h1 class="text-3xl">Hasil Tingkat Kepercayaan <span class="bg-purple-100 text-purple-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-xl dark:bg-gray-700 dark:text-purple-400 border border-purple-400">
                          @if ($case->valid == 'notValid')
                            Tidak Valid
                          @else
                            Valid
                          @endif
                          </span>
                        </h1> 
                        <p>Berikut merupakan hasil tingkat kepercayaan yang dihitung menggunakan metode certainty factor!</p>
                    </div>

                    @if ($case->valid == 'notValid')
                        <div class="flex flex-col gap-4">
                          <div>
                              <p>Tingkat Kepercayaan <span class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-blue-900 dark:text-blue-300">Berdasarkan Pengetahuan Pakar</span> : < 75 (dibawah threshold)</p>  
                          </div>

                          <button data-modal-target="extralarge-modal" data-modal-toggle="extralarge-modal" class="block w-full md:w-auto text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                            Perbaiki Pengetahuan
                          </button>

                          <!-- Extra Large Modal -->
                          <form method="POST" action="{{route('kasusUpdateDisease', $case->id)}}">
                            @csrf
                            @method('PATCH')
                            <div id="extralarge-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                              <div class="relative w-full max-w-7xl max-h-full">
                                  <!-- Modal content -->
                                  <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                      <!-- Modal header -->
                                      <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                          <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                                              Perbaiki Pengetahuan
                                          </h3>
                                          <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="extralarge-modal">
                                              <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                              </svg>
                                              <span class="sr-only">Close modal</span>
                                          </button>
                                      </div>

                                      <!-- Modal body -->
                                      <div class="p-4 md:p-5 space-y-4">

                                        <div id="accordion-open" data-accordion="open">
                                          <h2 id="accordion-open-heading-1">
                                            <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-open-body-1" aria-expanded="true" aria-controls="accordion-open-body-1">
                                              <span class="flex items-center"><svg class="w-5 h-5 me-2 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path></svg> Bobot Kepercayaan Gejala Terhadap Penyakit</span>
                                              <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                                              </svg>
                                            </button>
                                          </h2>
                                          <div id="accordion-open-body-1" class="hidden" aria-labelledby="accordion-open-heading-1">
                                            <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                                              @foreach($case->getAllRelatedSymptom() as $symptom)
                                                <div class="flex flex-col gap-1">
                                                  <div>
                                                    <a href="#" class="flex-none bg-blue-100 hover:bg-blue-200 text-blue-800 text-sm font-semibold me-2 px-2.5 py-0.5 rounded-xl dark:bg-gray-700 dark:text-blue-400 border border-blue-400 inline-flex items-center justify-center">{{$symptom->getSymptom()->name}}</a>
                                                  </div>
                                                  
                                                  <div>
                                                    <div class="flex justify-between">
                                                      <p class="text-black">Bobot Kepercayaan</p>
                                                      @if($symptom->bobot_kepercayaan != 0)
                                                        <p class="text-black">{{$symptom->bobot_kepercayaan}}% (berdasarkan kasus sebelumnya)</p>
                                                      @else
                                                        <p class="text-black">Belum teridentifikasi</p>
                                                      @endif
                                                    </div>

                                                    <div class="w-full h-4 mb-4 bg-gray-200 rounded-full dark:bg-gray-700">
                                                      @if($symptom->bobot_kepercayaan != 0)
                                                        <div class="h-4 bg-blue-600 rounded-full dark:bg-blue-500" style="width: {{$symptom->bobot_kepercayaan}}%"></div>
                                                      @else
                                                        <div class="h-4 bg-blue-600 rounded-full dark:bg-blue-500" style="width: 0%"></div>
                                                      @endif
                                                    </div>
                                                  </div>
                                                </div>
                                              @endforeach
                                            </div>

                                            @if($updateSymptom != null)
                                              <div>
                                                <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                                                  <h2 class="text-black">Tentukan tingkat keyakinan gejala terhadap penyakit tanaman cabai yang belum teridentifikasi</h2>
                                                  <select id="input-gejala-option" name="update_gejala" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    <option selected>Pilih Gejala Yang Akan di Update Terlebih dahulu</option>
                                                    @foreach($updateSymptom as $symptom)
                                                        <option class="text-black" value="{{$symptom->id}}" id="data-option-{{$symptom->id}}">{{$symptom->getSymptom()->name}}</option>
                                                    @endforeach
                                                  </select>
                                                </div>

                                                @foreach($updateSymptom as $symptom)
                                                  <div id="update-gejala-{{$symptom->id}}" class="px-5 pb-5 border border-t-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900 text-black hidden">
                                                    <h3 class="dark:text-white mb-2">Tentukan tingkat kerusakan gejala ini yang berpengaruh terhadap gejala yang akan ditentukan</h3>
                                                    <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                                        <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                                            <div class="flex items-center ps-3">
                                                                <input id="sp-{{$symptom->id}}" type="radio" value="90" name="tp[{{$symptom->id}}]" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                                                <label for="sp-{{$symptom->id}}" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Sangat Berpengaruh</label>
                                                            </div>
                                                        </li>
            
                                                        <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                                            <div class="flex items-center ps-3">
                                                                <input id="p-{{$symptom->id}}" type="radio" value="70" name="tp[{{$symptom->id}}]" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                                                <label for="p-{{$symptom->id}}" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Berpengaruh</label>
                                                            </div>
                                                        </li>
            
                                                        <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                                            <div class="flex items-center ps-3">
                                                                <input id="n-{{$symptom->id}}" type="radio" value="50" name="tp[{{$symptom->id}}]" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                                                <label for="n-{{$symptom->id}}" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Cukup Berpengaruh</label>
                                                            </div>
                                                        </li>
            
                                                        <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                                            <div class="flex items-center ps-3">
                                                                <input id="tp-{{$symptom->id}}" type="radio" value="30" name="tp[{{$symptom->id}}]" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                                                <label for="tp-{{$symptom->id}}" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tidak Terlalu Berpengaruh</label>
                                                            </div>
                                                        </li>
            
                                                        <li class="w-full dark:border-gray-600">
                                                            <div class="flex items-center ps-3">
                                                                <input id="stp-{{$symptom->id}}" type="radio" value="0" name="tp[{{$symptom->id}}]" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                                                <label for="stp-{{$symptom->id}}" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tidak Berpengaruh</label>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                  </div>
                                                @endforeach
                                              </div>
                                            @endif
                                          </div>

                                          <h2 id="accordion-open-heading-2">
                                            <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-open-body-2" aria-expanded="false" aria-controls="accordion-open-body-2">
                                              <span class="flex items-center"><svg class="w-5 h-5 me-2 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path></svg>Tentukan Penyakit Yang Cocok Terhadap Kasus Ini</span>
                                              <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                                              </svg>
                                            </button>
                                          </h2>
                                          <div id="accordion-open-body-2" class="hidden" aria-labelledby="accordion-open-heading-2">
                                            <div class="p-5 border border-b-2 border-gray-200 dark:border-gray-700">
                                              <select id="countries" name="disease_target" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                <option selected>Pilih Penyakit Yang Cocok</option>
                                                @foreach ($disease as $disease)
                                                  <option value="{{$disease->id}}">{{$disease->name}}</option>
                                                @endforeach
                                              </select>
                                            </div>
                                          </div>
                                        </div>
                                                                              
                                      </div>

                                      <!-- Modal footer -->
                                      <div class="flex items-center p-4 md:p-5 space-x-3 rtl:space-x-reverse border-t border-gray-200 rounded-b dark:border-gray-600">
                                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                                      </div>
                                  </div>
                              </div>
                            </div>
                          </form>
                        </div>                        
                      @else
                        <div class="flex">
                            <a href="{{route('detailKasusView', $case->id)}}"  class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">Edit <i class="fa-solid fa-pen-to-square"></i></a>
                            <button data-modal-target="extralarge-modal" data-modal-toggle="extralarge-modal" class="block w-full md:w-auto text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 mb-2 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                              Lengkapi Pengetahuan
                            </button>

                            <!-- Extra Large Modal -->
                            <form method="POST" action="{{route('kasusUpdateDisease', $case->id)}}">
                              @csrf
                              @method('PATCH')
                              <div id="extralarge-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative w-full max-w-7xl max-h-full">
                                    <!-- Modal content -->
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                        <!-- Modal header -->
                                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                            <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                                                Perbaiki Pengetahuan
                                            </h3>
                                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="extralarge-modal">
                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                        </div>

                                        <!-- Modal body -->
                                        <div class="p-4 md:p-5 space-y-4">

                                          <div id="accordion-open" data-accordion="open">
                                            <h2 id="accordion-open-heading-1">
                                              <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-open-body-1" aria-expanded="true" aria-controls="accordion-open-body-1">
                                                <span class="flex items-center"><svg class="w-5 h-5 me-2 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path></svg> Tingkat Kerusakan Gejala Terhadap Penyakit</span>
                                                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                                                </svg>
                                              </button>
                                            </h2>
                                            <div id="accordion-open-body-1" class="hidden" aria-labelledby="accordion-open-heading-1">

                                              @if($updateSymptom != null)
                                                <div>
                                                  <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                                                    <h2 class="text-black">Tentukan tingkat keyakinan gejala terhadap penyakit tanaman cabai {{$case->getDisease()->name}}</h2>
                                                    <select id="input-gejala-option" name="update_gejala" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                      <option selected>Pilih Gejala Yang Akan di Update Terlebih dahulu</option>
                                                      @foreach($updateSymptom as $symptom)
                                                          <option class="text-black" value="{{$symptom->id}}" id="data-option-{{$symptom->id}}">{{$symptom->getSymptom()->name}}</option>
                                                      @endforeach
                                                    </select>
                                                  </div>

                                                  @foreach($updateSymptom as $symptom)
                                                    <div id="update-gejala-{{$symptom->id}}" class="px-5 pb-5 border border-t-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900 text-black hidden">
                                                      <h3 class="dark:text-white mb-2">Tentukan tingkat keyakinan gejala terhadap penyakit tanaman cabai</h3>
                                                      <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                                          <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                                              <div class="flex items-center ps-3">
                                                                  <input id="sp-{{$symptom->id}}" type="radio" value="100" name="tp[{{$symptom->id}}]" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                                                  <label for="sp-{{$symptom->id}}" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Sangat Yakin</label>
                                                              </div>
                                                          </li>

                                                          <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                                              <div class="flex items-center ps-3">
                                                                  <input id="p-{{$symptom->id}}" type="radio" value="75" name="tp[{{$symptom->id}}]" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                                                  <label for="p-{{$symptom->id}}" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Yakin</label>
                                                              </div>
                                                          </li>

                                                          <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                                              <div class="flex items-center ps-3">
                                                                  <input id="n-{{$symptom->id}}" type="radio" value="50" name="tp[{{$symptom->id}}]" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                                                  <label for="n-{{$symptom->id}}" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Cukup Yakin</label>
                                                              </div>
                                                          </li>

                                                          <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                                              <div class="flex items-center ps-3">
                                                                  <input id="tp-{{$symptom->id}}" type="radio" value="25" name="tp[{{$symptom->id}}]" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                                                  <label for="tp-{{$symptom->id}}" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tidak Terlalu Yakin</label>
                                                              </div>
                                                          </li>
                                                      </ul>
                                                    </div>
                                                  @endforeach
                                                </div>
                                              @endif
                                            </div>

                                          </div>
                                                                                
                                        </div>

                                        <!-- Modal footer -->
                                        <div class="flex items-center p-4 md:p-5 space-x-3 rtl:space-x-reverse border-t border-gray-200 rounded-b dark:border-gray-600">
                                          <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                                        </div>
                                    </div>
                                </div>
                              </div>
                            </form>                           
                            
                        </div>
                      @endif
                    </div>
                </section>
            </div>  
        </div>
    </div>
@endsection

<script>
  document.addEventListener('DOMContentLoaded', function() {
      const data_tk = [];
      const data_option = [];

      @foreach($updateSymptom as $symptom) 
        data_tk.push(document.getElementById("update-gejala-" + {{$symptom->id}}));
        data_option.push(document.getElementById('data-option-' + {{$symptom->id}}));
      @endforeach      

      document.getElementById('input-gejala-option').addEventListener('click', function() {
          data_option.forEach((item,index,arr) => {
              if(item.selected == true){
                data_tk[index].classList.remove('hidden');
              }else{
                  data_tk[index].classList.add('hidden');}
          })
      });
  });
</script>