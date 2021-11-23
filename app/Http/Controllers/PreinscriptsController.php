<?php

namespace App\Http\Controllers;

use App\Models\Preinscripcion_fecha;
use App\Models\Preinscripcion_inscripcion;
use Illuminate\Http\Request;
use Symfony\Component\VarDumper\VarDumper;
use Yajra\DataTables\Facades\DataTables;

use function Ramsey\Uuid\v1;

class PreinscriptsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fechas = Preinscripcion_inscripcion::all();
        $fecha = [];
        foreach ($fechas as $key) {
            $fecha[] = $key->fechas->id;
        }
        $fecha = array_unique($fecha);
        // return $fecha;

        return view('admin.preinscripts.index', [
            'inscripts' => $fecha,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $preinscript = Preinscripcion_inscripcion::all()->find($id);
        // return $preinscript;
        return view('admin.preinscripts.show', compact('preinscript'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // Function Datatables
    public function dataTable()
    {
        return DataTables::of(Preinscripcion_inscripcion::select('preinscripcion_fecha_id', 'dni', 'nombre', 'email', 'activo'))
            ->editColumn('nombre', function (Preinscripcion_inscripcion $preinscript) {
                return $preinscript->full_name;
            })
            ->addColumn('btn', 'admin.preinscripts.btn.btn')
            ->rawColumns(['btn'])
            ->toJson();
    }
}
