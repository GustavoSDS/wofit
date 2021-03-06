@php
const horarios = ['8 a 9', '9 a 10', '14 a 15', '15 a 16', '16 a 17', '17 a 18', '18 a 19', '19 a 20', '20 a 21', '21 a 22']; //constante definida para los horarios
@endphp
<x-app-layout>
    <!-- Componente de blade que contiene el titulo, imagen, y clases de estilo para esta pagina -->
    <x-registro-form>
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
        <span class="flex -mx-3 mb-2 text-sm">Campos obligatorios <b class="text-red-500 ml-1"> * </b></span>

        <form action="{{ route('preregistration.post') }}" method="POST" name="formulario">
            @csrf
            {{ csrf_field() }}
            <div>
                <div class="w-2/4">
                    @error('dni')
                        <!-- Componente de blade que contiene estilos para los mensajes de errores -->
                        <x-input-error>
                            <strong class="py-1 px-2 rounded-md font-light text-sm bg-red-100">¡Revise los campos!</strong>
                        </x-input-error>
                    @enderror
                </div>
                <div class="block md:flex lg:flex -mx-3">
                    <div class="w-full md:w-2/4 lg:w-3/6 px-3 mb-3 md:mb-1 lg:mb-2">
                        <!-- Componente de blade que contiene estilos para los label text -->
                        <x-label for="nombre">Nombres</x-label>
                        </label>
                        <div class="flex">
                            <!-- Class-icons definida en el archivo common.css con los estilos-->
                            <div class="class-icons">
                                <i class="fas fa-user text-lg"></i>
                            </div>
                            <!-- Componente de blade que contiene estilos para los inputs de datos personales-->
                            <input class="inputs-datos form-input" placeholder="John" name="nombre" type="text"
                                value="{{ Request::old('nombre') }}" maxlength="20" pattern="[A-Za-z ]+"
                                title="Obligatorio. Máximo 20 carácteres. Solo Letras." required />
                        </div>
                    </div>
                    <div class="w-full md:w-2/4 lg:w-3/6 px-3 mb-3 md:mb-1 lg:mb-2">
                        <x-label for="apellido">Apellidos</x-label>
                        <div class="flex">
                            <div class="class-icons">
                                <i class="fas fa-user-plus text-lg"></i>
                            </div>
                            <input class="inputs-datos form-input" placeholder="Smith" type="text" name="apellido" maxlength="30"
                                value="{{ Request::old('apellido') }}" required pattern="[A-Za-z ]+"
                                title="Obligatorio. Máximo 30 carácteres. Solo Letras." />
                        </div>
                    </div>
                </div>
                <div class="block md:flex lg:flex -mx-3">
                    <div class="w-full md:w-2/4 lg:w-3/6 px-3 mb-3 md:mb-1 lg:mb-2">
                        <x-label for="dni">DNI </x-label>

                        <div class="flex">
                            <div class="class-icons">
                                <i class="fas fa-keyboard text-lg"></i>
                            </div>
                            <input class="inputs-datos  form-input" placeholder="00000000" type="text" id="dni" name="dni"
                                value="{{ Request::old('dni') }}" required maxlength="8" minlength="8"
                                pattern="[0-9]+" title="Obligatorio. 8 números requeridos" />
                        </div>
                        @error('dni')
                            <!-- Componente de blade que contiene estilos para los mensajes de errores -->
                            <x-input-error>
                                {{ $message }}
                            </x-input-error>
                        @enderror
                    </div>
                    <div class="w-full md:w-2/4 lg:w-3/6 px-3 mb-3 md:mb-1 lg:mb-2">
                        <x-label for="telefono">Teléfono</x-label>
                        <div class="flex">
                            <div class="class-icons">
                                <i class="fas fa-phone-square text-lg"></i>
                            </div>
                            <input class="inputs-datos  form-input" placeholder="37640000" type="tel" pattern="[0-9]+"
                                minlength="10" maxlength="12" name="telefono" value="{{ Request::old('telefono') }}"
                                required title="Obligatorio. Sólo números." />
                        </div>
                    </div>
                </div>

                <div class="flex -mx-3">
                    <div class="w-full px-3  mb-3 md:mb-1 lg:mb-2">
                        <x-label for="email">Email</x-label>
                        <div class="flex">
                            <div class="class-icons">
                                <i class="fas fa-envelope-open-text text-lg"></i>
                            </div>
                            <input class="inputs-datos  form-input" placeholder="johnsmith@example.com" type="email"
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
                            <input class="inputs-datos  form-input" placeholder="@johnsmithexample" type="text"
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
                                        <label for="horarios[]" class="inline-flex items-center text-sm font-semibold">
                                            <input type="checkbox" name="horarios[]" value="{{ $horario }}"
                                                {{ !empty(old('horarios')) && in_array($horario, old('horarios')) ? 'checked' : '' }}
                                                class="bg-blue-300 rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-offset-0  focus:ring-indigo-200 focus:ring-opacity-50 cursor-pointer h-5 w-5">
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
                        <button type="submit" class="max-w-xs w-48 inline-flex items-center px-4 py-2 border border-gray-200 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:text-gray-900 bg-gradient-to-r from-blue-300 to-blue-400 hover:from-blue-400 hover:to-blue-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-200 ease-in" value="submit">
                            <!-- Heroicon name: solid/check -->
                            <svg class="h-6 w-6 mr-2 text-gray-900" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                            </svg>
                            SOLICITAR TURNO
                        </button>
                    </div>
                </div>

                <div class="bg-teal-300 border-t border-none text-gray-900 px-4 py-2" role="alert">
                    <p class="text-sm"> * Esta solicitud esta sujeta a aprobación. Ni bien se libere
                        un cupo en el
                        horario
                        solicitado nos comunicaremos con usted.</p>
                </div>
            </div>
        </form>
    </x-registro-form>

</x-app-layout>
