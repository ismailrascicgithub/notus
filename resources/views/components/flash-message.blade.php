@if(session('success'))
    <div id="flash-success" class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
        <p class="font-medium">{{ session('success') }}</p>
    </div>
@elseif(session('error'))
    <div id="flash-error" class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4" role="alert">
        <p class="font-medium">{{ session('error') }}</p>
    </div>
@endif


<script>
    setTimeout(function () {
        var successFlash = document.getElementById('flash-success');
        var errorFlash = document.getElementById('flash-error');

        if (successFlash) {
            successFlash.style.display = 'none';
        }
        if (errorFlash) {
            errorFlash.style.display = 'none';
        }
    }, 5000);
</script>