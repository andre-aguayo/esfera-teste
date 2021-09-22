@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        @if (Route::current()->getName() == 'empresa.show')
                            <div class="row">
                                <div class="col-md-3">{{ __('Atualizar empresa') }}
                                </div>
                                @if ($empresa->logotipo != null)
                                    <div class="col-md-2">
                                        <img src="{{ asset('storage/logotipo/' . $empresa->logotipo) }}" width="80px">
                                    </div>
                                @endif
                            </div>
                        @else
                            {{ __('Nova empresa') }}
                        @endif
                    </div>

                    <div class="card-body">
                        @if (Route::current()->getName() == 'empresa.show')
                            <form method="POST" action="/empresa/atualizar/{{ $empresa->id }}"
                                enctype="multipart/form-data">
                            @else
                                <form method="POST" action="/empresa/salvar" enctype="multipart/form-data">
                        @endif
                        @csrf
                        <div class="form-group row">
                            <label for="nome"
                                class="col-md-4 col-form-label text-md-right">{{ __('Nome da empresa') }}</label>
                            <div class="col-md-6">
                                <input id="nome" type="nome" class="form-control @error('nome') is-invalid @enderror"
                                    name="nome" required autocomplete="nome" autofocus @if (isset($empresa->nome))
                                value="{{ $empresa->nome }}"
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
                            <label for="email"
                                class="col-md-4 col-form-label text-md-right">{{ __('Email da empresa') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" autocomplete="email" @if (isset($empresa->email))
                                value="{{ $empresa->email }}"
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
                            <label for="logotipo"
                                class="col-md-4 col-form-label text-md-right">{{ __('Logotipo da empresa') }}</label>

                            <div class="col-md-6">
                                <input id="logotipo" type="file"
                                    class="form-control @error('logotipo') is-invalid @enderror" name="logotipo"
                                    accept='image/*'>

                                @error('logotipo')
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
