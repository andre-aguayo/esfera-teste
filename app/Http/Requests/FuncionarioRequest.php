<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FuncionarioRequest extends FormRequest
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
            "sobrenome" => ["required", 'regex:/^[a-zA-Z\s]*$/'],
            "empresa_id" => ["integer", "min:0"],
            "email" => ["nullable", "email:rfc,dns"],
            "telefone" => ["nullable", "string"],
        ];
    }

    public function messages()
    {
        return [
            'id.integer' => 'O codigo do funcionário deve ser um inteiro positivo.',
            'id.min' => 'O codigo do funcionário deve ser um inteiro positivo.',
            'nome.required' => 'O campo nome é obrigatório.',
            'nome.alpha' => 'O nome só pode conter letras.',
            'sobrenome.required' => 'O campo sobrenome é obrigatório.',
            'sobrenome.regex' => 'O sobrenome só pode conter letras e espaços.',
            'empresa_id.required' => 'Nao pudemos obter informaçoes da empresa.',
            'empresa_id.integer' => 'O codigo da empresa deve ser um inteiro positivo.',
            'empresa_id.min' => 'O codigo da empresa deve ser um inteiro positivo.',
            'email.email' => 'Formato de email invalido. ex: usuario@email.com'
        ];
    }
}
