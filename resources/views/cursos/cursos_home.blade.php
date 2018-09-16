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
    <div class="row ">
        <div class="col-md-2">
            <h2>Cursos</h2>
        </div>
        <div class="col-md-3 offset-7 text-right mt-1">
            <a href="{{ route('cursos.create') }}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Novo curso</a>
        </div>
    </div><br>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-sm table-bordered text-center display" id="tableCursos" style="width: 100%;">
                <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Curso</th>
                    <th>Numero de Vagas</th>
                    <th>Carga Horária</th>
                    <th>Ação</th>
                </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
@endsection
@section('js')
    <script src="/js/curso/curso_home.js"></script>
@endsection