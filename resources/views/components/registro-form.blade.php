<div class="min-w-screen max-w-7xl mx-auto min-h-screen flex items-center justify-center bg-gray-700">
    <div class="min-h-screen text-gray-700 w-full max-w-full overflow-hidden">
        <div class="md:flex w-full">
            <div class="mx-auto w-full md:w-3/5 py-10 lg:my-4 md:my-2 px-5 md:px-10 shadow-2xl bg-cover lg:rounded-md md:rounded-md" style="background-image: url('{{asset('img/bg-form.jpg')}}')">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
