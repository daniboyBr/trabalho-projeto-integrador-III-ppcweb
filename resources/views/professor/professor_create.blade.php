@extends('templates.template')
@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('conteudo')
    <br><br><br>
    <div class="row">
        <div class="col-md-12">
            <h2>Cadastro de Professor</h2>
            <hr>
            @include('professor.form.form')
        </div>
    </div>
@endsection
@section('js')
    <script src="/js/professor/professor_create.js"></script>
@endsection