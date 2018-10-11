@extends('templates.template')
@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('conteudo')
    <br><br><br><br>
    <div class="row">
        <div class="offset-md-2 col-md-9">
            <h2>Atualizar Curso</h2>
            @include('cursos.form')
        </div>
    </div><br><br><br>
@endsection
@section('js')
    <script src="/js/curso/curso.js"></script>
    <script src="/js/curso/curso_edit.js"></script>
@endsection
