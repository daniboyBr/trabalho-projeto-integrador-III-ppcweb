@extends('templates.template')
@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('conteudo')
    <br><br><br><br>
    <div class="row">
        <div class="offset-md-2 col-md-9">
            @if(request()->route()->getName() == 'cursos.edit' && !empty($curso->id))
                <h2>Altualizar Curso</h2>
                <hr>
                <form id="formCursos" action="{{route('cursos.update',$curso->id)}}" method="POST">
                    @method('PUT')
                    <input type="hidden" name="id" id="id" value="{{$curso->id}}">
                    @csrf
            @elseif( request()->route()->getName() == 'cursos.create')
                <h2>Cadastrar Novo Curso</h2>
                <hr>
                <form id="formCursos" action="{{route('cursos.store')}}" method="POST">
                @csrf
            @else
                <h2>Denominação Curso: {{$curso->denominacaoCurso}}</h2>
            @endif
                <div class="form-group row">
                    <label for="tipoCurso" class="col-xs-3 col-form-label mr-0 pr-0">Tipo do Curso:</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control form-control-sm  {{ $errors->has('tipoCurso')? 'is-invalid' : ''}}" id="tipoCurso" name="tipoCurso" placeholder="Tipo do Curso" value="{{$curso->tipoCurso}}">
                        @if ($errors->has('tipoCurso'))
                            <small class="text-danger">{{ $errors->first('tipoCurso') }}</small>
                        @endif
                    </div>
                    <label for="modalidade" class="col-xs-1 col-form-label">Modadlidade:</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control form-control-sm {{ $errors->has('modalidade')? 'is-invalid' : ''}}" id="modalidade" name="modalidade" placeholder="Modadlidade" value="{{$curso->modalidade}}">
                        @if ($errors->has('modalidade'))
                            <small class="text-danger">{{ $errors->first('modalidade') }}</small>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="denominacaoCurso" class="col-xs-3 col-form-label pr-2">Denominação do Curso:</label>
                    <div class="col-sm-9 p-0 m-0">
                        <input type="text" class="form-control form-control-sm {{ $errors->has('denominacaoCurso')? 'is-invalid' : ''}}" id="denominacaoCurso" name="denominacaoCurso" placeholder="Denominação do Curso" value="{{$curso->denominacaoCurso}}">
                        @if ($errors->has('denominacaoCurso'))
                            <small class="text-danger">{{ $errors->first('denominacaoCurso') }}</small>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="habilitacao" class="col-xs-3 col-form-label">Habilitação:</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control form-control-sm {{ $errors->has('habilitacao')? 'is-invalid' : ''}}" id="habilitacao" name="habilitacao" placeholder="Habilitação" value="{{$curso->habilitacao}}">
                        @if ($errors->has('habilitacao'))
                            <small class="text-danger">{{ $errors->first('habilitacao') }}</small>
                        @endif
                    </div>
                    <label for="localOferta"  class="col-xs-3 col-form-label">Local da Oferta: </label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control form-control-sm {{ $errors->has('localOferta')? 'is-invalid' : ''}}" id="localOferta" name="localOferta" placeholder="Local da Oferta" value="{{$curso->localOferta}}">
                        @if ($errors->has('localOferta'))
                            <small class="text-danger">{{ $errors->first('localOferta') }}</small>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="turnoFuncionamento" class="col-xs-3 pr-1 col-form-label">Turnos de Funcionamento:</label>
                    <div class="col-sm-3 p-0 m-0">
                        <input type="text" class="form-control form-control-sm {{ $errors->has('turnoFuncionamento')? 'is-invalid' : ''}}" id="turnoFuncionamento" name="turnoFuncionamento" placeholder="Turnos de Funcionamento" value="{{$curso->turnoFuncionamento}}">
                        @if ($errors->has('turnoFuncionamento'))
                            <small class="text-danger">{{ $errors->first('turnoFuncionamento') }}</small>
                        @endif
                    </div>
                    <label for="vagaTurno" class="col-xs-3 p-0 m-0 pl-1 col-form-label">Numero de Vagas para cada turno:</label>
                    <div class="col-sm-2 p-0 m-0 pl-1">
                        <input type="text" class="form-control form-control-sm {{ $errors->has('vagaTurno')? 'is-invalid' : ''}}" id="vagaTurno" name="vagaTurno" placeholder="Nº Vagas" data-toggle="tooltip" title="Vagas Anuais" value="{{$curso->vagaTurno}}">
                        @if ($errors->has('vagaTurno'))
                            <small class="text-danger">{{ $errors->first('vagaTurno') }}</small>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="cargaHorariaCurso" class="col-xs-3 col-form-label">Carga Horária do Curso: </label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control form-control-sm {{ $errors->has('cargaHorariaCurso')? 'is-invalid' : ''}}" id="cargaHorariaCurso" name="cargaHorariaCurso" placeholder="Carga Horária" data-toggle="tooltip" title="Horas" value="{{$curso->cargaHorariaCurso}}">
                        @if ($errors->has('cargaHorariaCurso'))
                            <small class="text-danger">{{ $errors->first('cargaHorariaCurso') }}</small>
                        @endif
                    </div>
                </div>
                <hr>
                <h3>Estrutura Curricular:</h3>
                <div class="form-group row">
                    <label for="regimeLetivo"  class="col-xs-2 offset-sm-1 col-form-label">Regime Letivo</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control form-control-sm {{ $errors->has('regimeLetivo')? 'is-invalid' : ''}}" id="regimeLetivo" name="regimeLetivo" placeholder="Regime Letivo" value="{{$curso->regimeLetivo}}">
                        @if ($errors->has('regimeLetivo'))
                            <small class="text-danger">{{ $errors->first('regimeLetivo') }}</small>
                        @endif
                    </div>
                    <label for="periodos" class="col-xs-1 col-form-label">Períodos:</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control form-control-sm {{ $errors->has('periodos')? 'is-invalid' : ''}}" id="periodos" name="periodos" placeholder="Períodos" value="{{$curso->periodos}}">
                        @if ($errors->has('periodos'))
                            <small class="text-danger">{{ $errors->first('periodos') }}</small>
                        @endif
                    </div>
                </div>

                <h3>Coordenador de Curso: </h3>
                <div class="form-group row">
                    <input type="hidden" id="coordenador_id" value="{{$curso->coordenador_id}}">
                    <input type="hidden" id="coordenador_nome" value="{{$curso->coordenador->nomeCoordenador}}">
                    <label for="coordenadorList" class="col-xs-2 pr-1">Nome:</label>
                    <select name="coordenador_id" id="coordenadorList" class="form-control form-control-sm col-sm-6 mr-3 {{ $errors->has('coordenador_id')? 'is-invalid' : ''}}">
                        <option value="">-- Selecione um Coordenador --</option>
                    </select>
                    <button type="button" class="btn btn-primary btn-sm"> <i class="fa fa-plus"></i> <strong>Novo Coordenador</strong></button>
                    <br><br>
                    @if ($errors->has('coordenador_id'))
                        <small class="text-danger ml-5">{{ $errors->first('coordenador_id') }}</small>
                    @endif
                </div>
                <div class="form-group row">
                    <label for="cpfCoordenador" class="col-xs-2 pr-1">CPF:</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control form-control-sm" id="cpfCoordenador" name="cpfCoordenador" placeholder="Preenchido Automaticamente" disabled="disabled" value="{{$curso->coordenador->cpfCoordenador}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="titulacaoCoordenador" class="col-xs-2 pr-1">Titulação: </label>
                    <div class="col-sm-4">
                        <input name="titulacaoCoordenador" id="titulacaoCoordenador" class="form-control form-control-sm" placeholder="Preenchido Automaticamente" disabled="disabled" value="{{$curso->coordenador->titulacaoCoordenador}}"/>
                    </div>
                    <label for="tempoDedicacaoCoordenador" class="col-xs-3 pr-1">Tempo de Dedicação: </label>
                    <div class="col-sm-4">
                        <input name="tempoDedicacaoCoordenador" id="tempoDedicacaoCoordenador" class="form-control form-control-sm" placeholder="Preenchido Automaticamente" disabled="disabled" value="{{$curso->coordenador->tempoDedicacaoCoordenador}}"/>
                    </div>
                </div>

            @if( request()->route()->getName() != 'cursos.show')
                <div class="row d-flex flex-row-reverse">
                    <a href="{{ request()->route()->getName() == 'cursos.create'? route('cursos.index') : route('cursos.show',$curso->id)  }}" class="btn btn-danger btn-sm ml-2">Cancelar</a>
                    <button type="submit" id="btnSalvar" class="btn btn-success btn-sm ">Salvar</button>
                </div>
                </form><br><br><br>
            @else
                <div class="row d-flex flex-row-reverse">
                    <a href="{{ route('cursos.index') }}" class="btn btn-primary btn-sm ml-3" >Voltar</a>
                    <a href="#" class="btn btn-danger btn-sm ml-3" id="btnRemover" onclick="remover({{$curso->id}});">Remover</a>
                    <a href="{{route('cursos.edit',$curso->id)}}" class="btn btn-warning btn-sm ">Alterar</a>
                </div><br><br><br>
            @endif
        </div>
    </div>
@endsection
@section('js')
    <script>

        @if(request()->route()->getName() == 'cursos.show')

            $('input').attr('disabled','disabled');
            $('select').attr('disabled','disabled');

            function remover(id){

                var token = $('meta[name=csrf-token]').attr('content');

                var confirmacao = confirm('Realmente deseja remover os dados?');
                if(confirmacao){
                    var formData = new FormData();
                    $.ajax({
                        method: 'POST',
                        url: '{{route('cursos.destroy',$curso->id)}}',
                        data: {
                            _token: token,
                            _method: 'DELETE',
                            id: id
                        },
                        dataType: 'json',
                        success: function (data) {
                            alert('Curso removido com sucesso');
                            window.location.href = '{{route('cursos.index')}}';
                        }
                    });
                }
            }
        @else
            $('#btnSalvar').on('click',function (e) {
                e.preventDefault();
                var confirmacao = confirm('Realmente deseja submeter os dados?');
                if(confirmacao){
                    $('#formCursos').submit();
                }
            });
        @endif

        $(document).ready(function () {
            var coordenadores;
            var nome = $('#coordenador_nome').val();
            $.ajax({
                method: 'GET',
                url: '{{route('coordenador.index')}}',
                dataType:'json',
                success: function (data) {
                    coordenadores = data;
                    $.each(data, function (i,item) {
                        var opcao = '<option value="'+data[i].id+'">'+data[i].nomeCoordenador+'</option>';
                        $('#coordenadorList').append(opcao);
                    })

                    // $('#coordenadorList option:selected').text(nome);
                    $('#coordenadorList').find('option[text="'+nome+'"]').val();
                }
            });
            
            $('#coordenadorList').on('change',function () {
                var opcao = $('#coordenadorList').val();
                $.each(coordenadores, function (i,item) {
                    if(opcao == coordenadores[i].id){
                        $('#cpfCoordenador').val(coordenadores[i].cpfCoordenador);
                        $('#titulacaoCoordenador').val(coordenadores[i].titulacaoCoordenador);
                        $('#tempoDedicacaoCoordenador').val(coordenadores[i].tempoDedicacaoCoordenador);
                    }else if(opcao == '') {
                        $('#cpfCoordenador').val('');
                        $('#titulacaoCoordenador').val('');
                        $('#tempoDedicacaoCoordenador').val('');
                    }
                });
            });

        });

        $(document).ready(function () {
            var nome = $('#coordenador_nome').val();
            if(nome != ''){
                var id = $('#coordenador_id').val();
                var select = [];
                $("#coordenadorList option").each(function () {
                    select.push($(this).text());
                });
                if(select.indexOf(nome) == (-1)){
                    $('#coordenadorList').append('<option value="'+id+'" selected="selected" class="sofDeleted" disabled="disabled">'+nome+'</option>');
                }
            }
        });
    </script>

@endsection