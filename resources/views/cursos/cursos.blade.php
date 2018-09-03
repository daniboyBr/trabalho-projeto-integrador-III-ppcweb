@extends('templates.template')
@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .form-group{
            margin-bottom: 0.5em;
        }
    </style>
@endsection
@section('conteudo')
    <br><br><br><br>
    <h2>Cursos</h2>
    <div class="row ">
        <div class="col-md-12 text-right">
            {{--<button class="btn-sm btn-primary" id="btnNovoCurso" data-toggle="modal" data-target="#create"><i class="fa fa-plus"></i> <strong>Novo Curso<strong></button>--}}
            <a href="{{ route('cursos.create') }}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Novo curso</a>
        </div>
    </div><br>
    <div class="row">
        <table class="table table-sm table-bordered text-center">
            <thead>
            <tr>
                <th>Codigo</th>
                <th>Curso</th>
                <th>Numero de Vagas</th>
                <th>Carga Horária</th>
                <th>Ação</th>
            </tr>
            </thead>
            <tbody>
                @if(isset($data) && !empty($data))
                    @foreach($data as $row)
                        <tr>
                            <td>{{$row->id}}</td>
                            <td>{{$row->denominacaoCurso}}</td>
                            <td>{{$row->vagaTurno}}</td>
                            <td>{{$row->cargaHorariaCurso}}</td>
                            <td><a href="{{route('cursos.show',$row->id)}}" class="btn btn-primary">Visualizar</a></td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
@endsection
@section('js')
    <script src="/js/curso.js"></script>
@endsection