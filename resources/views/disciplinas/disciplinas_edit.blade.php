@extends('templates.template')
@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('conteudo')
    <br><br><br><br>
    <div class="row">
        <div class="offset-md-2 col-md-9">
            <h2>Atualizar Disciplinas</h2>
            <hr>
            @include('disciplinas.form')
        </div>
    </div>
@endsection
@section('js')
    <script src="/js/disciplinas/disciplinas_edit.js"></script>
@endsection
