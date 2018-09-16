@extends('templates.template')
@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('conteudo')
    {{session()->flash('url', request()->header('referer'))}}
    <br><br><br><br>
    <div class="row">
        <div class="offset-md-2 col-md-9">
            <h2>Atualizar Coordenador</h2>
            <hr>
            @include('coordenador.form')
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function () {
            var id = $('#coordenador_id').val();

            $('.error').hide();

            $('#btnCancelar').on('click',function () {
                window.location.href = '/coordenador';
            });

            $.ajax({
                method: 'GET',
                url: '/coordenador/'+id,
                dataType: 'json',
                success: function (data) {
                    $.each(data, function (chave, valor) {
                        if(chave == 'id') {
                            $('#coordenador_id').val(valor);
                        }else{
                            $('#'+chave).val(valor);
                        }
                    });
                },
                error: function (data) {
                    var erro = data.responseJSON.message;
                    alert(erro);
                }
            });

            $('<input>').attr({
                type: 'hidden',
                id: '_token',
                name: '_token',
                value: $('meta[name=csrf-token]').attr('content')
            }).appendTo($('#formCoordenador'));

            $('<input>').attr({
                type: 'hidden',
                id: '_method',
                name: '_method',
                value: 'PUT'
            }).appendTo($('#formCoordenador'));

            $('#formCoordenador').submit(function (e) {
                e.preventDefault();
                $.ajax({
                    method:'POST',
                    url: '/coordenador/'+id,
                    dataType: 'json',
                    data: $(this).serialize(),
                    success: function(data) {
                        alert('Coordenador atualizado com sucesso!');
                        window.location.href = '/coordenador/'+data.coordenador_id;
                    },
                    error: function (data) {
                        var erros = data.responseJSON.errors;
                        $.each(erros, function (key, value) {
                            $('#error-'+key).text(''+value[0]).show();
                            $('#'+key).addClass('is-invalid');
                        })
                    }
                });
            });

            $('#btnSalvar').on('click',function (e) {
                e.preventDefault();
                var confirmacao = confirm('Realmente deseja submeter os dados?');
                if(confirmacao){
                    $('#formCoordenador').submit();
                }
            });
        });
    </script>

@endsection
