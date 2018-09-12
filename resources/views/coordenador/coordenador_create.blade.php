@extends('templates.template')
@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('conteudo')
    {{session()->flash('url', request()->header('referer'))}}
    <br><br><br><br>
    <div class="row">
        <div class="offset-md-2 col-md-9">
            @if(request()->route()->getName() == 'coordenador.edit' && !empty($coordendor->id))
                <h2>Altualizar Coordenador</h2>
                <hr>
                <form id="formCoordenador" action="{{route('coordenador.update',$coordenador->id)}}" method="POST">
                    @method('PUT')
                    <input type="hidden" name="id" id="id" value="{{$coordenador->id}}">
                    @csrf
            @elseif( request()->route()->getName() == 'coordenador.create')
                <h2>Cadastrar Novo Coordendaor</h2>
                <hr>
                <form id="formCoordenador" action="{{route('coordenador.store')}}" method="POST">
                    @csrf
            @else
                <h2>Coordenador: {{$coordenador->nomeCoordenador}}</h2>
            @endif
                            <div class="form-group row">
                                <label for="nomeCoordenador" class="col-xs-3 col-form-label mr-0 pr-4">Nome do Coordenador:</label>
                                <div class="col-sm-9 p-0 m-0">
                                    <input type="text" class="form-control form-control-sm  {{ $errors->has('nomeCoordenador')? 'is-invalid' : ''}}" id="nomeCoordenador" name="nomeCoordenador" placeholder="Nome do Coordenador" value="{{$coordenador->nomeCoordenador}}">
                                    @if ($errors->has('nomeCoordenador'))
                                        <small class="text-danger">{{ $errors->first('nomeCoordenador') }}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="cpfCoordenador" class="col-xs-3 col-form-label pr-4 mr-3">CPF do Coordenador:</label>
                                <div class="col-sm-9 p-0 m-0 ">
                                    <input type="text" class="form-control form-control-sm {{ $errors->has('cpfCoordenador')? 'is-invalid' : ''}}" id="cpfCoordenador" name="cpfCoordenador" placeholder="CPF do Coordenador" value="{{$coordenador->cpfCoordenador}}">
                                    @if ($errors->has('cpfCoordenador'))
                                        <small class="text-danger">{{ $errors->first('cpfCoordenador') }}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="titulacaoCoordenador" class="col-xs-3 col-form-label pr-2">Titulação do Coordenador:</label>
                                <div class="col-sm-9 p-0 m-0">
                                    <input type="text" class="form-control form-control-sm {{ $errors->has('titulacaoCoordenador')? 'is-invalid' : ''}}" id="titulacaoCoordenador" name="titulacaoCoordenador" placeholder="Titulação do Coordenador" value="{{$coordenador->titulacaoCoordenador}}">
                                    @if ($errors->has('titulacaoCoordenador'))
                                        <small class="text-danger">{{ $errors->first('titulacaoCoordenador') }}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tempoDedicacaoCoordenador" class="col-xs-3 col-form-label pr-1">Tempo de Dedicação do Coordenador:</label>
                                <div class="col-sm-8 p-0 m-0">
                                    <input type="text" class="form-control form-control-sm {{ $errors->has('tempoDedicacaoCoordenador')? 'is-invalid' : ''}}" id="tempoDedicacaoCoordenador" name="tempoDedicacaoCoordenador" placeholder="Tempo de Dedicação" value="{{$coordenador->tempoDedicacaoCoordenador}}">
                                    @if ($errors->has('tempoDedicacaoCoordenador'))
                                        <small class="text-danger">{{ $errors->first('tempoDedicacaoCoordenador') }}</small>
                                    @endif
                                </div>
                            </div>

                            @if( request()->route()->getName() != 'coordenador.show')
                                <div class="row d-flex flex-row-reverse">
                                    <a href="{{ request()->route()->getName() == 'coordenador.create'? route('coordenador.index') : route('coordenador.show',$coordenador->id)  }}" class="btn btn-danger btn-sm ml-2">Cancelar</a>
                                    <button type="submit" id="btnSalvar" class="btn btn-success btn-sm ">Salvar</button>
                                </div>
                        </form><br><br><br>
                    @else
                        <div class="row d-flex flex-row-reverse">
                            <a href="{{ route('coordenador.index') }}" class="btn btn-primary btn-sm ml-3" >Voltar</a>
                            <a href="#" class="btn btn-danger btn-sm ml-3" id="btnRemover" onclick="remover({{$coordenador->id}});">Remover</a>
                            <a href="{{route('coordenador.edit',$coordenador->id)}}" class="btn btn-warning btn-sm ">Alterar</a>
                        </div><br><br><br>
            @endif
        </div>
    </div>
@endsection
@section('js')
    <script>

        @if(request()->route()->getName() == 'coordenador.show')

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
                $('#formCoordenador').submit();
            }
        });
        @endif



    </script>

@endsection
