<?php

namespace App\Http\Controllers;

class FuncionarioViewsController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Mostra o formulario de cadasrto de empresa
     */
    public function create(int $idEmpresa)
    {
        return view('/funcionario/formulario/formulario-funcionario', ['idEmpresa' => $idEmpresa]);
    }

    /**
     * Mostra o formulario de alteracao dos dados da empresa
     * Caso nao exista redireciona para a pagina inicial
     */
    public function show(int $idFuncionario)
    {
        $funcionario = $this->buscaFuncionario($idFuncionario);

        if ($funcionario !== NULL) {
            return view('/funcionario/formulario/formulario-funcionario', ['funcionario' => $funcionario]);
        }
        return redirect('/')->with('error', 'Funcionario nao encontrado!');
    }

    private function buscaFuncionario(int $idFuncionario)
    {
        $funcionario = new FuncionarioController();

        return $funcionario->buscaFuncionario($idFuncionario);
    }
}
