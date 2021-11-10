<div id="myDIV" class="bg-indigo-200 border-t-4 border-indigo-600 text-indigo-900 px-4 pb-3 relative" role="alert">
    <span onclick="myFunction()" class="absolute top-0 bottom-0 right-0 px-2">
        <svg class="fill-current h-5 w-5 text-indigo-900" role="button" xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 20 20">
            <title>Close</title>
            <path
                d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
        </svg>
    </span>
    <strong class="font-bold">{{ $slot }}</strong>
    <span class="block sm:inline"><br> Gracias por tus sugerencias!.</span>
</div>

<script>
    function myFunction() {
        var x = document.getElementById("myDIV");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }
</script>
