@extends('layouts.logged')

@section('content')
<div class="container-fluid" style="margin-left: 100px; margin-top: 100px">

<h1 class ="title"><a href="{{route('index')}}"><span style="font-size: 28px" class="glyphicon glyphicon-circle-arrow-left"></span></a>  Cadastro de Reclamações</h1>
    
    @if(isset($errors) && count($errors) > 0)
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
        <p>{{$error}}</p>
        @endforeach
    </div>
    @endif
    <form class="form" method="post" action="{{route('store')}}"> 
        
        {!! csrf_field() !!}
        
        <div class="form-group">
            <p><b>Reclamação:</b><input type="text" name="reclamacao" placeholder="Reclamação" class="form-control"></p>
        </div>
        
        <button class="btn btn-primary">Enviar</button>
    </form>
</div>

@endsection
