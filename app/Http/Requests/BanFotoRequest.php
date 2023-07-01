<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BanFotoRequest extends FormRequest
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
            'motivo_ban' => 'required|min:5',
        ];
    }

    public function messages():array
    {
        return [
            'motivo_ban.required' => 'Debe ingresar un motivo por el cuál está baneando la imagen',
            'motivo_ban.min' => 'Especifique bien el motivo - Mínimo 5 cáracteres',
        ];
    }
}
