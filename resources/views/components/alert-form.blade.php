@if (session('alert'))
    <div x-data="{ isVisible: true}" x-init="setTimeout(() => {
        isVisible: false
    }, 5000) " x-show.transition.duration.1000ms="isVisible" id="mydiv"
        class="bg-teal-200 border-t-4 rounded-b-2xl border-teal-600 text-teal-900 mb-3 px-4 relative" role="alert">
        <span onclick="myFunctionClose()" class="absolute top-0 bottom-0 right-0 px-2">
            <svg class="fill-current h-5 w-5 text-teal-900" role="button" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 20 20">
                <title>Cerrar</title>
                <path
                    d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
            </svg>
        </span>
        <div>
            <div class="flex">
                <span class="float-left">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="#009688" class="w-6 h-6 mx-2">
                        <path
                            d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                        </path>
                    </svg>
                </span>
                <strong class="font-bold">
                    {{ session('alert') }}
                </strong>
            </div>
            <span class="float-none block sm:inline">
                {{$slot}}
            </span>
        </div>
    </div>
@endif
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script>
    function myFunctionClose() {
        $('#mydiv').fadeOut('slow');
    }
    setTimeout(function() {
        $('#mydiv').fadeOut('slow');
    }, 15000); // <-- time in milliseconds
</script>
