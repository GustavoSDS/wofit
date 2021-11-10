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
                    <x-jet-label class="text-lg">Buscar inscripto</x-jet-label>
                    <x-jet-input type="text" name="" placeholder="Escriba para buscar" />
                </div>

                <div class="w-2/4">
                    <x-jet-label class="text-lg">Seleccionar Fecha</x-jet-label>
                    <form>
                        <select
                            class="w-3/5 mx-auto py-2 rounded-lg border border-blue-500 text-center text-gray-700 placeholder-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-200 filter-select">
                            <option value="">Todos</option>
                            @foreach ($inscripts as $inscript)
                                <option value="">{{ $inscript->nombre }}</option>
                            @endforeach
                        </select>
                    </form>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table align-items-center table-light table-hover hover row-border order-column" id="inscripts-table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">DNI</th>
                        <th scope="col">Usuario</th>
                        <th scope="col">Email</th>
                        <th scope="col">Estado</th>
                        {{-- <th scope="col">&nbsp;</th> --}}
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('js')
    <script>
        $(document).ready(function() {
            var table = $('#inscripts-table').DataTable({
                responsive: true,
                autoWidth: false,
                processing: true,
                serverSider: true,
                ajax: '{!! route('PreinscriptdataTable') !!}',
                columns: [
                    { data: 'id'         },
                    { data: 'dni'        },
                    { data: 'nombre'     },
                    { data: 'email'      },
                    { data: 'activo'     },
                    // { data: 'created_at' },
                    // { data: 'btn',       },
                ],
                // merge
                "columnDefs": [{
                        "render": function(data, type, row) {
                            if (row['activo'] == 1) {
                                return "<span class='px-2 inline-flex text-sm leading-5 font-bold text-gray-900'>Activo</span>";
                            } else {
                                return "<span class='px-2 inline-flex text-sm leading-5 font-bold text-gray-400'>Pendiente</span>";
                            }
                        },
                        "targets": 4,
                    },
                    // {
                    //     "visible": false,
                    //     "targets": [5]
                    // }
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
            // text search
            $('.filter-input').keyup(function() {
                table.column($(this).data('column'))
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
