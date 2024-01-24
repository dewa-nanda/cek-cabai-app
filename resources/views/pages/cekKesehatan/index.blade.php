@extends('components.index')

@section('content')
    <div class="container mx-auto h-screen my-10 grid grid-cols-2 content-center items-center">
        <section>
            <h1 class="text-6xl font-bold text-center">Cek Kesehatan Tanaman Cabai</h1>
        </section>
        
        <section class="flex flex-col w-full h-full gap-4 border border-4 p-3" >
            <div>
                <h2 class="text-xl font-bold border-b-2">List Gejala Pada Tanaman Cabai</h2>
                <p class="text-base">Harap checklist gejala yang nampak pada tanaman cabai anda!</p>
            </div>

            <div>
                <form class="flex flex-col gap-3">
                    <div class="grid grid-cols-3 grid-flow-row justify-items-center gap-3">
                        <div>
                            <input type="checkbox" id="gejala1" name="gejala1" value="gejala1">
                                <label for="gejala1"> Gejala 1</label>
                        </div>
                        <div>
                            <input type="checkbox" id="gejala2" name="gejala2" value="gejala2">
                                <label for="gejala2"> Gejala 2</label>
                        </div>
                        <div>
                            <input type="checkbox" id="gejala3" name="gejala3" value="gejala3">
                                <label for="gejala3"> Gejala 3</label>
                        </div>
                        <div>
                            <input type="checkbox" id="gejala4" name="gejala4" value="gejala4">
                                <label for="gejala4"> Gejala 4</label>
                        </div>
                        <div>
                            <input type="checkbox" id="gejala5" name="gejala5" value="gejala5">
                                <label for="gejala5"> Gejala 5</label>
                        </div>
                        <div>
                            <input type="checkbox" id="gejala6" name="gejala6" value="gejala6">
                                <label for="gejala6"> Gejala 6</label>
                        </div>
                        <div>
                            <input type="checkbox" id="gejala6" name="gejala6" value="gejala6">
                                <label for="gejala6"> Gejala 6</label>
                        </div>
                        <div>
                            <input type="checkbox" id="gejala6" name="gejala6" value="gejala6">
                                <label for="gejala6"> Gejala 6</label>
                        </div>
                        <div>
                            <input type="checkbox" id="gejala6" name="gejala6" value="gejala6">
                                <label for="gejala6"> Gejala 6</label>
                        </div>
                    </div>
                    <input class="border p-1.5 rounded-full bg-slate-600 hover:bg-slate-800 text-neutral-50 h-max" type="submit" value="Submit">
                </form>
            </div>
        </section>
    </div>
@endsection