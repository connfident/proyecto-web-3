<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CuentasRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'user' => 'required|min:2|max:20',
            'password' => 'bail|required|min:6|max:100|same:password2',
            'nombre' => 'required|min:2|max:20',
            'apellido' => 'required|min:2|max:20',
        ];
    }

    public function messages():array
    {
        return [
            'user.required' => 'Indique el nombre de usuario',
            'user.min' => 'El nombre debe tener entre 2 y 20 caracteres',
            'user.max' => 'El nombre debe tener entre 2 y 20 caracteres',
            'nombre.required' => 'Indique el nombre del usuario',
            'nombre.min' => 'El nombre debe tener entre 2 y 20 caracteres',
            'nombre.max' => 'El nombre debe tener entre 2 y 20 caracteres',
            'apellido.required' => 'Indique el apellido del usuario',
            'apellido.min' => 'El apellido debe tener entre 2 y 20 caracteres',
            'apellido.max' => 'El apellido debe tener entre 2 y 20 caracteres',
            'password.required' => 'Indique contraseña del usuario',
            'password.min' => 'La contraseña debe tener entre 6 y 100 caracteres',
            'password.max' => 'La contraseña debe tener entre 6 y 100 caracteres',
            'password.same' => 'Las contraseñas no coinciden',
        ];
    }
}
