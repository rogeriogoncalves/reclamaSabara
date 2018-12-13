@extends('layouts.logged')

@section('content')
    <h2>Minhas Reclamações</h2>

    <div class="my-auto py-2 rounded shadow-sm">
        @if($reclamacoes->count())
            @foreach ($reclamacoes as $reclamacao)
                <div class="media text-muted px-md-2 pt-3">
                    <img src="{{ asset($reclamacao->photo) }}" alt="Avatar do usuario que fez reclamação"
                         class="mr-2 rounded" style="width: 64px; height: 64px;"
                         src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%2232%22%20height%3D%2232%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2032%2032%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_1666b6da72d%20text%20%7B%20fill%3A%23007bff%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A2pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_1666b6da72d%22%3E%3Crect%20width%3D%2232%22%20height%3D%2232%22%20fill%3D%22%23007bff%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2211.046875%22%20y%3D%2217.2%22%3E32x32%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E"
                         data-holder-rendered="true">
                    <p class="media-body pb-3 small mb-0 lh-125 border-bottom border-gray">
                        <strong class="d-block text-gray-dark"> {{$reclamacao->name}} </strong>
                        {{ $reclamacao->conteudoReclamacao }}

                        <br>
                        <a class="btnThumbsUpIcon col-2">
                            <i class="far fa-thumbs-up"></i>
                            <span class="badge badge-pill badge-success notification">{{ $reclamacao->rankingMais }}</span>
                        </a>
                        <a class="btnThumbsUpIcon">
                            <i class="far fa-thumbs-down"></i>
                            <span class="badge badge-pill badge-danger notification">{{ $reclamacao->rankingMenos }}</span>
                        </a>
                        @if($reclamacao->denunciada == 1)
                            <a class="btnThumbsUpIcon col-2" id="mouse-pass">
                                <i class="fas fa-exclamation-triangle"></i>
                                <span id="show-message" class="badge badge-pill badge-danger"> Esta reclamação está sob análise devido ao alto índice de
                                        denúncias de outros usuários.
                                    </span>
                            </a>
                    @endif
                    <p class="message-detail pb-sm-4 small align-bottom bs-popover-bottom" style="margin-top: 4.5%;">
                        Data da reclamação: {{date('d/m/Y \à\s H:i:s', strtotime($reclamacao->created_at))}}
                    </p>
                    </p>

                    @if($reclamacao->idUsuario == Auth::user()->id)
                        <a href="{{route('reclamar.edit', ['reclamar' => $reclamacao->id])}}"
                           class="btn btn-danger align-top" style="margin-top: -2%; margin-left: -7%;">Editar</a>
                    @endif

                </div>
            @endforeach
        @else
            <div class="text-center">
                <strong class="p-4 p-md-2 d-block text-dark ">Você ainda não fez nenhuma reclamação</strong>
                <a href="/reclamar" class="btn btn-dark mt-3">
                    <i class="fa fa-plus-square pr-2"></i> Quero reclamar!
                </a>
            </div>
        @endif

        <small class="d-block text-right mt-3">
            <a href="#">All updates</a>
        </small>
    </div>
@endsection