$(document).ready(function () {
    var id = $('#disciplina_id').val();

    $('.error').hide();

    $('#btnCancelar').on('click',function () {
        window.history.back();
    });

    $('<input>').attr({
        type: 'hidden',
        id: '_token',
        name: '_token',
        value: $('meta[name=csrf-token]').attr('content')
    }).appendTo($('#formDisciplinas'));

    $('<input>').attr({
        type: 'hidden',
        id: '_method',
        name: '_method',
        value: 'PUT'
    }).appendTo($('#formDisciplinas'));

    $.ajax({
        method: 'GET',
        url: '/cursos',
        success: function (data) {
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
        url: '/disciplinas/'+id,
        dataType: 'json',
        success: function (data) {
            $.each(data, function (chave, valor) {
                if(chave == 'id') {
                    $('#disciplina_id').val(valor);
                }if(chave == 'curso_id'){
                    $('#selectCurso').val(valor);
                }
                else
                {
                    $('#'+chave).val(valor);
                }
            });
        },
        error: function (data) {
            var erro = data.responseJSON.message;
            alert(erro);
            window.location.href ='/disciplinas';
        }
    });


    $('#btnSalvar').on('click',function (e) {
        e.preventDefault();
        var confirmacao = confirm('Realmente deseja submeter os dados?');
        if(confirmacao){
            $('#formDisciplinas').submit();
        }
    });

    $('#formDisciplinas').submit(function (e) {
        e.preventDefault();
        $.ajax({
            method:'POST',
            url: '/disciplinas/'+id,
            dataType: 'json',
            data: $(this).serialize(),
            success: function(data) {
                alert('Disciplina atualizada com sucesso!');
                window.location.href = '/disciplinas/'+data.disciplina_id;
            },
            error: function (data) {
                var erros = data.responseJSON.errors;
                $.each(erros, function (key, value) {
                    $('#error-'+key).text(''+value[0]).show();
                    $('#'+key).addClass('is-invalid');
                    if(key == 'curso_id'){
                        $('#selectCurso').addClass('is-invalid');
                    }
                })
            }
        });
    });

});
