<div class="flex flex-col gap-2">
    <div>
        <input name="gejala[][id]" value="{{$id}}" id="gejala-{{$id}}" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" >
        <label for="gejala-{{$id}}" class="bg-red-100 hover:bg-red-200 text-red-800 text-xs font-semibold me-2 px-2.5 py-0.5 rounded dark:bg-red-700 dark:text-red-400 border border-red-400 inline-flex items-center justify-center">{{$name}}</label>
    </div>

    <div id="tk-{{$id}}" class="hidden">
        <h3 class="font-semibold text-white mb-2">Tentukan tingkat keyakinan gejala terhadap penyakit tanaman cabai</h3>
        <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
            <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                <div class="flex items-center ps-3">
                    <input id="sp-{{$id}}" type="radio" value="100" name="tp[{{$id}}]" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                    <label for="sp-{{$id}}" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Sangat Berpengaruh</label>
                </div>
            </li>

            <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                <div class="flex items-center ps-3">
                    <input id="p-{{$id}}" type="radio" value="75" name="tp[{{$id}}]" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                    <label for="p-{{$id}}" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Berpengaruh</label>
                </div>
            </li>

            <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                <div class="flex items-center ps-3">
                    <input id="n-{{$id}}" type="radio" value="50" name="tp[{{$id}}]" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                    <label for="n-{{$id}}" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Netral</label>
                </div>
            </li>

            <li class="w-full dark:border-gray-600">
                <div class="flex items-center ps-3">
                    <input id="tp-{{$id}}" type="radio" value="25" name="tp[{{$id}}]" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                    <label for="tp-{{$id}}" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Cukup Berpengaruh</label>
                </div>
            </li>
        </ul>
    </div>
</div>

<script>
    document.getElementById('gejala-{{$id}}').addEventListener('click', function() {
        var tk = document.getElementById('tk-{{$id}}');
        if(tk.classList.contains('hidden')) {
            tk.classList.remove('hidden');
        } else {
            tk.classList.add('hidden');
        }
    });
</script>