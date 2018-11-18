@extends('layouts.logged')

@section('content')
    <div class="card-header card-header-tabs">
        <h1 class="title w-100 text-center">Editar Perfil</h1>
    </div>

    <div class="form-group col-md-12 mt-3 pt-3">
        <form method="post" action="{{route('usuario.update', ['usuario' => $user->id])}}"
              enctype="multipart/form-data">
            <input type="hidden" name="_method" value="put">
            @csrf

            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome Completo') }}</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                           name="name" value="{{ $user->name }}" required autofocus>

                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="cpf" class="col-md-4 col-form-label text-md-right">{{ __('CPF') }}</label>

                <div class="col-md-6">
                    <input id="cpf" type="text" class="form-control{{ $errors->has('cpf') ? ' is-invalid' : '' }}"
                           name="cpf" value="{{ $user->cpf }}" required autofocus>

                    @if ($errors->has('cpf'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('cpf') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                           name="email" value="{{ $user->email }}" required>

                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="photo" class="col-md-4 col-form-label text-lg-right">{{__('Foto')}}</label>
                <div class="col-md-6">
                    <input id="photo" type="file" class="form-control-file" name="photo">
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Editar') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <form method="post" action="{{route('usuario.destroy', ['usuario' => $user->id])}}">
                @csrf
                <input type="hidden" name="_method" value="delete">
                <button type="submit" class="btn btn-danger">
                    {{__('Excluir Perfil')}}
                </button>
            </form>
        </div>
    </div>


@endsection