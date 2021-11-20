<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUserRequest;
use App\Models\Preinscripcion_fecha;
use App\Models\Preinscripcion_inscripcion;

class HomeController extends Controller
{
    public function index()
    {
        if (auth()->user()) {
            return redirect()->route('admin');
        } else {
            return view('home');
        }

    }

    public function preregistration(RegisterUserRequest $request)
    {
        $conditionYear = Preinscripcion_fecha::where('ano', '=', date("Y"))
            ->where('activo', '=', 1)
            ->orderBy('mes', 'desc')
            ->first();
        $conditionMonth = Preinscripcion_fecha::where('mes', '=', date("m"))
            ->where('activo', '=', 1)
            ->orderBy('mes', 'desc')
            ->first();
        if ($conditionMonth || $conditionYear) {
            if ($conditionMonth && $conditionYear) {
                saveForm($conditionMonth['id'], $request);

                session()->flash('alert', '¡Formulario enviado!');
                return redirect()->back();

            } elseif ($conditionYear) {
                saveForm($conditionYear['id'], $request);

                session()->flash('alert', '¡Formulario enviado!');
                return redirect()->back();
            } else {
                session()->flash('alert', '¡Sin vacantes disponible! Diculpe las molestias');
                return redirect()->back();
            }
        } else {
            session()->flash('alert', '¡Sin vacantes disponible! Diculpe las molestias');
            return redirect()->back();
        }
    }
}

function saveForm($condition, $request)
{
    $data = $request->except('_token');
    $dataMonth = Preinscripcion_fecha::where('id', '=', $condition)->firstOrFail();
    $dataHo = "";
    foreach ($data['horarios'] as $dat) {
        $dataHo = $dataHo . $dat . " - ";
    }

    $data['horarios'] = $dataHo;
    $data['preinscripcion_fecha_id'] = $dataMonth['id'];

    Preinscripcion_inscripcion::insert($data);
}
