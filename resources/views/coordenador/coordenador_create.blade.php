@extends('templates.template')
@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('conteudo')
    {{session()->flash('url', request()->header('referer'))}}
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
    <script>
        $(document).ready(function () {

            $('.error').hide();

            $('#btnCancelar').on('click',function () {
                window.location.href = '/coordenador';
            });

            $('<input>').attr({
                type: 'hidden',
                id: '_token',
                name: '_token',
                value: $('meta[name=csrf-token]').attr('content')
            }).appendTo($('#formCoordenador'));

            $('#formCoordenador').submit(function (e) {
                e.preventDefault();
                $.ajax({
                    method:'POST',
                    url: '/coordenador',
                    dataType: 'json',
                    data: $(this).serialize(),
                    success: function(data) {
                        alert('Coordenador cadastrado com sucesso!');
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
