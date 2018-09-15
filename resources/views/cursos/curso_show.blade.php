@extends('templates.template')
@section('conteudo')
    <br><br><br><br>
    <div class="row">
        <div class="offset-md-2 col-md-9">
            <h3>Vizualizar Curso</h3>
            @include('cursos.form')
            <div class="row d-flex flex-row-reverse">
                <button onclick="remover()" class="btn btn-danger btn-sm ml-2">Remover</button>
                <button class="btn btn-warning btn-sm">Atualizar</button>
            </div>
            <br><br><br>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function () {
            $('#formCursos :input').prop('disabled',true);
            $('#formCursos select').prop('disabled',true);
            $('.btn').not('.btn-danger').not('.btn-warning').remove();
            $('#btnCancelar').remove();

            $.ajax({
                method: 'GET',
                url: '{{route('cursos.show', $curso_id)}}',
                dataType: 'json',
                success: function (data) {
                    $.each(data, function (key, value) {
                        $('#'+key).val(value);
                        if(key == 'id'){
                            $('#curso_id').val(value);
                        }else if(key == 'coordenador'){
                            $.each(value, function (chave, valor) {
                                if(chave == 'nomeCoordenador'){
                                    $('#coordenadorList option:selected').text(valor);
                                }
                                $('#'+chave).val(valor);
                            });
                        }
                    });
                }
            });
        });

        function remover(){

            var token = $('meta[name=csrf-token]').attr('content');
            var id = $('#curso_id').val();

            var confirmacao = confirm('Realmente deseja remover os dados?');
            if(confirmacao){
                var formData = new FormData();
                $.ajax({
                    method: 'POST',
                    url: '{{route('cursos.destroy',$curso_id)}}',
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
    </script>
@endsection
