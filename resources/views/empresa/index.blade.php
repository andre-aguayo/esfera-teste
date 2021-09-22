@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-4">
                                {{ __('Lista de funcionarios') }}
                            </div>
                            <div class="offset-md-5">
                                <a href="/funcionario/cadastro/{{ $idEmpresa }}">
                                    <button class="btn btn-success">Cadastrar funcionario</button>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        @if (session('error'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if (session('seccess'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @include('funcionario.tabela.tabela-de-funcionarios',['funcionarios'=>$funcionarios])
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
