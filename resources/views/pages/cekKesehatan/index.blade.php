@extends('components.index')

@section('content')
    <section class="bg-gray-50 dark:bg-gray-900 min-h-screen">
        <div class="py-8 px-4 mx-auto min-h-screen max-w-screen-xl lg:py-16 grid lg:grid-cols-2 lg:content-center gap-8 lg:gap-16">
            <div class="flex flex-row items-center gap-2">
                <div>
                    <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white">CekCabai App</h1>
                    <p class="mb-6 text-lg font-normal text-gray-500 lg:text-xl dark:text-gray-400">Aplikasi untuk membantu petani cabai dalam mengidentifikasi penyakit yang menyerang tanaman cabai.</p>
                </div>
            </div>
            <div>
                <div class="w-full lg:max-w-xl p-6 space-y-8 sm:p-8 bg-white rounded-lg shadow-xl dark:bg-gray-800">
                    <div class="flex flex-col items-center border-b-4 pb-2">
                        <img src="{{asset('storage/image/main/LOGO.png')}}" class="h-auto max-w-xs" alt="Flowbite Logo" />
                        <h2 class="text-2xl font-bold text-gray-900 dark:text-white">
                            Diagnosis Penyakit Cabai
                        </h2>
                    </div>

                    <form class="mt-8 space-y-6" action="#">
                        <div class="grid grid-cols-3 gap-6">
                            <div class="flex items-center">
                                <input id="checkbox-2" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="checkbox-2" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Gejala A</label>
                            </div>
                            <div class="flex items-center">
                                <input id="checkbox-2" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="checkbox-2" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Gejala A</label>
                            </div>
                            <div class="flex items-center">
                                <input id="checkbox-2" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="checkbox-2" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Gejala A</label>
                            </div>
                            <div class="flex items-center">
                                <input id="checkbox-2" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="checkbox-2" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Gejala A</label>
                            </div>
                            <div class="flex items-center">
                                <input id="checkbox-2" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="checkbox-2" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Gejala A</label>
                            </div>
                            <div class="flex items-center">
                                <input id="checkbox-2" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="checkbox-2" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Gejala A</label>
                            </div>
                        </div>                        
                        
                        <button type="submit" class="w-full px-5 py-3 text-base font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 sm:w-auto dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection