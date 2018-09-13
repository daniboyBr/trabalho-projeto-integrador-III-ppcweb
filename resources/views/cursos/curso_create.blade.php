@extends('templates.template')
@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('conteudo')
    <br><br><br><br>
    <div class="row">
        <div class="offset-md-2 col-md-9">
                <h2>Novo Curso</h2>
                @include('cursos.form')
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function () {
            $('.error').hide();

            $('<input>').attr({
                type: 'hidden',
                id: '_token',
                name: '_token',
                value: $('meta[name=csrf-token]').attr('content')
            }).appendTo($('#formCursos'));

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

            $('#formCursos').on('submit',function (e) {
                e.preventDefault();
                $.ajax({
                    method: 'POST',
                    url: '{{route('cursos.store')}}',
                    data: $(this).serialize(),
                    dataType: 'json',
                    success: function (data) {
                        alert(data.message);
                    },
                    error: function (data) {
                        var erros = data.responseJSON.errors;
                        $.each(erros, function (key, value) {
                            $('#error-'+key).text(''+value[0]).show();
                            $('#'+key).addClass('is-invalid');
                            if(key == 'coordenador_id'){
                                $('#coordenadorList').addClass('is-invalid');
                            }
                        })
                    }
                });
            });

        });
    </script>

@endsection
