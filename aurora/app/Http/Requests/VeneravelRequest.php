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
            'periodoDe'     => 'required|integer|between:1900,' . (date('Y')+1),
            'periodoAte'    => 'required|integer|between:1900,' . (date('Y')+1),
            'fotoVeneravel' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nomeVeneravel.required' => 'O campo Nome é obrigatório.',
            'periodoDe.required'     => 'O campo Período de é obrigatório.',
            'periodoDe.between'      => 'O campo Período de deve estar entre :min e :max.',
            'periodoDe.integer'      => 'O campo Período de deve ser inteiro.',
            'periodoAte.required'    => 'O campo Período até é obrigatório.',
            'periodoAte.between'     => 'O campo Período até deve estar entre :min e :max.',
            'periodoAte.integer'     => 'O campo Período até deve ser inteiro.',
            'fotoVeneravel.required' => 'O campo Fotos é obrigatório.'
        ];
    }
}
