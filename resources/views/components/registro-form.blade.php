<div class="min-w-screen max-w-7xl mx-auto min-h-screen bg-gray-100 flex items-center justify-center"
    style="background-image: url('{{ asset('img/bg-form.jpg') }}');">
    <div class="min-h-screen text-gray-500 shadow-xl w-full max-w-full overflow-hidden bg-cover">
        <div class="md:flex w-full">
            <div class="mx-auto w-full md:w-3/5 lg:w-3/5 py-10 px-5 md:px-10">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
