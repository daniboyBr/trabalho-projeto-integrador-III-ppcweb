@extends('templates.template')
@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('conteudo')
    <br><br><br><br>
    <div class="row">
        <div class="offset-md-2 col-md-9">
            <h3>Dados do Curso</h3>
            <hr>
            @include('cursos.form')
            <div class="row d-flex flex-row-reverse">
                <button onclick="remover()" class="btn btn-danger btn-sm ml-2" style="display: none" id="btnRemover">Remover</button>
                <button type="button" class="btn btn-warning btn-sm" id="btnAtualizar" style="display: none">Atualizar</button>
            </div>
        </div>
    </div><br>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3">
                    <h3>Matriz Curricular</h3>
                </div>
                <div class="col-md-9">
                    <div class="row">
                        <div class="offset-md-1 col-md-8">
                            <div class="form-group">
                                <input type="hidden" name="disciplina_id" style="display: none" id="disciplina_id">
                                <input type="text" name="disciplina_id" id="search-disciplina" class="form-control form-control-sm">
                            </div>
                            Buscar por:&emsp;
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="search-field" value="codigoDisciplina" checked="checked">Código da Disciplina
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="search-field" value="nomeDisciplina">Nome da Disciplina
                                </label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button type="button" id="btnDisciplinas" class="btn btn-sm btn-primary" onclick="adicionarDisciplina();"><i class="fa fa-plus"></i> Adicionar Disciplina</button>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <table id="tableDisciplinas" class="table table-sm display text-center" style="width: 100%;">
                <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>Disciplina</th>
                        <th>Carga Horária</th>
                        <th>Semestre</th>
                        <th>Carga Horária</th>
                        <th>Ação</th>
                        <th style="display: none"></th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div><br>
@endsection
@section('js')
    <script src="/js/curso/curso_show.js"></script>
@endsection
