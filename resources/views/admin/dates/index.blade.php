@extends('adminlte::page')
@section('title', 'Listado')

@section('plugins.Datatables', true)
@section('plugins.Sweetalert2', true)

@section('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
@stop

@section('content')
    <div class="card p-2 mt-20 bg-gray-100">
        <div class="mx-auto">
            <h3 class="font-bold text-2xl uppercase p-2 mb-1 text-gray-600">
                Listado Fechas Preinscripciones a Turnos
            </h3>
        </div>
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <input type="text"
                        class="px-4 py-2 w-4/5 rounded-lg border border-blue-500 text-center text-gray-700 placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-200 filter-input"
                        placeholder="Buscar por nombre" data-column="4" />
                </div>
                <div class="col text-center">
                    <form class="form-inline">
                        <select data-column="4"
                            class="mx-auto mt-1 w-4/5 py-2 rounded-lg border border-blue-500 text-center text-gray-700 placeholder-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-200 filter-select">
                            <option value="">Seleccionar mes </option>{{-- Dates name month of databases --}}
                            @foreach ($dateName as $name)
                                <option value="{{ $name }}">{{ $name }}</option>
                            @endforeach
                        </select>
                    </form>
                </div>

                <div class="col text-right">
                    <a href="{{ route('dates.create') }}" class="btn btn-outline mx-auto">Crear
                        ciclo <i class="ml-2 fas fa-plus"></i>
                    </a>
                </div>

            </div>
        </div>
        <div class="table-responsive">
            <table class="table align-items-center table-light table-hover hover row-border order-column" id="user-table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Dia</th>
                        <th scope="col">Mes</th>
                        <th scope="col">Año</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Inscriptos</th>
                        <th scope="col">Activo</th>
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

    @if (session('deleted') == 'ok')
        <script>
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Eliminado!',
                text: 'Registro eliminado con éxito!',
                showConfirmButton: false,
                timer: 2100
            })
        </script>
    @endif

    <script>
        $(document).ready(function() {
            var table = $('#user-table').DataTable({
                responsive: true,
                autoWidth: false,
                processing: true,
                serverSider: true,
                ajax: '{!! route('dataTableUser') !!}',
                columns: [
                    { data: 'id'          },
                    { data: 'dia'         },
                    { data: 'mes'         },
                    { data: 'ano'         },
                    { data: 'nombre'      },
                    { data: 'created_at'  },
                    { data: 'activo',     },
                    { data: 'btn',        },
                ],
                "columnDefs": [{
                        "render": function(data, type, row) {
                            if (row['activo'] == 1) {
                                return "<span class='px-2 inline-flex text-sm leading-5 font-bold text-gray-900'>Activo</span>";
                                //  +' - '+row['created_at'];
                            } else {
                                return "<span class='px-2 inline-flex text-sm leading-5 font-bold text-gray-400'>Inactivo</span>";
                            }
                        },
                        "targets": 6,
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
