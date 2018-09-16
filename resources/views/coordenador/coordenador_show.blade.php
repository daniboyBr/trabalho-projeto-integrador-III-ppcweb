@extends('templates.template')
@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('conteudo')
    <br><br><br><br>
    <div class="row">
        <div class="offset-md-2 col-md-9">
            <h2>Coordenador</h2>
            <hr>
            @include('coordenador.form')
            <div class="row d-flex flex-row-reverse" id="acao">
                <button onclick="remover()" class="btn btn-danger btn-sm ml-2" id="btnAtivar">Remover</button>
                <button type="button" class="btn btn-warning btn-sm" id="btnAtualizar">Atualizar</button>
            </div>
            <br><br><br>
        </div>
    </div>
@endsection
@section('js')
    <script>

        $('input').attr('disabled','disabled');
        $('select').attr('disabled','disabled');
        $('#formCoordenador').find('.btn').remove();

        $('<input>').attr({
            type: 'hidden',
            id: 'deleted_at',
            name: 'deleted_at',
        }).appendTo($('#formCoordenador'));




        $.ajax({
            method: 'GET',
            url: '/coordenador/'+$('#coordenador_id').val(),
            dataType: 'json',
            success: function (data) {
                $.each(data, function (chave, valor) {
                    if(chave == 'id') {
                        $('#coordenador_id').val(valor);
                    }else{
                        $('#'+chave).val(valor);
                    }
                });
                ativar();
            },
            error: function (data) {
                var erro = data.responseJSON.message;
                alert(erro);
            }
        });

        $('#btnAtualizar').on('click',function () {
            var id = $('#coordenador_id').val();
            window.location.href = '/coordenador/'+id+'/edit';
        });

        function remover(){
            alert('Esta ação vai desabilitar o coordenador e não excluí-lo pois outros objetos dependem dele')
            var token = $('meta[name=csrf-token]').attr('content');
            var id = $('#coordenador_id').val();
            var confirmacao = confirm('Realmente deseja remover os dados?');
            if(confirmacao){
                var formData = new FormData();
                $.ajax({
                    method: 'POST',
                    url: '/coordenador/'+id,
                    data: {
                        _token: token,
                        _method: 'DELETE',
                        id: id
                    },
                    dataType: 'json',
                    success: function (data) {
                        alert('Coordenador removido com sucesso');
                        window.location.href = '/coordenador';
                    }
                });
            }
        }


        function ativar() {
            var ativo = $('#deleted_at').val();
            if(ativo != ''){
                $('#btnAtivar').remove();
                $('<button>').attr({
                   class: 'btn btn-success mr-2 btn-sm',
                   type: 'button',
                }).text('Ativar').appendTo($('#acao'));
            }
        }
    </script>

@endsection
