<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VeneravelRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nomeVeneravel' => 'required',
            'periodoDe'     => 'required',
            'periodoAte'    => 'required',
            'fotoVeneravel' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nomeVeneravel.required' => 'O campo Nome é obrigatório',
            'periodoDe.required'     => 'O campo Período de é obrigatório',
            'periodoAte.required'    => 'O campo Período até é obrigatório',
            'fotoVeneravel.required' => 'O campo Fotos é obrigatório'
        ];
    }
}
