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
    </div>
@endsection
@section('js')
    <script>
        var coordenadores = [];

        $(document).ready(function () {
            $('#btnCancelar').on('click',function () {
                window.history.back();
            });

            $.ajax({
                method: 'GET',
                url: '{{route('coordenador.index')}}',
                dataType:'json',
                success: function (data) {
                    coordenadores = data;
                }
            });

            $.ajax({
                method: 'GET',
                url: '{{route('cursos.show', $curso_id)}}',
                dataType: 'json',
                success: function (data) {
                    $.each(data, function (key, value) {
                        $('#'+key).val(value);
                        if(key == 'id'){
                            $('#curso_id').val(value);
                        }else if(key == 'coordenador') {
                            coordenadores.push(value);

                            $.each(coordenadores, function (i,item) {
                                var opcao = '<option value="'+coordenadores[i].id+'">'+coordenadores[i].nomeCoordenador+'</option>';
                                $('#coordenadorList').append(opcao);
                            });

                            $.each(value, function (chave, valor) {
                                if (chave === 'id') {
                                    $('#coordenadorList').val(chave);
                                }
                                $('#' + chave).val(valor);
                            });
                        }
                    });
                }
            });

            $('#coordenadorList').on('change',function () {
                var opcao = $('#coordenadorList').val();
                $.each(coordenadores, function (i,item) {
                    if(opcao == coordenadores[i].id){
                        $('#cpfCoordenador').val(coordenadores[i].cpfCoordenador);
                        $('#titulacaoCoordenador').val(coordenadores[i].titulacaoCoordenador);
                        $('#tempoDedicacaoCoordenador').val(coordenadores[i].tempoDedicacaoCoordenador);
                        $('.sofDeleted').remove();
                    }else if(opcao == '') {
                        $('#cpfCoordenador').val('');
                        $('#titulacaoCoordenador').val('');
                        $('#tempoDedicacaoCoordenador').val('');
                        $('.sofDeleted').remove();
                    }
                });
            });
        });
    </script>
@endsection
