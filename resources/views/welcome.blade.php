@php
const horarios = ['8 a 9', '9 a 10', '14 a 15', '15 a 16', '16 a 17', '17 a 18', '18 a 19', '19 a 20', '20 a 21', '21 a 22']; //constante definida para los horarios
@endphp
<x-app-layout>
    <!-- Componente de blade que contiene el titulo, imagen, y clases de estilo para esta pagina -->
    <x-registro-form>

        <form action="{{ route('preInscripciones.post') }}" method="POST">
            @csrf
            {{ csrf_field() }}
            <div>
                <div class="block md:flex lg:flex -mx-3">
                    <div class="w-full lg:w-3/6 md:w-3/6 px-3 mb-3 md:mb-0 lg:mb-0">
                        <!-- Componente de blade que contiene estilos para los label text -->
                        <x-label for="nombre">Nombre</x-label>
                        </label>
                        <div class="flex">
                            <!-- Class-icons definida en el archivo common.css con los estilos-->
                            <div class="class-icons">
                                <i class="fas fa-user text-lg"></i>
                            </div>
                            <!-- Componente de blade que contiene estilos para los inputs de datos personales-->
                            <input class="inputs-datos" placeholder="John" name="nombre" type="text"
                                value="{{ Request::old('nombre') }}" maxlength="20" pattern="[A-Za-z ]+"
                                title="Obligatorio. Máximo 20 carácteres. Solo Letras." required />
                        </div>
                    </div>
                    <div class="w-full lg:w-3/6 md:w-3/6 px-3 mb-3 md:mb-0 lg:mb-0">
                        <x-label for="apellido">Apellido</x-label>
                        <div class="flex">
                            <div class="class-icons">
                                <i class="fas fa-user-plus text-lg"></i>
                            </div>
                            <input class="inputs-datos" placeholder="Smith" type="text" name="apellido" maxlength="30"
                                value="{{ Request::old('apellido') }}" required pattern="[A-Za-z ]+"
                                title="Obligatorio. Máximo 30 carácteres. Solo Letras." />
                        </div>
                    </div>
                </div>
                <div class="block md:flex lg:flex -mx-3">
                    <div class="w-full lg:w-3/6 md:w-3/6 px-3 mb-3 md:mb-0 lg:mb-0">
                        <x-label for="dni">DNI</x-label>
                        <div class="flex">
                            <div class="class-icons">
                                <i class="fas fa-keyboard text-lg"></i>
                            </div>
                            <input class="inputs-datos" placeholder="00000000" type="text" id="dni" name="dni"
                                value="{{ Request::old('dni') }}" required maxlength="8" pattern="[0-9]+"
                                title="Obligatorio. 8 números requeridos" />
                        </div>
                    </div>
                    <div class="w-full lg:w-3/6 md:w-3/6 px-3 mb-3 md:mb-0 lg:mb-0">
                        <x-label for="telefono">Teléfono</x-label>
                        <div class="flex">
                            <div class="class-icons">
                                <i class="fas fa-phone-square text-lg"></i>
                            </div>
                            <input class="inputs-datos" placeholder="37640000" type="tel" pattern="[0-9]+"
                                minlength="10" maxlength="12" name="telefono" value="{{ Request::old('telefono') }}"
                                required title="Obligatorio. Sólo números." />
                        </div>
                    </div>
                </div>
                <!-- Muestra una alerta de error despues de la validacion de los datos del formulario -->
                <div class="">
                    @error('dni')
                        <!-- Componente de blade que contiene estilos para los mensajes de errores -->
                        <x-input-error>
                            {{ $message }}
                        </x-input-error>
                    @enderror
                </div>

                <div class="flex -mx-3">
                    <div class="w-full px-3 mb-3 md:mb-5 lg:mb-5">
                        <x-label for="email">Email</x-label>
                        <div class="flex">
                            <div class="class-icons">
                                <i class="fas fa-envelope-open-text text-lg"></i>
                            </div>
                            <input class="inputs-datos" placeholder="johnsmith@example.com" type="email"
                                id="instagram" name="email" value="{{ Request::old('email') }}" required />
                        </div>
                        @error('email')
                            <x-input-error>
                                {{ $message }}
                            </x-input-error>
                        @enderror
                    </div>
                </div>

                <div class="flex -mx-3">
                    <div class="w-full px-3 mb-3 md:mb-5 lg:mb-5">
                        <label for="instagram" class="text-xs font-semibold px-1">Instagram</label>
                        <div class="flex">
                            <div class="class-icons">
                                <i class="fab fa-instagram text-lg"></i>
                            </div>
                            <input class="inputs-datos" placeholder="@johnsmithexample" type="text"
                                value="{{ Request::old('instagram') }}" name="instagram" />
                        </div>
                    </div>
                </div>

                <div class="flex -mx-3">
                    <div class="w-full px-3 mb-8">
                        <x-label>
                            <i class="fas fa-user-clock text-lg"></i>
                            Horarios
                        </x-label>
                        <div class="flex justify-center">
                            <div class="grid grid-cols-5 gap-2">
                                @foreach (horarios as $horario)
                                    <div class="col-span-1">
                                        <label for="horarios[]"
                                            class="inline-flex items-center text-sm font-semibold">
                                            <input type="checkbox" name="horarios[]" value="{{ $horario }}" {{ !empty(old('horarios')) && in_array($horario, old('horarios')) ? 'checked' : '' }} class="cursor-pointer h-5 w-5 text-teal-600 rounded-full">
                                            <span class="ml-1 mr-1 text-gray-700">{{ $horario }}</span>
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        @error('horarios')
                            <x-input-error>
                                {{ $message }}
                            </x-input-error>
                        @enderror
                    </div>
                </div>

                <div class="flex -mx-3">
                    <div class="flex items-center justify-center w-full px-3 mb-14">
                        <button class="max-w-xs w-60 inline-flex items-center px-4 py-2 border border-gray-200 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-200 ease-in">
                            <!-- Heroicon name: solid/check -->
                            <svg class="h-6 w-6 mr-2 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                            </svg>
                            SOLICITAR TURNO
                        </button>
                    </div>
                </div>

                <div class="bg-teal-100 border-t border-none text-gray-600 px-4 py-2" role="alert">
                    {{-- <p class="font-bold">Nota:</p> --}}
                    <p class="text-sm"> * Esta solicitud esta sujeta a aprobación. Ni bien se libere
                        un cupo en el
                        horario
                        solicitado nos comunicaremos con usted.</p>
                </div>
            </div>
        </form>
    </x-registro-form>
</x-app-layout>
