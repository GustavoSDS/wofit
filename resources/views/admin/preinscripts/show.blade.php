@extends('adminlte::page')
@section('title','Actualizar')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
@stop

@section('content')
    <div class="pt-20 card min-h-screen">
        <div class="flex">
            <div class="w-4/5">
                <h3
                    class="lg:text-2xl md:text-xl -left-4 py-2 px-2 font-bold leading-7 text-gray-800 uppercase text-center sm:text-lg sm:truncate border-b-2 border-blue-400">
                    Editar Estado del Inscripto
                </h3>
            </div>
            <div class="w-1/4">
                <div class="transform hover:scale-110 m-1 inline-block">
                    <a href="{{ route('preinscripts.index') }}"
                        class="focus:outline-none text-white text-sm py-2 px-4 bg-gradient-to-r from-red-400 to-red-600">
                        Volver
                    </a>
                </div>
            </div>
        </div>

        <div>
            <form action="{{ route('preinscripts.update', $preinscript->id) }}" method="POST" class="formularioActualizar">
                @method('PUT')
                @csrf
                <div class="w-4/5 mx-auto mt-16 mb-20">
                    <div class="flex w-full mb-4 text-center">
                        <div class="w-2/4">
                            <x-jet-input class="w-11/12" value="ID: {{ $preinscript->id }}" type="text" disabled />
                        </div>
                        <div class="w-2/4">
                            <x-jet-input class="w-11/12" value="DNI: {{ $preinscript->dni }}" type="text"
                                disabled />
                        </div>
                    </div>
                    <div class="flex w-full mb-4 text-center">
                        <div class="w-2/4">
                            <x-jet-input class="w-11/12" value="Nombre: {{ $preinscript->nombre }}" type="text"
                                disabled />
                        </div>
                        <div class="w-2/4">
                            <x-jet-input class="w-11/12" value="Apellido: {{ $preinscript->apellido }}" type="text"
                                disabled />
                        </div>
                    </div>
                    <div class="flex w-full mb-4 text-center">
                        <div class="w-2/4">
                            <x-jet-input class="w-11/12" value="Email: {{ $preinscript->email }}" type="text"
                                disabled />
                        </div>
                        <div class="w-2/4">
                            <x-jet-input class="w-11/12" value="Telefono: {{ $preinscript->telefono }}" type="text"
                                disabled />
                        </div>
                    </div>
                    <div class="flex w-full mb-4 text-center">
                        <div class="w-2/4">
                            <x-jet-input class="w-11/12" value="Instagram: {{ $preinscript->instagream }}"
                                type="text" disabled />
                        </div>
                        <div class="w-2/4 flex items-center justify-center">
                            <div class="w-5/12">
                                @if ($preinscript->activo == '1')
                                    <x-jet-input class="w-11/12" value="Estado: Aceptado" type="text" disabled />
                                @else
                                    <x-jet-input class="w-11/12" value="Estado: Pendiente" type="text" disabled />
                                @endif
                            </div>
                            <div class="w-5/12">
                                <select name="" id="">
                                    <option value="1">Aceptado</option>
                                    <option value="0">Pendiente</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>


                <hr class="my-4" />
                <div class="text-center">
                    <span class="sm:ml-3">
                        <button
                            class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium text-white bg-indigo-400 hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transform hover:scale-105">
                            <i class="fas fa-edit mr-2"></i>
                            ACTUALIZAR
                        </button>
                    </span>
                </div>
            </form>
        </div>
    </div>
@endsection
