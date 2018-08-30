@extends('templates.template')
@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('conteudo')
    <br><br><br><br>
    <h2>Cursos</h2>
    <div class="row ">
        <div class="col-md-12 text-right">
            <button class="btn-sm btn-primary"  data-toggle="modal" data-target="#create"><i class="fa fa-plus"></i> <strong>Novo Curso<strong></button>
        </div>
    </div><br>
    <div class="row">
        <table class="table table-sm table-bordered">
            <thead>
            <tr>
                <th>Codigo</th>
                <th>Curso</th>
                <th>Numero de Vagas</th>
                <th>Carga Horária</th>
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
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
    <div id="create" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Novo Curso</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/cursos" method="POST">
                    <div class="modal-body">
                        @csrf
                        @include('cursos.form')
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Salvar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection