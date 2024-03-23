@extends('components.index')

@section('content')
<div class="flex justify-center py-10" style="height: 80%">
        <div style="background-color: #222831; color: #EEEEEE; width: 70%" class="flex rounded-xl">
            <div class="basis-3/6 flex flex-col justify-center h-full px-4 gap-1">
                <div>
                    <h1 class="text-4xl mb-2">Tambah Kasus Penyakit Cabai</h1>
                    <p>Tambahkan gejala pada suaty penyakit tanaman cabai untuk dimasukan kedalam database supaya menjadi support base knowladge sistem</p>
                </div>
            </div>

            <div style="background-color: #31363F; border-left: 5px solid #76ABAE" class=" rounded-xl px-5 basis-3/6">
                <form action="{{route('addKasus')}}" method="POST" class="w-full h-full my-6 flex flex-col justify-center gap-10">
                    @csrf
                    @method('POST')

                    <div class="w-full">
                        <label for="penyakit_target" class="block mb-2 text-sm font-medium  dark:text-white">Nama Penyakit</label>
                        <select style="color: #222831" id="penyakit_target" name="penyakit_target"  class="bg-gray-200 border border-gray-300  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                          <option disabled selected>Tentukan Penyakit</option>
                          @foreach ($listPenyakit as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>  
                          @endforeach
                        </select>
                    </div>

                    <div class="w-full h-80 overflow-auto">
                        <label class="block mb-2 text-sm font-medium ">Gejala Penyakit</label>
                        <div style="height:100%" class="grid grid-cols-1 gap-1  px-2">
                            @foreach ($listGejala as $key => $item)
                                <x-form.add-penyakit.gejala id='{{$item->id}}' name="{{$item->name}}" count={{$key}} />
                            @endforeach
                        </div>
                    </div>

                    <button type="submit" class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-gray-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 w-full">Submit</button>
                </form>
            </div>
        </div>
</div>
@endsection