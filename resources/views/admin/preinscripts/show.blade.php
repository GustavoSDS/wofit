@extends('adminlte::page')
@section('title', 'Inscriptos')
@section('plugins.Datatables', true)
@section('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
@endsection

@section('content')
    <div class="container mx-auto mt-20">
        <div class="card">
            <div class="flex card-header">
                <div class="w-2/4">
                    <h3 class="font-semibold text-lg uppercase">Preinscripto {{ }}</h3>
                </div>
                <div class="col text-right">
                    <div class="transform hover:scale-110 m-1 inline-block">
                        <a href="{{ route('dates.index') }}"
                            class="focus:outline-none text-white text-sm py-2 px-4 bg-gradient-to-r from-red-400 to-red-600">Volver</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="mb-2">
                    <table class="table align-items-center table-light table-responsive table-bordered table-striped table-hover" id="inscriptos-table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col"> Preinscripto </th>
                                <th scope="col"></th>
                                <th scope="col"> DNI </th>
                                <th scope="col"> Email </th>
                                <th scope="col"> Telefono </th>
                                <th scope="col"> Instagram </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach ($preinscripts as $item)
                                    <td>{{$item}}</td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection