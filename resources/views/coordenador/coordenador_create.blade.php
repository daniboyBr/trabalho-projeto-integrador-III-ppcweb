@extends('templates.template')
@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('conteudo')
    @php
        session()->flash('url', request()->header('referer'))
    @endphp
    <br><br><br><br>
    <div class="row">
        <div class="offset-md-2 col-md-9">
            <h2>Novo Coordenador</h2>
            <hr>
            @include('coordenador.form')
        </div>
    </div>
@endsection
@section('js')
    <script src="/js/coordenador/coordenador_create.js"></script>
@endsection
