@extends('layouts.logged')

@section('content')
<div class="container-fluid mt-2 pt-1 mt-md-3 pt-md-3">

<h1 class ="title w-100 text-center  "><a href="{{route('index')}}"></a>Cadastro de Reclamações</h1>
    
    @if(isset($errors) && count($errors) > 0)
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
        <p>{{$error}}</p>
        @endforeach
    </div>
    @endif
    
    <div class="form-group col-md-12 mt-3 pt-3">
        <form class="form" method="post" action="{{route('store')}}">
            {!! csrf_field() !!}
            <div class="form-group">
                <p><b>Reclamação:</b><input type="text" name="conteudoReclamacao" placeholder="Reclamação" class="form-control"></p>
            </div>
            <div class="w-100 text-center">
                <button class="btn btn-primary">Enviar</button>
            </div>
        </form>
    </div>
</div>

@endsection