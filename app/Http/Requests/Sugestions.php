<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Sugestions extends FormRequest
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
            'email' => ['required', 'email', 'max:255', 'unique:suggestions'],
            'mensaje' => ['required', 'max:255'],
        ];
    }

    public function message()
    {
        return [
            'email.unique' => 'El email ya esta en registrado',
            'mensaje.max' => 'Maximo 255 caracteres',
        ];
    }
}
