@extends('components.index')

@section('content')
    <div style="color: #EEEEEE" class="container mx-auto flex flex-row items-center min-h-screen">
        <div>
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
                  <li aria-current="page">
                    <div class="flex items-center">
                      <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                      </svg>
                      <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Input Tingkat Kepercayaan</span>
                    </div>
                  </li>
                </ol>
            </nav>

            <div style="background-color: #222831" class="flex mx-auto rounded-xl min-h-96 min-w-80 gap-5">
                    <section class="p-3 flex flex-col basis-6/12 justify-evenly">
                        <div style="border: 2px solid #76ABAE" class="flex flex-col p-2 -mb-12 rounded-xl">
                            <h1 class="text-xl">Indikasi Penyakit</h1>
                            <p class="text-3xl text-end font-bold">{{$case->getDisease()->name}}</p>
                        </div>
                        
                        <div>
                            <div style="border-bottom: 2px solid #76ABAE" class="flex flex-col gap-2 pb-2">
                                <p class="text-xl">Gejala</p>
                                <div class="flex flex-wrap gap-1">
                                    @foreach($case->getAllRelatedSymptom() as $symptom)
                                        <a href="#" class="bg-blue-100 hover:bg-blue-200 text-blue-800 text-sm font-semibold me-2 px-2.5 py-0.5 rounded-xl dark:bg-gray-700 dark:text-blue-400 border border-blue-400 inline-flex items-center justify-center">{{$symptom->getSymptom()->name}}</a>
                                    @endforeach
                                </div>
                            </div>
    
                            <div class="flex">
                                <div class="basis-1/5">
                                    <p>Pasien : 
                                        @if ($case->user_id == null)
                                            User {{$case->id}}
                                        @else
                                            {{$case->getUser()->name}}
                                        @endif
                                    </p>
                                </div>
        
                                <div class="basis-5/6">
                                    <p class="text-end">Tingkat Kepercayaan (Berdasarkan Sistem) : <span class="bg-purple-100 text-purple-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-xl dark:bg-gray-700 dark:text-purple-400 border border-purple-400">{{$case->tingkat_kepercayaan}} %</span></p>
                                </div>
                            </div>
                        </div>
    
    
    
                    </section>
            
                    <section style="background-color: #31363F; border-left: 5px solid #76ABAE" class="rounded-xl p-3 flex flex-col justify-center gap-3">
                        <div style="border-bottom: 2px solid #76ABAE" class="flex flex-col gap-1 pb-1">
                            <h1 class="text-3xl">Revisi - Tingkat Kepercayaan Terhadap Seluruh Gejala</h1>
                            <p>Isikan tingkat kepercayaan pakar terhadap kasus pada tanaman cabai disamping, supaya dapat mengetahui apakah penyakit ini cocok dimasukan kedalam database atau tidak</p>
                        </div>
    
                        <form class="flex flex-col gap-2" action="{{route('validasiKasus', $case->id)}}" method="POST">
                            @csrf
                            @method('PATCH')
    
                            <select id="input-gejala-option"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected id="input-gejala-option-default">Pilih Gejala</option>
                                @foreach($case->getAllRelatedSymptom() as $symptom)
                                    <option id="input-gejala-option-{{{$symptom->getSymptom()->id}}}" value="{{{$symptom->getSymptom()->id}}}">{{$symptom->getSymptom()->name}}</option>   
                                @endforeach
                            </select>
    
                            @foreach($case->getAllRelatedSymptom() as $key => $symptom)
                                <div id="input-gejala-tk-{{$symptom->getSymptom()->id}}" class="flex gap-3 hidden">
                                    <div class="flex flex-col gap-2 basis-6/12">
                                        <label for="tingkat_keyakinan_{{$key}}">Tingkat Keyakinan</label>
                                        <input type="number" name="case[{{$key}}][mb]" id="tingkat_keyakinan_{{$key}}" style="border: 3px solid #76ABAE; color:#31363F;" class="w-full rounded-xl border-2 p-2" placeholder="Tingkat Keyakinan">
                                    </div>
                                    <div class="flex flex-col gap-2 basis-6/12">
                                        <label for="tingkat_ketidakyakinan_{{$key}}">Tingkat Ketidakyakinan</label>
                                        <input type="number" name="case[{{$key}}][md]" id="tingkat_ketidakyakinan_{{$key}}" style="border: 3px solid #76ABAE; color:#31363F;" class="w-full rounded-xl border-2 p-2" placeholder="Tingkat Ketidakyakinan">
                                    </div>
                                </div>
                            @endforeach
    
                            <button type="submit" style="background-color: #76ABAE; color:#222831" class="bg-blue-400 text-white rounded-xl p-2 mt-2 self-start">Submit</button>
                        </form>
                    </section>
            </div>  
        </div>
    </div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        
        const data_tk = [];
        const data_option = [];

        @foreach($case->getAllRelatedSymptom() as $symptom) 
            data_tk.push(document.getElementById('input-gejala-tk-' + {{$symptom->getSymptom()->id}}));
            data_option.push(document.getElementById('input-gejala-option-' + {{$symptom->getSymptom()->id}}));
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