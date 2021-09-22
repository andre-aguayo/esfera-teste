@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-4">
                                {{ __('Lista de empresas') }}
                            </div>
                            <div class="offset-md-5">
                                <a href="/empresa/cadastro">
                                    <button class="btn btn-success">Cadastrar empresa</button>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        @if (session('success') != null)
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @elseif (session('fail') != null)
                            <div class="alert alert-success" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif
                        {{ __('Tabela de empresas') }}

                        @include('empresa.tabela.tabela-de-empresas',['empresas'=>$empresas])

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
