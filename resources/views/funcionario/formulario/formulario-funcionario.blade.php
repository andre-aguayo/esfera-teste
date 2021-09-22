@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        @if (Route::current()->getName() == 'funcionario.show')
                            <div class="row">
                                <div class="col-md-3">{{ __('Atualizar funcionario') }}
                                </div>
                            </div>
                        @else
                            {{ __('Novo funcionario') }}
                        @endif
                    </div>

                    <div class="card-body">
                        @if (Route::current()->getName() == 'funcionario.show')
                            <form method="POST" action="/funcionario/atualizar/{{ $funcionario->id }}"
                                enctype="multipart/form-data">
                            @else
                                <form method="POST" action="/funcionario/salvar/{{ $idEmpresa }}">
                        @endif
                        @csrf
                        <div class="form-group row">
                            <label for="nome"
                                class="col-md-4 col-form-label text-md-right">{{ __('Nome do funcionario') }}</label>
                            <div class="col-md-6">
                                <input id="nome" type="nome" class="form-control @error('nome') is-invalid @enderror"
                                    name="nome" required autocomplete="nome" autofocus @if (isset($funcionario->nome))
                                value="{{ $funcionario->nome }}"
                                @endif
                                >
                                @error('nome')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="sobrenome"
                                class="col-md-4 col-form-label text-md-right">{{ __('Sobrenome do funcionario') }}</label>
                            <div class="col-md-6">
                                <input id="sobrenome" type="sobrenome"
                                    class="form-control @error('sobrenome') is-invalid @enderror" name="sobrenome" required
                                    autocomplete="sobrenome" autofocus @if (isset($funcionario->sobrenome))
                                value="{{ $funcionario->sobrenome }}"
                                @endif
                                >
                                @error('sobrenome')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email"
                                class="col-md-4 col-form-label text-md-right">{{ __('Email do funcionario') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" autocomplete="email" @if (isset($funcionario->email))
                                value="{{ $funcionario->email }}"
                                @endif
                                >
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="telefone"
                                class="col-md-4 col-form-label text-md-right">{{ __('Telefone do funcionario') }}</label>

                            <div class="col-md-6">
                                <input id="telefone" type="telefone"
                                    class="form-control @error('telefone') is-invalid @enderror" name="telefone"
                                    autocomplete="telefone" @if (isset($funcionario->telefone))
                                value="{{ $funcionario->telefone }}"
                                @endif
                                >
                                @error('telefone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="offset-md-10">
                                <button class="btn btn-success" type="submit">Salvar</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
