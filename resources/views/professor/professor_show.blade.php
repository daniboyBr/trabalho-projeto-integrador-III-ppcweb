@extends('templates.template')
@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        fieldset.scheduler-border {
            border: 1px groove #ddd !important;
            padding: 0 1.4em 1.4em 1.4em !important;
            margin: 0 0 1.5em 0 !important;
            -webkit-box-shadow:  0px 0px 0px 0px #000;
            box-shadow:  0px 0px 0px 0px #000;
        }
        legend.scheduler-border {
            font-size: 1.0em !important;
            font-weight: bold !important;
            text-align: left !important;
            width:auto;
            padding:0 10px;
            border-bottom:none;
        }
        .linha-vertical {
            border-right: 2px solid;/* Adiciona borda esquerda na div como ser fosse uma linha.*/
            box-sizing: border-box;
        }
    </style>
@endsection
@section('conteudo')
    <br><br><br>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-4">
                    <h2>Professor</h2>
                </div>
                <div class="col-md-8">
                    <div class="row d-flex flex-row-reverse mr-2">
                        <button onclick="remover()" class="btn btn-danger btn-sm ml-2" style="display: none" id="btnRemover">Remover</button>
                        <button type="button" class="btn btn-warning btn-sm" id="btnAtualizar" style="display: none">Atualizar</button>
                    </div>
                </div>
            </div>

            <hr>
            @include('professor.form.form')
        </div>
    </div>
@endsection
@section('js')
    <script src="/js/professor/professor_show.js"></script>
    <script src="/js/professor/professor_dataDiff.js"></script>
    <script>
        $('.display').on('draw.dt',function () {
            $(".dataTables_scrollHeadInner").css({"width":"100%"});
            $(".table").css({"width":"100%"});
        }).trigger('draw.dt');
    </script>
@endsection