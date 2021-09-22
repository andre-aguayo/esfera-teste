<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmpresaRequest;
use Illuminate\Support\Facades\DB;
use App\Models\Empresa;

class EmpresaController extends Controller
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
     * Salva uma nova empresa
     */
    public function store(EmpresaRequest $request)
    {
        $nomeLogotipo = $this->salvarLogotipo($request);

        if (Empresa::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'logotipo' => $nomeLogotipo
        ])) {
            return redirect('/')->with('success', 'Empresa cadastrada com sucesso!');
        }
        return redirect('/')->with('error', 'Algo de errado ao cadastrar a empresa!');
    }

    /**
     * Atualiza informacoes da empresa
     */
    public function edit(EmpresaRequest $request)
    {
        $empresa = $this->criarEmpresa($request);

        if (Empresa::find($request->id)
            ->update($empresa)
        ) {
            return redirect('/')->with('success', 'Empresa atualizada com sucesso!');
        }
        return redirect('/')->with('error', 'Algo deu errado ao atualizar a empresa!');
    }

    /**
     * Verifica e cria o array com informaçoes da emrpesa para atualizar os dados
     * Só sobreescreve caso insira uma logotipo
     */
    private function criarEmpresa($request)
    {
        $nomeLogotipo = $this->salvarLogotipo($request);

        if ($nomeLogotipo == '') {
            return [
                'nome' => $request->nome,
                'email' => $request->email,
            ];
        } else {
            return [
                'nome' => $request->nome,
                'email' => $request->email,
                'logotipo' => $nomeLogotipo
            ];
        }
    }

    /**
     * Remove a empresa
     */
    public function destroy(int $idEmpresa)
    {
        $funcionarios = new FuncionarioController();

        if (
            $funcionarios->removerFuncionarios($idEmpresa) &&
            Empresa::find($idEmpresa)->delete()
        ) {
            return redirect('/')->with('success', 'Empresa e funcionários removidos com sucesso!');
        }
        return redirect('/')->with('error', 'Algo deu errado ao remover a empresa!');
    }

    /**
     * Armazena e retorna o nome do logotipo da empresa
     */
    private function salvarLogotipo(EmpresaRequest $request)
    {
        $logotipo = new SalvarLogotipo();

        return $logotipo->salvarLogotipo($request);
    }

    /**
     * Busca informaçoes da empresa
     */
    public function buscaEmpresa(int $idEmpresa)
    {
        return Empresa::find($idEmpresa);
    }

    /**
     * Recupera as empresas para listar
     */
    public function buscaTodasEmpresas()
    {
        return DB::table('empresas')->paginate(10);
    }

    /**
     * Recupera a lista de funcionarios de uma determinada empresa
     */
    public function buscaFuncionarios(int $idEmpresa)
    {
        $funcionarios = new FuncionarioController();
        return $funcionarios->buscaFuncionariosDaEmrpesa($idEmpresa);
    }
}
