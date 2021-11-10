@extends('adminlte::page')
@section('title', 'Actualizar')
@section('plugins.Sweetalert2', true)

@section('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
@endsection
@section('content')
    <div class="container mx-auto w-4/5">
        <div class="row">
            <div class="col-xl-12 mt-10 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row mx-auto align-items-center">
                            <div class="col-5">
                                <h3
                                    class="text-gray-700 mb-0 font-semibold text-xl text-center uppercase py-2 border-b-2 border-blue-400">
                                    Editar Ciclo</h3>
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
                            <h6 class="text-gray-800 text-center text-base mb-8 w-2/4">
                                Ingresa la informatión para actualizar éste Ciclo</h6>
                            <div class="pl-lg-4">
                                <div class="row mt-5 mb-4">
                                    <div class="mx-auto col-lg-5">
                                        <div class="form-group">
                                            <label class="form-control-label" for="nombre">Nombre</label>
                                            <input class="form-control border rounded w-full py-2 px-3" type="text"
                                                name="nombre" value="{{ $date->nombre }}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="mx-auto col-lg-4">
                                        <div class="form-group">
                                            @php
                                               $fech = $date->fulldate
                                            @endphp
                                            <label class="form-control-label" for="comienzo">Fecha: <span class="font-normal text-sm">{{$fecha->fulldate}}</span></label>
                                            <input class="border rounded w-full py-2 px-3" type="date"
                                                value="{{ $fech }}" name="comienzo" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="mx-auto col-lg-4">
                                        <div class="form-group">
                                            <label class="form-control-label" for="activo">Activo</label>
                                            <select class="form-control" name="activo" id="activo">
                                                <option value="1">Si</option>
                                                <option value="0">No</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-4" />
                            <div class="text-center">
                                <span class="sm:ml-3">
                                    <button class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium text-white bg-indigo-400 hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transform hover:scale-105">
                                        <i class="fas fa-edit mr-2"></i>
                                        ACTUALIZAR
                                    </button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    @if (session('actualizar') == 'ok')
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
