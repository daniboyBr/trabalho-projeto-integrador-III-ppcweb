$(document).ready(function () {
    $('.error').hide();
    $('#btnSalvar').show();
    $('#btnCancelar').show();
    $('#novoCoordenador').show();

    $('#btnCancelar').on('click',function () {
        window.location.href = '/cursos';
    });

    $('<input>').attr({
        type: 'hidden',
        id: '_token',
        name: '_token',
        value: $('meta[name=csrf-token]').attr('content')
    }).appendTo($('#formCursos'));

    $('#formCursos').on('submit',function (e) {
        e.preventDefault();
        var confirmacao = confirm('Realmente deseja salvar os dados?');
        if(confirmacao){
            $.ajax({
                method: 'POST',
                url: '/cursos',
                data: $(this).serialize(),
                dataType: 'json',
                success: function (data) {
                    alert('Curso cadastrado com sucesso!');
                    window.location.href = '/cursos/'+data.curso_id;
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
        }
    });

});