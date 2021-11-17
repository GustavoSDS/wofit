<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUserRequest;
use App\Http\Requests\Sugestions;
use App\Models\Preinscripcion_fecha;
use App\Models\Preinscripcion_inscripcion;
use App\Models\Suggestion;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        if (auth()->user()) {
            return redirect()->route('admin');
        } else {
            return view('welcome');
        }

        // $condicionalAno = Preinscripcion_fecha::where('ano', '=', date("Y"))
        //     ->where('activo', '=', 1)
        //     ->orderBy('mes', 'desc')
        //     ->first();
        // $condicionalMes = Preinscripcion_fecha::where('mes', '=', date("m"))
        //     ->where('activo', '=', 1)
        //     ->orderBy('mes', 'desc')
        //     ->first();
        // if ($condicionalAno) {
        //     if ($condicionalMes) {
        //         return $condicionalMes;
        //     } else {
        //         return $condicionalAno;
        //     }
        // } else {
        //     return 'Dentro del else';
        // }

    }

    public function preinscripciones(RegisterUserRequest $request)
    {
        $condicionalAno = Preinscripcion_fecha::where('ano', '=', date("Y"))
            ->where('activo', '=', 1)
            ->orderBy('mes', 'desc')
            ->first();
        $condicionalMes = Preinscripcion_fecha::where('mes', '=', date("m"))
            ->where('activo', '=', 1)
            ->orderBy('mes', 'desc')
            ->first();
        if ($condicionalMes || $condicionalAno) {
            if ($condicionalMes && $condicionalAno) {
                guardarFormulario($condicionalMes['id'], $request);

                session()->flash('alert', '¡Formulario enviado!');
                return redirect()->back();
            } elseif ($condicionalAno) {
                guardarFormulario($condicionalAno['id'], $request);

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

    public function suggestions()
    {
        if (auth()->user()) {
            return redirect()->route('admin');
        } else {
            return view('suggestions');
        }
    }

    public function post(Sugestions $request)
    {
        $sugerencias = $request->except('_token');
        Suggestion::insert($sugerencias);
        return redirect()->route('suggestions')->with('message', '¡Sugerencia enviada!');
    }
}

function guardarFormulario($codicion, $request)
{
    $datos = $request->except('_token');
    $datosHorarios = "";
    $meses = Preinscripcion_fecha::where('id', '=', $codicion)->firstOrFail();
    // where("mes", '=', $codicion)->where('activo', '=', 1)->limit(1)->first();
    foreach ($datos['horarios'] as $dato) {
        $datosHorarios = $datosHorarios . $dato . " - ";
    }

    $datos['horarios'] = $datosHorarios;
    $datos['preinscripcion_fecha_id'] = $meses['id'];

    $datosOrdenados['preinscripcion_fecha_id'] = $datos['preinscripcion_fecha_id'];
    $datosOrdenados['dni'] = $datos['dni'];
    $datosOrdenados['nombre'] = $datos['nombre'];
    $datosOrdenados['apellido'] = $datos['apellido'];
    $datosOrdenados['email'] = $datos['email'];
    $datosOrdenados['telefono'] = $datos['telefono'];
    $datosOrdenados['instagram'] = $datos['instagram'];
    $datosOrdenados['horarios'] = $datos['horarios'];

    Preinscripcion_inscripcion::insert($datosOrdenados);
}
