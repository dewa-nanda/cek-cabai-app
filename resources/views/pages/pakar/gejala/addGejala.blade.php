@extends('components.index')

@section('content')
<div class="flex justify-center py-10" style="height: 80%">
    <div style="background-color: #222831; color: #EEEEEE; width: 70%" class="flex rounded-xl">
        <div class="basis-3/6 flex flex-col justify-center h-full px-4 gap-1">
            <div>
                <h1 class="text-4xl mb-2">Tambah Gejala Cabai</h1>
                <p>Tambahkan gejala tanaman cabai bersertakan informasinya!</p>
            </div>
        </div>

        <div style="background-color: #31363F; border-left: 5px solid #76ABAE" class="rounded-xl overflow-auto px-5 basis-3/6 flex flex-col justify-center">
            <form action="{{route('addGejalaAction')}}" method="POST" class="w-full my-6">
                @csrf
                @method('POST')

                <div class="mb-5 w-full">
                    <label for="base-input" class="block mb-2 text-sm font-medium text-white">Nama Gejala</label>
                    <input name="nama_gejala" type="text" id="base-input" class="bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Tuliskan nama gejala ...">
                </div>

                <div class="mb-5 w-full">
                    <label for="message" class="block mb-2 text-sm font-medium text-white">Deskripsi Penyakit</label>
                    <textarea name="desc" id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-200 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Tuliskan deskripsi dari penyakit ini..."></textarea>                    
                </div>

                <button type="submit" class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-gray-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 w-full">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection