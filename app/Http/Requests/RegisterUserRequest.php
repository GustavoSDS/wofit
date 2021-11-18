<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    public function rules()
    {
        return [
            'nombre' => ['required', 'string', 'max:255'],
            'apellido' => ['required', 'string', 'max:255'],
            'dni' => ['required', 'unique:preinscripcion_inscripcions'],
            'email' => ['required', 'email', 'max:255', 'unique:preinscripcion_inscripcions'],
            'telefono' => ['required'],
            'horarios' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'dni.required' => 'El DNI es obligatorio',
            'nombre.required' => 'El Nombre es obligatorio',
            'apellid.required' => 'El Apellido es obligatorio',
            'email.required' => 'El Email es obligatorio',
            'telefono.required' => 'El Telefono es obligatorio',
            'horarios.required' => 'Debe seleccionar minimo 1 horario',
        ];
    }
}
