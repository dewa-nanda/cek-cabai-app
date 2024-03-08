@extends('components.index')

@section('content')
<div class="">

    <section class="container mx-auto grid content-center h-screen grid-cols-2">

        <div class="bg-slate-600 text-slate-50 rounded-s-lg flex flex-col justify-center px-5" style="background-color: #EEEDEB; color:#747264">
            <h1 class="text-6xl mb-2 pb-2 border-b-2 border-gray-300">Tambah Gejala Tanaman Cabai</h1>
            <p class="text-md">Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita iste facilis modi repellat? Accusantium cumque quas temporibus non? Quas alias quibusdam laudantium delectus nam doloremque consectetur facilis dolor dolore nobis.</p>
        </div>

        <div class=" bg-slate-300 p-4 rounded-e-lg" style="background-color: #E0CCBE; color:#3C3633">
            <form action="{{route('addGejalaAction')}}" method="POST">
                @csrf
                @method('POST')

                <div class="mb-5">
                    <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Gejala</label>
                    <input name="nama_gejala" type="text" id="base-input" class="bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Tuliskan nama gejala ...">
                </div>
                <div class="mb-5">
                    <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi Penyakit</label>
                    <textarea name="desc" id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-200 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Tuliskan deskripsi dari penyakit ini..."></textarea>                    
                </div>

                <button type="submit" class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-gray-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 w-full">Submit</button>
            </form>
        </div>

    </section>
</div>
@endsection