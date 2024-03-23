<div class="flex flex-col">
    <div>
        <input name="gejala[{{$count}}][id]" min="0" max="100" value="{{$id}}" id="gejala-{{$id}}" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" >
        <label for="gejala-{{$id}}" class="bg-red-100 hover:bg-red-200 text-red-800 text-xs font-semibold me-2 px-2.5 py-0.5 rounded dark:bg-red-700 dark:text-red-400 border border-red-400 inline-flex items-center justify-center">{{$name}}</label>
    </div>
    <input type="number" id="tk-{{$id}}" placeholder="Tingkat kepercayaan" class="mt-2 rounded-lg hidden text-black" name="gejala[{{$count}}][tk]" disabled> </input>
</div>

<script>
    
    if(document.getElementById('gejala-{{$id}}').checked) {
        document.getElementById('tk-{{$id}}').classList.remove('hidden');
        document.getElementById('tk-{{$id}}').disabled = false;
        document.getElementById('tk-{{$id}}').required = true;
        document.getElementById('tk-{{$id}}').value = '';
    }else {
        document.getElementById('tk-{{$id}}').classList.add('hidden');
        document.getElementById('tk-{{$id}}').disabled = true;
        document.getElementById('tk-{{$id}}').required = false;
        document.getElementById('tk-{{$id}}').value = '';
    }

    document.getElementById('gejala-{{$id}}').addEventListener('click', function() {
        var tk = document.getElementById('tk-{{$id}}');
        if(tk.classList.contains('hidden')) {
            tk.classList.remove('hidden');
            document.getElementById('tk-{{$id}}').disabled = false;
            document.getElementById('tk-{{$id}}').required = true;
            tk.value = '';
        } else {
            tk.classList.add('hidden');
            document.getElementById('tk-{{$id}}').disabled = true;
            document.getElementById('tk-{{$id}}').required = false;
            tk.value = '';
        }
    });
</script>