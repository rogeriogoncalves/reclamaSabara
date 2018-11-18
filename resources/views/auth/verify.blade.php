@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verifique o seu endereço de email') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Um link de verificação foi enviando para o seu email.') }}
                        </div>
                    @endif

                    {{ __('Antes de prosseguir, por favor verifique se você recebeu o link de verificação em seu endereço de email.') }}
                    {{ __('Se você não recebeu o email') }}, <a href="{{ route('verification.resend') }}">{{ __('clique aqui para solicitar outro envio.') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
