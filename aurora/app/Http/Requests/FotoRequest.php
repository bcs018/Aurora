<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FotoRequest extends FormRequest
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
            'nomeEvento'      => 'required',
            'descricaoEvento' => 'required',
            'fotos'           => 'required'
        ];
    }

    public function messages()
    {
        return [
            'nomeEvento.required'      => 'O campo Nome do evento é obrigatório',
            'descricaoEvento.required' => 'O campo Descrição do evento é obrigatório',
            'fotos.required'           => 'O campo Fotos é obrigatório'
        ];
    }
}
