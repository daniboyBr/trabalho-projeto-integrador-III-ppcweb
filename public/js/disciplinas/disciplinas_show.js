$(document).ready(function () {
    $('#formDisciplinas :input').prop('disabled',true);
    $('#formDisciplinas select').prop('disabled',true);
    $('.btn').not('.btn-danger').not('.btn-warning').remove();
    $('#btnCancelar').remove();

    $('#btnAtualizar').on('click',function () {
        window.location.href = '/disciplinas/'+$('#disciplina_id').val()+'/edit';
    });

    $.ajax({
        method: 'GET',
        url: '/cursos',
        success: function (data) {
            console.log(data);
            $.each(data.data, function (chave, value) {
                $('<option>').attr({
                    value: data.data[chave].id,
                }).text(data.data[chave].denominacaoCurso).appendTo($('#selectCurso'));
            })
        },
        error: function (data) {
            var error = data.responseJSON.errors;
            alert(error);
            window.location.herf = '/disciplinas';
        }
    });

    $.ajax({
        method: 'GET',
        url: '/disciplinas/'+$('#disciplina_id').val(),
        dataType: 'json',
        success: function (data) {
            $.each(data, function (key, value) {
                $('#'+key).val(value);
                if(key == 'id'){
                    $('#disciplina_id').val(value);
                }else if(key == 'curso'){
                    $('<option>').attr({
                        selected: 'selected',
                        disabled: 'disabled',
                        value: value.id,
                    }).text(value.denominacaoCurso).appendTo($('#selectCurso'));
                }
            });
        },
        error: function (data) {
            error = data.responseJSON.message;
            alert(error);
            window.location.href = '/disciplinas';
        }
    });
});

function remover(){
    var token = $('meta[name=csrf-token]').attr('content');
    var id = $('#disciplina_id').val();

    var confirmacao = confirm('Realmente deseja remover os dados?');
    if(confirmacao){
        $.ajax({
            method: 'POST',
            url: '/disciplinas/'+id,
            data: {
                _token: token,
                _method: 'delete',
                id: id
            },
            dataType: 'json',
            success: function (data) {
                alert('Disciplina removida com sucesso');
                window.location.href = '/disciplinas';
            },
            error: function (data) {
                var error = data.responseJSON.message;
                alert(error);
            }
        });
    }
}