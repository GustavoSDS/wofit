@extends('adminlte::page')
@section('title', 'Crear')
@section('plugins.Sweetalert2', true)
@section('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
@endsection

@section('content')
    <div class="container w-4/5">
        <div class="row">
            <div class="col-xl-12 mt-10 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                                    Crear un nuevo Ciclo
                                </h2>
                            </div>
                            <div class="col-4 text-right">
                                <div class="transform hover:scale-110 m-1 inline-block">
                                    <a href="{{ route('dates.index') }}"
                                        class="focus:outline-none text-white text-sm py-2 px-4 bg-gradient-to-r from-red-400 to-red-600">Volver</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('dates.store') }}" method="POST">
                            @csrf
                            <h6 class="text-gray-800 text-center text-base mb-8 w-2/4">Ingresa la información para crear un
                                ciclo</h6>
                            <div class="pl-lg-4">
                                <div class="row mb-10">
                                    <div class="mx-auto col-lg-5">
                                        <div class="form-group">
                                            <label class="form-control-label" for="nombre">Nombre</label>
                                            <input class="form-control border rounded w-full py-2 px-3" type="text"
                                                name="nombre" placeholder="Pre- Inscripciones Septiembre" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-10">
                                    <div class="mx-auto col-lg-4">
                                        <div class="form-group">
                                            <label class="form-control-label" for="comienzo">Fecha</label>
                                            <input class="border rounded w-full py-2 px-3" type="date"
                                                value="{{ date('Y-m-d') }}" name="comienzo" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-10">
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
                                <hr class="my-6">
                                <div class="text-center mb-6">
                                    <span class="sm:ml-3">
                                        <button
                                            class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium text-white bg-green-500 hover:bg-green-600  focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 hover:scale-105">
                                            <i class="fas fa-check-circle mr-2"></i>
                                            GUARDAR
                                        </button>
                                    </span>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    @if (session('guardar') == 'ok')
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Guardado!',
                text: 'Registro creado con éxito!',
                showConfirmButton: false,
                timer: 2100
            })
        </script>
    @endif
@stop
