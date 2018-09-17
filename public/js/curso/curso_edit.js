$(document).ready(function () {
    var id = $('#curso_id').val();

    reload();

    $('#btnCancelar').on('click',function () {
        window.history.back();
    });

    $('<input>').attr({
        type: 'hidden',
        id: '_token',
        name: '_token',
        value: $('meta[name=csrf-token]').attr('content')
    }).appendTo($('#formCursos'));

    $('<input>').attr({
        type: 'hidden',
        id: '_method',
        name: '_method',
        value: 'PUT'
    }).appendTo($('#formCursos'));

    $.ajax({
        method: 'GET',
        url: '/cursos/'+id+'/edit',
        dataType: 'json',
        success: function (data) {
            $.each(data, function (key, value) {
                $('#'+key).val(value);
                if(key == 'id'){
                    $('#curso_id').val(value);
                }else if(key == 'coordenador') {
                    $.each(value, function (chave, valor) {
                        if (chave === 'id') {
                            var exists = false;
                            $('#coordenadorList option').each(function(){
                                if (this.value == valor) {
                                    exists = true;
                                    return false;
                                }
                            });
                            if(!exists){
                                alert('Por gentileza atualizar o coodernador do Curso, pois o presente coordenador esta INATIVO');
                                $('<option>').attr({
                                    selected: 'selected',
                                    disabled: 'disabled',
                                    value: valor,
                                }).text(value.nomeCoordenador).appendTo($('#coordenadorList'));
                            }else{
                                $('#coordenadorList').val(valor);
                            }
                        }
                        $('#' + chave).val(valor);
                    });
                }
            });
        },
        error: function (data) {
            error = data.responseJSON.error;
            alert(error);
            window.location.href = '/cursos/index';
        }
    });

    $('#formCursos').on('submit',function (e) {
        e.preventDefault();
        $.ajax({
            method: 'POST',
            url: '/cursos/'+$('#curso_id').val(),
            data: $(this).serialize(),
            dataType: 'json',
            success: function (data) {
                alert('Curso Atualizado com sucesso');
                window.location.href = '/cursos/'+data.curso_id;
            },
            error: function (data) {
                var erros = data.responseJSON.errors;
                alert('Campos obrigatórios não preenchidos');
                $.each(erros, function (key, value) {
                    $('#error-'+key).text(''+value[0]).show();
                    $('#'+key).addClass('is-invalid');
                    if(key == 'coordenador_id'){
                        $('#coordenadorList').addClass('is-invalid');
                    }
                });
            }
        });
    });
});

function reload() {
    var url = document.referrer;
    if(url.indexOf('coordenador') != -1){
        window.location.reload();
    }
}