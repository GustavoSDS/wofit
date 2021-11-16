<div class="min-w-screen max-w-7xl mx-auto min-h-screen bg-gray-100 flex items-center justify-center"
    style="background-image: url('{{ asset('img/bg-form.jpg') }}');">
    <div class="min-h-screen text-gray-500 shadow-xl w-full max-w-full overflow-hidden bg-cover">
        <div class="md:flex w-full">
            {{-- <div class="hidden md:block w-1/4 bg-white py-10 px-10">
                <img class="w-full" src="{{ asset('img/s') }}" alt="">
            </div> --}}
            <div class="mx-auto w-full md:w-3/5 lg:w-3/5 py-10 px-5 md:px-10">

                <div class="text-center mb-5">
                    <h1 class="font-bold text-3xl text-gray-900"> Solicitud de turnos
                        <b>WoFit</b> 2021 <br>
                        <span class="text-red-700">-No cambios de turno-</span>
                    </h1>
                    <br>
                    <p class="font-bold uppercase">Ingresa tu información para solicitar turnos</p>
                </div>
                <x-alert-form>
                    Gracias por querer formar parte de WoFit. <br>
                    Ni bien tengamos un turno en la franja horaria solicitada nos comunicaremos con usted. <br>
                    El precio de la cuota para el mes de SEPTIEMBRE 2021 es de $2600 pesos.
                </x-alert-form>
                <span class="flex -mx-3 mb-2 text-sm">Obligatorio <b class="text-red-500 ml-1"> * </b></span>
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
