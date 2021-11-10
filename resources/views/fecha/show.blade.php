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
                    <h3 class="font-semibold text-lg uppercase">Total Inscriptos en {{ $fecha->nombre }} {{$fecha->fulldate}}</h3>
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
                                <th scope="col"> Inscripto </th>
                                <th scope="col"></th>
                                <th scope="col"> DNI </th>
                                <th scope="col"> Email </th>
                                <th scope="col"> Telefono </th>
                                <th scope="col"> Instagram </th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
<script>
    $(document).ready(function() {
        var table = $('#inscriptos-table').DataTable({
            responsive: true,
            autoWidth: false,
            processing: true,
            serverSider: true,
            ajax: '{!! route('dataTableInscriptos', $fecha->id) !!}',
            columns: [{
                    data: 'nombre'
                },
                {
                    data: 'apellido'
                },
                {
                    data: 'dni'
                },
                {
                    data: 'email'
                },
                {
                    data: 'telefono'
                },
                {
                    data: 'instagram'
                },
            ],
            // merge
            "columnDefs": [{
                    "render": function(data, type, row) {
                        return row['nombre'] + " " + row['apellido'];
                    },
                    "targets": 0
                },
                {
                    "visible": false,
                    "targets": [1]
                }
            ],
            "pageLength": 10,
            "dom": 'lrtip',
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json",
                "lengthMenu": "Mostrar " +
                    `<select class="custom-select custom-select-sm form-control form-control-sm">
                <option value='10'>10</option>
                <option value='25'>25</option>
                <option value='50'>50</option>
                <option value="100">100</option>
                <option value="-1">Todos</option>
            </select>` +
                    " registros por página",
                "zeroRecords": "Nada encontrado - lo siento",
                "info": "Mostrando la _PAGE_ de _PAGES_",
                "infoEmpty": "No hay registros disponibles",
                "infoFiltered": "(filtrado de _MAX_ registros totales)",
                'search': 'Buscar',
                'paginate': {
                    'next': 'Siguiente',
                    'previous': 'Anterior',
                }
            }
        });
    });
</script>
@stop
