@extends('templates.template')
@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('conteudo')
    <br><br><br><br>
    <div class="row">
        <div class="offset-md-2 col-md-9">
            <h2>Coordenador</h2>
            <hr>
            @include('coordenador.form')
            <div class="row d-flex flex-row-reverse" id="acao">
                <button onclick="remover()" class="btn btn-danger btn-sm ml-2" id="btnRemover">Remover</button>
                <button type="button" class="btn btn-warning btn-sm" id="btnAtualizar">Atualizar</button>
            </div>
            <br>
            <h3>Cursos Associados</h3>
            <hr>
            <table id="tableCursos" class="table table-sm display" style="width: 100%;">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Curso</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
@endsection
@section('js')
    <script src="/js/coordenador/coordenador_show.js"></script>
@endsection
