<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'nomeUsuario'  => 'required',
            'emailUsuario' => 'required|email|unique:users,email',
            'simUsuario'   => 'required|unique:users,sim',
        ];
    }

    public function messages()
    {
        return [
            'nomeUsuario.required'  => 'O campo Nome é obrigatório',
            'emailUsuario.required' => 'O campo E-mail é obrigatório',
            'emailUsuario.unique'   => 'Já existe este E-mail cadastrado, informe outro!',
            'simUsuario.required'   => 'O campo SIM é obrigatório',
            'simUsuario.unique'     => 'Já existe este SIM cadastrado, informe outro!',
        ];
    }
}
