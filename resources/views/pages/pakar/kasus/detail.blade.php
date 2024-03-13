@extends('components.index')

@section('content')
    <div class="container mx-auto flex flex-row items-center min-h-96">
        <div class="flex items-stretch w-9/12 h-full mx-auto">
                <section class="basis-1/2 border-2">
                    <h1>Indikasi Penyakit : {{$case->getDisease()->name}}</h1>
                    <p>
                        @if ($case->user_id == null)
                            User {{$case->id}}
                        @else
                            {{$case->getUser()->name}}
                        @endif
                    </p>
                    <p>Tingkat Kepercayaan : {{$case->tingkat_kepercayaan}} %</p>
                    <p>Gejala : </p>
                    @foreach($case->getAllRelatedSymptom() as $symptom)
                        <a href="#" class="bg-blue-100 hover:bg-blue-200 text-blue-800 text-xs font-semibold me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400 inline-flex items-center justify-center">{{$symptom->getSymptom()->name}}</a>
                    @endforeach
                </section>
        
                <section class="basis-1/2 border-2">
                    <h1>Action</h1>

                    <div>
                        <label>Tingkat Kepercayaan</label>
                        <input type="number">
                        <label>Tingkat Ketidakpercayaan</label>
                        <input type="number">
                    </div>
                </section>
        </div>  
    </div>
@endsection