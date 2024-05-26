<div class="w-full h-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <div class="flex flex-col">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white line-clamp-1 hover:line-clamp-none">{{$title}}</h5>
        {{-- @if($addOnContent != 'null')
            @if($addOnContent != 'notChecked')
                <button type="button" class="text-white bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:ring-4 focus:ring-yellow-300 font-medium rounded-full text-sm px-2 py-1 text-center me-2 mb-2 dark:focus:ring-yellow-900">Sudah dicek</button>  
            @elseif($addOnContent == 'notChecked')
                <button type="button" class="text-white bg-red-400 hover:bg-red-500 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-2 py-1 text-center me-2 mb-2 dark:focus:ring-red-900">Belum dicek</button>
            @endif
        @endif --}}
    </div>
    <div class="h-36 w-full flex flex-col justify-between items-start border-t-2">
        <p class="mb-2 mt-2 font-normal text-gray-700 dark:text-gray-400 max-h-full line-clamp-3">{{$desc}}</p>
        <a id="button" href="{{route($routeName, $target)}}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Read more
            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
            </svg>
        </a>
    </div>
</div>