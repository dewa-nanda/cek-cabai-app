@extends('components.index')

@section('content')
    <section class="bg-gray-50 dark:bg-gray-900 min-h-screen">
        <div class="py-8 px-4 mx-auto min-h-screen lg:py-16 grid lg:grid-cols-1 lg:content-center gap-4">
            
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="#" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
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
                    <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Cek Kesehatan - penentuan gejala</span>
                    </div>
                </li>
                </ol>
            </nav>
  
            <div class="flex flex-row items-center w-full">
                <div class="w-full p-6 space-y-8 sm:p-8 bg-white rounded-lg shadow-xl dark:bg-gray-800">
                    <div class="flex flex-col items-center border-b-4 pb-2">
                        <h2 class="text-2xl font-bold text-gray-900 dark:text-white">
                            Diagnosis Penyakit Cabai
                        </h2>
                    </div>

                    <form class="mt-8 space-y-6" action="{{route("bobotGejala")}}" method="POST">
                        @csrf
                        @method("GET")
                        <div class="grid grid-cols-3 gap-6">
                            @foreach ($gejala as $key => $item)
                                <div class="flex items-center">
                                    <input id="checkbox-{{$item->id}}" name="gejala[]" type="checkbox" value="{{$item->id}}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="checkbox-{{$item->id}}" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{$item->name}}</label>
                                </div>
                            @endforeach
                        </div>                      
                        
                        <button type="submit" class="w-full px-5 py-3 text-base font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 sm:w-auto dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection