<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DescricaoPagHistoriaRequest extends FormRequest
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
            'descricaoHistoria' => 'required',
            'videoHistoria'     => 'nullable|file|mimetypes:video/mp4|max:1048576',
            'slide'             => 'nullable|file|mimetypes:application/pdf',
        ];
    }

    public function messages()
    {
        return [
            'descricaoHistoria.required' => 'O campo Descrição é obrigatório',
            'videoHistoria.file'         => 'O arquivo enviado não é válido.',
            'videoHistoria.mimetypes'    => 'O arquivo deve ser vídeo (MP4).',
            'videoHistoria.max'          => 'O tamanho máximo permitido é de 1GB.',
            'slide.mimetypes'            => 'O arquivo deve ser um PDF.',
            'slide.file'                 => 'O arquivo enviado não é válido.',
        ];
    }
}
