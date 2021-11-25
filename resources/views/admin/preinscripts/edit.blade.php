@extends('adminlte::page')
@section('title', 'Actualizar')
@section('plugins.Sweetalert2', true)

@section('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
@endsection
@section('content')
    <div class="mt-16 container w-11/12">
        <div class="card">
            <div class="card-header">
                <div class="row mx-auto align-items-center">
                    <div class="col-7">
                        <h3
                            class="lg:text-2xl md:text-xl -left-4 py-2 px-2 font-bold leading-7 text-gray-800 uppercase text-center sm:text-lg sm:truncate border-b-2 border-blue-400">
                            Editar Estado del Preinscripto</h3>
                    </div>
                    <div class="col text-right">
                        <div class="transform hover:scale-110 m-1 inline-block">
                            <a href="{{ route('dates.index') }}"
                                class="focus:outline-none text-white text-sm py-2 px-4 bg-gradient-to-r from-red-400 to-red-600">Volver</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('dates.update', $date->id) }}" method="POST" class="formularioActualizar">
                    @method('PUT')
                    @csrf
                    <h6 class="w-full text-gray-800 text-center text-base mb-8">
                        Ingresa la informatión para actualizar
                    </h6>
                    <div>
                        <div class="grid-cols-4 gap-2">
                            <div class="col-span-1 flex mb-2">
                                <div class="w-2/4">
                                    <div class="flex">
                                        <x-jet-label class="w-2/5">Nombres</x-jet-label>
                                        <x-jet-input class="w-4/5" disabled value="{{$date->nombre}}" />
                                    </div>
                                </div>
                                <div class="w-2/4">
                                    <div class="flex">
                                        <x-jet-label class="w-2/5">Apellidos</x-jet-label>
                                        <x-jet-input class="w-4/5" disabled value="{{$date->apellido}}" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-1 flex mb-2">
                                <div class="w-2/4">
                                    <div class="flex">
                                        <x-jet-label class="w-2/5">DNI</x-jet-label>
                                        <x-jet-input class="w-4/5" disabled value="{{$date->dni}}" />
                                    </div>
                                </div>
                                <div class="w-2/4">
                                    <div class="flex">
                                        <x-jet-label class="w-2/5">Email</x-jet-label>
                                        <x-jet-input class="w-4/5" disabled value="{{$date->email}}" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-1 flex mb-2">
                                <div class="w-2/4">
                                    <div class="flex">
                                        <x-jet-label class="w-2/5">Telefono</x-jet-label>
                                        <x-jet-input class="w-4/5" disabled value="{{$date->telefono}}" />
                                    </div>
                                </div>
                                <div class="w-2/4">
                                    <div class="flex">
                                        <x-jet-label class="w-2/5">Instagram</x-jet-label>
                                        <x-jet-input class="w-4/5" disabled value="{{$date->instagram}}" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-1 flex mb-2">
                                <div class="flex mx-auto">
                                    <x-jet-label class="mrl2">Estado Preinscripto</x-jet-label>
                                    {{-- <x-jet-input class="w-4/5 text-center" value="{{$date->activo == 1 ? 'Aceptado' : 'Pendiente'}}" placeholder="{{ $date->activo ? 'Aceptado' : 'Pendiente'}}" /> --}}
                                    <select name="" id="">
                                        @if ($date->activo==1)
                                            <option value="{{$date->activo}}">Aceptado</option>
                                            <option value="0">Pendiente</option>
                                        @else
                                            <option value="1">Aceptado</option>
                                            <option value="{{$date->activo}}">Pendiente</option>
                                        @endif
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
    </div>
@endsection

@section('js')
    @if (session('updated') == 'ok')
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Actualizado!',
                text: 'Registro actualizado con éxito!',
                showConfirmButton: false,
                timer: 2100
            })
        </script>
    @endif

    <script>
        $('.formularioActualizar').submit(function(e) {
            e.preventDefault();

            Swal.fire({
                title: 'Desea actualizar este registro?',
                // text: "Si lo actualiza no podrá recuperarlo!",
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, actualizar!'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            })

        });
    </script>
@stop
