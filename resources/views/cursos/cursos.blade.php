@extends('templates.template')
@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .form-group{
            margin-bottom: 0.5em;
        }
    </style>
@endsection
@section('conteudo')
    <br><br><br><br>
    <h2>Cursos</h2>
    <div class="row ">
        <div class="col-md-12 text-right">
            {{--<button class="btn-sm btn-primary" id="btnNovoCurso" data-toggle="modal" data-target="#create"><i class="fa fa-plus"></i> <strong>Novo Curso<strong></button>--}}
            <a href="{{ route('cursos.create') }}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Novo curso</a>
        </div>
    </div><br>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-sm table-bordered text-center display" id="tableCursos" style="width: 100%;">
                <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Curso</th>
                    <th>Numero de Vagas</th>
                    <th>Carga Horária</th>
                    <th>Ação</th>
                </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('#tableCursos').DataTable({
                language:{
                    url:"/js/DataTables/datatable-pt-br.json"
                },
                searching: false,
                // paging: false,
                info: true,
                ajax: {
                    url: '{{route("cursos.index")}}',
                    type: 'GET'
                },
                columns: [
                    { data: "id" },
                    { data: "denominacaoCurso" },
                    { data: "vagaTurno" },
                    { data: "cargaHorariaCurso" },
                    {
                        mRender: function ( data, type, row ) {
                            return '<a href="/cursos/'+row.id+'" class="btn btn-primary btn-sm">Visualizar</a>';
                        }
                    }
                ]
            });

        });

    </script>
@endsection