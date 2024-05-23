@extends('components.index')

@section('content')
    <div class="flex flex-col items-center gap-4 h-full justify-center">
        <div class="w-4/5 border-4 border-slate-200 rounded-lg flex flex-col gap-3 p-8 bg-slate-50">
            <div class="flex gap-3 mb-2">
                <h1 class="text-3xl font-bold">{{$gejala->name}}</h1>
            </div>

            <div class="border-2 p-3 rounded-lg flex flex-col gap-2">
                <h2 class="font-bold text-xl">Description</h2>
                <p class="indent-6">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam odit consequuntur similique voluptatibus eaque culpa placeat temporibus reprehenderit nisi aliquam? Suscipit fuga pariatur optio iure? Aspernatur harum veniam ipsa quod!</p>
            </div>

            {{-- <div id="accordion-collapse" data-accordion="collapse" class="border-2 p-3 rounded-lg flex flex-col gap-1">
                <h2 id="accordion-collapse-heading-2" class="font-bold text-xl">
                  <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-collapse-body-2" aria-expanded="false" aria-controls="accordion-collapse-body-2">
                    <span>Kasus Terdahulu</span>
                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                    </svg>
                  </button>
                </h2>

                <div id="accordion-collapse-body-2" class="hidden" aria-labelledby="accordion-collapse-heading-2">
                  <div class="p-5 border border-gray-200 dark:border-gray-700">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Product name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Color
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Category
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Price
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        Apple MacBook Pro 17"
                                    </th>
                                    <td class="px-6 py-4">
                                        Silver
                                    </td>
                                    <td class="px-6 py-4">
                                        Laptop
                                    </td>
                                    <td class="px-6 py-4">
                                        $2999
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                  </div>
                </div>
            </div> --}}
        </div>
    </div>
@endsection