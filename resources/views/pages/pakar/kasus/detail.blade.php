@extends('components.index')

@section('content')
    <div style="color: #EEEEEE" class="container mx-auto flex flex-row items-center min-h-screen">
        <div style="background-color: #222831" class="flex mx-auto rounded-xl min-h-96 min-w-80 gap-5">
                <section class="p-3 flex flex-col basis-6/12 justify-evenly">
                    <div style="border: 2px solid #76ABAE" class="flex flex-col p-2 -mb-12 rounded-xl">
                        <h1 class="text-xl">Indikasi Penyakit</h1>
                        <p class="text-3xl text-end font-bold">{{$case->getDisease()->name}}</p>
                    </div>
                    
                    <div>
                        <div style="border-bottom: 2px solid #76ABAE" class="flex flex-col gap-2 pb-2">
                            <p class="text-xl">Gejala</p>
                            <div class="flex flex-wrap">
                                @foreach($case->getAllRelatedSymptom() as $symptom)
                                    <a href="#" class="bg-blue-100 hover:bg-blue-200 text-blue-800 text-sm font-semibold me-2 px-2.5 py-0.5 rounded-xl dark:bg-gray-700 dark:text-blue-400 border border-blue-400 inline-flex items-center justify-center">{{$symptom->getSymptom()->name}}</a>
                                @endforeach
                            </div>
                        </div>

                        <div class="flex">
                            <div class="basis-3/6">
                                <p>Pasien : 
                                    @if ($case->user_id == null)
                                        User {{$case->id}}
                                    @else
                                        {{$case->getUser()->name}}
                                    @endif
                                </p>
                            </div>
    
                            <div class="basis-3/6">
                                <p>Tingkat Kepercayaan : <span class="bg-purple-100 text-purple-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-xl dark:bg-gray-700 dark:text-purple-400 border border-purple-400">{{$case->tingkat_kepercayaan}} %</span></p>
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
                        @method('POST')

                        <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected id="input-gejala-option-default">Pilih Gejala</option>
                            @foreach($case->getAllRelatedSymptom() as $symptom)
                                <option id="input-gejala-option-{{{$symptom->getSymptom()->id}}}" value="{{{$symptom->getSymptom()->id}}}">{{$symptom->getSymptom()->name}}</option>   
                            @endforeach
                        </select>

                        @foreach($case->getAllRelatedSymptom() as $key => $symptom)
                            <div id="input-gejala-tk-{{$symptom->getSymptom()->id}}" class="flex gap-3 hidden">
                                <div class="flex flex-col gap-2 basis-6/12">
                                    <label for="tingkat_kepercayaan">Tingkat Keyakinan</label>
                                    <input type="number" name="case[{{$key}}][mb]" id="tingkat_kepercayaan" style="border: 3px solid #76ABAE" class="w-full rounded-xl border-2 p-2" placeholder="Tingkat Kepercayaan">
                                </div>
                                <div class="flex flex-col gap-2 basis-6/12">
                                    <label for="tingkat_kepercayaan">Tingkat Ketidakyakinan</label>
                                    <input type="number" name="case[{{$key}}][md]" id="tingkat_kepercayaan" style="border: 3px solid #76ABAE" class="w-full rounded-xl border-2 p-2" placeholder="Tingkat Ketidakyakinan">
                                </div>
                            </div>
                        @endforeach

                        <button type="submit" style="background-color: #76ABAE; color:#222831" class="bg-blue-400 text-white rounded-xl p-2 mt-2 self-start">Submit</button>
                    </form>
                </section>
        </div>  
    </div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const data_tk = [];

        document.getElementById('input-gejala-option-default').addEventListener('click', function() {
            data_tk.forEach((item,index,arr) => {
                item.classList.add('hidden');
            })
        });

        @foreach($case->getAllRelatedSymptom() as $symptom) 
            data_tk.push(document.getElementById('input-gejala-tk-' + {{$symptom->getSymptom()->id}}));
        @endforeach

        @foreach($case->getAllRelatedSymptom() as $symptom) 
            document.getElementById('input-gejala-option-' + {{$symptom->getSymptom()->id}}).addEventListener('click', function() {
                if (document.getElementById('input-gejala-option-' + {{$symptom->getSymptom()->id}}).selected == true){
                    data_tk.forEach((item,index,arr) => {
                        if(item.id != 'input-gejala-tk-' + {{$symptom->getSymptom()->id}})
                        {
                            item.classList.add('hidden');
                            console.log("test");
                        }else{
                            item.classList.remove('hidden');
                        }
                    })
                }
            });
        @endforeach


    });
</script>