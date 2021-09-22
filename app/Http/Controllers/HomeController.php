<?php

namespace App\Http\Controllers;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $empresas = $this->buscaTodasEmpresas();

        return view('home', ['empresas' => $empresas]);
    }

    /**
     * Lista as empresas
     */
    private function buscaTodasEmpresas()
    {
        $empresas = new EmpresaController();

        return $empresas->buscaTodasEmpresas();
    }
}
