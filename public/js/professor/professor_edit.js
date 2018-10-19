$(document).ready(function () {
    $('.tempoTotal').attr('disabled','disabled');
    $('<input>').attr({
        type: 'hidden',
        id: '_method',
        name: '_method',
        value: 'PUT'
    }).appendTo($('#formProfessor'));


    $.ajax({
        method: 'GET',
        url: '/professor/'+$('#professor_id').val(),
        dataType: 'json',
        success: function (data) {
            $.each(data, function (key, value) {
                $('#'+key).val(value).trigger('change');
                if(key == 'id'){
                    $('#disciplina_id').val(value);
                }else if(key ==  'disciplinas_ministradas'){
                    disciplinasMinistradas(value);
                }else if(key == 'disciplinas_ministradas_outros_cursos'){
                    disciplinasMinistradasOutrosCursos(value);
                }else if(key == 'anexo_comprovantes'){
                    //comprovantes(value);
                }else if((key == 'membroNDE' || key == 'membroColegiado' || key == 'docenteFCEP') && value == 1 ){
                    $('#'+key).attr('checked','checked');
                }
            });
        },
        error: function (data) {
            error = data.responseJSON.message;
            alert(error);
            window.location.href = '/professor';
        }
    });
});

function disciplinasMinistradas(dados) {
    $.each(dados, function (key, valor) {
        table1.row.add([
            "<input type='text' class='form-control form-control-sm' name='DisciplinasMinistradas["+counter1+"][disciplina]' readonly='readonly'value='"+valor.disciplina+"' />",
            "<input type='text' class='form-control form-control-sm' name='DisciplinasMinistradas["+counter1+"][cargaHoraria]' readonly='readonly'value='"+valor.cargaHoraria+"' />",
            '<button class="btn btn-sm btn-danger"><i class="fa fa-minus"></i></button>'
        ]).draw( false );
    });
}

function disciplinasMinistradasOutrosCursos(dados) {
    $.each(dados, function (chave, valor) {
        table2.row.add([
            "<input type='text' class='form-control form-control-sm' name='DisciplinasMinistradasOutrosCursos["+counter2+"][curso]' readonly='readonly'value='"+valor.curso+"'/>",
            "<input type='text' class='form-control form-control-sm' name='DisciplinasMinistradasOutrosCursos["+counter2+"][disciplina]' readonly='readonly'value='"+valor.disciplina+"' />",
            "<input type='text' class='form-control form-control-sm' name='DisciplinasMinistradasOutrosCursos["+counter2+"][cargaHoraria]' readonly='readonly'value='"+valor.cargaHoraria+"' />",
            '<button class="btn btn-sm btn-danger"><i class="fa fa-minus"></i></button>'
        ]).draw( false );
    });
}