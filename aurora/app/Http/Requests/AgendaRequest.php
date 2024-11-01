<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AgendaRequest extends FormRequest
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
            'descricaoAgenda' => 'required',
            'dataAgenda'      => 'required|date|date_format:Y-m-d'
        ];
    }

    public function messages()
    {
        return [
            'descricaoAgenda.required' => 'O campo Descrição é obrigatório',
            'dataAgenda.required'      => 'O campo Data é obrigatório',
            'dataAgenda.date'          => 'O campo Data deve ser uma data válida',
            'dataAgenda.date_format'   => 'O campo Data deve ser uma data válida',
        ];
    }
}
