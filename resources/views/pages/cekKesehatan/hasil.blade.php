@extends('components.index')

@section('content')
    <div class="mx-auto container grid grid-cols-2 content-center min-h-screen">
        <div class="flex flex-col justify-center justify-self-center">
            <img src="{{asset('storage/image/main/result_picture.png')}}" class="h-auto w-auto"/>
        </div>

        <div class="border-4 border-slate-200 rounded-lg flex flex-col gap-3 p-8 bg-slate-50">
            <div class="flex gap-3 mb-2">
                <h1 class="text-3xl font-bold">Penyakit {{$penyakit->name}}</h1>
                {{-- <span class="self-center bg-purple-100 text-purple-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-lg dark:bg-gray-700 dark:text-purple-400 border border-purple-400">Tingkat Kepercayaan : {{$case->kemiripan_kasus}} %</span> --}}
            </div>

            <div class="flex flex-wrap gap-3 pb-4 mb-1 border-b-4">
                @foreach ($gejala as $value => $item)
                    <span class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-lg dark:bg-blue-900 dark:text-blue-300">{{$item->getSymptom()->name}}</span>
                @endforeach
            </div>

            <div class="border-2 p-3 rounded-lg flex flex-col gap-2">
                <h2 class="font-bold text-xl">Description</h2>
                <p class="indent-6">Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque velit quaerat, molestiae dolorum officia ab optio excepturi placeat quo ipsum cum, repellendus laudantium magnam, ipsam laboriosam culpa nesciunt accusantium laborum.</p>
            </div>

            <div class="border-2 p-3 rounded-lg flex flex-col gap-1">
                <h2 class="font-bold text-xl">Cara Penanganan</h2>
                <p class="indent-6">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Neque quae, nostrum earum animi magnam facilis nihil, possimus tempore fuga numquam maxime, non vel labore exercitationem perspiciatis. Laudantium hic aliquid dolore.Lorem, ipsum dolor sit amet consectetur adipisicing elit. Neque quae, nostrum earum animi magnam facilis nihil, possimus tempore fuga numquam maxime, non vel labore exercitationem perspiciatis. Laudantium hic aliquid dolore.Lorem, ipsum dolor sit amet consectetur adipisicing elit. Neque quae, nostrum earum animi magnam facilis nihil, possimus tempore fuga numquam maxime, non vel labore exercitationem perspiciatis. Laudantium hic aliquid dolore.Lorem, ipsum dolor sit amet consectetur adipisicing elit. Neque quae, nostrum earum animi magnam facilis nihil, possimus tempore fuga numquam maxime, non vel labore exercitationem perspiciatis. Laudantium hic aliquid dolore.</p>
            </div>
            
            <div class="border-2 p-3 rounded-lg flex flex-col gap-1">
                <h2 class="font-bold text-xl">Konsultasi Lebih Lanjut</h2>
                <p>Dapat langsung datang ke upt bp4 wilayah 8 <span class="font-bold">atau</span> hubungi kontak dibawah ini</p>
                <div class="flex flex-warp gap-3 my-2">
                    <i class="fa-brands fa-whatsapp text-2xl"></i>
                    <i class="fa-brands fa-instagram text-2xl"></i>
                    <i class="fa-brands fa-x-twitter text-2xl"></i>
                </div>
            </div>
        </div>
    </div>
@endsection