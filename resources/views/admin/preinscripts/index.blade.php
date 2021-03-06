@extends('adminlte::page')
@section('plugins.Datatables', true)

@section('title', 'Preinscriptos')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
@stop

@section('content')
    <div class="p-10 min-h-screen card">
        <div class="w-full card-header">
            <h2 class="text-2xl text-center font-semibold uppercase">Listado total Preinscriptos</h2>
            <div class="flex mt-4 px-3">
                <div class="w-2/4">
                    <x-jet-label class="text-lg">Buscar preinscriptos</x-jet-label>
                    <div class="w-3/4 flex">
                        <input type="text"
                        class="px-4 py-1 w-4/5 rounded-lg border border-blue-500 text-center text-gray-700 placeholder-gray-600 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-200 filter-input"
                        placeholder="Escriba para buscar"/>
                        <select id="datos" class="w-3/5 mx-auto py-1 px-2 rounded-lg border border-blue-500 text-center text-gray-700 placeholder-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-200">
                            <option value="0">ID</option>
                            <option value="2">DNI</option>
                            <option value="3">Preinscripto</option>
                            <option value="4">Email</option>
                            <option value="5">Estado</option>
                        </select>
                    </div>
                </div>

                <div class="w-2/4">
                    <x-jet-label class="text-lg">Seleccionar Fecha</x-jet-label>
                    <form>
                        <select
                            class="w-3/5 mx-auto py-1 px-2 rounded-lg border border-blue-500 text-center text-gray-700 placeholder-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-200 filter-select"  data-column="1">
                            <option value="">Todos</option>
                            @foreach ($inscripts as $clave => $valor)
                                    <option value="{{$clave}}">
                                        {{ $valor }}
                                    </option>
                            @endforeach

                        </select>
                    </form>
                </div>
            </div>
        </div>

        <div class="table-responsive mt-4">
            <table class="table align-items-center table-light table-hover hover row-border order-column"
                id="inscripts-table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col"></th>
                        <th scope="col">DNI</th>
                        <th scope="col">Preinscripto</th>
                        <th scope="col">Email</th>
                        <th scope="col">Estado</th>
                        <th scope="col">&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('js')
    @if (session('saved') == 'ok')
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Guardado!',
                text: 'Registro creado con ??xito!',
                showConfirmButton: false,
                timer: 2100
            })
        </script>
    @endif

    @if (session('updated') == 'ok')
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Actualizado!',
                text: 'Registro actualizado con ??xito!',
                showConfirmButton: false,
                timer: 2100
            })
        </script>
    @endif

    @if (session('deleted') == 'ok')
        <script>
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Eliminado!',
                text: 'Registro eliminado con ??xito!',
                showConfirmButton: false,
                timer: 2100
            })
        </script>
    @endif

    <script>
        $(document).ready(function() {
            var table = $('#inscripts-table').DataTable({
                responsive: true,
                autoWidth: false,
                processing: true,
                serverSider: true,
                dom: "Bfrtip",
                ajax: '{!! route('PreinscriptdataTable') !!}',
                columns: [
                    { data: 'id'},
                    { data: 'preinscripcion_fecha_id' },
                    { data: 'dni'},
                    {
                        "render": function(data, type, row) {
                            return row['nombre'] + " " + row['apellido'];
                        },
                    },
                    { data: 'email'},
                    {
                        "render": function(data, type, row) {
                            if (row['activo'] == 1) {
                                return ["<span class='px-2 inline-flex text-sm leading-5 font-bold text-gray-900'>Aceptado</span>"];
                            } else {
                                return "<span class='px-2 inline-flex text-sm leading-5 font-bold text-gray-400'>Pendiente</span>";
                            }
                        },
                    },
                    { data: 'btn'},
                ],
                "columnDefs": [{
                    "visible": false,
                    "targets": [1]
                }],
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
                        " registros por p??gina",
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
            // text search
            $('.filter-input').keyup(function() {
                table.column($('#datos').val())
                    .search($(this).val())
                    .draw();
            });
            // dropdown
            $('.filter-select').change(function() {
                table.column($(this).data('column'))
                    .search($(this).val())
                    .draw();
            });
        });

    </script>
@stop
