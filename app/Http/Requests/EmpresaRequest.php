<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpresaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "id" => ['integer', 'min:0'],
            "nome" => ["required", 'alpha'],
            "email" => ["nullable", "email:rfc,dns"],
            "logotipo" => ["image", "dimensions:min_width=100,min_height=100"],
        ];
    }

    public function messages()
    {
        return [
            'id.integer' => 'O codigo da empresa deve ser um inteiro positivo.',
            'id.min' => 'O codigo da empresa deve ser um inteiro positivo.',
            'nome.required' => 'O campo nome é obrigatório.',
            'nome.alpha' => 'O nome só pode conter letras.',
            'email.email' => 'Formato de email invalido. ex: usuario@email.com',
            'logotipo.dimensions' => 'A imagem é muito pequena.',
            'logotipo.image' => 'Suportado apenas arquivos de imagem.'
        ];
    }
}
