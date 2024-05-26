@extends('components.index')

@section('content')
    <section class="bg-gray-50 dark:bg-gray-900 min-h-screen">
        <div class="py-8 px-4 mx-auto min-h-screen lg:py-16 grid lg:grid-cols-1 lg:content-center gap-4">
            

            @if (session('error'))
                <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                    <span class="font-medium">{{ session('error') }}</span>
                </div>
            @endif
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="{{route("dashboard")}}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                    <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                    </svg>
                    Home
                    </a>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                    <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                    <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Cek Kesehatan - penentuan gejala</span>
                    </div>
                </li>
                </ol>
            </nav>
  
            <div class="flex flex-row items-center w-full">
                <div class="w-full p-6 space-y-8 sm:p-8 bg-white rounded-lg shadow-xl dark:bg-gray-800">
                    <div class="flex flex-col items-center border-b-4 pb-2">
                        <h2 class="text-2xl font-bold text-gray-900 dark:text-white">
                            Diagnosis Penyakit Cabai
                        </h2>
                    </div>

                    <form class="mt-8 space-y-6" action="{{route("cekKesehatanAction")}}" method="POST">
                        @csrf
                        @method("POST")

                        <div class="flex flex-col gap-6">

                            <!-- Modal toggle -->
                            <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" class="width-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 w-max" type="button">
                                Tambah Gejala
                            </button>
                        
                            <!-- Main modal -->
                            <div id="authentication-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative p-4 w-full max-w-md max-h-full">
                                    <!-- Modal content -->
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                        <!-- Modal header -->
                                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                Tambah Gejala
                                            </h3>
                                            <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="authentication-modal">
                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                        </div>
                                        
                                        <!-- Modal body -->
                                        <div class="p-4 md:p-5">
                                            @foreach ($gejala as $key => $item)
                                                <div class="flex items-center">
                                                    <input id="checkbox-{{$item->id}}" type="checkbox" value="{{$item->id}}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                    <label id="{{$item->id}}" for="checkbox-{{$item->id}}" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{$item->name}}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                        
                                        <!-- Modal footer -->
                                        <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                                            <button id="add-gejala" data-modal-hide="authentication-modal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I accept</button>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            
                            <div id="gejala-user" class="flex flex-wrap gap-3">
                            </div>
                        </div>                      

                        <div class="flex flex-col border-t-4 pt-2">
                            <button type="submit" class="w-full px-5 py-3 text-base font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 sm:w-auto dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 disabled:opacity-75">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

<script>
    function tambahElement(name, id){
        let element = `<div id="content-${id}" class="flex gap-2 border border-red-500 rounded-lg w-fit">
                                    <div style="flex-basis: 90%" class="px-2">
                                        <p>${name}</p>
                                        <input value="${id}" name="gejala[]" class="hidden">
                                    </div>
        
                                    <div id="delete-${id}" style="flex-basis: 10%" class="border-s-2 ps-2 rounded-e-lg hover:bg-slate-400 px-2 flex flex-col justify-center">
                                        <p class='text-center'><i class="fa-solid fa-xmark basis-full"></i></p>
                                    </div>
                                </div>`;

        return element;
    }

    document.addEventListener("DOMContentLoaded", function(event){
        
        let gejala = [];
        
        let gejala_user = document.getElementById("gejala-user");

        document.getElementById("add-gejala").addEventListener("click", function() {
            let checkboxes = document.querySelectorAll("input[type=checkbox]:checked");
            let temp = [];
            checkboxes.forEach((checkbox) => {
                if(gejala.includes(checkbox.value)) return;

                gejala.push(checkbox.value);
                temp.push(checkbox.value);

                let nama_gejala = document.getElementById(checkbox.value).textContent
                gejala_user.innerHTML += tambahElement(nama_gejala, checkbox.value);
            });

            temp.forEach((item) => {
                document.getElementById(`delete-${item}`).addEventListener("click", function() {
                    gejala = gejala.filter((gejala) => gejala != item);
                    document.getElementById(`content-${item}`).remove();
                });
            });

            checkboxes.forEach((checkbox) => {
                checkbox.checked = false;
            });
        });    

    });

</script>