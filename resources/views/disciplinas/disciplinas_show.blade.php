@extends('templates.template')
@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('conteudo')
    <br><br><br><br>
    <div class="row">
        <div class="offset-md-2 col-md-9">
            <h3>Dados da Disciplina</h3>
            <hr>
            @include('disciplinas.form')
            <div class="row d-flex flex-row-reverse">
                <button onclick="remover()" class="btn btn-danger btn-sm ml-2">Remover</button>
                <button type="button" class="btn btn-warning btn-sm" id="btnAtualizar">Atualizar</button>
            </div>
            <br><br><br>
        </div>
    </div>
@endsection
@section('js')
    <script src="/js/disciplinas/disciplinas_show.js"></script>
@endsection
