$(document).ready(function () {
    $('.error').hide();

    $('#btnCancelar').on('click',function () {
        window.location.href = '/disciplinas';
    });

    $('<input>').attr({
        type: 'hidden',
        id: '_token',
        name: '_token',
        value: $('meta[name=csrf-token]').attr('content')
    }).appendTo($('#formDisciplinas'));


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


    $('#formDisciplinas').on('submit',function (e) {
        e.preventDefault();
        var confirmacao = confirm('Realmente deseja submeter os dados?');
        if(confirmacao){
            $.ajax({
                method: 'POST',
                url: '/disciplinas',
                data: $(this).serialize(),
                dataType: 'json',
                success: function (data) {
                    alert('Disciplinas cadastrado com sucesso!');
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
        }
    });

});