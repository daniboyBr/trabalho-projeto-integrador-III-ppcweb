$(document).ready(function () {
    $('#formCursos :input').prop('disabled',true);
    $('#formCursos select').prop('disabled',true);
    $('.btn').not('.btn-danger').not('.btn-warning').remove();
    $('#btnCancelar').remove();

    $('#btnAtualizar').on('click',function () {
        window.location.href = '/cursos/'+$('#curso_id').val()+'/edit';
    });

    $.ajax({
        method: 'GET',
        url: '/cursos/'+$('#curso_id').val(),
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
        },
        error: function (data) {
            error = data.responseJSON.error;
            alert(error);
            window.location.href = '/cursos';
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
            url: '/cursos/'+id,
            data: {
                _token: token,
                _method: 'delete',
                id: id
            },
            dataType: 'json',
            success: function (data) {
                alert('Curso removido com sucesso');
                window.location.href = '/cursos';
            },
            error: function (data) {
                var error = data.responseJSON.error;
                alert(error);
            }
        });
    }
}