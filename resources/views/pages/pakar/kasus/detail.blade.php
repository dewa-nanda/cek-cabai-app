@extends('components.index')

@section('content')
    <div class="container mx-auto flex flex-col gap-2 min-h-screen justify-center">
        <section class="bg-gray-200 p-3 rounded-md">
            <h1 class="border-b-4 border-indigo-500">Kasus 1 - Navaya Helena</h1>
            <div>
                <p>Gejala : </p>
                <button type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-0.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Gejala A</button>
                <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-0.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Gejala B</button>
            </div>
            <p>Presentase : 45%</p>
            <p>Diagnosis : Penyakit A</p>
        </section>

        <section class="flex flex-col items-center p-4 w-full gap-3">
            <h1>Apakah Kasus Ini Perlu Untuk Dimasukan Kedalam Basis Pengetahuan?</h1>
            <div>
                <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Ya</button>
                <button type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Tidak</button>
            </div>
        </section>
    </div>


@endsection