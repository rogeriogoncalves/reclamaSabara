@extends('layouts.logged')

@section('content')
<div class="container-fluid">

<h1 class ="title"><a href="{{route('home')}}"><span style="font-size: 28px" class="glyphicon glyphicon-circle-arrow-left"></span></a>  Cadastro de Reclamações</h1>
    
    <form class="form" method="post" action="{{route('store')}}" > 
        
        {!! csrf_field() !!}
        
        <div class="form-group">
            <p><b>Reclamação:</b><input type="text" name="reclamacao" placeholder="Reclamação" class="form-control"></p>
        </div>
        
        <button class="btn btn-primary">Enviar</button>
    </form>
</div>

@endsection
