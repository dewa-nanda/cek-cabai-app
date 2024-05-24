@extends('components.index')

@section('content')


<section class="bg-[radial-gradient(ellipse_at_center,_var(--tw-gradient-stops))] from-gray-700 via-gray-900 to-black">
    <div class="px-4 mx-auto max-w-screen-xl text-center py-24 lg:py-56">
        <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl">Penyakit / Hama Tanaman Cabai</h1>
        <p class="mb-8 text-lg font-normal text-gray-300 lg:text-xl sm:px-16 lg:px-48">Ingin menghasilkan panen cabai yang optimal? Kenali terlebih dahulu berbagai macam penyakit/hama tanaman cabai beserta cara penanganannya.</p>
    </div>
</section>

<section>
    <div class="mx-auto max-w-screen-xl">
        <div class="grid justify-items-center xl:grid-cols-4 md:grid-cols-3 sm:grid-cols-1 gap-5 p-5">
            @foreach ($penyakit as $item)
                <x-card title="{{$item->name}}" routeName="detailPenyakitTanamanCabaiView" target="{{$item->id}}" desc="lorem ipsum sol dul amet"/>
            @endforeach
        </div>
    </div>
</section>

@endsection