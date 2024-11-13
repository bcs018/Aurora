<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'cim'      => 'required',
            'password' => 'required|regex:/\S/'
        ];
    }

    public function messages()
    {
        return [
            'cim.required'      => 'O campo CIM é obrigatório',
            'password.required' => 'O campo Senha é obrigatório',
            'cim.regex'         => 'O campo Senha não pode conter apenas espaços',
        ];
    }
}
