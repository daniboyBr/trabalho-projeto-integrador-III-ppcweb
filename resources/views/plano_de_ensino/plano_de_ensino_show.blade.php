@extends('templates.template')
@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('conteudo')
    <br><br><br><br>
    <div class="row">
        <div class="offset-md-2 col-md-9">
            <h2>Plano de Ensino</h2>
            <hr>
            @include('plano_de_ensino.form')
            <br><br><br>
        </div>
    </div>
@endsection
@section('js')
    <script src="/js/plano_de_ensino/plano_de_ensino_show.js"></script>
@endsection
