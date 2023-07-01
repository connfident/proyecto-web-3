<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditCuentaRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'nombre' => 'required|min:2|max:20',
            'apellido' => 'required|min:2|max:20',
        ];
    }

    public function messages():array
    {
        return [
            'nombre.required' => 'Indique el nombre de la persona',
            'nombre.min' => 'El nombre debe tener entre 2 y 20 caracteres',
            'nombre.max' => 'El nombre debe tener entre 2 y 20 caracteres',
            'apellido.required' => 'Indique el apellido de la persona',
            'apellido.min' => 'El apellido debe tener entre 2 y 20 caracteres',
            'apellido.max' => 'El apellido debe tener entre 2 y 20 caracteres',
        ];
    }
}
