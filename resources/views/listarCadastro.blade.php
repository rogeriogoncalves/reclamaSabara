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
        @foreach ($relatorios as $relatorio)
        <tr>
            <td>  {{$relatorio->id}}</td>
            <td>{{$relatorio->reclamacao}}</td>
            <td>{{$relatorio->rankingMais}}</td>
            <td>{{$relatorio->rankingMenos}}</td>
        </tr>
        @endforeach
    </table>

@endsection
