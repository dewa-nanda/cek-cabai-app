@extends('components.index')

@section('content')
    <div class="container mx-auto h-screen w-1/2 my-10 grid gap-6 content-center items-center">
        <h1 class="text-4xl font-bold text-center">Login</h1>

        <form class="container border-4 p-5 grid grid-rows-3 gap-3 content-center">
            <div class="flex flex-col gap-2">
                <label for="email">Email</label>
                    <input class="border-2 p-1" type="email" id="email" name="email" placeholder="Inputkan email anda">
            </div>

            <div class="flex flex-col gap-2">
                <label for="password">Password</label>
                    <input class="border-2 p-1" type="password" id="password" name="password" placeholder="Inputkan password anda">
            </div>

            <div class="flex justify-between h-fit">
                <p>Belum punya akun? <a href="{{route('registerView')}}">register</a></p>
                <input type="submit" value="Submit" class="w-fit h-fit border-2 p-1 hover:cursor-pointer">
            </div>
        </form>
    </div>
@endsection