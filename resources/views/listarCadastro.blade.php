@extends('layouts.logged')

@section('content')

 <h1 class ="title"> <a href="{{route('index')}}"><span style="font-size: 28px; margin-left: 150px; margin-top: 300px" class="glyphicon glyphicon-circle-arrow-left"></span></a>  Listar cadastros</h1>

 <table class="table table-striped" style="margin-top: 100px">
        <tr>
            <th>Id</th>
            <th>Reclamação  </th>
            <th>Thumbs UP  </th>
            <th>Thumbs DOWN  </th>
            
        </tr>
        @foreach ($reclamacoes as $reclamacao)
        <tr>
            <td>  {{$reclamacao->id}}</td>
            <td>{{$reclamacao->conteudoReclamacao}}</td>
            <td>{{$reclamacao->rankingMais}}</td>
            <td>{{$reclamacao->rankingMenos}}</td>
        </tr>
        @endforeach
    </table>

@endsection
