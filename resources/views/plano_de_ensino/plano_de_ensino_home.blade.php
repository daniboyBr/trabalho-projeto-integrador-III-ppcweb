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
            <h2>Planos de Ensino</h2>
        </div>
        <div class="col-md-3 offset-7 text-right mt-1">
            <a href="/planoDeEnsino/create" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Novo Plano de Ensino</a>
        </div>
    </div><br>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-sm table-bordered text-center display" id="tblPlanoDeEnsino" style="width: 100%;">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Curso</th>
                        <th>Disciplina</th>
                        <th>Professor</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
@endsection
@section('js')
    <script src="/js/plano_de_ensino/plano_de_ensino_home.js"></script>
@endsection