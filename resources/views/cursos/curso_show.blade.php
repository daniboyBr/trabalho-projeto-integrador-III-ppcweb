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
                    <h3>Disciplinas Associadas</h3>
                </div>
                <div class="col-md-9">
                    <div class="row">
                        <div class="offset-md-3 col-md-6">
                            <div class="form-group">
                                <select name="disciplina_id" id="includeDisciplinas" class="form-control-sm custom-select">
                                    <option value="">--Selecione uma Disciplina--</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" id="btnDisciplinas" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Incluir Disciplina</button>
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
