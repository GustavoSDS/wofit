<?php

namespace App\Http\Controllers;

use App\Models\Preinscripcion_fecha;
use App\Models\Preinscripcion_inscripcion;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return array
     */
    public function index(Request $request)
    {
        $dates = Preinscripcion_fecha::all();
        $dateName = $dates->sortBy('nombre')->pluck('nombre')->unique();
        //$activos = $dates->sortBy('activo')->pluck('activo')->unique();

        return view('admin.dates.index', compact('dateName', 'dates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dates.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $date = strtotime($request->input('date')); //fecha en entero
        $datos['nombre'] = $request->input('nombre');
        $datos = $this->funcDate($datos, $date);
        // $datos['box_id'] = intval($request->input(''));
        $datos['activo'] = intval($request->input('activo'));

        Preinscripcion_fecha::insert($datos);

        return redirect()->route('dates.index')->with('saved', 'ok');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $date = Preinscripcion_fecha::findOrFail($id);
        return view('admin.dates.edit', compact('date'));
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
        $date = strtotime($request->input('date')); //fecha en entero
        $datos['nombre'] = $request->input('nombre');
        $datos = $this->funcDate($datos, $date);
        $datos['activo'] = intval($request->input('activo'));

        Preinscripcion_fecha::where('id', '=', $id)->update($datos);
        return redirect()->route('dates.index', $id)->with('updated', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $date = Preinscripcion_fecha::findOrFail($id);
        $date->delete();
        return redirect()->route('dates.index')->with('deleted', 'ok');
    }

    public function dataTable()
    {
        return DataTables::of(Preinscripcion_fecha::select('id', 'dia', 'mes', 'ano', 'nombre', 'activo','created_at'))
            ->editColumn('created_at', function (Preinscripcion_fecha $date) {
                $inscript = 0;
                foreach ($date->inscriptos as $key) {
                    if ($key->preinscripcion_fecha_id = $date->id) {
                        $inscript++;
                    } else {
                        $inscript = 0;
                    }
                }
                return $inscript;
            })
            ->addColumn('btn', 'admin.dates.dataTable.btn')
            ->rawColumns(['btn'])
            ->toJson();
    }

    public function dataTableInscriptos($id)
    {
        return DataTables::of(Preinscripcion_inscripcion::select('nombre', 'apellido', 'dni', 'email', 'telefono', 'instagram')
            ->where('preinscripcion_fecha_id', '=', $id))
            ->toJson();
    }

    //Functions
    //Funcion para obtener fecha y almacenar en la base de datos
    function funcDate($datos, $date)
    {
        $datos['dia'] = idate('d', $date);
        $datos['mes'] = idate('m', $date);
        $datos['ano'] = intval(20 . idate('y', $date));
        return $datos;
    }
}
