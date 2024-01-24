@extends('components.index')

@section('content')
    <div class="container mx-auto h-screen w-1/2 my-10 grid gap-6 content-center items-center">
        <h1 class="text-4xl font-bold text-center">Buat Akun</h1>

        <form class="container border-4 p-5 grid grid-rows-3 gap-3 content-center">
            <div class="flex flex-col gap-2">
                <label for="fname">Nama</label>
                    <input class="border-2 p-1" type="text" id="fname" name="fname" value="John">
            </div>

            <div class="flex flex-col gap-2">
                <label for="fname">Email</label>
                    <input class="border-2 p-1" type="text" id="fname" name="fname" value="John">
            </div>

            <div class="flex flex-col gap-2">
                <label for="lname">Password</label>
                    <input class="border-2 p-1" type="text" id="lname" name="lname" value="Doe">
            </div>

            <div class="flex justify-between">
                <p>Sudah punya akun? <a href="{{route('loginView')}}">login</a></p>
                <input type="submit" value="Submit" class="w-fit h-fit border-2 p-1 hover:cursor-pointer">
            </div>
        </form>
    </div>
@endsection