<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImagenesRequest extends FormRequest
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
            'archivo' => 'required|image|',
            'titulo' => 'required|min:2|max:20',
        ];
    }
    public function messages():array
    {
        return [
            'titulo.required' => 'Indique el titulo de la imagen',
            'titulo.min' => 'El titulo debe tener entre 2 y 20 caracteres',
            'titulo.max' => 'El titulo debe tener entre 2 y 20 caracteres',
            'archivo.required' => 'Debe seleccionar un archivo',
            'archivo.image' => 'El archivo debe ser una imagen',
        ];
    }
}
